<?php get_header(); ?>

<div class="mv-page">
  <div class="mv-page_inner">
    <h1 class="mv-page_ttl">お客様の声<span class="mv-page_ttl-en">REVIEW</span></h1>
  </div>
</div>

<div class="bread">
  <div class="bread_inner">
    <?php echo output_breadcrumb(); ?>
  </div>
</div>

<main class="main">
  <div class="main_inner">
    <?php 
    $term = get_the_terms($post->ID,'service');
    ?>
    <div class="s-review">
      <h3 class="s-review_ttl"><?php the_title(); ?></h3>
      <time class="s-post_date" datetime="<?php the_time('y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
      <a href="<?php echo get_term_link($term[0]); ?>" class="s-review_cat"><?php echo $term[0]->name; ?></a>
      <p class="s-review_txt"><?php the_content(); ?></p>
    </div>
    <div class="page_btn">
      <p class="left"><?php previous_post_link('%link', '前へ'); ?></p>
      <p class="right"><?php next_post_link('%link', '次へ'); ?></p>
    </div>
  </div><!-- .main_inner -->
</main>

<?php get_footer(); ?>