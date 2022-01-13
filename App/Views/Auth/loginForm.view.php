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

    <div class="center">
        <h1>Prihlásenie</h1>
        <form method="post" action="?c=auth&a=login">
            <div class="txt_field">
                <input id="log-name" type="email" name="login" required>
                <span></span>
                <label for="log-name">Email</label>
            </div>
            <div class="txt_field">
                <input id="log-pass" type="password" name="password" required>
                <span></span>
                <label for="log-pass">Heslo</label>
            </div>
            <input type="submit" value="Prihlásiť sa">
            <div class="signup_link">
                Nie ste zaregistrovaný? <a href="?c=auth&a=registration">Zaregistrovať sa</a>
            </div>
        </form>
    </div>
</div>