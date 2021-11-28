<?php /** @var Array $data */ ?>

<div class="portfolio-page">
  <section id="first-section">
      <?php if ($data['user'] != null) { ?>
         <!-- <h3>Moje portfólio</h3>-->
          <a href="?c=portfolio&a=profil&userId=<?=$data['user']->getId()?>">
              <img src="<?= \App\Config\Configuration::PROFIL_PHOTO_DIR.$data['user']->getProfilPhoto()?>" alt="fotka profilu">
          </a>
      <?php }?>

      <h1>Portfóliá</h1>

  </section>

  <section>

    <div class="grid">

        <?php foreach ($data['users'] as $user) { ?>
      <div class="grid-item">
          <div>
            <a href="?c=portfolio&a=profil&userId=<?=$user->getId()?>">
                <?php if($user->getName() == "" && $user->getSurname() == "") { ?>
                    <h3 class="tit"><?=$user->getEmail()?></h3>
                <?php }else{?>
                    <h3 class="tit"><?=$user->getName()." ".$user->getSurname()?></h3>
                <?php }?>
                <img src="<?= \App\Config\Configuration::PROFIL_PHOTO_DIR.$user->getProfilPhoto()?>" alt="fotka profilu">
            </a>
          </div>
      </div>
        <?php }?>

    </div>
  </section>
</div>
