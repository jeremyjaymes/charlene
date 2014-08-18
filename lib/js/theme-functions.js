/**
 * Fix skip links in IE and Chrome
 * http://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/
 * Additional credit to the Twenty Fourteen theme
 */
window.addEventListener("hashchange", function(event) {
    var element = document.getElementById(location.hash.substring(1));

    if (element) {
        if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
            element.tabIndex = -1;
        }

        element.focus();
    }
}, false);