$(function(){
    $('body').on('click', '.add-user-btn', function(event) {
        var $form = $('.add-user');
        $.post($form.attr('action'), $form.serialize(), function(result){
            if (result.status=='success') {
              window.location.reload();
        }
     },'json');        
    });

    $('.delete-btn').on('click', function(event) {
        var id = $(event.target).attr('id');
        if (!confirm($('.del'+id).data('url')))
         return false;
    $.get(($('.del'+id).data('url')), function(result){
        if (result.status=='success') {          
            $("#"+id).parent().parent().remove();
        } else {
            alert('删除失败!');
        }
    },'json');
    });
    $('.show-add-user').on('click', function() {
        $.get('index.php?action=add', function(result){
            $('.modal').html(result).modal();
        },'html');
    });
   $('.update-user-btn').on('click',function(event) {
        var id = $(event.target).attr('edit-id');
        var $form = $('.update-user-'+id);
     $.post($form.attr('action'), $form.serialize(), function(result){
        if (result.status=='success') {
          window.location.reload();
        }
     },'json');
   });
});