<?php

$item = <<<CAT
<div class="dpr_container" data-prod-category="9">
    <a href="/p/tobilleras-mood-apasionado-para-mujer/" class="dpr_listname" onclick="gaNotifyClick('M110-01-t1-911');">
        <div class="dpr_imagen_thumb">
            <img src="https://www.vw-americas.com.mx/autosnuevos/img/Modelos/TCRO20.png" border="0" alt="NuevoT-Cross 2020">
        </div>
        
        <div class="dpr_product-name">Nuevo T-Cross 2020</div>
    </a>
    
    
    
    <div class="dpr_listprice">$11,900</div>
    
    
    
    
    <div class="dpr_in_stock">Disponible</div>
    <div class="dpr_product-list-add-button">
        <select id="cant_44" class="dpr_select">
            <option value="1" selected="">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <button class="button_def button_prod_add" prd="44" sku="M110-01-t1-911" style="cursor:pointer" id="adi_44">Agregar &nbsp;<span class="fa fa-shopping-cart fa-lg"></span></button>
    </div>
</div>
CAT;


if (isset($_GET['amount_of_items'])) {
    $items = "";
    for ($i = 0; $i < $_GET['amount_of_items']; $i++) {
        $items .= $item;
    }
    $item = $items;
}
$inner_content = str_replace('[[div_items]]', $item, $inner_content);
