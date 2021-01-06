import $, { htmlPrefilter, ajax } from "jquery";
// window.$ = window.jQuery = $;
import "bootstrap/dist/js/bootstrap";
// import "slick-carousel";
import "hamburgers";
import "@fortawesome/fontawesome-free/js/all";
import jsSocials from "jsSocials";

import { headerAddClass, hamburger, share } from "./functions/functions";

(function ($) {
    /**
     * Add class on scroll
     * @src ./functions/functions.js
     */
    headerAddClass("#masthead", "header-scrolled", 10);

    /**
     * Hamburger
     */
    hamburger(".hamburger");

    /**
     *  Back to top animation
     */
    $('a[href*="#back-to-top"]').click(function (e) {
        e.preventDefault();

        $("html,body").animate({ scrollTop: 0 }, 1000);
    });

    /**
     * Smoooth Scrolling
     */
    // Select all links with hashes
    $('a[href*="#"]')
        // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function (event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $("html, body").animate(
                        {
                            scrollTop: target.offset().top - 100,
                        },
                        1000
                    );
                }
            }
        });

    //
    share("#share");
})(jQuery);
