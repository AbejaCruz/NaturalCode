<?php 

function dd ($var) {
    // echo '<pre>';
    die(var_dump($var));
    // echo '</pre>';
}

function getHTML ($file_name) {
    ob_start();
    ob_implicit_flush(false);
    include ($file_name);
    return ob_get_clean();
}


$content = getHTML('main.htm');

$paths=['categories'];
$path = trim(@$_SERVER[PATH_INFO], '/');


if (in_array($path, $paths)) $inner_content_path = $path;  
else $inner_content_path = 'home';

if (file_exists("{$inner_content_path}.php")) {
    $inner_content = getHTML("{$path}.htm");
    include ("{$inner_content_path}.php");

}
else $inner_content = getHTML("home.htm");;

$content = str_replace('[[content]]', $inner_content, $content);

$content = str_replace('[[cdn_domain]]/css/porsche', '/css', $content);

echo $content;