/**
 * jQuery plugin
 */
(function ($) {
    $.fn.ajaxSendForm = function () {
        var $this = $(this);
        $('input', $this).removeClass('is-invalid');
        $('.invalid-feedback', $this).remove();

        $('button', $this).prop('disabled', true);

        $.ajax({
            type: $this.attr('method'),
            url: $this.attr('action'),
            data: $this.serialize(),
            error: function (xhr) {
                var errors = xhr.responseJSON || {};

                $.each(errors, function (key, value) {
                    var array = key.split('.');
                    if (array[1]) {
                        key = array[0] + '[' + array[1] + ']';
                    }

                    $('input[name="'+ key +'"]', $this)
                        .addClass('is-invalid')
                        .parent()
                        .append('<div class="invalid-feedback">'+ value[0] +'</div>');
                });
            },
            complete: function() {
                $('button', $this).prop('disabled', false);
            }
        });
    };
}(jQuery));