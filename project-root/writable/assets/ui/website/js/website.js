(function () {
    "use strict"; // Start of use strict
    var mainNav = document.querySelector('#website_nav');

    if (mainNav) {

        var navbarCollapse = mainNav.querySelector('.navbar-collapse');

        if (navbarCollapse) {

            var collapse = new bootstrap.Collapse(navbarCollapse, {
                toggle: false
            });

            var navbarItems = navbarCollapse.querySelectorAll('a');

            // Closes responsive menu when a scroll trigger link is clicked
            for (var item of navbarItems) {
                item.addEventListener('click', function (event) {
                    collapse.hide();
                });
            }
        }

        // Collapse Navbar
        var collapseNavbar = function () {

            var scrollTop = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;

            if (!mainNav.classList.contains("force")) {
                if (scrollTop > 100) {
                    mainNav.classList.add("navbar-shrink");
                    mainNav.classList.add("bg-checkered");
                } else {
                    mainNav.classList.remove("navbar-shrink");
                    mainNav.classList.remove("bg-checkered");
                }
            }
        };
        // Collapse now if page is not at top
        collapseNavbar();
        // Collapse the navbar when page is scrolled
        document.addEventListener("scroll", collapseNavbar);
    }

})(); // End of use strict


$(function(){

    let body = $('body');
    //------------------------------------------------------------------------------------------------------------------
    body.on('click', '.offcanvas .btn-close', function(){
        setTimeout(function(){
            $('.btn-quote-panel').blur();
        }, 300);
    });
    //------------------------------------------------------------------------------------------------------------------
    body.on('click', '.product-card', function(e){

        if($(e.target).parent().hasClass('ui-link')) return;
        if($(e.target).hasClass('ui-link')) return;

        let el = $(this);
        document.location = el.data('url');
    });
    //------------------------------------------------------------------------------------------------------------------

});