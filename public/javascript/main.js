$(function () {
    function setOpacity() {
        var width = $(window).width();
        var navbar = $('#navbar');
        if (width < 768) {
            navbar.css('background', '#2B32B2');
            return;
        }
        if ($(window).scrollTop() > navbar.outerHeight()) {
            navbar.css('background', '#2B32B2');
        } else {
            navbar.css('background', 'rgba(0, 0, 0, 0)');
        }
    }

    function setSize() {
        var row1 = $('#row-1');
        var row2 = $('#row-2');
        var area = $('#area');
        var navbar = $('#navbar');
        var circle = $('#circle-area');

        row1.css('height', '15%');
        if (row1.height() < navbar.height()) {
            row1.css('height', navbar.height() + "px");
        }
        area.css('height', '100vh');
        circle.css('height', "100vh");
        if (row1.outerHeight() + row2.outerHeight() > area.height()) {
            var h = row1.outerHeight() + row2.outerHeight() + 100 + 'px';
            area.css("height", h);
            circle.css('height', h);
        } 
    }

    $(window).scroll(setOpacity);
    $(window).bind('resize', setOpacity);
    $(window).bind('resize', setSize);
    setOpacity();
    setSize();
});
