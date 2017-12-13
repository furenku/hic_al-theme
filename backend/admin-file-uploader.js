// console.log(wp.media.editor);

// $('.upload_image_button').trigger('click')

$('.upload_image_button').click(function(e) {
  e.preventDefault()


    var send_attachment_bkp = wp.media.editor.send.attachment;
    var button = $(this);
    wp.media.editor.send.attachment = function(props, attachment) {

        $(button).parent().prev().find('img').attr('src', attachment.url);

        $('.image-frame').imgLiquid({
          fill:false
        });

        $(button).prev().val(attachment.id);
        wp.media.editor.send.attachment = send_attachment_bkp;
    }
    wp.media.editor.open();
    return false;
});

$('.image-frame').imgLiquid({
  fill:false
});

// The "Remove" button (remove the value from input type='hidden')
$('.remove_image_button').click(function() {
    var answer = confirm('Are you sure?');
    if (answer == true) {
        var src = $(this).parent().prev().find('img').attr('data-src');
        $(this).parent().prev().find('img').attr('src', src);

        $('.image-frame').imgLiquid({
          fill:false
        });

        $(this).prev().prev().val('');
    }
    return false;
});
