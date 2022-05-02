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

    <ul class="cat-list">
      <li class="cat-item cat-item-all"><a href="<?php echo get_home_url(); ?>/review/">すべて</a></li>
      <?php wp_list_categories('title_li=&taxonomy=service&hide_empty=0'); ?>
    </ul>

    <div class="review">
      <div class="review_list">
        <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
        <div class="review_item">
          <div class="review_img-wrap">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
          </div>
          <div class="review_txt-wrap">
            <?php 
              $term = get_the_terms($post->ID,'service');
              ?>
            <a href="<?php echo get_term_link($term[0]->slug, 'service'); ?>"
              class="review_cat"><?php echo $term[0]->name; ?></a>
            <h3 class="review_ttl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div><!-- .main_inner -->
</main>

<?php get_footer(); ?>