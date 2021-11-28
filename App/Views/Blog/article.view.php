<?php /** @var Array $data */ ?>

<div class="blog-body article-body">
    <section id="first-section">
        <div>
            <h1>Blogy</h1>
            <nav>
                <ul>
                    <li>
                        <a class="active" href="?c=blog&a=blogBlogs">Blogy</a>
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
        <div>
            <div class="box">
                <img src="<?=\App\Config\Configuration::PROFIL_PHOTO_DIR.$data['user']->getProfilPhoto()?>" alt="Fotko autora">
                <div class="info">
                    <h3><?=$data['blog']->getTitle()?></h3>
                    <?php if($data['user']->getName() == "" && $data['user']->getSurname() == "") { ?>
                    <a href="?c=portfolio&a=profil&userId=<?=$data['blog']->getUserId()?>">
                        <h4 class="tit"><?=$data['user']->getEmail()?></h4>
                    </a>
                    <?php }else{?>
                        <a href="?c=portfolio&a=profil&userId=<?=$data['blog']->getUserId()?>">
                            <h4 class="tit"><?=$data['user']->getName()." ".$data['user']->getSurname()?></h4>
                        </a>
                    <?php }?>


                </div>
            </div>
        </div>
    </section>
    <section>
         <div class="blogger-box-article blogger-box">
             <p>
             <?php
                echo nl2br($data['blog']->getText());
             ?>
             </p>
         </div>
    </section>
</div>



</body>
</html>