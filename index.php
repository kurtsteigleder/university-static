<?php get_header(); ?>


<div class="page-banner">

    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);"></div>

    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title(); ?></h1>
      <div class="page-banner__intro">
        <p>DON'T FORGET TO REPLACE ME LATER</p>
      </div>
    </div>  
  </div>
  <div class="container container--narrow page-section">
  <?php while(have_posts()){
    the_post(); ?>
    <div class="post-item">
      <h2 class="headline headline--medium headline--post-title"><a href="<?php echo get_permalink(get_the_ID()); ?>"><?php echo get_the_title(); ?></a></h2>
      <?php get_the_post_thumbnail($post, $size, $attr); ?>
      <div class="metabox">
       <p>Posted by <?php echo get_the_author_meta('display_name'); ?> on <?php the_time('M j Y');?> in <?php echo get_the_category_list(', '); ?></p>
      </div>
      <div class="generic-content">
        <?php the_excerpt(); ?>
        <p><a class="btn btn--blue" href="<?php get_permalink(get_the_ID()); ?>">Continue reading &raquo;</a></p>
      </div>
    </div>
    <?php 
    echo paginate_links();
  } ?>
  </div>

<?php
  get_footer();

?>