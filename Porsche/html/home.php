<?php

$css_deferred_inn = "
    @media screen and (max-width: 600px) {
        .home_banners {
            display: none;
        }
        .home_banners_mobile {
            display: block;	
        }
    }
    @media screen and (min-width: 600px) {
        .home_banners {
            display: block;
        }
        .home_banners_mobile {
            display: none;	
        }
    }
";

$home_banners = '
    <div class="home_banners" data-banner-identifier="H-4" data-banner-carrousel="true"> 
        <div class="banner-carousel">
            <div class="slide"><a href="https://www.easy.com.co/g/el-top-de-mascotas/?sort=0" style="text-decoration:none;"><img src="https://cdn.totalcode.net/easy/images/banners/banner_10676.jpg" border="0" alt=""></a></div>
    </div>
    <div class="home_banners_mobile"> 
        <div class="banner-carousel">
            <div class="slide"><a href="https://www.easy.com.co/g/el-top-de-mascotas/?sort=0" style="text-decoration:none;"><img src="https://cdn.totalcode.net/easy/images/banners/banner_10677.jpg" border="0" alt=""></a></div>
        </div>
    </div>
';


$arr_replacements_final = array(
	'[[home_banners]]' => $home_banners
);

$inner_content = str_replace(array_keys($arr_replacements_final), $arr_replacements_final, $inner_content);
