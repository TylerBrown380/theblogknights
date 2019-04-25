$('form.ajax').on('submit', function() {
    var that = $(this),
    url = that.attr('action'),
    type = that.attr('method'),
    data = {};

    that.find('[name]').each(function(index, value) {
        var that = $(this),
        name = that.attr('name'),
        value = that.val();

        data[name] = value;
    });

   $.ajax({
    url: url,
    type: type,
    data: data,
    success: function(response) {
       $('[name="message"]').val('');
       $("#success-alert").show();
setTimeout(function() { $("#success-alert").fadeToggle(500); }, 2000);
       $("#all_comments").load('phpincludes/load-comments.php');
    }
   });

    return false;
});