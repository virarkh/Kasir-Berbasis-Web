$(function ()
{
    $(window).scroll(function ()
    {
        var scrollTop = $(window).scrollTop();
        if (scrollTop != 0) $('#header').stop().animate(
        {
            'opacity': '0.3'
        }, 400);
        else $('#header').stop().animate(
        {
            'opacity': '1'
        }, 400);
    });
    $('#header').hover(function (e)
    {
        var scrollTop = $(window).scrollTop();
        if (scrollTop != 0)
        {
            $('#header').stop().animate(
            {
                'opacity': '1'
            }, 400);
        }
    }, function (e)
    {
        var scrollTop = $(window).scrollTop();
        if (scrollTop != 0)
        {
            $('#header').stop().animate(
            {
                'opacity': '0.3'
            }, 400);
        }
    });
});