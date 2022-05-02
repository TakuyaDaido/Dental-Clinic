//---------------------------------------------------------------------------------
//  スムーススクロール
//---------------------------------------------------------------------------------
$(function () {
  $('a[href^="#"]').click(function () {
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    var speed = 500;
    $("html, body").animate({
      scrollTop: position
    }, speed, "swing");
    return false;
  });
});

//---------------------------------------------------------------------------------
//  「85px」スクロールしたらclass付与
//---------------------------------------------------------------------------------
$(window).scroll(function () {
	if($(window).scrollTop() > 80) {
		$('.header').addClass('headerFixed');
	} else {
		$('.header').removeClass('headerFixed');
	}
});

//---------------------------------------------------------------------------------
//  Slick
//---------------------------------------------------------------------------------
$('.mv_list').slick({
	autoplay: true, //自動再生
  infinite: true, //無限ループ
  autoplaySpeed: 4000, //画像切り替えインターバル //1000で1s
  speed: 3000, //画像切り替えスピード
  fade: true, //動きがスライドからフェードインアウトになる
  dots: false, //ドット（ページ送り）を非表示する(デフォルトfalse)
  arrows: false, //矢印非表示(デフォルトtrue)
  slidesToShow: 1, //画面に表示する画像数
  slidesToScroll: 1, //一度にスクロールする画像数
  centerMode: true,
  // responsive: [ //画面幅でオプションの設定を変更できる
  //   {
  //     breakpoint: 768, //画面幅の指定（指定px以下に適応する）
  //     settings: { //この中に変更したいオプションを設定する
  //       slidesToShow: 2,
  //       slidesToScroll: 2,
  //     }
  //   },
  //   {
  //     breakpoint: 480,
  //     settings: {
  //       slidesToShow: 1,
  //       slidesToScroll: 1,
  //     }
  //   }
  // ]
});

//---------------------------------------------------------------------------------
//  フェードインアニメーション
//---------------------------------------------------------------------------------

// 動きのきっかけの起点となるアニメーションの名前を定義
function fadeAnime(){
	$('.fadeInTrigger').each(function(){ //fadeInTriggerというクラス名が
	  var elemPos = $(this).offset().top-50;//要素より、50px上の
	  var scroll = $(window).scrollTop();
	  var windowHeight = $(window).height();
	  if (scroll >= elemPos - windowHeight){
	  $(this).addClass('fadeIn');// 画面内に入ったらfadeInというクラス名を追記
	  }else{
	  $(this).removeClass('fadeIn');// 画面外に出たらfadeInというクラス名を外す
	  }
	  });
  
	$('.fadeUpTrigger').each(function(){ //fadeUpTriggerというクラス名が
	  var elemPos = $(this).offset().top-50;//要素より、50px上の
	  var scroll = $(window).scrollTop();
	  var windowHeight = $(window).height();
	  if (scroll >= elemPos - windowHeight){
	  $(this).addClass('fadeUp');// 画面内に入ったらfadeUpというクラス名を追記
	  }else{
	  $(this).removeClass('fadeUp');// 画面外に出たらfadeUpというクラス名を外す
	  }
	  });
  
	$('.fadeDownTrigger').each(function(){ //fadeDownTriggerというクラス名が
	  var elemPos = $(this).offset().top-50;//要素より、50px上の
	  var scroll = $(window).scrollTop();
	  var windowHeight = $(window).height();
	  if (scroll >= elemPos - windowHeight){
	  $(this).addClass('fadeDown');// 画面内に入ったらfadeDownというクラス名を追記
	  }else{
	  $(this).removeClass('fadeDown');// 画面外に出たらfadeDownというクラス名を外す
	  }
	  });
  
	$('.fadeLeftTrigger').each(function(){ //fadeLeftTriggerというクラス名が
	  var elemPos = $(this).offset().top-50;//要素より、50px上の
	  var scroll = $(window).scrollTop();
	  var windowHeight = $(window).height();
	  if (scroll >= elemPos - windowHeight){
	  $(this).addClass('fadeLeft');// 画面内に入ったらfadeLeftというクラス名を追記
	  }else{
	  $(this).removeClass('fadeLeft');// 画面外に出たらfadeLeftというクラス名を外す
	  }
	  });
  
	$('.fadeRightTrigger').each(function(){ //fadeRightTriggerというクラス名が
	  var elemPos = $(this).offset().top-50;//要素より、50px上の
	  var scroll = $(window).scrollTop();
	  var windowHeight = $(window).height();
	  if (scroll >= elemPos - windowHeight){
	  $(this).addClass('fadeRight');// 画面内に入ったらfadeRightというクラス名を追記
	  }else{
	  $(this).removeClass('fadeRight');// 画面外に出たらfadeRightというクラス名を外す
	  }
	  });
	}

	function SlideAnime(){
		$('.slideInTrigger').each(function(){ //slideInTriggerというクラス名が
			var elemPos = $(this).offset().top-50;//要素より、50px上の
			var scroll = $(window).scrollTop();
			var windowHeight = $(window).height();
			if (scroll >= elemPos - windowHeight){
			$(this).addClass('slideIn');// 画面内に入ったらfadeInというクラス名を追記
			}else{
			$(this).removeClass('slideIn');// 画面外に出たらfadeInというクラス名を外す
			}
			});
	}
	
	// 画面をスクロールをしたら動かしたい場合の記述
	  $(window).scroll(function (){
		fadeAnime();/* アニメーション用の関数を呼ぶ*/
		SlideAnime();
	  });// ここまで画面をスクロールをしたら動かしたい場合の記述
	
	// 画面が読み込まれたらすぐに動かしたい場合の記述
	  $(window).on('load', function(){
		fadeAnime();/* アニメーション用の関数を呼ぶ*/
		SlideAnime();
	  });// ここまで画面が読み込まれたらすぐに動かしたい場合の記述


//---------------------------------------------------------------------------------
//  アコーディオン
//---------------------------------------------------------------------------------
$(function() {
  let trigger = $(".faq_row.-q");
  trigger.on("click", function() {
    if($(this).hasClass("open")) {
      $(this).removeClass("open");
      $(this).next().slideUp();
    } else {
      $(this).addClass("open");
      $(this).next().slideDown();
      trigger.not(this).next().slideUp();
      trigger.not(this).removeClass("open");
    }
  });
});

//---------------------------------------------------------------------------------
//  ハンバーガーメニュー
//---------------------------------------------------------------------------------
$('.hum_btn').on('click', function () {
  if ($(".hum_line").hasClass("open")) {
    $('body').css('overflow-y', 'auto');     // 本文の縦スクロールを有効
    $(".hum_line").removeClass("open");
    $(".panel").fadeOut(500);
  } else {
    $('body').css('overflow-y', 'hidden');     // 本文の縦スクロールを有効
    $(".hum_line").addClass("open");
    $(".panel").fadeIn(500);
  }
});

if (window.matchMedia("(max-width: 768px)").matches) {
	$(function () {
		$('.panel a').on('click', function () {
			$('body').css('overflow-y', 'auto');     // 本文の縦スクロールを有効
			$('.hum_line').removeClass('open');
			$(".panel").fadeOut(500);
		});
	});
};

//---------------------------------------------------------------------------------
//  ドロップダウンメニュー
//---------------------------------------------------------------------------------

// $(function() {
// 	$('.dropDownMenu').hover(function() {
// 		$(this).find('.gnav_item-menu').stop().slideDown();
// 	}, function() {
// 		$(this).find('.gnav_item-menu').stop().slideUp();
// 	});
// })
