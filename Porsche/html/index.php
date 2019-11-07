<?php 


function includeFileContent ($file_name) {
    ob_start();
    ob_implicit_flush(false);
    include ($file_name);
    return ob_get_clean();
}

$content = includeFileContent('main.htm');
echo str_replace('[[cdn_domain]]/css/porsche', '/css', $content);