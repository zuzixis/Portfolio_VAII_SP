<?php /** @var Array $data */ ?>

<div class="portfolio-page">
  <section id="first-section">
      <h1>Portfóliá</h1>
  </section>

  <section>

    <div class="grid">

        <?php foreach ($data['users'] as $user) { ?>
      <div class="grid-item">
          <div>
            <a href="?c=portfolio&a=profil&userId=<?=$user->getId()?>">
            <img src="<?= \App\Config\Configuration::PROFIL_PHOTO_DIR.$user->getProfilPhoto()?>" alt="fotka profilu">
            <h3><?=$user->getName()." ".$user->getSurname()?></h3>
            </a>
          </div>
      </div>
        <?php }?>

    </div>
  </section>
</div>
