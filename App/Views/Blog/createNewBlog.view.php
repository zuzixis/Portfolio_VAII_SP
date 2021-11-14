<?php /** @var Array $data */ ?>

<div class="blog-body blog-body-create">
  <section id="first-section">
    <div>
      <h1>Písanie blogu...</h1>
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
      <form action="?c=blog&a=createBlog" method="post">
    <div class="center">
      <div class="left-side">
        <h1>Nový článok</h1>
          <div class="txt_field">
            <input id="create-title" type="text" name="title" required>
            <span></span>
            <label for="create-title">Nadpis</label>
          </div>
      </div>
      <div class="right-side">
          <div>
            <label for="create-blog-text">Text:</label>
            <textarea id="create-blog-text"  rows="10" cols="10" name="text">
            </textarea>
          </div>
          <input type="submit" value="Vytvoriť blog">
      </div>

    </div>
      </form>
  </section>
</div>