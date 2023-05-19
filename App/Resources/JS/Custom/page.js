$(document).ready(function () {
  function toggleSectionVisibility() {
    $(document).on("scroll", function () {
      var pageTop = $(document).scrollTop();
      var pageBottom = pageTop + $(window).height();
      var tags = $("section");

      for (var i = 0; i < tags.length; i++) {
        var tag = tags[i];
        if ($(tag).position().top < pageBottom) {
          $(tag).addClass("visible");
        } else {
          $(tag).removeClass("visible");
        }
      }
    });
  }

  function resizeLogoOnScroll() {
    var timer;
    $(window).scroll(function () {
      if (timer) {
        window.clearTimeout(timer);
        if (window.scrollY > 50) {
          $(".luxury-bnb__logo").css({
            transition: "0.3s",
            "max-width": "64px",
            height: "36px",
          });
        } else {
          if (window.scrollY < 50) {
            $(".luxury-bnb__logo").css({
              transition: "0.3s",
              "max-width": "120px",
              height: "84px",
            });
          }
        }
      }
      timer = setTimeout(function () {}, 1000);
    });
  }

  resizeLogoOnScroll();

  function changeCarouselImageToBkImage(imageClass, bkItemClass) {
    const image = document.getElementsByClassName(imageClass);
    const carouselItem = document.getElementsByClassName(bkItemClass);
    for (x = 0; x <= image.length - 1; x++) {
      carouselItem[x].style.backgroundImage =
        "url('" + image[x].getAttribute("src") + "')";
    }
  }

  changeCarouselImageToBkImage("carousel-image", "carousel-item");
});
