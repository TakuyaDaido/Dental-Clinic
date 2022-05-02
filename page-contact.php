<?php get_header(); ?>

<div class="mv-page">
  <div class="mv-page_inner">
    <h1 class="mv-page_ttl">お問い合わせ<span class="mv-page_ttl-en">CONTACT</span></h1>
  </div>
</div>

<div class="bread">
  <div class="bread_inner">
    <?php echo output_breadcrumb(); ?>
  </div>
</div>

<main class="main">
  <div class="main_inner">
    <div class="contact">
      <div class="contact_lead">
        <p class="">お電話またはメールにてお気軽にお問い合わせください</p>
      </div>
      <?php the_content(); ?>
    </div>
  </div><!-- .main_inner -->
</main>

<?php get_footer(); ?>