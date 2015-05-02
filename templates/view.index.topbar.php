<nav id="top-bar" class="top-bar" data-topbar>
  <ul class="title-area">
    <li class="name">
      <h1><a href="./">WEBSITE TITLE</a></h1>
    </li>
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

    <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">


    <?php if ( $cfg['solr']['admin']['uri'] ) { ?>
    <li><a target="_blank" href="<?=$cfg['solr']['admin']['uri']?>"><?php echo t("Solr admin"); ?></a></li>
    <?php } ?>

    <li><a target="_blank" href="<?=$uri_help?>"><?php echo t("Help"); ?></a></li>

            </ul>
  </section>
  
</nav>
