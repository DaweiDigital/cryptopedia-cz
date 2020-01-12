var $ = jQuery.noConflict();
$(document).ready(function() {
    var isTouchDevice = 'ontouchstart' in document.documentElement;
    if (isTouchDevice) {
        $('html').removeClass('no-touch');
    }

//    $(document).on("click", ".js-scroll-top", function(e) {
//        e.preventDefault();
//        $('html, body').animate({
//            scrollTop: 0
//        }, '500', 'swing');
//    });
//
//    $(window).scroll(function() {
//        if ($(window).scrollTop() > 300) {
//            $(".js-scroll-top").addClass("show-it");
//        }
//        else {
//            $(".js-scroll-top").removeClass("show-it");
//        }
//    });

    var ref = document.referrer;
    if (ref.match(/^https?:\/\/([^\/]+\.)?seznam\.cz(\/|$)/i)) {
        $("html").addClass("user-from-seznam");
    }

    fullHeightbanner();
    var myLazyLoad = new LazyLoad();

    /* Swipebox */
    $('.gallery-item a, .js-swipebox').swipebox({
        hideBarsDelay: 5000, // delay before hiding bars on desktop
        loopAtEnd: true // true will return to the first image after the last image is reached
    });

    if ($(".understrap-read-more-link").length > 0) {
        $(".understrap-read-more-link").html("Zjistit více");
    }

    var lh = [];
    var wscroll = 0;
    var wh = $(window).height();

    function update_offsets() {
        $('.lazy-bg').each(function() {
            var x = $(this).offset().top;
            lh.push(x);
        });
    }
    ;

    function lazy() {
        wscroll = $(window).scrollTop();
        for (i = 0; i < lh.length; i++) {
            if (lh[i] <= wscroll + (wh - 200)) {
                var imgUrl = $('.lazy-bg').eq(i).attr("data-lazy-bg-md");
                $('.lazy-bg').eq(i).css('background-image', 'url(' + imgUrl + ')');

                if (window.matchMedia("(min-width: 80.625em)").matches) {
                    var imgUrllg = $('.lazy-bg').eq(i).attr("data-lazy-bg-lg");
                    $('.lazy-bg').eq(i).css('background-image', 'url(' + imgUrllg + ')');
                }

                if (window.matchMedia("(min-width: 62.500em) and (max-width: 80.563em)").matches) {
                    var imgUrlmd = $('.lazy-bg').eq(i).attr("data-lazy-bg-md");
                    $('.lazy-bg').eq(i).css('background-image', 'url(' + imgUrlmd + ')');
                }

                if (window.matchMedia("(min-width: 48em) and (max-width: 62.438em)").matches) {
                    var imgUrlsm = $('.lazy-bg').eq(i).attr("data-lazy-bg-sm");
                    $('.lazy-bg').eq(i).css('background-image', 'url(' + imgUrlsm + ')');
                }

                if (window.matchMedia("(max-width: 47.938em)").matches) {
                    var imgUrlxs = $('.lazy-bg').eq(i).attr("data-lazy-bg-xs");
                    $('.lazy-bg').eq(i).css('background-image', 'url(' + imgUrlxs + ')');
                }
            }
            ;
        }
        ;
    }
    ;

// Page Load
    update_offsets();
    lazy();

    $(window).on("resize", function() {
        lazy();
    });

    $(window).on('scroll', function() {
        lazy();
    });

    $.get("https://api.coinmarketcap.com/v2/ticker/?convert=CZK", function(data) {
        $.each(data.data, function(i, item) {
            //console.log(val);
            $('.js-coincap').each(function() {
                var typeOfCoin = $(this).attr('data-coin');

                if (item.symbol === typeOfCoin) {
                    var number = String(item.quotes.CZK.price).split('.')[0];

                    $(this).find(".js-name").html(item.name);
                    $(this).find(".js-price").html(addCommas(number));
                    $(this).find(".js-percent").html(item.quotes.CZK.percent_change_24h);
                    $(this).find(".js-percent:contains(-)").addClass("negative-number");
                }
            });
        });
    }, 'json');

    if ($(".js-coin-table").length > 0) {
        $(".js-change-day").each(function() {
            $(this).find(".js-day-percent:contains(-)").closest("tr").addClass("negative-change");
        });

        $(".js-change-week").each(function() {
            $(this).find(".js-week-percent:contains(-)").addClass("negative-change");
        });
    }

    if ($(".js-money-format").length > 0) {
        $(".js-money-format").each(function() {
            var moneyFormat = $(this).text().split('.')[0];
            $(this).html(addCommas(moneyFormat));
        });
    }

    $(document).on("click", ".js-show-aside-content, .js-hide-aside-content", function() {
        $(this).closest(".adblock-content").toggleClass("show-me");
    });

    $(document).on("click", ".js-close-that", function() {
        $(this).closest(".js-manipulate").toggleClass("hide-me");
    });

    if ($(".children-page-list-item").length > 0) {
        $(".children-page-list-item").each(function() {
            var firstLetter = $(this).find("h2").text();
            var first = firstLetter.charAt(0);

            $(this).find(".js-alphabet").prepend(first);
        });
    }

    $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function(event) {
        // On-page links
        if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                &&
                location.hostname == this.hostname
                ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000, function() {
                    // Callback after animation
                    // Must change focus!
                    var $target = $(target);
                    $target.focus();
                    if ($target.is(":focus")) { // Checking if the target was focused
                        return false;
                    } else {
                        $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                        $target.focus(); // Set focus again
                    }
                    ;
                });
            }
        }
    });

    $(document).keydown(function(e) {
        if (e.keyCode == '37') { // <
            if ($(".nav-previous a").length) {
                var prevLink = $(".nav-previous a").attr("href");
                window.location.href = prevLink;
            }
        }
        if (e.keyCode == '39') { // >
            if ($(".nav-next a").length) {
                var nextLink = $(".nav-next a").attr("href");
                window.location.href = nextLink;
            }
        }
    });

    $(window).resize(function() {
        if ($(window).width() > 991)
        {
            var heightBlog = $(".js-fixed-content").height();
            var widthAside = $(".js-fixed-sidebar").width();
            $(".js-fixed-sidebar").css("height", heightBlog);
            $(".js-fixed-sidebar-content").css("width", widthAside);
        }
    });
    var w = $(window);
    var link1 = $(".js-fixed-sidebar-content");
    var table1 = $(".js-fixed-sidebar");
    if (table1.length > 0 && w.width() > 991) {
        w.scroll(function() {

            var windowTop = w.scrollTop();

            var diff = table1.offset().top - windowTop + table1.height();

            if (diff < link1.height()) {
                link1.addClass("active-absolute");
            }

            else
            {
                link1.removeClass("active-absolute");
            }
            var heightBlog = $(".js-fixed-content").height();
            var widthAside = $(".js-fixed-sidebar").width();

            $(".js-fixed-sidebar-content").css("width", widthAside);
            $(".js-fixed-sidebar").css("height", heightBlog);


        });

        if (!!$('.js-fixed-sidebar-content').offset()) { // make sure ".sticky" element exists
            var heightAside = $(".js-fixed-sidebar-content").height();
            var stickyTop = $('.js-fixed-sidebar-content').offset().top; // returns number 
            var startSticky = stickyTop + (heightAside / 2);

            $(window).scroll(function() { // scroll event

                var windowTop = $(window).scrollTop(); // returns number 

                if (startSticky < windowTop) {
                    $('.js-fixed-sidebar-content').addClass("fixed-me");
                }
                else {
                    $('.js-fixed-sidebar-content').removeClass("fixed-me");
                }
            });
        }
    }

    if (window.matchMedia("(min-width: 80.63em)").matches) {
        $("html").addClass("bpLg");
    }

    if (window.matchMedia("(min-width: 62.5em) and (max-width: 80.56em)").matches) {
        $("html").addClass("bpMd");
    }

    if (window.matchMedia("(min-width: 48em) and (max-width: 62.44em)").matches) {
        $("html").addClass("bpSm");
    }

    if (window.matchMedia("(max-width: 47.938em)").matches) {
        $("html").addClass("bpXs");
        $(document).on("click touchstart", ".js-overlay, .js-close", function() {
            $(".site-primary-navigation").removeClass("is-show");
            $(".navbar-responsive").removeClass("active");
            $(".js-overlay").removeClass("is-show");
            $("html").removeClass("responsive-menu-is-show");
        });

        $(".navbar-toggle").click(function() {
            if ($(".site-primary-navigation").hasClass("is-show")) {
                $(".site-primary-navigation").removeClass("is-show");
                $(".navbar-responsive").removeClass("active");
                $(".js-overlay").removeClass("is-show");
                $("html").removeClass("responsive-menu-is-show");
            } else {
                $(".site-primary-navigation").addClass("is-show");
                $(".navbar-responsive").addClass("active");
                $(".js-overlay").addClass("is-show");
                $("html").addClass("responsive-menu-is-show");
            }
        });

        $(window).ready(function() {
            $(".js-responsive-table, .entry-content table").stacktable();
        });

        if ($(".dropdown").length > 0) {
            $(".dropdown").append("<div class='dropdown-for-mobile js-dropdown'>Show</div>");
        }

        $(document).on("click", ".dropdown-for-mobile", function() {
            $(".dropdown").toggleClass("is-show");
        });
    }
});

function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '<span class="currency-gap"></span>' + '$2');
    }
    return x1 + x2;
}

function fullHeightbanner() {
    if (window.matchMedia("(min-width: 62.5em)").matches) {
        var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
        var heightMenu = $(".website-header").height();
        var bannerHeight = h - heightMenu;
        $(".js-fullheight").css("height", bannerHeight);
        $(window).resize(function() {
            var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
            var heightMenu = $(".website-header").height();
            var bannerHeight = h - heightMenu;
            $(".js-fullheight").css("height", bannerHeight);
        });
    }
}