/* "TO TOP" START */
$('body').append('<div id="toTop" class="btn btn-info"><i class="fas fa-angle-up"></i></div>');
$(window).scroll(function() {
    if ($(this).scrollTop() != 0) {
        $('#toTop').fadeIn();
    } else {
        $('#toTop').fadeOut();
    }
});
$('#toTop').click(function() {
    $("html, body").animate({
        scrollTop: 0
    }, 600);
    return false;
});
$(".nav a").click(function() {
    if ($(".navbar-collapse").hasClass("in")) {
        $('[data-toggle="collapse"]').click();
    }
});

// Select all links with hashes
$('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
        // On-page links
        if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
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
                    };
                });
            }
        }
    });

$(document).ready(function() {
    $("img").click(function() {
        $("#div1").fadeIn();
        $("#div1").fadeIn("slow");
        $("#div1").fadeIn(3000);
    });
});