<?php /** @var Array $data */ ?>

<div class="blog-body">
    <section id="first-section">

        <h1>Pridávanie nových projektov</h1>

        <div>
            <?php if ($data['error'] != ""){?>
                <div class="alert ale-err">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <?= $data['error'] ?>
                </div>
            <?php } ?>
            <?php if ($data['message'] != ""){?>
                <div class="alert ale-success">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <?= $data['message'] ?>
                </div>
            <?php } ?>

        <div class="add-project forms">
            <form method="post" action="?c=portfolio&a=addNewProject" enctype="multipart/form-data">
                <div class="txt_field">
                    <input id="tit" type="text" name="title">
                    <span></span>
                    <label for="tit">Titulok projektu</label>
                </div>
                <input type="file" id="project" name="project" accept="image/*" required><br>
                <input id="addProject" type="submit" value="Pridať projekt">
                <a id="btn-close" href="?c=portfolio&a=profil&userId=<?= $_SESSION['id']?>">Ukončiť pridávanie </a>
            </form>
        </div>
        <?php if ($data['error'] == \App\Config\Configuration::ERR_PROJECT){?>
            <div class="reg-error"><?= $data['error'] ?></div>
        <?php } ?>

    </section>
</div>

