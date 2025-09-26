// Aos
AOS.init();

setTimeout(() => {
  $(".loader").fadeOut(1000);
}, 2000);



lightGallery(document.getElementById("lightgallery"), {
  thumbnail: true,
  selector: ".image-item",
});







if ($("#slider-hero").length) {
  $("#slider-hero").owlCarousel({
    loop: true,
    margin: 0,
    nav: true,
    items: 1,
    autoplayTimeout: 3500,
    autoplayHoverPause: false,
    rtl: true,
    autoplay: true,
    autoplayHoverPause: true,
    dots: false,
    smartSpeed: 700,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
      },
    },
  });
}

if ($("#slider-careers").length) {
  $("#slider-careers").owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    items: 4,
    autoplayTimeout: 3500,
    autoplayHoverPause: false,
    autoplay: false,
    autoplayHoverPause: true,
    dots: false,
    smartSpeed: 700,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },

      1000: {
        items: 3,
      },

      1200: {
        items: 4,
      },
    },
  });
}
if ($("#slider-news").length) {
  $("#slider-news").owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    items: 3,
    autoplayTimeout: 3500,
    autoplayHoverPause: false,
    autoplay: false,
    autoplayHoverPause: true,
    dots: false,
    smartSpeed: 700,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },

      1000: {
        items: 2,
      },

      1200: {
        items: 3,
      },
    },
  });
}
if ($("#slider-team").length) {
  $("#slider-team").owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    items: 4,
    autoplayTimeout: 3500,
    autoplayHoverPause: false,
    autoplay: false,
    autoplayHoverPause: true,
    dots: false,
    smartSpeed: 700,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },

      1000: {
        items: 3,
      },

      1200: {
        items: 4,
      },
    },
  });
}


$(".remove_mune").click(function () {
  $("#menu-div").removeClass("active");
  $(".bg_menu").removeClass("active");
});

$(".join-ele").click(function (e) {
  e.preventDefault();
  close()
})
function open() {
  $(".navicon").addClass("is-active");
  $("#menu-div").addClass("active");
  $("#times-ican").addClass("active");
  $(".bg_menu").addClass("active");
}

function close() {
  $(".navicon").removeClass("is-active");
  $("#menu-div").removeClass("active");
  $("#times-ican").removeClass("active");
  $(".bg_menu").removeClass("active");
  $(".all-categories").removeClass("active");
  $(".btn-all-categories").removeClass("active");
  $(".show-categories").removeClass("active");

  $(".remove-mune").click(function () {
    $("#menu-div").removeClass("active");
    $(".bg_menu").removeClass("active");
    $(".times-ican").removeClass("active");
  });
}

$("#times-ican").click(function () {
  if ($(this).hasClass("active")) {
    close();
  } else {
    open();
  }
});

$(".btns_menu_responsive").click(function (e) {
  close();
});

$(".remove-mune").click(function () {
  $("#menu-div").removeClass("active");
  $(".bg_menu").removeClass("active");
  $(".times-ican").removeClass("active");
  $(".navicon").removeClass("is-active");
});

$("#menu-div a").click(function () {
  e.preventDefault();
});

var $winl = $(window); // or $box parent container
var $boxl = $("#menu-div, #times-ican ,.btn-all-categories ,  .all-categories");
$winl.on("click.Bst", function (event) {
  if (
    $boxl.has(event.target).length === 0 && //checks if descendants of $box was clicked
    !$boxl.is(event.target) //checks if the $box itself was clicked
  ) {
    close();
  }
});

document.getElementById('resume').addEventListener('change', function () {
  var fileName = this.files && this.files[0] ? this.files[0].name : 'Resume';
  this.nextElementSibling.textContent = fileName;
});