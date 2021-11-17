<?php /** @var Array $data */ ?>


<div class="blog-body registration-body">
    <section id="first-section">
        <div>
            <h1>Úprava profilu</h1>
        </div>
        <div class="forms">
            <form method="post" action="?c=portfolio&a=update" enctype="multipart/form-data">
                <br>
                <h3>Všeobecné úpravy</h3>

                <div class="txt_field">
                    <input id="reg-name" type="text" name="name" value="<?=$data['user']->getName()?>" required>
                    <span></span>
                    <label for="reg-name">Meno</label>
                </div>

                <div class="txt_field">
                    <input id="reg-surname" type="text" name="surname" value="<?=$data['user']->getSurname()?>" required>
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


                <!--<h3>Zmena prihlasovacích údajov</h3>
                <div class="modify">
                    <a id="btn-update-profil" href="?c=auth&a=deleteProfil">Vymazať profil</a>
                </div>

                <div class="txt_field">
                    <input id="reg-email" type="email" name="email" value="<?/*=$data['user']->getEmail()*/?>">
                    <span></span>
                    <label for="reg-email">Email</label>
                </div>

                <div class="txt_field">
                    <input id="reg-parrword-first" type="password" name="parrword-first">
                    <span></span>
                    <label for="reg-parrword-first">Nové heslo</label>
                </div>

                <div class="txt_field">
                    <input id="reg-parrword-second" type="password" name="parrword-second">
                    <span></span>
                    <label for="reg-parrword-second">Zopakujte heslo</label>
                </div>-->



                <input type="submit" value="Potvrdiť zmeny">

            </form>

        </div>
    </section>
    <footer class="footer">
        <div>
        </div>
    </footer>

</div>
