<?php

$content = getHTML('main');
$routes = include ('routes.php');
$path = trim(@$_SERVER[PATH_INFO], '/');

if ($path == '') $path = 'home';

if (in_array($path, $routes)) $inner_content_path = $path;  
else $inner_content_path = 'blank';

$meta_tag_title= '';

if (file_exists("{$inner_content_path}.php")) {
    $inner_content = getHTML($path);
    include ("{$inner_content_path}.php");
}
else if (file_exists("views/{$inner_content_path}.htm") || file_exists("views/{$inner_content_path}.htm") ) $inner_content = getHTML($inner_content_path); 
else $inner_content = getHTML("blank");

$facebook_dynamic_ads_code = '';
$google_analytics_code = '';
$head = '';

$meta_tag_title .= 'Porsche';
$conf_headloca_address= "Calle Falsa 123";
$conf_headloca_city= "Bogotá";
$conf_headloca_state= "Cundinamarca";
$conf_store_phone = '8889912';
$css_deferred = (isset($css_deferred_inn)) ? "<style>{$css_deferred_inn}</style>" : '';
$javascript = '<script type="text/javascript" src="https://cdn.totalcode.net/javascript/slick/slick.min.js"></script>';

$arr_replacements_final = array(
    
	'[[facebook_dynamic_ads_code]]' => $facebook_dynamic_ads_code,
    '[[google_analytics_code]]' => $google_analytics_code,

    
	'[[head]]'=>$head,
	// '[[onload]]'=>$onload,
	'[[css]]'=>$css_deferred,
	// '[[javascript]]'=>$js_deferred,
	// '[[cdn_domain]]'=>$conf_cdn_domain,
    // '[[lang]]'=>$_SESSION['lang'],
    
    '[[meta_tag_title]]' => $meta_tag_title,
    '[[conf_headloca_address]]' => $conf_headloca_address,
    '[[conf_headloca_city]]' => $conf_headloca_city,
    '[[conf_headloca_state]]' => $conf_headloca_state,
    '[[conf_store_phone]]' => $conf_store_phone,
    '[[javascript]]' => $javascript
);

$content = str_replace(array_keys($arr_replacements_final), $arr_replacements_final, $content);


$content = str_replace('[[page_content]]', $inner_content, $content);
$content = str_replace('[[cdn_domain]]/css/porsche', '/css', $content);

$content = str_replace('/css/porsche', '/css', $content);
