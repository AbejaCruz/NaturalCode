<?php 

function dd ($var) {
    // echo '<pre>';
    die(var_dump($var));
    // echo '</pre>';
}

function getHTML ($file_name) {
    ob_start();
    ob_implicit_flush(false);
    include ("views/$file_name.htm");
    return ob_get_clean();
}


$content = getHTML('main');

$paths=[
    'categories',
    'cotizador',
    'retoma',
    'test-drive',
    'nuestras-sedes',
    'contactanos',
    'autos'
];
$path = trim(@$_SERVER[PATH_INFO], '/');

// if ($path == 'autos') $path = 'categories';

if (in_array($path, $paths)) $inner_content_path = $path;  
else $inner_content_path = 'home';

if (file_exists("{$inner_content_path}.php")) {
    $inner_content = getHTML($path);
    include ("{$inner_content_path}.php");
}
else if (file_exists($inner_content_path)) $inner_content = getHTML($inner_content_path); 
else $inner_content = getHTML("home");;


$content = str_replace('[[page_content]]', $inner_content, $content);

$content = str_replace('[[cdn_domain]]/css/porsche', '/css', $content);

echo $content;