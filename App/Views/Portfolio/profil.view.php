<?php /** @var Array $data */ ?>

<div class="profil-body notification">
  <section id="first-section">
      <?php if ($data['error'] != ""){?>
          <div class="alert ale-err">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
              <p>
                  <?= $data['error'] ?>
              </p>
          </div>
      <?php } ?>
      <?php if ($data['message'] != ""){?>
          <div class="alert ale-success">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
              <p>
                  <?= $data['message'] ?>
              </p>
          </div>
      <?php } ?>

    <div class="header-profil">

        <img class="profil-photo" src="<?=\App\Config\Configuration::PROFIL_PHOTO_DIR.$data['user']->getProfilPhoto()?>" alt="Profilová fotka">

      <div class="header-title">
          <?php if($data['user']->getName() == "" && $data['user']->getSurname() == "") { ?>
              <h1 class="tit"><?=$data['user']->getEmail()?></h1>
          <?php }else{?>
              <h1 class="tit"><?=$data['user']->getName()." ".$data['user']->getSurname()?></h1>
          <?php }?>

          <?php if (\App\Auth::isLogged())
          {?>
              <?php
              if ($_SESSION["id"] == $data['user']->getId()) {?>
                  <div class="modify">
                      <a class="btn-update-profil" href="?c=portfolio&a=editProfil">Všeobecné úpravy profilu</a>
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
          <?php if ($data['user']->getLocation()!="") {?>
              <li><img src="<?=\App\Config\Configuration::IMG_DIR."gps.png"?>" alt="Logo poloha">
                  <span>
           <?=$data['user']->getLocation()?>
         </span>
              </li>
          <?php }?>

          <?php if ($data['user']->getNumber()!="") {?>
        <li>
          <img src="<?=\App\Config\Configuration::IMG_DIR."telefon.png"?>"  alt="Logo telefón">
          <a href="tel:+421910117452">
              <?=$data['user']->getNumber()?>
          </a>
        </li>
          <?php }?>

        <li>
          <img src="<?=\App\Config\Configuration::IMG_DIR."email.png"?>" alt="Logo email.">
          <a href="mailto:zuzka.zillova@gmail.com">
              <?=$data['user']->getEmail()?>
          </a>
        </li>

          <?php if ($data['user']->getFacebook()!="") {?>
        <li>
          <img src="<?=\App\Config\Configuration::IMG_DIR."facebook.png"?>" alt="Logo facebook">
            <span><?=$data['user']->getFacebook()?></span>
        </li>
          <?php }?>

          <?php if ($data['user']->getInstagram()!="") {?>
        <li>
          <img src="<?=\App\Config\Configuration::IMG_DIR."instagram.png"?>" alt="Logo instragram">
            <span><?=$data['user']->getInstagram()?></span>
        </li>
          <?php }?>
      </ul>
    </div>
  </section>
    <section>
        <div class="profil-skills">
            <?php if ($data['skills'] != null ) {?>
                <h2 class="p-subtitles">Skills</h2>
            <ul>
                <?php foreach ($data['skills'] as $skill) { ?>
                    <li><img class="skill-icons" src="<?=\App\Config\Configuration::SKILLS_DIR.$skill->getImage()?>" alt="obrázok dovedomosti - skill"></li>
                <?php }?>
            </ul>
            <?php }else {?>
                <?php if (\App\Auth::isLogged() && $_SESSION["id"] == $data['user']->getId()) {?>
                    <h2 class="p-subtitles">Skills</h2>
                <?php }?>
            <?php }?>
            <?php if (\App\Auth::isLogged())
            {?>
                <?php
                if ($_SESSION["id"] == $data['user']->getId()) {?>
                    <div class="modify">
                        <a class="btn-update-profil" href="?c=portfolio&a=editskills">Upraviť skilly</a>
                    </div>
                <?php }?>
            <?php }?>
        </div>
    </section>
    <section>
        <?php if ($data['user']->getBasicInfo()!="") {?>
    <div class="profil-info">
      <h2 class="p-subtitles">Základné informácie</h2>
      <p>
          <?=$data['user']->getBasicInfo()?>
      </p>
    </div>
        <?php }?>

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
      <div class="profil-portfolio profil-blogs new">
          <?php
          if ($data['files']!=null || (\App\Auth::isLogged() && $_SESSION["id"] == $data['user']->getId())) {?>
              <h2 class="p-subtitles">Moje zdieľané súbory</h2>
          <?php }?>
          <?php
          if ($data['files']!=null) {?>
              <ul>
                  <?php foreach ($data['files'] as $file) { ?>
                              <li><a href="<?=\App\Config\Configuration::FILES_DIR.$file->getFile()?>" download="<?=$file->getTitle()?>"><?=$file->getTitle()?></a>
                                  <?php if (\App\Auth::isLogged() && ($_SESSION["id"] == $data['user']->getId()) )
                                  {?>
                                  <span class="closebtnn" onclick="deleteFile(<?=$file->getId()?>,this)">&times;</span></li>
                              <?php }?>
                  <?php }?>
              </ul>
          <?php }?>
          <?php if (\App\Auth::isLogged())
          {?>
              <?php
              if ($_SESSION["id"] == $data['user']->getId()) {?>
                  <div class="modify">
                      <a class="btn-update-profil" href="?c=portfolio&a=addNewFile">Pridať nové odkazy</a>
                  </div>


              <?php }?>
          <?php }?>
      </div>
  </section>
  <section>
    <div class="profil-portfolio">

        <?php if ($data['projects'] != null || (\App\Auth::isLogged() && $_SESSION["id"] == $data['user']->getId()) ) {?>
      <h2 class="p-subtitles">Portfolio</h2>
        <?php }?>
      <div class="grid">
          <?php foreach ($data['projects'] as $project) { ?>
              <div class="grid-item">
                  <?php if (\App\Auth::isLogged())
                  {?>
                      <?php
                      if ($_SESSION["id"] == $data['user']->getId()) {?>
                          <a onclick="deleteProject(<?= $project->getId(); ?>,this)">
                              <img class="trash" src="<?=\App\Config\Configuration::IMG_DIR."cancel.png"?>" alt="vymazanie projektu">
                          </a>
                      <?php }?>
                  <?php }?>
                  <img src="<?=\App\Config\Configuration::PROJECTS_DIR.$project->getImage()?>" alt="obrazok projektu">
                  <div class="detail-grid-item">
                      <p>
                          <?=$project->getTitle()?>
                      </p>
                  </div>

              </div>
              <?php }?>
        </div>

        <?php if (\App\Auth::isLogged())
        {?>
            <?php
            if ($_SESSION["id"] == $data['user']->getId()) {?>
                <div class="modify">
                    <a class="btn-update-profil" href="?c=portfolio&a=addProject">Pridať projekty</a>
                </div>
            <?php }?>
        <?php }?>
    </div>
  </section>
</div>