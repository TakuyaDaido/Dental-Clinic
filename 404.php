<?php get_header(); ?>

<div class="mv-page">
  <div class="mv-page_inner">
    <h1 class="mv-page_ttl">404<span class="mv-page_ttl-en">ERROR</span></h1>
  </div>
</div>

<div class="bread">
  <div class="bread_inner">
    <?php echo output_breadcrumb(); ?>
  </div>
</div>

<main class="main">
  <div class="main_inner">
    <div class="no-page">
      <div class="no-page_left">
        <p>お探しのページは見つかりませんでした。</p>
        <p><a class="outline" href="<?php echo home_url(); ?>/">こちら</a>からホームに戻ります。</p>
      </div>
      <?php get_sidebar('sidebar'); ?>
    </div>
  </div><!-- .main_inner -->
</main>

<?php get_footer(); ?>