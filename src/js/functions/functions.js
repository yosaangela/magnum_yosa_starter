/**
 * Check if element is in dom
 * @param element @type string - element to check
 */
const isElementInDOM = (element) => typeof element != undefined && element != null;

export let slickCarousel = (element, options) => {
    $(element).slick(options);
};

export let slickCarouselButton = (btnClass, element, options) => {
    $(btnClass).click(function () {
        $(element).slick(options);
    });
};

/**
 * Add class on scoll
 * @param element @type string - element to add class to
 * @param classToAdd @type string - class to add to element
 * @param fromTop @type int - how many pixels from top
 */
export let headerAddClass = (element, classToAdd, fromTop) => {
    const el = document.querySelector(element);

    const callback = () => {
        const y = window.pageYOffset;
        if (y >= fromTop) el.classList.add(classToAdd);
        else el.classList.remove(classToAdd);
    };

    window.addEventListener("scroll", callback);
};

/**
 * Hamburger
 */
export let hamburger = (element) => {
    const el = document.querySelector(element);
    const siteNav = document.querySelector("#site-navigation");
    const mastHead = document.querySelector("#masthead");
    const html = document.querySelector("#html");

    if (isElementInDOM(el))
        el.addEventListener("click", function () {
            el.classList.toggle("is-active");
            siteNav.classList.toggle("is-active");
            mastHead.classList.toggle("is-active");
            html.classList.toggle("is-active");
        });
};

/**
 *  Share post/page/anything
 * @param element - type String - parent element for jsSocials output
 */
export const share = (element) => {
    jQuery(document.querySelector(element)).jsSocials({
        showCount: false,
        showLabel: false,
        shareIn: "popup",
        shares: [
            {
                share: "facebook",
                logo: "fcbk",
            },
            {
                share: "twitter",
                logo: "twtr",
            },
            {
                share: "linkedin",
                logo: "lnkdn",
            },
            {
                share: "whatsapp",
                logo: "sup",
            },
        ],
    });
};
