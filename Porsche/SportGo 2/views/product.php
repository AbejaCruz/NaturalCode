<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $product->name ?></title>
    <style>
        @font-face {
            font-family: Logo1;
            src: url(/css/sport-go/assets/fonts/M025096D.ttf);
        }
        @font-face {
            font-family: Logo2;
            src: url(/css/sport-go/assets/fonts/fresty.ttf);
        }
        @font-face {
            font-family: Typewriter_Condensed;
            src: url(/css/sport-go/assets/fonts/typewcond_regular.otf);
        }
        @font-face {
            font-family: adiNeue;
            src: url(/css/sport-go/assets/fonts/adineue-bold-webfont.ttf);
        }
    </style>
    <link rel="stylesheet" href="/css/sport-go/product.css">
</head>

<body>

    <div id="product" class="product-view">
        <a href="#close" title="Close" class="close-modal">&times;</a>
        <div class="title">Woman Hoodie Sport-Go</div>
        <div class="prod-images">
            <div class="thumbs">
                <div class="thumb">
                    <img src="/css/sport-go/images/<?= $product->images[0] ?>" alt="<?= $product->name ?>">
                </div>
                <div class="thumb">
                    <img src="/css/sport-go/images/<?= $product->images[1] ?>" alt="<?= $product->name ?>">
                </div>
                <div class="thumb">
                    <img src="/css/sport-go/images/<?= $product->images[2] ?>" alt="<?= $product->name ?>">
                </div>
            </div>
            <div class="prod-image">
                <img src="/css/sport-go/images/<?= $product->images[3] ?>" alt="<?= $product->name ?>">
            </div>

        </div>
        <div class="price">
        <?= $product->price ?>
        </div>
        <div class="specs-btn">

            <div class="specs">
                <div class="spec">
                    <div class="name">
                        Colors
                    </div>
                    <div class="variants">
                        <div class="variant color-test" style="background-color: rgb(2, 84, 90);"></div>
                        <div class="variant color-test" style="background-color: rgb(116, 204, 15);"></div>
                        <div class="variant color-test" style="background-color: rgb(190, 129, 129);"></div>
                    </div>
                </div>
                <div class="spec">
                    <div class="name">Size</div>
                    <div class="variants">
                        <div class="variant selected">S</div>
                        <div class="variant">M</div>
                        <div class="variant">L</div>
                        <div class="variant">XL</div>
                    </div>
                </div>
            </div>
            <div class="add-to-cart">
                <div class="btn" onclick="addToCart();">
                    <div class="outter-box"></div>
                    Add to cart
                </div>
            </div>
        </div>
        <div class="description">
            <?= $product->description ?>
        </div>
    </div>
</body>

</html>