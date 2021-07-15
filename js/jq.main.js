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
          width: "100%"
        });
        $("header").addClass("stick");
      } else {
        $("header").css({ position: "relative" });
        $("header").removeClass("stick");
      }
    });
  }

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
  }
  barsClick();

  //Index page description text cut
  const cuttingText = function () {
    //console.log($(".featured_item").length);
    for (let i = 0; i < $(".featured_item").length; i++){
      const textLength = $(".featured_item").eq(i).find("p.desc").text();
      //console.log(textLength);

      $(".featured_item").eq(i).find("p.desc").text(textLength.substr(0, 50) + "...");
    }
  }

  cuttingText();

  const loadMore = function () {
    $(".featured_item").hide();
    $(".featured_item").slice(0, 3).show();
    //slice를 0번부터 3개를 보여주는 것

    $(".load_more button").click(function () {
      $(".featured_item:hidden").slice(0, 3).show();
    });
  }

  loadMore();






});