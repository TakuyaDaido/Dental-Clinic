<?php get_header(); ?>

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
    <div class="a-post">
      <div class="a-post_inner">
        <?php if (have_posts()): ?>
        <div class="a-post_list">
          <?php while (have_posts()): the_post(); ?>
          <?php
            $cat = get_the_category();
            $catname = $cat[0]->cat_name; //カテゴリー名
          ?>
          <article class="a-post_item">
            <div class="a-post_img">
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            </div>
            <div class="a-post_content">
              <p class="a-post_info">
                <time class="a-post_date" datetime="<?php the_time('y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
                <span class="a-post_cate"><?php echo $catname ?></span>
              </p>
              <h3 class="a-post_ttl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p class="a-post_txt">
                <?php
                  if(mb_strlen($post->post_content, 'UTF-8')>40){
                  $content= mb_substr(strip_tags($post->post_content), 0, 40, 'UTF-8');
                  echo $content.'...';
                  }else{
                  echo strip_tags($post->post_content);
                  }
                ?>
              </p>
            </div>
          </article>
          <?php endwhile; ?>
        </div>
        <?php else: ?>
        <p>記事が見つかりませんでした。</p>
        <?php endif; ?>
      </div>

      <?php get_sidebar('sidebar'); ?>

    </div>

  </div><!-- .main_inner -->
</main>

<?php get_footer(); ?>