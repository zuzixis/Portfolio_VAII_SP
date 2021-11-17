<?php /** @var Array $data */ ?>

<div class="profil-body">
  <section id="first-section">
    <div class="header-profil">

        <img class="profil-photo" src="<?=\App\Config\Configuration::PROFIL_PHOTO_DIR.$data['user']->getProfilPhoto()?>" alt="Profilová fotka">

      <div class="header-title">
        <h1><?=$data['user']->getName()." ".$data['user']->getSurname()?></h1>
          <?php if (\App\Auth::isLogged())
          {?>
              <?php
              if ($_SESSION["id"] == $data['user']->getId()) {?>
                  <div class="modify">
                      <a id="btn-update-profil" href="?c=portfolio&a=editProfil">Všeobecné úpravy profilu</a>
                  </div>
              <?php }?>
          <?php }?>
      </div>

    </div>
  </section>
  <section>
    <div class="contact">
      <h2 class="p-subtitles">Kontakt:</h2>
      <ul>
        <li><img src="<?=\App\Config\Configuration::IMG_DIR."gps.png"?>" alt="Logo poloha">
          <span>
           <?=$data['user']->getLocation()?>
         </span>
        </li>
        <li>
          <img src="<?=\App\Config\Configuration::IMG_DIR."telefon.png"?>"  alt="Logo telefón">
          <a href="tel:+421910117452">
              <?=$data['user']->getNumber()?>
          </a>
        </li>
        <li>
          <img src="<?=\App\Config\Configuration::IMG_DIR."email.png"?>" alt="Logo email.">
          <a href="mailto:zuzka.zillova@gmail.com">
              <?=$data['user']->getEmail()?>
          </a>
        </li>
        <li>
          <img src="<?=\App\Config\Configuration::IMG_DIR."facebook.png"?>" alt="Logo facebook">
            <span><?=$data['user']->getFacebook()?></span>
        </li>
        <li>
          <img src="<?=\App\Config\Configuration::IMG_DIR."instagram.png"?>" alt="Logo instragram">
            <span><?=$data['user']->getInstagram()?></span>
        </li>
      </ul>
    </div>
  </section>
    <section>
        <div class="profil-skills">
            <h2 class="p-subtitles">Skills</h2>
            <ul>
                <?php foreach ($data['skills'] as $skill) { ?>
                    <li><img class="skill-icons" src="<?=\App\Config\Configuration::SKILLS_DIR.$skill->getImage()?>" alt="obrázok dovedomosti - skill"></li>
                <?php }?>
            </ul>
            <?php if (\App\Auth::isLogged())
            {?>
                <?php
                if ($_SESSION["id"] == $data['user']->getId()) {?>
                    <div class="modify">
                        <a id="btn-update-profil" href="?c=portfolio&a=editskills">Upraviť skilly</a>
                    </div>
                <?php }?>
            <?php }?>
        </div>
    </section>
    <section>
    <div class="profil-info">
      <h2 class="p-subtitles">Základné informácie</h2>
      <p>
          <?=$data['user']->getBasicInfo()?>
      </p>
    </div>
  </section>
  <section>
    <div class="profil-blogs">
        <?php
        if ($data['blogs']!=null) {?>
      <h2 class="p-subtitles">Moje blogy</h2>
      <ul>
          <?php foreach ($data['blogs'] as $blog) { ?>
              <li><a href="?c=blog&a=article&id=<?=$blog->getId()?>"><?=$blog->getTitle()?></a></li>
          <?php }?>
      </ul>
        <?php }?>
    </div>
  </section>
  <section>
    <div class="profil-portfolio">
        <?php
        if ($data['projects']!=null) {?>
      <h2 class="p-subtitles">Portfolio</h2>
      <div class="grid">
          <?php foreach ($data['projects'] as $project) { ?>
              <div class="grid-item">
                  <img src="<?=\App\Config\Configuration::PROJECTS_DIR.$project->getImage()?>" alt="tetris">
                  <div class="detail-grid-item">
                      <p>
                          <?=$project->getTitle()?>
                      </p>
                  </div>
              </div>
              <?php }?>
        </div>
        <?php }?>
    </div>
  </section>
</div>