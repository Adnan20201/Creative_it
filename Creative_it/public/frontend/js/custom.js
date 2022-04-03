$(function(){

// back to top
$(".back2").click(function() {
  $('html, body').animate({
      scrollTop: 0,
  }, 1000);
});

  // Closes responsive menu when a scroll link is clicked
    $('.nav-link').on('click', function () {
      $('.navbar-collapse').collapse('hide');
  });


$(window).on('scroll', function(){
  var scrolling = $(this).scrollTop();
  if(scrolling > 200){
    $('.back2').fadeIn(500);
  }
  else{
    $('.back2').fadeOut(500);
  }
  if(scrolling > 163){
    $('.navbar').addClass('fixed-menu');
  }
  else{
    $('.navbar').removeClass('fixed-menu');
  }
  });


// news
$('.marquee').marquee({
    duration: 20000,
    gap: 50,
    delayBeforeStart: 0,
    direction: 'left',
    duplicated: true
});

// banner slider
$('.slider-main').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows:false,
    fade:true,
    speed:2000,
  });

//animation scroll js
var html_body = $('html, body');
$('nav a').on('click', function () {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
            html_body.animate({
                scrollTop: target.offset().top - 60
            }, 1500);
            return false;
        }
    }
});

});
