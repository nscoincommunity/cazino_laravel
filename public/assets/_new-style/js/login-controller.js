app.controller('loginCtrl', function ($scope, $http, $log) {
    $scope.activeForm = 'login';

    $scope.switchActiveForm = function(e, name) {
        e.preventDefault();
        if ($scope.activeForm === name) {
            return;
        }

        $('.other-invalid-feedback').text('');
        $scope.activeForm = name;
    }

    $scope.sendForm = function(e) {
        e.preventDefault();

        var $form = $(e.target);

        $('input, textarea', $form).removeClass('is-invalid');
        $('.invalid-feedback', $form).remove();
        $('.other-invalid-feedback', $form).text('');
        $('#lock-screen').show();

        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            success: function(data) {
                location.reload();
            },
            error: function (xhr) {
                var errors = JSON.parse(xhr.responseText);

                $.each(errors, function (key, value) {
                    var field =  $('input[name="'+ key +'"], textarea[name="'+ key +'"]', $form)
                    if (field.length ) {
                        field.addClass('is-invalid')
                            .parent()
                            .append('<div class="invalid-feedback">'+ value[0] +'</div>');
                    } else {
                        $('.other-invalid-feedback', $form).text(value);
                    }
                });

                $('#lock-screen').hide();
            },
        });
    };
});
