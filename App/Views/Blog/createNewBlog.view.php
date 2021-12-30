<?php /** @var Array $data */ ?>

<div class="blog-body blog-body-create notification">
  <section id="first-section">
    <div>
      <h1>Písanie blogu...</h1>
      <nav>
          <a id="btn-cancel-creating-blog" href="?c=blog&a=blogBlogs">Zrušiť</a>
      </nav>
    </div>
  </section>
  <section>
      <form action="?c=blog&a=createBlog" method="post">
    <div class="center">
      <div class="left-side">
        <h1>Nový článok</h1>
          <label for="create-title">Nadpis</label>
          <div class="txt_field">
              <textarea id="create-title" rows="3" cols="48" name="title" required></textarea>
          </div>
      </div>
      <div class="right-side">
          <div>
            <label for="create-blog-text">Text:</label>
              <textarea id="create-blog-text"  rows="25" name="text" required></textarea>

          </div>
          <input type="submit" value="Vytvoriť blog">
      </div>

    </div>
      </form>
  </section>
</div>