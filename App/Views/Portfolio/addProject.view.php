<?php /** @var Array $data */ ?>

<div class="blog-body adding-portfolio notification">
    <section id="first-section">

        <h1>Pridávanie nových projektov</h1>
        <nav>
            <a id="btn-cancel-creating-blog" href="?c=portfolio&a=profil&userId=<?= $_SESSION['id'] ?>">Zrušiť</a>
        </nav>

        <div class="add-project-body">
            <div id="pridaj"></div>
            <?php if ($data['error'] != "") { ?>
                <div class="alert ale-err">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <p>
                        <?= $data['error'] ?>
                    </p>
                </div>
            <?php } ?>
            <?php if ($data['message'] != "") { ?>
                <div class="alert ale-success">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <p>
                        <?= $data['message'] ?>
                    </p>
                </div>
            <?php } ?>

            <div class="add-project forms">

                <form id="myForm" method="post" enctype="multipart/form-data"> <!--action="?c=portfolio&a=addNewProject"-->
                <div class="txt_field">
                    <input id="tit" type="text" name="title">
                    <span></span>
                    <label for="tit">Titulok projektu</label>
                </div>
                <input type="file" id="project" name="project" accept="image/*" required><br>
                <input id="addProject" type="button" onclick="addNew('?c=portfolio&a=addNewProject')" value="Pridať projekt">
                </form>
            </div>
        </div>
    </section>
</div>

