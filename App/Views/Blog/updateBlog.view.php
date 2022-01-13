<?php /** @var Array $data */ ?>

<div class="blog-body blog-body-create">
  <section id="first-section">
    <div>
      <h1>Úprava blogu...</h1>
      <nav>
          <a id="btn-cancel-creating-blog" href="?c=blog&a=blogBlogs">Zrušiť</a>
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
                          <textarea id="create-title" rows="3" cols="48" minlength="15" name="title" required><?=$data['blog']->getTitle()?></textarea>
                          <span></span>
                      </div>
                  </div>
                  <div class="right-side">
                      <div>
                          <input type="hidden" name="id" value="<?= $data['blog']->getId() ?>">
                          <label for="create-blog-text">Text:</label>
                          <textarea id="create-blog-text" minlength="200" rows="10" cols="10" name="text" required><?=$data['blog']->getText()?></textarea>
                      </div>
                      <input type="submit" value="Upraviť blog" name="update-blog">
                  </div>
              </div>
          </form>
  </section>
</div>