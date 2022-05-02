<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="format-detection" content="telephone=no">
  <title>大道歯科クリニック</title>
  <!-- SEO系 -->
  <meta name="description" content="120文字以内">
  <meta name="keywords" content="" />
  <!-- OGP -->
  <meta property="og:title" content="このページのタイトル/ページごとのタイトル">
  <meta property="og:site_name" content="サイト名">
  <meta property="og:description" content="90文字くらい推奨">
  <meta property="og:type" content="TOPページはwebsite、子ページはarticle">
  <meta property="og:url" content="このページのURL">
  <meta property="og:image" content="1200×630以上推奨、絶対パス">
  <meta name="twitter:card" content="summary or summary_large_image">
  <meta name="twitter:site" content="@ユーザー名">
  <meta name="format-detection" content="telephone=no">
  <!-- タッチアイコン -->
  <link rel="apple-touch-icon" sizes="192x192" href="">
  <link rel="shortcut icon" sizes="192x192" href="">
  <!-- ファビコン -->
  <link rel=”icon” href=“<?php echo get_template_directory_uri(); ?>/dist/img/favicon.ico”>
  <!-- クローラー -->
  <meta name="robots" content="noindex">
  <!-- ファイル読み込み -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/css/style.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <?php wp_head(); ?>
</head>

<body id="top" <?php body_class(); ?>>
  <header class="header">
    <div class="header_inner">
      <div class="header_logo">
        <a href="<?php echo home_url(); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/dist/img/logo.png" alt="大道歯科クリニックのロゴ"></a>
      </div>
      <nav class="gnav">
        <ul class="gnav_list">
          <li class="gnav_item"><a href="<?php echo home_url(); ?>/">ホーム</a></li>
          <li class="gnav_item"><a href="<?php echo home_url(); ?>/clinic/">当院について</a></li>
          <li class="gnav_item">
            <a href="<?php echo home_url(); ?>/service/" class="dropDownMenu">診察案内</a>
            <!-- <ul class="gnav_item-menu">
              <li><a href="#!" title="">一般歯科</a></li>
              <li><a href="#!" title="">予防歯科</a></li>
              <li><a href="#!" title="">審美歯科</a></li>
              <li><a href="#!" title="">小児歯科</a></li>
            </ul> -->
          </li>
          <li class="gnav_item"><a href="<?php echo home_url(); ?>/category/news/">お知らせ</a></li>
          <li class="gnav_item"><a href="<?php echo home_url(); ?>/review/">お客様の声</a></li>
          <li class="gnav_item"><a href="<?php echo home_url(); ?>/contact/">お問い合わせ</a></li>
        </ul>
      </nav>
      <div class="hum">
        <a href="javascript:void(0)" class="hum_btn">
            <span class="hum_line"></span>
        </a>
      </div>
      <nav class="panel">
        <ul class="panel_list">
          <li class="panel_item"><a href="<?php echo home_url(); ?>/">ホーム</a></li>
          <li class="panel_item"><a href="<?php echo home_url(); ?>/clinic/">当院について</a></li>
          <li class="panel_item"><a href="<?php echo home_url(); ?>/service/">診察案内</a></li>
          <li class="panel_item"><a href="<?php echo home_url(); ?>/category/news/">お知らせ</a></li>
          <li class="panel_item"><a href="<?php echo home_url(); ?>/review/">お客様の声</a></li>
          <li class="panel_item"><a href="<?php echo home_url(); ?>/contact/">お問い合わせ</a></li>
        </ul>
      </nav>
    </div><!-- /.header_inner -->
  </header>