<!DOCTYPE html>
<!-- Allow WordPress to manage HTML language tag -->
<html <?php language_attributes(); ?>>
<head>
  <!-- Call the wp_head() function which declares this as the header file -->
<?php wp_head(); ?>
<!-- Allow WordPress to manage the charset value -->
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Fictional University</title>
</head>
<!-- Gives us additional page information in the form of CSS classes that we can hook into -->
<body <?php body_class(); ?>>
<header class="site-header">
      <div class="container">
        <h1 class="school-logo-text float-left">
          <a href="<?php echo site_url() ?>"><strong>Fictional</strong> University</a>
        </h1>
        <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
        <div class="site-header__menu group">
          <nav class="main-navigation">
            <!-- Add the WordPress menu location "headerMenuLocation" to this spot in the header -->
            <?php wp_nav_menu(array(
              'theme_location' => 'headerMenuLocation'
              )); ?>
            <!-- <ul>
              <li><a href="<?php echo site_url('/about-us') ?>">About Us</a></li>
              <li><a href="#">Programs</a></li>
              <li><a href="#">Events</a></li>
              <li><a href="#">Campuses</a></li>
              <li><a href="#">Blog</a></li>
            </ul> -->
          </nav>
          <div class="site-header__util">
            <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
            <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
            <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    </header>