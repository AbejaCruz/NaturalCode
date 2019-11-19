<?php 

function dd ($var) {
    // echo '<pre>';
    die(var_dump($var));
    // echo '</pre>';
}

function getHTML (string $file_name) {
    ob_start();
    ob_implicit_flush(false);
    include ("views/{$file_name}.htm");
    return ob_get_clean();
}


$content = getHTML('main');
$routes = include ('routes.php');
$path = trim(@$_SERVER[PATH_INFO], '/');

if ($path == '') $path = 'home';

if (in_array($path, $routes)) $inner_content_path = $path;  
else $inner_content_path = 'blank';


if (file_exists("{$inner_content_path}.php")) {
    $inner_content = getHTML($path);
    include ("{$inner_content_path}.php");
}
else if (file_exists("views/{$inner_content_path}.htm") || file_exists("views/{$inner_content_path}.htm") ) $inner_content = getHTML($inner_content_path); 
else $inner_content = getHTML("blank");



$content = str_replace('[[page_content]]', $inner_content, $content);
$content = str_replace('[[cdn_domain]]/css/porsche', '/css', $content);

echo $content;