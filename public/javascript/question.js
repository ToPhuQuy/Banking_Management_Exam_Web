$(function () {
    function setPaddingMainContainer() {
        var navbar = $('#navbar');
        $('#main-container').css('padding-top', (navbar.outerHeight() + 20) + "px");
    }

    function setSticky() {
        if ($(window).width() >= 768) {
            var navbar = $('#navbar');
            $('#filter-bar').css('top', navbar.outerHeight() + 'px');
            $('#left-sidebar').css('top', navbar.outerHeight() + 'px');    
        }
    }

    setPaddingMainContainer();
    setSticky();                                                                     
    $(window).resize(setPaddingMainContainer);
    $(window).resize(setSticky);
});
