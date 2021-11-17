<?php /** @var Array $data */ ?>

<div>
    <img class="abstract-background" src="<?= \App\Config\Configuration::IMG_DIR."login-bg2.png"?>" alt="pozadie">
    <div class="center reg">
        <h1>Registrácia</h1>
        <form method="post" action="?c=auth&a=addNewUser">
            <div class="txt_field">
                <input id="log-name" type="email" name="email" required>
                <span></span>
                <label for="log-name">Email</label>
            </div>
            <div class="txt_field">
                <input id="log-pass" type="password" name="password" required>
                <span></span>
                <label for="log-pass">Zadajte heslo</label>
            </div>

            <div class="txt_field">
                <input id="log-pass" type="password" name="password-repeat" required>
                <span></span>
                <label for="log-pass">Zopakujte heslo</label>
            </div>

            <?php if ($data['error'] == \App\Config\Configuration::DIFFERENT_PASSWORDS){?>
                <div class="reg-error"><?= $data['error'] ?></div>
            <?php } elseif ($data['error'] == \App\Config\Configuration::USER_ALREADY_EXISTS){ ?>
                <div class="reg-error"><?= $data['error'] ?></div>
            <?php } ?>






            <?php /*if ($data['error'] != ""){*/?><!--
                <label style="color: #202020"><?php /*$data['error'] */?></label>
            --><?php /*} */?>


            <input type="submit" value="Registrovať sa">
        </form>
    </div>
</div>