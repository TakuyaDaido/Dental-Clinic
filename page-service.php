<?php get_header(); ?>

<div class="mv-page">
  <div class="mv-page_inner">
    <h1 class="mv-page_ttl">診療案内<span class="mv-page_ttl-en">SERVICE</span></h1>
  </div>
</div>

<div class="bread">
  <div class="bread_inner">
    <?php echo output_breadcrumb(); ?>
  </div>
</div>

<main class="main">
  <div class="main_inner">
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
                <a href="" class="btn">詳しく見る</a>
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
                <a href="" class="btn">詳しく見る</a>
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
                <a href="" class="btn">詳しく見る</a>
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
                <a href="" class="btn">詳しく見る</a>
              </div>
            </div>
          </div>
        </div><!-- .sec_content -->
      </div><!-- /.sec_inner -->
    </section>
  </div><!-- .main_inner -->
</main>

<?php get_footer(); ?>