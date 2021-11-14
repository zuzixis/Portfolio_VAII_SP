<?php /** @var Array $data */ ?>

<div class="registration-body">
  <img class="abstract-background" src="<?= \App\Config\Configuration::IMG_DIR."login-bg2.png"?>" alt="pozadie">
  <div class="center">
    <div class="left-side">
      <h1>Registrácia</h1>
      <form>
        <div class="txt_field">
          <input id="reg-username" type="text" required>
          <span></span>
          <label for="reg-username">Užívateľské meno</label>
        </div>

        <div class="txt_field">
          <input id="reg-password" type="password" required>
          <span></span>
          <label for="reg-password">Heslo</label>
        </div>

        <div class="txt_field">
          <input id="reg-gps" type="text" required>
          <span></span>
          <label for="reg-gps">Mesto, kde bývate</label>
        </div>

        <div class="txt_field">
          <input id="reg-tel-number" type="text" required>
          <span></span>
          <label for="reg-tel-number">Telefónne číslo</label>
        </div>

        <div class="txt_field">
          <input id="reg-email" type="text" required>
          <span></span>
          <label for="reg-email">Email</label>
        </div>

        <div class="txt_field">
          <input id="reg-facebook" type="text" required>
          <span></span>
          <label for="reg-facebook">Facebook</label>
        </div>

        <div class="txt_field">
          <input id="reg-instagram" type="text" required>
          <span></span>
          <label for="reg-instagram">Instagram</label>
        </div>
      </form>
    </div>
    <div class="right-side">
      <form>
        <h3>Vyberte:</h3>
        <div class="txt_field1">
          <input type="checkbox" id="work" value="Pracujúci/a">
          <label for="work">pracujem</label><br>
        </div>

        <input type="checkbox" id="school" value="Študent">
        <label for="school">študujem</label><br><br>

        <h3>Vyberte vaše skills:</h3>
        <input type="checkbox" id="skill-asm" value="asm">
        <label for="skill-asm">Asembler</label><br>

        <input type="checkbox" id="skill-cpp" value="cpp">
        <label for="skill-cpp">C++</label><br>

        <input type="checkbox" id="skill-css" value="css">
        <label for="skill-css">CSS</label><br>

        <input type="checkbox" id="skill-git" value="git">
        <label for="skill-git">Git</label><br>

        <input type="checkbox" id="skill-html" value="html">
        <label for="skill-html">HTML</label><br>

        <input type="checkbox" id="skill-java" value="java">
        <label for="skill-java">Java</label><br>

        <input type="checkbox" id="skill-javaskript" value="javaskript">
        <label for="skill-javaskript">Java skript</label><br>

        <input type="checkbox" id="skill-php" value="php">
        <label for="skill-php">PHP</label><br>

        <input type="checkbox" id="skill-ps" value="ps">
        <label for="skill-ps">Photoshop</label><br>

        <input type="checkbox" id="skill-r" value="r">
        <label for="skill-r">R</label><br>

        <input type="checkbox" id="skill-sql" value="sql">
        <label for="skill-sql">SQL</label><br>

        <input type="checkbox" id="skill-uml" value="uml">
        <label for="skill-uml">UML</label><br>

        <div class="txt_field">
          <input id="reg-info-text" type="text" required>
          <span></span>
          <label for="reg-info-text">Napíšte niečo o sebe...</label>
        </div>

        <input type="submit" value="Registrovať sa">
      </form>
    </div>
  </div>
</div>
