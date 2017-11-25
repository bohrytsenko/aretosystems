$( document ).ready(function() {

    // Sliders


    // Slider logo cards
    var mySwiper1 = new Swiper ('.s2', {
        pagination: '.swiper-pagination',
        slidesPerView: 5,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        paginationClickable: true,
        setWrapperSize: true,
        calculateHeight:true,
        autoplay: 2500,
        loop: true,
        breakpoints: {
            1200: {
                slidesPerView: 3
            },
            768: {
                slidesPerView: 3
            },
            640: {
                slidesPerView: 1
            },
            320: {
                slidesPerView: 1
            }
        }
    });

    // Slider logo cms
    var mySwiper2 = new Swiper ('.s3', {
        pagination: '.swiper-pagination',
        slidesPerView: 5,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        paginationClickable: true,
        calculateHeight:true,
        autoplay: 2500,
        loop: true,
        breakpoints: {
            1200: {
                slidesPerView: 3
            },
            768: {
                slidesPerView: 3
            },
            640: {
                slidesPerView: 1
            },
            320: {
                slidesPerView: 1
            }
        }
    });

    // Slider testimonials
    var mySwiper3 = new Swiper ('.s4', {
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        parallax: true,
        calculateHeight:true,
        loop: true
    });

    // Slider why choose us
    var mySwiper4 = new Swiper ('.s5', {
        pagination: '.swiper-pagination',
        slidesPerView: 1,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        paginationClickable: true,
        autoplay: 2500,
        calculateHeight:true,
        loop: true,
        breakpoints: {
            768: {
                slidesPerView: 1
            },
            640: {
                slidesPerView: 1
            },
            320: {
                slidesPerView: 1
            }
        }
    });

    // Headhesive

    var options = {
        offset: 300,
        throttle: 250
    };
    var header = new Headhesive('.header-scroll', options);

    // Mobile menu

    //Hamburger animation
    var hamburger = $('#hamburger-icon');
    hamburger.click(function() {
        hamburger.toggleClass('active');
        return false;
    });


    //Toggle mobile menu & search
    $('.toggle-nav').click(function() {
        $(this).toggleClass('active');
        $('.mobile-nav').slideToggle(200);
    });
    //Close navigation on anchor tap
    $('.toggle-nav.active').click(function() {
  
        $('.mobile-nav').slideUp(200);
    });
    //Mobile menu accordion toggle for sub pages
    $('.menu > li.menu-item-has-children').append('<div class="accordion-toggle"><div class="fa"><img src="https://aretosystems.dream.press/wp-content/uploads/2017/08/icon_menu_li1.svg" alt=""></div></div>');
    $('.menu .accordion-toggle').click(function() {
        $(this).parent().find('> ul').slideToggle(200);
        $(this).toggleClass('toggle-background');
        $(this).find('.fa').toggleClass('toggle-rotate');
    });

    // Link id

    $('a[href^="#"]').click(function () {
        var target = $(this).attr('href');
        $('html, body').animate({scrollTop: $(target).destination - 100}, 800);
        return false;
    });

    // Contacts tech support click

    $('#wpforms-254-field_4').on('change', function (e) {
        var valueSelected = this.value;
        if (valueSelected == 'technical_support') {
            $('#wpforms-submit-254').hide();
            $('#support_text').show();
        } else {
            $('#support_text').hide();
            $('#wpforms-submit-254').show();
        }
    });
    $('#wpforms-form-254').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });

    // Sign up page

    var hash = window.location.hash;
    if (hash == '#wpforms-405') {
        var success = $('#success_message').html();
        if (success ) {
            $('#wpforms-confirmation-405').html(success);
            $('#success_message' ).remove();

        }
        var error = $('#warning_message').html();
        if (error ) {
            $('#wpforms-confirmation-405').html(error)
            $('#wpforms-confirmation-405').css({'background': 'rgba(244, 67, 54, 0.59)', 'border': '1px solid rgba(244, 67, 54, 0.81)'});
            $('#warning_message' ).remove();
        }
    }


    // Home page

    // Slider header
    var mySwiperHome = new Swiper ('.s1', {
        paginationClickable: true,
        pagination: '.swiper-pagination',
        paginationBulletRender: function (swiper, index, className) {
            return '<span class="' + className + '">' + (index + 1) + '</span>';
        },
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        sliderPerView: 1,
        direction: 'horizontal',
        autoplay: 5500,
        autoHeight: true,
        setWrapperSize: true,
        speed: 600

    });
    showSwiper = function(){
        mySwiperHome.update();
    };
    $(window).resize(function(){
        var ww = $(window).width();
        if (ww>1000) mySwiperHome.params.slidesPerView = 1;
        if (ww>468 && ww<=1000) mySwiperHome.params.slidesPerView = 1;
        if (ww<=468) mySwiperHome.params.slidesPerView = 1;

    });
    $(window).trigger('resize');

    // On Click change slider
    $('.h-serv-bl a[data-go-slider]').click(function (e) {
        e.preventDefault();
        var sliderNumber = $(this).attr('data-go-slider');
        console.log(sliderNumber);
        mySwiperHome.slideTo(sliderNumber);
    });

    // Swipe change color
    mySwiperHome.on('slideChangeStart', function (swiper) {
        var sliderNumber = mySwiperHome.activeIndex;
        $('.h-serv-bl a[data-go-slider]').find('.serv-bl-item__title .title').removeClass('slider-color');
        $('.h-serv-bl a[data-go-slider="'+sliderNumber+'"]').find('.serv-bl-item__title .title').addClass('slider-color');
        console.log(mySwiperHome.activeIndex);
    });

    // Pricing page

   


});


