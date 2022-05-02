<?php get_header(); ?>

<div class="mv-page">
  <div class="mv-page_inner">
    <h1 class="mv-page_ttl">当院について<span class="mv-page_ttl-en">CLINIC</span></h1>
  </div>
</div>

<div class="bread">
  <div class="bread_inner">
    <?php echo output_breadcrumb(); ?>
  </div>
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

  </div><!-- .main_inner -->
</main>

<?php get_footer(); ?>