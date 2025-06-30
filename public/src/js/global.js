AOS.init({
  duration: 800,
  offset: 200,
  delay: 200,
  once: true,
});

jQuery(document).ready(function ($) {
  $("[data-tab]").on("click", function (e) {
    e.preventDefault();
    var target = $(this).data("tab");
    $("[data-tab]").removeClass("active");
    $(this).addClass("active");
    $(target).parent().find(".tab").hide();
    $(target).css("display", "flex");
  });

  //ACCORDION
  var acc = document.querySelectorAll("[data-accordion]");
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + 20 + "px";
      }
    });
  }

  $("img.svg").each(function () {
    var $img = jQuery(this);
    var imgID = $img.attr("id");
    var imgClass = $img.attr("class");
    var imgURL = $img.attr("src");

    jQuery.get(
      imgURL,
      function (data) {
        // Get the SVG tag, ignore the rest
        var $svg = jQuery(data).find("svg");

        // Add replaced image's ID to the new SVG
        if (typeof imgID !== "undefined") {
          $svg = $svg.attr("id", imgID);
        }
        // Add replaced image's classes to the new SVG
        if (typeof imgClass !== "undefined") {
          $svg = $svg.attr("class", imgClass + " replaced-svg");
        }

        // Remove any invalid XML tags as per http://validator.w3.org
        $svg = $svg.removeAttr("xmlns:a");

        // Replace image with new SVG
        $img.replaceWith($svg);
      },
      "xml"
    );
  });

  $(".menu-block").on("click", function (e) {
    e.preventDefault();
    $("html").toggleClass("menu-opened");
  });

  $(".main-header a, nav a").each(function (index) {
    if (this.href.trim() == window.location) {
      $(this).addClass("active");
    }
  });
});
