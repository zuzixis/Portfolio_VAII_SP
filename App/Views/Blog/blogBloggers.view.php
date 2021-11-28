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
        <?php if($blogger->getName() == "" && $blogger->getSurname() == "") { ?>
            <a href="?c=portfolio&a=profil&userId=<?=$blogger->getId()?>">
                <h3 class="tit"><?=$blogger->getEmail()?></h3>
            </a>
        <?php }else{?>
            <a href="?c=portfolio&a=profil&userId=<?=$blogger->getId()?>">
                <h3 class="tit"><?=$blogger->getName()." ".$blogger->getSurname()?></h3>
            </a>
        <?php }?>

      <p>
          <?=$out = strlen($blogger->getBasicInfo()) > 200 ? substr($blogger->getBasicInfo(),0,200)."..." : $blogger->getBasicInfo();?>
      </p>
    </div>

      <?php }?>

  </section>
</div>
