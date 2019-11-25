"use strict";
let variants = [...document.getElementsByClassName("variant")];

variants.forEach (function (variant) {
    variant.addEventListener('click', function () {
        let container = this.closest('div');
    });
});