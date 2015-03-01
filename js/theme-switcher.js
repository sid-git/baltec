
/*===================================
 THEME SWITCHER
 =====================================*/

$(function()
{

    $('.gear-settings').click(function(e){
        e.preventDefault();
        $('.switcher-content').toggleClass('show');

    });
    $('.page-container').click(function(){
        if($('.switcher-content').hasClass('show')){

            $('.switcher-content').removeClass('show');
        }
    });
    $('.fixed-header-off').click(function()
    {
        $(this).attr('disabled','disabled');
        $(this).siblings('button').removeAttr('disabled');
        $('#top-bar').addClass('relative-topbar');
    });

    $('.fixed-header-on').click(function()
    {
        $(this).attr('disabled','disabled');
        $(this).siblings('button').removeAttr('disabled');
        if($('#top-bar').hasClass('relative-topbar')){
            $('#top-bar').removeClass('relative-topbar');
        }
    });


    $(function()
    {

        $('.fluid-layout').click(function(){
            if($('.page-container').hasClass('boxed-container')){
                $('.page-container').removeClass('boxed-container');
                $('body').removeClass('boxed-home');
                $(this).attr('disabled','disabled');
                $(this).siblings('button').removeAttr('disabled');
            }
        });
        $('.box-layout').click(function(){
            $('body').addClass('boxed-home');
            $('.page-container').addClass('boxed-container');
            $(this).attr('disabled','disabled');
            $(this).siblings('button').removeAttr('disabled');

        });
        $('.theme-color').click(function()
        {
            var stylesheet = $(this).attr('title').toLowerCase();
            $('#themes').attr('href','css'+'/'+'themes'+'/'+stylesheet+'.css');
        });
    });
});