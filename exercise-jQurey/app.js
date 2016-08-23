$(function(){ 
    // $('p').hide();
    // $('.son').hide(); 
    // $('#name').hide();
    // $("p:eq(1)").hide();
    // $('.first').parent().hide();~~~~~~~~~~~~~
    // $('.first').before('<li class="before">111</li>');
    // $('.before').after('<li class="middle">111</li>');
    // $('.middle').append('<a href="http://www.baidu.com">baidu</a>');
    // $('.before').remove();
    $('.first').parent().append('<li class="last">2</li>');
    $('.last').addClass('active');
    $('li').removeClass('active');
    $('.first').css({
        "color": "red",
        "font-size": "30px",
        "text-decoration":"underline"
    });
    $('body').append('<div class="attr">111</div>');
    $('.attr').attr("data-url","我还不知道");
    $('.attr').append('<button class="setting">设置</button><button class="get">获取</button>');
    $('.setting').on('click', function() {
        $('.attr').attr("data-url","./ajax.txt");
    });
    $('.get').on('click', function() {
        var $get = $('.attr').attr("data-url");
        $.get($get, function(data) {
            if (data==null) {
                alert("请求失败");
            } else {
                $('.first').after('<li class="data"></li>');
                $('.data').text(data);
            }
        });
    });

}); 