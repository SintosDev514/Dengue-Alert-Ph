<?php
/**
 * dengue_data.php
 * Fetches and caches DOH dengue CSV data from HDX (Humanitarian Data Exchange)
 * Source: https://data.humdata.org/dataset/philippine-dengue-cases-and-deaths
 * Data: DOH Epidemiology Bureau, Philippines (2016–2021)
 */

define('CACHE_FILE', __DIR__ . '/dengue_cache.json');
define('CACHE_TTL',  60 * 60 * 24); // refresh cache every 24 hours

// CSV URLs per year from HDX (most recent = 2021)
define('CSV_URL_2021', 'https://data.humdata.org/dataset/ac63a95e-7296-42fb-802b-7f7541c73e45/resource/d4f86343-dcb5-428a-94ed-3ce6edb9b831/download/doh-epi-dengue-cases-2021.csv');
define('CSV_URL_2020', 'https://data.humdata.org/dataset/ac63a95e-7296-42fb-802b-7f7541c73e45/resource/5e83e63e-1266-46f2-b38d-de911aea85d2/download/doh-epi-dengue-cases-2020.csv');
define('CSV_URL_2019', 'https://data.humdata.org/dataset/ac63a95e-7296-42fb-802b-7f7541c73e45/resource/e503d4ee-79c9-45ba-9589-1c2dca9af1b5/download/doh-epi-dengue-cases-2019.csv');

/**
 * Fetch a CSV from a URL 
 */
function fetch_csv(string $url): array {
    $ctx = stream_context_create(['http' => [
        'timeout' => 15,
        'user_agent' => 'DengueAlertPH/1.0'
    ]]);
    $raw = @file_get_contents($url, false, $ctx);
    if (!$raw) return [];

    $lines = preg_split('/\r\n|\r|\n/', trim($raw));
    $rows  = [];
    $header = null;

    foreach ($lines as $line) {
        $line = trim($line);
        if (empty($line)) continue;

        $cols = str_getcsv($line);
        if (!$header) {
           
            $header = array_map('trim', $cols);
            continue;
        }
        if (count($cols) !== count($header)) continue;
        $row = array_combine($header, array_map('trim', $cols));
        $rows[] = $row;
    }
    return $rows;
}


function normalize_region(string $raw): string {
    $raw = strtoupper(trim($raw));
    $map = [
        'NATIONAL CAPITAL REGION'      => 'NCR (Metro Manila)',
        'REGION III-CENTRAL LUZON'     => 'Region III – Central Luzon',
        'REGION IV-A-CALABARZON'       => 'Region IV-A – CALABARZON',
        'REGION IVB-MIMAROPA'          => 'Region IV-B – MIMAROPA',
        'REGION VII-CENTRAL VISAYAS'   => 'Region VII – Central Visayas',
        'REGION VII-EASTERN VISAYAS'   => 'Region VIII – Eastern Visayas',
        'REGION XI-DAVAO REGION'       => 'Region XI – Davao Region',
        'REGION XII-SOCCSKSARGEN'      => 'Region XII – SOCCSKSARGEN',
        'REGION VI-WESTERN VISAYAS'    => 'Region VI – Western Visayas',
        'REGION V-BICOL REGION'        => 'Region V – Bicol Region',
        'REGION IX-ZAMBOANGA PENINSULA'=> 'Region IX – Zamboanga Peninsula',
        'REGION X-NORTHERN MINDANAO'   => 'Region X – Northern Mindanao',
        'REGION I-ILOCOS REGION'       => 'Region I – Ilocos Region',
        'REGION II-CAGAYAN VALLEY'     => 'Region II – Cagayan Valley',
        'CAR'                          => 'CAR – Cordillera',
        'CARAGA'                       => 'CARAGA',
        'BARMM'                        => 'BARMM',
    ];
    foreach ($map as $pattern => $label) {
        if (strpos($raw, $pattern) !== false) return $label;
    }
    return ucwords(strtolower($raw));
}


function aggregate_by_region(array $rows): array {
    $totals = [];
    foreach ($rows as $row) {
        
        $cases  = (int)($row['cases']  ?? $row['Cases']  ?? 0);
        $deaths = (int)($row['deaths'] ?? $row['Deaths'] ?? 0);
        $region = $row['Region'] ?? $row['region'] ?? '';
        if (empty($region)) continue;
        $label = normalize_region($region);
        if (!isset($totals[$label])) {
            $totals[$label] = ['cases' => 0, 'deaths' => 0];
        }
        $totals[$label]['cases']  += $cases;
        $totals[$label]['deaths'] += $deaths;
    }
  
    uasort($totals, fn($a, $b) => $b['cases'] <=> $a['cases']);
    return $totals;
}


function get_dengue_data(): array {
   
    if (file_exists(CACHE_FILE)) {
        $cached = json_decode(file_get_contents(CACHE_FILE), true);
        if (!empty($cached) && (time() - ($cached['fetched_at'] ?? 0)) < CACHE_TTL) {
            return $cached;
        }
    }

    
    $rows2021 = fetch_csv(CSV_URL_2021);
    $rows2020 = fetch_csv(CSV_URL_2020);

   
    $all_rows = array_merge($rows2021, $rows2020);

    $by_region = aggregate_by_region($all_rows);

    $total_cases  = array_sum(array_column($by_region, 'cases'));
    $total_deaths = array_sum(array_column($by_region, 'deaths'));

    $result = [
        'fetched_at'   => time(),
        'source'       => 'DOH-Epidemiology Bureau via HDX (2020–2021)',
        'source_url'   => 'https://data.humdata.org/dataset/philippine-dengue-cases-and-deaths',
        'total_cases'  => $total_cases,
        'total_deaths' => $total_deaths,
        'regions'      => $by_region,
    ];

    
    @file_put_contents(CACHE_FILE, json_encode($result, JSON_PRETTY_PRINT));

    return $result;
}
