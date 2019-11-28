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


include ('./functions/replace_tags/main.php');

echo $content;