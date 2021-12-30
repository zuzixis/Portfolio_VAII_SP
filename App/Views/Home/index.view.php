<?php /** @var Array $data */ ?>

<div class="notification">
    <img class="abstract-background" src="<?= \App\Config\Configuration::IMG_DIR."login-bg2.png" ?>" alt="pozadie">
    <div>
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

        <div class = "main-title">
            <h1>
                Ukáž sa <br>
                a nájdi si prácu snov
            </h1>
            <h2>
                Zaregistruj sa, vyplň si profil a nájdi si prácu, ktorá ťa baví!
            </h2>
        </div>
    </div>
</div>

<div class="body-page">
    <section>
        <div class="home-about-as">
            <img class="body-page-photo" src="<?= \App\Config\Configuration::IMG_DIR."question-mark.png" ?>" alt="modrý otáznik">
            <h2>Kto sme ?</h2>
            <p>
                Portfólio je stránka, ktorá poskytuje ilustračnú interakciu medzi potenciálnym zamestnancom
                a skutočným zamestnávateľom. Poskytujeme užívateľovi sa zaregistrovať, vytvoriť si vlastný
                "skills list" a ilustračné portfólio vlastných prác. Stránka slúži na propagáciu vlastných diel.
            </p>
        </div>
    </section>

    <section>
        <div class="home-blog">
            <img class="body-page-photo" src="<?= \App\Config\Configuration::IMG_DIR."blog.png" ?>" alt="ikona blogu">
            <h2>Vyjadrite svoj názor v blogu</h2>
            <p>
                Súčasťou našej stránky je samostatná sekcia blogov. Každý zaregistrovaný užívateľ môže vytvárať
                nové blogy, kde sa môže vyjadrovať na rôzne témy, ktoré nemusia úzko súvisieť s
                témou našej stránky. Pre nezaregistrovaných užívateľov je blog plne verejný na prečítanie.
            </p>
            <div class="btn-link">
                <a href="?c=blog&a=blogBlogs"><div class="btn-h-center"> Viac</div> </a>
            </div>
        </div>
    </section>

    <section>
        <div class="home-portfolio">
            <img class="body-page-photo" src="<?= \App\Config\Configuration::IMG_DIR."portfolio-home.png" ?>" alt="Obrázok reprezentujúci portfólio">
            <h2>Ukážte, čo ste vytvorili</h2>
            <p>
                V sekcii portfóliá sa nachádza zoznam portfólií prihlásených používateľov. Každé portfólio
                poskytuje jednoduchú predstavu vašich zručností pre zamestnávateľa. V portfóliu sa nachádza
                jednoduchý informačný textík, skill list, list napísaných blogov či
                animované portfólio vlastných projektov.
            </p>
            <div class="btn-link">
                <a href="?c=portfolio&a=portfolios"><div class="btn-h-center"> Viac</div> </a>
            </div>
        </div>
    </section>
</div>
