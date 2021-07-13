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

  


  $(".mobile_menu").click(function () {
    $(this).toggleClass("on");
    if ($(this).hasClass("on")) {
      $(".menu_items").slideDown(250);
    } else {
      $(".menu_items").slideUp(250);
    }
  });
});