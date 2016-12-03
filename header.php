<header>
  <div class="container clearfix">
    <section id="icon">
      <a href="."><img src="<?php rootPath('assets/images/jail.svg'); ?>" width="28"></a>
    </section>
    <section id="search">
      <form action="search.php"><input type="text" placeholder="Search" /></form>
    </section>
    <section id="menu">
      <ul>
        <li><a href="inmates">Inmates</a></li>
      </ul>
    </section>
    <section id="user-links">
      <ul>
        <li><a href="settings"><i class="fa fa-cog"></i></a></li>
        <li>
          <form>
            <input type="hidden" name="action" value="logout">
            <button type="submit"><i class="fa fa-sign-out"></i></button>
          </form>
        </li>
      </ul>
    </section>
  </div>
</header>
