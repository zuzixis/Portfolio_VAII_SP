<?php /** @var Array $data */ ?>

<div class="blog-body blog-body-create">
  <section id="first-section">
    <div>
      <h1>Úprava blogu...</h1>
      <nav>
        <ul>
          <li class="no-active">
            <a id="btn-new-blog" href="?c=blog&a=blogBlogs">Zrušiť</a>
          </li>
        </ul>
      </nav>
    </div>
  </section>
  <section>
          <form action="?c=blog&a=update" method="post">
              <div class="center">
                  <div class="left-side">
                      <h1>Načítaný článok</h1>
                      <label>Nadpis</label>
                      <div class="txt_field">
                          <textarea id="create-title" rows="6" cols="48" name="title"><?=$data['blog']->getTitle()?></textarea>
                          <span></span>
                      </div>
                  </div>
                  <div class="right-side">
                      <div>
                          <input type="hidden" name="id" value="<?= $data['blog']->getId() ?>">
                          <label for="create-blog-text">Text:</label>
                          <textarea id="create-blog-text"  rows="10" cols="10" name="text"><?=$data['blog']->getText()?></textarea>
                      </div>
                      <input type="submit" value="Upraviť blog" name="update-blog">
                  </div>
              </div>
          </form>
  </section>
</div>
</body>
</html>