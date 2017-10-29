$(document).ready(function(e)
{
    $('#btn-mobile-menu').click(function(e)
    {
        e.preventDefault();
        var target  =   $('#' + $(this).data('target'));
        target.animate({height: 'toggle'});
        $(this).toggleClass('is-active');
    });
});
