<?php /** @var Array $data */ ?>

<div class="blog-body adding-portfolio notification">
    <section id="first-section">
        <h1>Pridávanie nových súborov na stiahnutie</h1>
        <nav>
            <a id="btn-cancel-creating-blog" href="?c=portfolio&a=profil&userId=<?= $_SESSION['id']?>">Zrušiť</a>
        </nav>
        <div class="add-project-body">
            <div id="pridaj"></div>
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

        <div class="add-project forms">
            <form id="myForm" method="post" enctype="multipart/form-data"> <!--action="?c=portfolio&a=addFile"-->
                <div class="txt_field">
                    <input id="tit" type="text" minlength="5" name="title" required>
                    <span></span>
                    <label for="tit">Titulok súboru</label>
                </div>
                <input type="file" id="project" name="project" required><br>
                <input id="addProject" type="button" onclick="addNew('?c=portfolio&a=addFile')" value="Pridať súbor">
            </form>
        </div>
        <?php if ($data['error'] == \App\Config\Configuration::ERR_PROJECT){?>
            <div class="reg-error"><?= $data['error'] ?></div>
        <?php } ?>

    </section>
</div>

