<aside class="side">
  <form action="<?php echo home_url('/'); ?>" method="get" class="search-form">
    <input type="text" name="s" value="<?php the_search_query(); ?>" placeholder="キーワードを入力">
  </form>
  <div class="side_popular">
    <h3 class="side_ttl">人気の記事</h3>
    <?php 
    $args = array(
      'post_type' => 'post',
      'meta_key' => 'post_views_count',
      'orderby' => 'meta_value_num',
      'posts_per_page' => 3,
      'order'=>'DESC',
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) :
    ?>
    <div class="side_box">
      <ul>
        <?php while($the_query->have_posts()) : $the_query->the_post(); ?>
        <li>
          <a class="side_box-link" href="<?php the_permalink(); ?>">
            <div class="side_img">
            <?php if ( has_post_thumbnail() ): ?><!-- if文による条件分岐 アイキャッチが有る時-->
                <?php the_post_thumbnail('full'); ?>
                <?php else: ?><!-- アイキャッチが無い時-->
                <?php echo save_default_thumbnail(''); ?>
            <?php endif; ?>
            </div>
            <p class="side_subttl">
              <?php
              if (mb_strlen($post->post_title) > 17) {
                $title = mb_substr($post->post_title, 0, 17);
                echo $title . '...';
              } else {
                echo $post->post_title;
              }
              ?>
            </p>
            <!-- <p><?php echo getPostViews($post->ID); ?></p> -->
          </a>
        </li>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </ul>
    </div>
    <?php else : ?>
			<p class="not_post">投稿はまだありません。</p>
    <?php endif; ?>
  </div>
  <div class="side_new">
    <h3 class="side_ttl">最新の記事</h3>
    <?php 
    $args= array(
      'post_type' => 'post',
      'posts_per_page' => 3,
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) :
    ?>
    <div class="side_box">
      <ul>
        <?php while($the_query->have_posts()) : $the_query->the_post(); ?>
        <li>
          <a class="side_box-link" href="<?php the_permalink(); ?>">
            <div class="side_img">
            <?php if ( has_post_thumbnail() ): ?><!-- if文による条件分岐 アイキャッチが有る時-->
                <?php the_post_thumbnail('full'); ?>
                <?php else: ?><!-- アイキャッチが無い時-->
                <?php echo save_default_thumbnail(''); ?>
            <?php endif; ?>
            </div>
            <p class="side_subttl">
              <?php
              if (mb_strlen($post->post_title) > 17) {
                $title = mb_substr($post->post_title, 0, 17);
                echo $title . '...';
              } else {
                echo $post->post_title;
              }
              ?>
            </p>
          </a>
        </li>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </ul>
    </div>
    <?php else : ?>
			<p class="not_post">投稿はまだありません。</p>
    <?php endif; ?>
  </div>
  <div class="side_month">
    <h3 class="side_ttl">月別の記事</h3>
    <div class="side_box">
			<select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'>
				<option value=""><?php echo attribute_escape(__('Select Month')); ?></option>
				<?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?>
			</select>
		</div>
  </div>
  <div class="side_cate">
    <h3 class="side_ttl">カテゴリー</h3>
    <?php
    $args = array(
      'show_count' => 1,
      'title_li'  => ''
    );
    wp_list_categories($args);  
    ?>
  </div>
</aside>