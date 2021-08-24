$(function () {
  //header stick to top and change style when scrolling down
  const headerStick = function () {
    const hdTop = $("header").offset().top;

    $(window).scroll(function () {
      const scroll = $(window).scrollTop();
      //console.log(scroll);
      if (scroll >= hdTop) {
        $("header").css({
          position: "fixed",
          top: 0,
          width: "100%",
        });
        $("header").addClass("stick");
      } else {
        $("header").css({ position: "relative" });
        $("header").removeClass("stick");
      }
    });
  };

  headerStick();

  //Slide down and up when mobile menu click
  const barsClick = function () {
    $(".mobile_menu").click(function () {
      $(this).toggleClass("on");
      if ($(this).hasClass("on")) {
        $(".menu_items").slideDown(250);
      } else {
        $(".menu_items").slideUp(250);
      }
    });
  };
  barsClick();

  //Index page description text cut
  const cuttingText = function (txtBox, txtCut, txtLen) {
    //console.log($(".featured_item").length);
    for (let i = 0; i < $(txtBox).length; i++) {
      const textLength = $(txtBox).eq(i).find(txtCut).text();
      //console.log(textLength);

      $(txtBox)
        .eq(i)
        .find(txtCut)
        .text(textLength.substr(0, txtLen) + "...");
    }
  };

  cuttingText(".featured_item", "p.desc", 50);
  cuttingText(".search_item", ".search_txt p", 100);

  let len = 0;
  $(window).resize(function () {
    const wWidth = $(window).width();
    if (wWidth < 850) {
      cuttingText(".search_item", ".search_txt p", 50);
    } else {
      cuttingText(".search_item", ".search_txt p", 100);
    }
  });

  const loadMore = function () {
    $(".featured_item").hide();
    $(".featured_item").slice(0, 3).show();
    //slice를 0번부터 3개를 보여주는 것

    $(".load_more button").click(function () {
      $(".featured_item:hidden").slice(0, 3).show();
      if ($(".featured_item:hidden").length == 0) {
        //hidden된 갯수가 0이면
        $(".load_more").html(`<input type="hidden">`); //문자열이 아니라 백팁을 쓴다. load_more에 html이 바뀌는것
      }
    });
  };

  loadMore();

  //featured item images height fit to responsive width
  const imgHeightFit = function () {
    const featuredImgWidth = $(".featured_img").outerWidth();
    $(".featured_img").outerHeight(featuredImgWidth);
    //.featured_img의 가로값을 변수로 지정을 하여 세로값 파라미터 값으로 넣어 가로값과 세로값이 같아진다.

    $(window).resize(function () {
      const featuredImgWidth = $(".featured_img").outerWidth();
      $(".featured_img").outerHeight(featuredImgWidth);
    });
    //resize할때 사이즈 조정해줌
  };

  imgHeightFit();

  // detail page image tabs function
  const detailTabs = function () {
    $(".detail_tab_btns span").click(function () {
      const index = $(this).index(); //.detail_tab_btns span의 인덱스값을 읽어옴
      $(".detail_img>img").hide();
      $(".detail_img>img").eq(index).show();
    });

    $(".detail_tab_btns span").eq(0).trigger("click");
    //첫번째 0번 span을 강제 클릭해주는 것
  };

  detailTabs();

  //디테일 페이지 높이맞추기
  function detailFit() {
    const imgHeight = $(".detail_img_item").outerHeight();
    const btnHeight = $(".detail_tab_btns").outerHeight();
    $(".detail_img").height(imgHeight + btnHeight);
  }

  $(window).resize(function () {
    setTimeout(function () {
      detailFit();
    }, 150);
  }); //쓰로틀링이라고 하는건데, 윈도우 사이즈 리사이즈 할때마다 1px씩 조정이되서 인터넷에 부담이됨. 그래서 setTimeout함수로 지정된 시간만큼 딜레이를 줘서 부담을 줄여줌, 스크롤 할때나 사이즈 조정시 많이 사용

  detailFit();

  // $("#price").click(function () {
  //   $(this).toggleClass("on");
  //   if ($(this).hasClass("on")) {
  //     //$(this).text("높은가격순");
  //     //$(this).find("i").attr('class','fa fa-chevron-up')
  //     $(this).html('높은가격순 <i class="fa fa-chevron-up"></i>')

  //     location.href = '/zay/pages/menu_page/shop.php?key=up_price';

  //   } else {
  //     //$(this).text("낮은가격순");
  //     $(this).html('낮은가격순 <i class="fa fa-chevron-down"></i>')
  //     location.href = '/zay/pages/menu_page/shop.php?key=down_price';
  //   }
  // })

  const admin_tabs = function () {
    $(".admin_tabs button").click(function () {
      const tab_idx = $(this).index();
      //alert(tab_idx); // 버튼 2개를 클릭했을때 한개는0 , 다른 한개는 1 값이 반환됨
      $(".admin_panels>div").hide();
      $(".admin_panels>div").eq(tab_idx).show();
    });

    $(".admin_tabs button").eq(1).trigger("click");
  };
  admin_tabs();
});
