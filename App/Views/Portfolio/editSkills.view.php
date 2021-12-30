<?php /** @var Array $data */ ?>


<div class="blog-body edit-skill">
    <section id="first-section">
        <div>
            <h1>Úprava profilu</h1>
        </div>
        <div class="forms" >
            <form method="post" action="?c=portfolio&a=addSkills" enctype="multipart/form-data">

                <h3>Zmena skillov</h3>

                <?php foreach ($data['skills'] as $skill) { ?>
                    <input type="checkbox" id="skill-<?= $skill->getId() ?>" name="<?= $skill->getId() ?>" value="<?= $skill->getId() ?>">
                    <label for="skill-<?= $skill->getId() ?>"><?= $skill->getName() ?></label><br>
                <?php } ?>
                <input type="submit" value="Uložiť">

            </form>

        </div>
    </section>

</div>
