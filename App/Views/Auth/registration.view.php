<?php /** @var Array $data */ ?>

<div class="notification">
    <img class="abstract-background" src="<?= \App\Config\Configuration::IMG_DIR."login-bg2.png"?>" alt="pozadie">
    <?php if ($data['error'] != ""){?>
        <div class="alert ale-err">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <p>
                <?= $data['error'] ?>
            </p>
        </div>
    <?php } ?>

    <div class="center reg">
        <h1>Registrácia</h1>

        <form method="post" action="?c=auth&a=addNewUser">
            <div class="txt_field">
                <input id="log-name" type="email" name="email" required>
                <span></span>
                <label for="log-name">Email</label>
            </div>

            <div class="txt_field">
                <input id="reg-password-first" oninput="checkPassword()"
                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                       title="Heslo musí obsahovať aspoň 8 znakov, aspoň jedno veľké písmeno, aspoň jedno malé písmeno a aspoň jedno číslo"
                       type="password" name="password-first" required>
                <span></span>
                <label for="reg-password-first">Nové heslo</label>
            </div>

            <div class="txt_field">
                <input id="reg-password-second" type="password" name="password-second" required>
                <span></span>
                <label for="reg-password-second" >Zopakujte heslo</label>
            </div>

            <div class="reg-error" id="err-title"></div>
            <input type="submit" value="Registrovať sa">
        </form>
    </div>
</div>