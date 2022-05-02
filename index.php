<?php get_header(); ?>

<div class="mv">
  <ul class="mv_list">
    <li class="mv_item"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/mv-01.jpg" alt=""></li>
    <li class="mv_item"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/mv-02.jpg" alt=""></li>
    <li class="mv_item"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/mv-03.jpg" alt=""></li>
  </ul>
  <div class="mv_txt-wrap">
    <p class="mv_txt-main">一生に寄り添う歯科治療<br>あなたの生涯のパートナーに</p>
    <p class="mv_txt-sub">
      私たちは医療の枠にとらわれず、<br>地域の皆様に身近に感じていただけるような歯科医院を目指しています。<br>小さな悩みから将来の不安まで、歯のことなら何でもご気軽にご相談ください。</p>
  </div>
  <div class="schedule">
    <table class="schedule_table">
      <tbody>
        <tr>
          <th>診療時間</th>
          <th>月</th>
          <th>火</th>
          <th>水</th>
          <th>木</th>
          <th>金</th>
          <th>土</th>
          <th>日/祝</th>
        </tr>
        <tr>
          <td>08:00 - 12:00</td>
          <td>○</td><!-- 月 -->
          <td>○</td><!-- 火 -->
          <td>○</td><!-- 水 -->
          <td>○</td><!-- 木 -->
          <td>○</td><!-- 金 -->
          <td>○</td><!-- 土 -->
          <td>ー</td><!-- 日 -->
        </tr>
        <tr>
          <td>13:00 - 17:00</td>
          <td>○</td><!-- 月 -->
          <td>○</td><!-- 火 -->
          <td>○</td><!-- 水 -->
          <td>ー</td><!-- 木 -->
          <td>○</td><!-- 金 -->
          <td>○</td><!-- 土 -->
          <td>ー</td><!-- 日 -->
        </tr>
      </tbody>
    </table>
    <div class="schedule_txt-wrap">
      <p class="schedule_txt">TEL.<span class="schedule_txt-tel">012-345-6789</span>(受付時間 8:00〜17:00)</p>
    </div>
  </div>
  <div class="new-info">
    <p class="new-info_ttl">お知らせ</p>
    <?php 
    $args= array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) :
    ?>
    <?php while($the_query->have_posts()) : $the_query->the_post(); ?>
    <a href="<?php the_permalink(); ?>">
      <div class="new-info_item">
        <time datetime="<?php the_time('Y-m-d'); ?>" class="new-info_date"><?php the_time('Y/m/d'); ?></time>
        <span class="new-info_content">
          <?php
          if (mb_strlen($post->post_title) > 17) {
              $title = mb_substr($post->post_title, 0, 17);
              echo $title . '...';
          } else {
              echo $post->post_title;
          }
          ?>
        </span>
      </div>
    </a>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  </div>
  <?php endif; ?>
</div>

<main class="main">
  <div class="main_inner">
    <section class="sec01">
      <div class="sec_inner">
        <div class="lead">
          <h2 class="lead_ttl">当院について</h2>
          <p class="lead_txt">
            当院は、下記の3点に強みを置いて運営されています。<br>私たちは、皆様から信頼される施術を提供し、地域に根付いた歯科医院を目指します。<br>そして、地域にありながらも高度なサービスと環境で、末永く患者様と歩んでいければ幸いです。
          </p>
        </div>
        <div class="sec_content">
          <ul class="col3 main_inner">
            <li class="col3_item">
              <div class="col3_img-wrap fadeInTrigger">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/sec01-01.jpg" alt="設備の写真">
                <div class="point">
                  <span class="point_txt">Point</span>
                  <span class="point_num">1</span>
                </div>
              </div>
              <div class="col3_txt-wrap mt50">
                <h3 class="col3_ttl">最新設備</h3>
                <p class="col3_txt">
                  歯科用CT診断装置、レーザー治療器等を駆使し、通常の虫歯治療だけでなく、患者様の症状に合わせた様々なケースに安心・安全に対応します。</p>
              </div>
              <a href="<?php echo home_url(); ?>/clinic" class="btn">詳しく見る</a>
            </li>
            <li class="col3_item">
              <div class="col3_img-wrap fadeInTrigger">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/sec01-02.jpg" alt="施術している医師の写真">
                <div class="point">
                  <span class="point_txt">Point</span>
                  <span class="point_num">2</span>
                </div>
              </div>
              <div class="col3_txt-wrap mt50">
                <h3 class="col3_ttl">経験豊富な医師</h3>
                <p class="col3_txt">
                  各分野のスペシャリストで構成された当院のチーム体制は多くの患者様から選ばれる理由です。ご要望があれば、ご遠慮なくお申し付けください。</p>
              </div>
              <a href="<?php echo home_url(); ?>/clinic" class="btn">詳しく見る</a>
            </li>
            <li class="col3_item">
              <div class="col3_img-wrap fadeInTrigger">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/sec01-03.jpg" alt="院内の写真">
                <div class="point">
                  <span class="point_txt">Point</span>
                  <span class="point_num">3</span>
                </div>
              </div>
              <div class="col3_txt-wrap mt50">
                <h3 class="col3_ttl">清潔感のある院内</h3>
                <p class="col3_txt">
                  感染症対策として、常に清潔な環境を維持するよう心掛けています。全ての機器は使用後に減菌処理を施し、徹底した衛生管理に務めています。</p>
              </div>
              <a href="<?php echo home_url(); ?>/clinic" class="btn">詳しく見る</a>
            </li>
          </ul><!-- .col3 -->

          <div class="greeting main_inner">
            <p class="greeting_ttl">院長挨拶</p>
            <div class="media">
              <div class="media_img-wrap fadeInTrigger">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/sec02-01.jpg" alt="院長の写真">
              </div>
              <div class="media_txt-wrap">
                <p class="greeting_lead">私たちは患者様とのコミュニケーションを大切にします。</p>
                <p class="greeting_content">
                  当院では、全ての方にご満足していただけるよう、ご要望や不安をしっかり受け止め、可能な限りご希望に沿った治療を行っています。多くの方は様々なお口の悩みを抱えています。そのような悩みを一緒に解決していけるよう、スタッフ一人一人が患者様の立場に立ち、気軽に相談ができるようなリラックスした雰囲気を作り出すよう努めています。施術後は皆様が笑顔でお帰りになる姿を見ることが私たち日々の幸せです。
                </p>
                <p class="greeting_name">院長:<span>大道 卓也</span>(だいどう たくや)</p>
              </div>
            </div>
            <div class="greeting_about">
              <dl>
                <dt>経歴</dt>
                <dd><span class="greeting_year">2013</span>佐々木大学 卒業</dd>
                <dd><span class="greeting_year">2013</span>吉原大学歯学部 入学</dd>
                <dd><span class="greeting_year">2017</span>高本大学病院にて研修</dd>
                <dd><span class="greeting_year">2018</span>千堂歯科クリニック 入社</dd>
                <dd><span class="greeting_year">2019</span>千堂歯科クリニック 退社</dd>
                <dd><span class="greeting_year">2020</span>大道歯科クリニック 開業</dd>
              </dl>
              <dl>
                <dt>資格</dt>
                <dd>歯科保存専門医</dd>
                <dd>日本口腔外科学会認定医</dd>
                <dd>医療環境管理士</dd>
                <dd>第二種歯科感染管理者</dd>
                <dd>歯科医師免許</dd>
                <dd>ブローネマルクインプラント認定医</dd>
              </dl>
              <dl>
                <dt>所属</dt>
                <dd>横田外科学会</dd>
                <dd>高木矯正歯科学会</dd>
                <dd>福井インプラント学会</dd>
                <dd>高橋歯科医師会</dd>
                <dd>日本歯科東洋医学会</dd>
                <dd>日本補綴歯科学会</dd>
              </dl>
            </div>
          </div>
        </div><!-- .sec_content -->
      </div><!-- /.sec_inner -->
    </section>

    <section class="sec02">
      <div class="sec_inner">
        <div class="lead">
          <h2 class="lead_ttl">診察案内</h2>
          <p class="lead_txt">
            当院では、主に4つの診療科目に分類されています。<br>一般的な虫歯治療だけでなく、将来を見越した予防歯科、見た目にこだわる審美歯科、<br>小児歯科では小さなお子さんの歯の不安や問題も当院のスペシャリストが取り除きます。
          </p>
        </div>
        <div class="sec_content">
          <div class="service main_inner">
            <div class="media">
              <div class="media_img-wrap fadeLeftTrigger">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/sec03-01.jpg" alt="男性が治療を受けている写真">
              </div>
              <div class="media_txt-wrap">
                <h3 class="service_ttl">一般歯科</h3>
                <p class="service_content">
                  むし歯治療や歯周病の治療など、幅広い年齢層の患者様を治療します。通常の治療に加え定期的なメンテナンスや施術後のアフターケアも行っております。歯の痛み、歯ぐきの腫れなどお口に異常を感じた際はお早めにご相談ください。
                </p>
                <a href="<?php echo home_url(); ?>/service" class="btn">詳しく見る</a>
              </div>
            </div>
            <div class="media r-rev">
              <div class="media_img-wrap fadeRightTrigger">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/sec03-02.jpg" alt="男性が説明を受けている写真">
              </div>
              <div class="media_txt-wrap">
                <h3 class="service_ttl">予防歯科</h3>
                <p class="service_content">
                  歯が痛くなる前に予防を行いましょう。<br>たとえむし歯を治しても歯への治療によるダメージを完全になくすことはできません。将来の歯の健康を維持するために、むし歯の原因の根本を取り除きましょう。定期的な検診が最も効果的な予防対策です。
                </p>
                <a href="<?php echo home_url(); ?>/service" class="btn">詳しく見る</a>
              </div>
            </div>
            <div class="media">
              <div class="media_img-wrap fadeLeftTrigger">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/sec03-03.jpg" alt="歯の模型で説明している写真">
              </div>
              <div class="media_txt-wrap">
                <h3 class="service_ttl">審美歯科</h3>
                <p class="service_content">
                  ホワイトニング、セラミックで美しく健康な白い歯を手に入れてみませんか?<br>当院では痛みも少なく、時間をかけることなく施術を行うことができます。口元のコンプレックスを解消することは精神的にも大きなメリットになります。お悩みの方はご気軽にご相談ください。
                </p>
                <a href="<?php echo home_url(); ?>/service" class="btn">詳しく見る</a>
              </div>
            </div>
            <div class="media r-rev">
              <div class="media_img-wrap fadeRightTrigger">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/sec03-04.jpg" alt="子供が指導を受けている写真">
              </div>
              <div class="media_txt-wrap">
                <h3 class="service_ttl">小児歯科</h3>
                <p class="service_content">
                  小さいころからの歯のケアはとても大切です。<br>早い段階で歯の正しい磨き方を覚え、むし歯予防に努めることで大人になってからのお口の健康は大きく変わってきます。また、当院ではむし歯予防や初期むし歯に有効なフッ素塗布もおすすめしています。お子さんの強い歯を手に入れましょう。
                </p>
                <a href="<?php echo home_url(); ?>/service" class="btn">詳しく見る</a>
              </div>
            </div>
          </div>
        </div><!-- .sec_content -->
      </div><!-- /.sec_inner -->
    </section>

    <section class="sec03">
      <div class="sec_inner">
        <div class="lead">
          <h2 class="lead_ttl">お知らせ</h2>
        </div>
        <div class="sec_content">
          <?php if( have_posts() ): ?>
          <ul class="news">
            <?php while( have_posts() ): the_post(); ?>
            <li class="news_item">
              <time class="news_date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
              <div class="news_content">
                <ul>
                  <?php
                  // カテゴリー１つ目の名前を表示
                  $category = get_the_category();
                  if ($category[0] ) {
                  echo '<li><a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->cat_name . '</a></li>';
                  }
                  ?>
                </ul>
                <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
              </div>
            </li>
            <?php endwhile; ?>
          </ul>
          <a href="<?php echo home_url(); ?>/category/news" class="btn">一覧へ</a>
          <?php endif; ?>
        </div><!-- .sec_content -->
      </div><!-- /.sec_inner -->
    </section>

    <section class="sec04" id="sec04">
      <div class="sec_inner">
        <div class="lead">
          <h2 class="lead_ttl">よくある質問</h2>
        </div>
        <div class="sec_content">
          <div class="faq">
            <dl class="faq_item">
              <dt class="faq_row -q">
                <span class="faq_icon -q">Q</span>
                <span class="faq_txt -q">むし歯治療は痛いですか?</span>
              </dt>
              <dd class="faq_row -a">
                <p class="faq_txt -a">
                  大道歯科では可能な限り痛みを軽減する努力を行っています。<br>麻酔液や細い注射針を用いるなどし、痛みが少ないよう適切な治療を心がけております。</p>
              </dd>
            </dl>
            <dl class="faq_item">
              <dt class="faq_row -q">
                <span class="faq_icon -q">Q</span>
                <span class="faq_txt -q">予防・メンテナンスについて教えてください。</span>
              </dt>
              <dd class="faq_row -a">
                <p class="faq_txt -a">
                  単に痛みを取る、つめる、かぶせるといった従来の歯科医院の治療とは違います。<br>しっかりと噛むことができ、それを維持できる状態にすることが大切だと考えます。<br>これは、今のご自身の歯を守るためだけでなく、その後の快適な生活をおくる上でとても重要な事だと考えております。
                </p>
              </dd>
            </dl>
            <dl class="faq_item">
              <dt class="faq_row -q">
                <span class="faq_icon -q">Q</span>
                <span class="faq_txt -q">歯を抜いたり削ったりということはありますか。</span>
              </dt>
              <dd class="faq_row -a">
                <p class="faq_txt -a">
                  大道歯科では、患者様の歯を可能な限り残すことに力を入れています。<br>なるべく削らない、抜かないをモットーに最善の結果がでるように治療を進めています。</p>
              </dd>
            </dl>
            <dl class="faq_item">
              <dt class="faq_row -q">
                <span class="faq_icon -q">Q</span>
                <span class="faq_txt -q">治療についてきちんとした説明をして欲しい。</span>
              </dt>
              <dd class="faq_row -a">
                <p class="faq_txt -a">
                  しっかりとカウンセリングをして、患者様の不安なこと、希望していることを確認します。<br>そして、その患者様に適した治療をご提案しますのでご安心下さい。</p>
              </dd>
            </dl>
          </div>
        </div><!-- .sec_content -->
      </div><!-- /.sec_inner -->
    </section>

  </div><!-- .main_inner -->
</main>

<?php get_footer(); ?>