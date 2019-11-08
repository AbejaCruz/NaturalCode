<?php 


function includeFileContent ($file_name) {
    ob_start();
    ob_implicit_flush(false);
    include ($file_name);
    return ob_get_clean();
}

$content = includeFileContent('main.htm');

if (@$_SERVER[REQUEST_URI] == '/autos') $inner_content = 'autos';
else $inner_content = 'home'; 

$inner_content = includeFileContent("{$inner_content}.htm");
$content = str_replace('[[content]]', $inner_content, $content);
echo str_replace('[[cdn_domain]]/css/porsche', '/css', $content);