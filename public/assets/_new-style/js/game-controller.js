app.controller('gameCtrl', function ($scope, $http, $log) {
    var TAB_MY_ACCOUNT_PROFILE = 'profile';
    var TAB_CASHIER_PAYMENT = 'payment'

    $scope.myAccountActiveTab = TAB_MY_ACCOUNT_PROFILE;
    $scope.cashierActiveTab = TAB_CASHIER_PAYMENT;
    $scope.levelActiveTab = TAB_CASHIER_PAYMENT;

    $scope.setActiveTab = function(e, name) {
        e.preventDefault();

        if (name === 'vip') {
            $('body').removeClass('overflow');
        } else {
            $('body').addClass('overflow');
        }

        if ($scope.myAccountActiveTab !== name) {
            $scope.myAccountActiveTab = name;
        }
    }

    $scope.isActiveTab = function(name) {
        return $scope.myAccountActiveTab === name;
    };

    $scope.setActiveSubTab = function(e, name) {
        e.preventDefault();
        if ($scope.cashierActiveTab !== name) {
            $scope.cashierActiveTab = name;
        }
    }

    $scope.isActiveSubTab = function(name) {
        return $scope.cashierActiveTab === name;
    };

    $scope.openModal = function(e, id) {
        e.preventDefault();
        
        $scope.closeModal(e);

        $(id).show();
        $('#lock-screen').show();
        $('body').addClass('overflow');
    }

    $scope.closeModal = function(e) {
        e.preventDefault();
        var $modal = $('.modal');

        $('input, textarea', $modal).removeClass('is__invalid');
        $('.invalid__feedback', $modal).remove();
        $('.modal__error, .modal-loading', $modal).hide();
        $modal.hide();
        $('#lock-screen').hide();
        $('body').removeClass('overflow');
    }

    $scope.sendForm = function(e) {
        e.preventDefault();

        var $form = $(e.target);
        var $modal = $form.closest('.modal');

        $('input, textarea', $form).removeClass('is__invalid');
        $('.invalid__feedback', $form).remove();
        $('.modal__error', $form).hide().text('');
        $('.modal-preloader', $modal).show();

        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            success: function(data) {
                if (data.link) {
                    location.replace(data.link);
                } else if ($form.data('modal-success')) {
                    $scope.openModal(e, $form.data('modal-success'));
                } else {
                    location.reload();
                }
            },
            error: function (xhr) {
                var errors = JSON.parse(xhr.responseText);

                $.each(errors, function (key, value) {
                    var field =  $('input[name="'+ key +'"], textarea[name="'+ key +'"]', $form)
                    if (field.length ) {
                        field.addClass('is__invalid')
                            .parent()
                            .append('<div class="invalid__feedback">'+ value[0] +'</div>');
                    } else {
                        $('.modal__error', $form).show().text(value);
                    }
                });

                $('.modal-preloader', $modal).hide();
            },
        });
    };
});

// @todo redo to angular
var classesToLaunchReg = ['button-hero', 'button-reg', 'games__offer__text', 'button-register', 'game__box', 'jackpot__container', 'games__offer__text', 'more_info_dialog'];
var classesToLaunchLog = ['button-login'];

//Adds the login/register classes that launches dialogs
var attachTriggers = function (params, params2) {
    for (var i = 0; i < params.length; i++) {
        var item = document.getElementsByClassName(params[i]);
        for (var j = 0; j < item.length; j++) {
            item[j].classList.add(params2);
            item[j].style = "cursor:pointer;";
        }
    }
}
attachTriggers(classesToLaunchReg, "sign__up");
attachTriggers(classesToLaunchLog, "sign__in");

//jQuery event handlers
$('.tc').on('click tap', function (e) {
    e.preventDefault();
    $('.overlay').fadeIn(150);
    $('.pop-container').fadeIn(250);
    $('body').addClass("no-scroll");

    $('html, body').animate({ scrollTop: 0 }, 350);
});
$('.close-pop, .close-icon, .overlay').on('click tap', function () {
    $('.pop-container').hide();
    $('.overlay').fadeOut(250);
    $('body').removeClass("no-scroll");
});
$('.more-info-button').on('click tap', function () {
    $('.overlay-more-info').fadeIn(150);
    $('.more_info_dialog').show();
});
$('.reg-close, .reg__close, .close-icon').on('click tap', function () {
    $('.more_info_dialog').hide();
    $('.overlay-more-info').fadeOut(250);
});
$('.bonus-button').on('click tap', function () {
    $('.more_info_dialog').hide();
    $('.overlay-more-info').fadeOut(250);
});


var $category = $('.game__category');
$category.on('click tap', function (e) {
    $category.removeClass('game-cat-active');
    var $this = $(this);
    $this.addClass('game-cat-active');
    location.replace($this.data('href'));
});

$('#language-select').on('click', 'i', function() {
    var langCode = $(this).data('lang-code');
    if (langCode) {
        document.cookie = 'language=' + langCode + ';path=/';

        location.reload();
    }
});

$('.payment, .history').not('.ps-container').perfectScrollbar({
    theme: 'tabs',
    suppressScrollX: true
});

if ($(window).width() > 700) {
    $('.summary__content').not('.ps-container').perfectScrollbar({
        theme: 'details',
        suppressScrollX: true
        // maxScrollbarLength: 213
    });
    $('.popup__gallery').not('.ps-container').perfectScrollbar({
        theme: 'tabs',
        suppressScrollX: true
        // maxScrollbarLength: 213
    });

    $('.popup__history').not('.ps-container').perfectScrollbar({
        theme: 'tabs',
        suppressScrollX: true
        // maxScrollbarLength: 213
    });
    $('.table-panel').not('.ps-container').perfectScrollbar({
        theme: 'details',
        suppressScrollX: true
        // maxScrollbarLength: 213
    });
}

$(".payitem").on('click', function(e) {
    var $index = $(this).index(),
        content = $('.payment__tooltip_open .pay-tooltip');

    $('.pay-tooltip__summ input[type="radio"]').on('click', function(i) {
        var volume_value = $(this).val();
        $(this).parent().parent().find('.l_num').val(volume_value);
        $(this).parent().parent().find('.input_summ_val').val(volume_value).focus();
    });

    $('.js-input__inner').val('');
    $('.pay-tooltip__note').hide();
    $('.l_num').click().val('500');
    $('.input_summ_val').val('500');
    $('.input_summ_val').on('change, input', function() {
        var volume_value = $(this).val();
        $(this).parent().parent().find('.l_num').val(volume_value).click();
    });

    $('.payment__tooltip').removeClass("payment__tooltip_open");
    $(this).parent().parent().next('.payment__tooltip').toggleClass("payment__tooltip_open");

    if ($(this).find('input').val() === "qiwi_rub") {
        $('.pay-tooltip__phone').show();
        $('.pay-tooltip').addClass('pay-tooltip_withphone');
        $('.pay-tooltip__phone_inner').attr('required', true);
    } else {
        $('.pay-tooltip__summ').show();
        $('.pay-tooltip__phone').hide();
        $('.pay-tooltip').removeClass('pay-tooltip_withphone');
        $('.pay-tooltip__phone_inner').attr('required', false);
    }

    if ($(this).find('input').val() === "qiwi_rub" && $(this).find('input').hasClass('payout')) {
        $('.pay-tooltip__number').removeClass('pay-tooltip__number_withr');
        $('.pay-tooltip__number').addClass('pay-tooltip__number_withplus');
        $('.pay-tooltip__number_inner').removeClass('pay-tooltip__number_inner-noprefix');
        $('.pay-tooltip__number_inner').attr({
            required: true,
            name: "account",
            placeholder: "70000000000",
            maxlength: "14"
        });
    } else if ($(this).find('input').val() === "webmoney_rub") {
        $('.pay-tooltip__number').removeClass('pay-tooltip__number_withplus');
        $('.pay-tooltip__number').addClass('pay-tooltip__number_withr');
        $('.pay-tooltip__number_inner').removeClass('pay-tooltip__number_inner-noprefix');
        $('.pay-tooltip__number_inner').attr({
            required: true,
            name: "account",
            placeholder: "000000000000",
            maxlength: "20"
        });
    } else if ($(this).find('input').val() === "pin") {
        $('.pay-tooltip__summ').hide();
        $('.pay-tooltip__pin_inner').attr({
            required: true,
            name: "pin",
            placeholder: "0000000000",
            maxlength: "10"
        });
        $('.pay-tooltip__pin').show();
    } else {
        $('.pay-tooltip__summ').show();
        $('.pay-tooltip__number').removeClass('pay-tooltip__number_withplus');
        $('.pay-tooltip__number').removeClass('pay-tooltip__number_withr');
        $('.pay-tooltip__number_inner').addClass('pay-tooltip__number_inner-noprefix');
        $('.pay-tooltip__number_inner').attr({
            required: true,
            name: "account",
            placeholder: "0000000000000",
            maxlength: "20"
        });
    }

    $(this).find('.l_num').click();

    $('.js-input__inner').on("keyup, input", function(e) {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    });

    if ($index == 0) {
        content.addClass('left').removeClass('right');
    } else if ($index == 1) {
        content.removeClass('left').removeClass('right');
    } else if ($index == 2) {
        content.removeClass('left').addClass('right');

    }
});

$('input#profileform-birthday').Zebra_DatePicker({
    offset: [-280, 40],
    days: ['Mo.', 'Tu.', 'We.', 'Th.', 'Fr.', 'Sa.', 'Su.'],
    months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
    default_position: 'below',
    show_icon: false,
    format: 'Y-m-d',
    show_clear_date: false,
    show_select_today: false,
    start_date: new Date()
});

$('.levels-table__item').on('touchend click', function(e) {
    var $this = $(this);

    $('.levels-table__item').removeClass('levels-table__item_active');
    $this.addClass('levels-table__item_active');
    $('.levels-table__arrow').removeClass('levels-table__arrow_active');
    $this.find('.levels-table__arrow').addClass('levels-table__arrow_active');
    $('.levels-table__info').removeClass('active');
    $($this.data('target')).addClass('active');
});


function decimalAdjust(type, value, exp) {
    // Если степень не определена, либо равна нулю...
    if (typeof exp === 'undefined' || +exp === 0) {
        return Math[type](value);
    }
    value = +value;
    exp = +exp;
    // Если значение не является числом, либо степень не является целым числом...
    if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
        return NaN;
    }
    // Сдвиг разрядов
    value = value.toString().split('e');
    value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
    // Обратный сдвиг
    value = value.toString().split('e');
    return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
}
if (!Math.round10) {
    Math.round10 = function(value, exp) {
        return decimalAdjust('round', value, exp);
    };
}
$(document).on('change keyup input click', '#exchange-input', function() {
    if (this.value.match(/[^0-9]/g)) {
        this.value = this.value.replace(/[^0-9]/g, '');
    }
    var $value = $(this).val() * $(this).data('cours');
    $('#exchange-output').val(Math.round10($value, -2));
    $('#exchange-input').val($(this).val() * 1);

});
$(document).on('change keyup input click', '#exchange-output', function() {

    this.value = this.value.replace(/[^\d\.]/g, '');

    var $value = $(this).val() / $(this).data('cours');
    $('#exchange-input').val(Math.round10($value, -2));
    $('#exchange-output').val($(this).val() * 1);
});

