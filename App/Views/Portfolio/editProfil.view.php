<?php /** @var Array $data */ ?>

<div class="blog-body registration-body">
    <section id="first-section">
        <?php if ($data['error'] != ""){?>
            <div class="alert ale-err">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <?= $data['error'] ?>
            </div>
        <?php } ?>
        <div>
            <h1>Úprava profilu</h1>
        </div>
        <div class="forms">
            <form method="post" action="?c=portfolio&a=update" enctype="multipart/form-data">
                <br>
                <h3>Všeobecné úpravy</h3>

                <div class="txt_field">
                    <input id="reg-name" type="text" name="name" value="<?=$data['user']->getName()?>">
                    <span></span>
                    <label for="reg-name">Meno</label>
                </div>

                <div class="txt_field">
                    <input id="reg-surname" type="text" name="surname" value="<?=$data['user']->getSurname()?>">
                    <span></span>
                    <label for="reg-surname">Priezvisko</label>
                </div>

                <div class="txt_field">
                    <input id="reg-number" type="number" name="number" value="<?=$data['user']->getNumber()?>">
                    <span></span>
                    <label for="reg-number">Telefónne číslo</label>
                </div>

                <div class="txt_field">
                    <input id="reg-facebook" type="text" name="facebook" value="<?=$data['user']->getFacebook()?>">
                    <span></span>
                    <label for="reg-facebook">Facebook</label>
                </div>

                <div class="txt_field">
                    <input id="reg-instagram" type="text" name="instagram" value="<?=$data['user']->getInstagram()?>">
                    <span></span>
                    <label for="reg-instagram">Instagram</label>
                </div>

                <div class="txt_field">
                    <input id="reg-location" type="text" name="location" value="<?=$data['user']->getLocation()?>">
                    <span></span>
                    <label for="reg-location">Mesto bydliska</label>
                </div>


                <label for="text-about">Krátky textík o sebe</label>

                <textarea id="text-about"  rows="5" name="basicInfo"><?=$data['user']->getBasicInfo()?></textarea>

                <span>Nahratie profilovej fotky</span>
                <br>
                <input type="file" id="profil-photo" name="profil-photo" accept="image/*">

                <br>
                <br>


                <h3>Zmena prihlasovacích údajov</h3>
                <div class="modify">
                    <a id="btn-delete-profil" href="#" onclick="confirmProfileDeletion()">Vymazať profil</a>
                    <a id="delete-prof" href="?c=auth&a=deleteProfil"></a>
                </div>

                <div class="txt_field">
                    <input id="reg-password-first" oninput="checkPassword()"
                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                           title="Heslo musí obsahovať aspoň 8 znakov, aspoň jedno veľké písmeno, aspoň jedno malé písmeno a aspoň jedno číslo"
                           type="password" name="password-first">
                    <span></span>
                    <label for="reg-password-first">Nové heslo</label>
                </div>

                <div class="txt_field">
                    <input id="reg-password-second" type="password" name="password-second">
                    <span></span>
                    <label for="reg-password-second" >Zopakujte heslo</label>
                </div>

                <div class="reg-error" id="err-title"></div>

                <input type="submit" value="Potvrdiť zmeny">

            </form>

        </div>
    </section>
    <footer class="footer">
        <div>
        </div>
    </footer>

</div>
