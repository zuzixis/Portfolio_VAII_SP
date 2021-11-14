<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blogy">
    <meta name="keywords" content="Blog">
    <meta name="author" content="Zuzana Žillová">
    <title>Blogy</title>
    <link rel="stylesheet" href="<?=\App\Config\Configuration::STYLE?>" type="text/css">
    <script src="../skript/skript.js"></script>
</head>
<body>
<header>
    <div class="menu">
        <div class="left-blue-area">
            <div class="left-blue-background "></div>
            <img id="logo-icon" src="<?=\App\Config\Configuration::IMG_DIR."portfolio.png"?>" alt="Logo">
            <ul>
                <li>
                    <a href="tel:+421910117452" >
                        <img src="<?=\App\Config\Configuration::IMG_DIR."telefon.png"?>" alt="ikona telefónu">
                    </a>

                </li>
                <li>
                    <a href="https://www.instagram.com/zuzka150/" target="_blank">
                        <img src="<?=\App\Config\Configuration::IMG_DIR."instagram.png"?>" alt="ikona instagram">
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/zillova" target="_blank">
                        <img  src="<?=\App\Config\Configuration::IMG_DIR."facebook.png"?>" alt="ikona facebook">
                    </a>
                </li>
                <li>
                    <a href="mailto:zuzka.zillova@gmail.com" >
                        <img src="<?=\App\Config\Configuration::IMG_DIR."email.png"?>" alt="ikona email">
                    </a>
                </li>
            </ul>
        </div>

        <nav class="main-menu">
            <img class="btn-menu" onclick="openCloseNav()" src="<?=\App\Config\Configuration::IMG_DIR."menu.png"?>" alt="menu">

            <ul id="menu-items">
                <li><a href="?c=home&a=index">Domov</a></li>
                <li class="active"><a href="?c=blog&a=blogBlogs">Blog</a></li>
                <li><a href="?c=portfolio&a=portfolios">Portfóliá</a></li>

                <?php
                if (\App\Auth::isLogged())
                {?>
                    <li class="no-active"><a id="btn-login" href="?c=auth&a=logout">Odhlásiť sa</a></li>
                <?php
                }else{?>
                    <li><a id="btn-login" href="<?= \App\Config\Configuration::LOGIN_URL ?>">Prihlásenie</a></li>
                <?php }?>


            </ul>
        </nav>
    </div>
</header>

    <?= $contentHTML ?>

<!--<footer class="footer">
    <div>
    </div>
</footer>-->

</body>
</html>



