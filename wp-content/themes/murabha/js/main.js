


$(document).ready(function(){
    $('.new-added .item, .most-viewed .item, .login-side .item').hover(function(){
        $(this).children('.add-to-cart, .flaticon-visibility').toggle(2000);
    });

    //main  owl-carousle
    $('.main-carousle-details .owl-carousel').owlCarousel({
        // loop:true,
        // margin:10,
        rtl:true,
        nav:false,
        dots:true,
        dotsData:true,
        // dotsContainer: true,
        autoplay:true,
        autoplayTimeout:3000,
        navText:["",""],
        responsive:{
            0:{
                items:1
            }
        }
    });

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        
        $("#wrapper").toggleClass("toggled");
        $('.overlay').css('display', 'block');

    });
    $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
    });  

    $('#menu-toggle').click(function(e) {
        e.preventDefault();
       $('#wrapper').toggleClass('menuDisplayed');
   });
    
    $('.for-you .owl-carousel').owlCarousel({
        // loop:true,
        margin:10,
        rtl:true,
        nav:false,
        dots:false,
        // autoplay:true,
        autoplayTimeout:3000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        }
    });
    // images in product
    $(".product-details .images .item a img").click(function(){
        $smalimg=$(this).attr('src');
        $(".product-details .product-img img").attr("src", $smalimg);
    });

    $('a.exit-button').click(function(){
        $('#wrapper').toggleClass("toggled");
        $('.overlay').css('display', 'none');
    });

    // $('#menu-toggle').click(function(){
    //     $('.exit-button').toggle();
    // });


    $('.our-clients .owl-carousel').owlCarousel({
        // loop:true,
        margin:40,
        rtl:true,
        dots:false,
        // autoplay:true,
        // autoplayTimeout:3000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:5
            }
        }
    });

    // function toggleSidebar() {
    //     $(".button").toggleClass("active");
    //     $("main").toggleClass("move-to-left");
    //     $(".sidebar-item").toggleClass("active");
    //   }
    
    //   $(".button").on("click tap", function() {
    //     toggleSidebar();
    //   });
    
    //   $(document).keyup(function(e) {
    //     if (e.keyCode === 27) {
    //       toggleSidebar();
    //     }
    //   });

    $('.most-viewed .owl-carousel').owlCarousel({
        // loop:true,
        margin:40,
        rtl:true,
        nav:true,
        dots:false,
        // autoplay:true,
        autoplayTimeout:3000,
        navText:["<i class='flaticon-next-page'></i>","<i class='flaticon-next-page'></i>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:2
            }
        }
    });
    $('.login-side .owl-carousel').owlCarousel({
        // loop:true,
        // margin:40,
        rtl:true,
        nav:true,
        dots:false,
        // autoplay:true,
        autoplayTimeout:3000,
        navText:["<i class='flaticon-next-page'></i>","<i class='flaticon-next-page'></i>"],
        responsive:{
            0:{
                items:1
            }
        }
    });

    // offers
    $('.discounts-offers .owl-carousel').owlCarousel({
        rtl:true,
        nav:false,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });

    // sponsors
    $('.sponsors .owl-carousel').owlCarousel({
        loop:true,
        rtl:true,
        nav:false,
        dots:false,
        // margin: 120,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });
    window.FontAwesomeConfig = {
        searchPseudoElements: true
      };
    // rate
    $('.rate-details h6 ').hover(function(){
        $(".rate-details h6 span").toggle(3000);
        $(".rate-details h6 a").toggle(3000);
    });
});

var $els = $('.menu a, .menu header');
var count = $els.length;
var grouplength = Math.ceil(count/3);
var groupNumber = 0;
var i = 1;
$('.menu').css('--count',count+'');
$els.each(function(j){
    if ( i > grouplength ) {
        groupNumber++;
        i=1;
    }
    $(this).attr('data-group',groupNumber);
    i++;
});

$('.menu footer button').on('click',function(e){
    e.preventDefault();
    $els.each(function(j){
        $(this).css('--top',$(this)[0].getBoundingClientRect().top + ($(this).attr('data-group') * -15) - 20);
        $(this).css('--delay-in',j*.1+'s');
        $(this).css('--delay-out',(count-j)*.1+'s');
    });
    $('.menu').toggleClass('closed');
    e.stopPropagation();
});

// run animation once at beginning for demo
setTimeout(function(){
    $('.menu footer button').click();
    setTimeout(function(){
        $('.menu footer button').click();
    }, (count * 100) + 500 );
}, 1000);