<?php get_header(); ?>

<?php
    // 記事のビュー数を更新(ログイン中・クローラーは除外)
    if (!is_user_logged_in() && !is_robots()) {
      setPostViews(get_the_ID());
    }
  ?>

<div class="mv-page">
  <div class="mv-page_inner">
    <h1 class="mv-page_ttl">お知らせ<span class="mv-page_ttl-en">NEWS</span></h1>
  </div>
</div>

<div class="bread">
  <div class="bread_inner">
    <?php echo output_breadcrumb(); ?>
  </div>
</div>

<main class="main">
  <div class="main_inner">
    <div class="s-post">
      <div class="s-post_inner">
        <?php
            $cat = get_the_category();
            $catname = $cat[0]->cat_name; //カテゴリー名
            $cat_id = $cat[0]->cat_ID; //カテゴリーID
          ?>
        <div class="s-post_content">
          <h3 class="s-post_ttl"><?php the_title(); ?></h3>
          <p class="s-post_info">
            <time class="s-post_date" datetime="<?php the_time('y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
            <a href="<?php echo get_category_link( $cat_id ); ?>" class="s-post_cate"><?php echo $catname ?></a>
          </p>
          <p class="s-post_txt"><?php the_content(); ?></p>
        </div>
        <div class="page_btn">
          <p class="left"><?php previous_post_link('%link', '前へ'); ?></p>
          <p class="right"><?php next_post_link('%link', '次へ'); ?></p>
        </div>
      </div>

      <?php get_sidebar('sidebar'); ?>

    </div>

  </div><!-- .main_inner -->
</main>

<?php get_footer(); ?>