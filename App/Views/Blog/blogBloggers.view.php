<?php /** @var Array $data */ ?>

<div class="blog-body">
  <section id="first-section">
    <div>
      <h1>Blogy</h1>
      <nav>
          <ul>
              <li class="active">
                  <a href="?c=blog&a=blogBlogs">Blogy</a>
              </li>
              <li>
                  <a href="?c=blog&a=blogBloggers">Zoznam blogerov</a>
              </li>
              <?php
              if (\App\Auth::isLogged())
              {?>
              <li class="no-active">
                  <a id="btn-new-blog" href="?c=blog&a=createNewBlog">Napísať nový článok</a>
              </li>
              <?php }?>

          </ul>
      </nav>
    </div>

      <?php foreach ($data['users'] as $blogger) { ?>

    <div class = "blogger-box">
      <img src="<?= \App\Config\Configuration::PROFIL_PHOTO_DIR.$blogger->getProfilPhoto()?>" alt="Fotka profilu">
      <a href="?c=portfolio&a=profil&userId=<?=$blogger->getId()?>"><h3><?=$blogger->getName()." ".$blogger->getSurname()?></h3></a>
      <p>
          <?=$out = strlen($blogger->getBasicInfo()) > 200 ? substr($blogger->getBasicInfo(),0,200)."..." : $blogger->getBasicInfo();?>
      </p>
    </div>

      <?php }?>

  </section>
</div>
