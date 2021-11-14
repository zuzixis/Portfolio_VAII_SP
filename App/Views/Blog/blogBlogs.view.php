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
        <div>
            <?php foreach ($data['blogs'] as $blog) { ?>

                <div class="box">
                    <img src="<?=\App\Config\Configuration::PROFIL_PHOTO_DIR.$blog->getUserProfilPhoto()?>" alt="Fotko autora">
                    <div class="info">
                        <a href="?c=blog&a=article&id=<?=$blog->getId()?>"><h3><?=$blog->getTitle()?></h3></a>
                        <a href="?c=portfolio&a=profil&userId=<?=$blog->getUserId()?>"><h4><?=$blog->getUserName()?></h4></a>
                        <p>
                            <?=$out = strlen($blog->getText()) > 250 ? substr($blog->getText(),0,250)."..." : $blog->getText();?>
                        </p>

                        <?php if (\App\Auth::isLogged())
                            {?>
                            <?php
                            if ($_SESSION["id"] == $blog->getUserId()) {?>
                                <div class="modify">
                                    <a class="modify-item" id="btn-update-blog" href="?c=blog&a=updateBlog&blogId=<?=$blog->getId()?>">Upraviť článok</a>
                                    <a class="modify-item" id="btn-update-blog" href="?c=blog&a=delete&blogId=<?=$blog->getId()?>">Vymazať článok</a>
                                    <!--<form method="POST" class="modify-item">
                                        <input type="hidden" name="id" value="<?/*= $blog->getId() */?>">
                                        <a href="?c=blog&a=delete&blogId=<?/*=$blog->getId()*/?>">
                                            <button id="btn-delete-blog" name="delete-blog">Vymazať článok</button>
                                        </a>
                                    </form>-->
                                </div>
                            <?php }?>
                        <?php }?>
                    </div>
                </div>
            <?php }?>
        </div>
    </section>
</div>
