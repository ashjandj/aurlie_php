
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//Toastr Option
toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "closeHtml": '<span class="btn-trigger">Close</span>',
    "preventDuplicates": true,
    "showDuration": "1500",
    "hideDuration": "1500",
    "timeOut": "5000",
    "toastClass": "toastr",
    "extendedTimeOut": "5000"
};


//Common success toaster
window.successToaster = function (message, title = '') {
    toastr.remove();
    toastr.options.closeButton = true;
    toastr.success(message, title, { timeOut: 5000 });
}
window.errorToaster = function (message, title) {
    toastr.remove();
    toastr.options.closeButton = true;
    toastr.error(message, title, { timeOut: 5000 });
}
window.handleError = function (errorResponse) {
    if (errorResponse.responseText) {
        var errors = JSON.parse(errorResponse.responseText);
        if (errorResponse.status === 422 || errorResponse.status === 429) {
            if (errors.errors) {
                $('.error-help-block').show();
                for (var field in errors.errors) {
                    $('#' + field + '-error').html(errors.errors[field]);
                    $('#' + field + '-error').parent('.form-group').removeClass('has-success').addClass('has-error');
                }
            } else {
                errorToaster(errors.error.message);
            }
        } else {
            if (errors.message) {
                errorToaster(errors.message);
            } else {
                errorToaster(errors.error.message);
            }
            return false;
        }
    } else if (errorResponse.status === 0) {
        errorToaster(internetConnectionError);
    } else {
        errorToaster(errorResponse.statusText);
    }
}

window.elementEnableDisabled = function(id,flag){
    if(flag === true){
        $(id).attr("disabled","disabled");
    }else{
        $(id).removeAttr("disabled");
    }
}

window.pageLoader = function (id) {
    $('#' + id).html('<div class="pageLoader text-center"><div class="spinner-border" role="status"></div></div>');
}

window.loadEditor = function(descriptionClass){
    $('.'+descriptionClass).summernote({
        tabsize: 1,
        height: 250,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'strikethrough', 'clear']],
            ['font', ['superscript', 'subscript']],
            ['color', ['color']],
            ['fontsize', ['fontsize', 'height']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['view', ['codeview']],
        ]
    });
}

window.showButtonLoader = function (btnObj, btnName, btnStatus) {
    if (btnStatus) {
        $(btnObj).html(btnName+ '&nbsp;<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span class="visually-hidden"></span>');
    } else {
        btnObj.html(btnName);
    }
    btnObj.attr("disabled", btnStatus);
}

window.enableDisableButton = function (btnObj, btnStatus) {
    btnObj.attr("disabled", btnStatus);
}

// Set the cookie with the timezone information
window.setTimeZoneCookie = function () {
    var timeZoneName = Intl.DateTimeFormat().resolvedOptions().timeZone;
    document.cookie = "time_zone = " + timeZoneName;
}

/* for close */
$(document).on('click', '.custom-close', function(e) {
    e.preventDefault();
    var modal = $(this).parents('div.modal');
    var form = modal.find('form');
    form[0].reset();
    modal.find('.error-help-block').html('');
    modal.modal('hide');
});

window.enableDisableFormFields = function (flag) {
    $('form :input').prop('disabled', flag);
}

window.togglePasswordOn = function () {
    $(document).on('click', '.ni-eye-fill', function () {
        let target = $(this).data('target');

        $(this).removeClass('ni-eye-fill');
        $(this).addClass('ni-eye-off-fill');

        $(`#${target}`).attr('type', 'text');
    });
}

window.togglePasswordOff = function () {
    $(document).on('click', '.ni-eye-off-fill', function () {
        let target = $(this).data('target');

        $(this).removeClass('ni-eye-off-fill');
        $(this).addClass('ni-eye-fill');

        $(`#${target}`).attr('type', 'password');
    });
}

window.format = function (item) {
    if (!item.id) {
    return item.text;
    }
    var img = $("<img>", {
    class: "img-flag",
    width: 21,
    src: $(item.element).attr('data-flag')
    });
    var span = $("<span>", {
    text: " " + item.text
    });
    span.prepend(img);
    return span;
};

window.setStatebyCountryId = function (countryId, stateContainer, cityContainer) {
    $.ajax({
        type: 'GET',
        url: route('users.getStates', countryId),
        beforeSend: function () {
            enableDisableFormFields(true);
        },
        success: function (response) {
            enableDisableFormFields(false);
            let stateList = response.data;
            if (stateList && stateList.length > 0) {
                cityContainer.empty();
                stateContainer.empty();
                stateContainer.append('<option>Select State</option');
                $.each(stateList, function (key, value) {
                    var newState = new Option(value.name, value.id, false, false);
                    stateContainer.append(newState);
                });
                stateContainer.trigger('change');
            } else {
                var newState = new Option("Select State", "", false, false);
                stateContainer.empty();
                stateContainer.append(newState);
            }
        },
        error: function (err) {
            //handleError(err);
            return optionData;
        },
        complete: function () {
            $('#background_loader').addClass('d-none');
        }
    });
};

window.setCitybyStateId = function (stateId, cityContainer) {
    $.ajax({
        type: 'GET',
        url: route('users.getCities', stateId),
        beforeSend: function () {
            enableDisableFormFields(true);
        },
        success: function (response) {
            enableDisableFormFields(false);
            let cityList = response.data;
            if (cityList && cityList.length > 0) {
                cityContainer.empty();
                cityContainer.append('<option>Select City</option>');
                $.each(cityList, function (key, value) {
                    var newCity = new Option(value.name, value.id, false, false);
                    cityContainer.append(newCity);
                });
                cityContainer.trigger('change');
            } else {
                var newCity = new Option("Select City", "", false, false);
                cityContainer.empty();
                cityContainer.append(newCity);
            }
        },
        error: function (err) {
            //handleError(err);
            return optionData;
        },
        complete: function () {
            $('#background_loader').addClass('d-none');
        }
    });  
};

// paste OTP function
window.pasteOtp = function (otpButton) {
    $(".otp-field > input").eq(0).on("paste", function(event) {
        event.preventDefault();
        var pastedValue = (event.originalEvent.clipboardData || window.clipboardData).getData("text");

        $(".otp-field > input").each(function(index) {
            if (index < pastedValue.length) {
                var otpVal = $(".otp-input").map(function() {
                    return $(this).val();
                }).get().join("");

                // paste into input
                $(this).val(pastedValue[index]);
                $(this).prop("disabled", false);
                $(this).focus();

                otpButton.val(otpVal);
            } else {
                $(this).val("");
                $(this).focus();
            }
        });
    });
};

window.otpInput = function (submitBtn, otpButton) {
    $(".otp-field > input").each(function(index1) {
        $(this).on("keyup", function(e) {
            var currentInput = $(this);
            var nextInput = currentInput.next();
            var prevInput = currentInput.prev();

            if (e.key === "e" || e.key === "." || e.key === "E") {
                currentInput.val("");
                return;
            }

            if (currentInput.val().length > 1) {
                currentInput.val("");
                return;
            }

            if (nextInput && nextInput.prop("disabled") && currentInput.val() !== "") {
                nextInput.prop("disabled", false);
                nextInput.focus();
            }

            if (e.key === "Backspace") {
                $(".otp-field > input").each(function(index2) {
                    if (index1 <= index2 && prevInput) {
                        if (index1 && index2) {
                            $(this).prop("disabled", true);
                            $(this).val("");
                            prevInput.focus();
                            prevInput.val('');
                        }
                    }
                });
            }

            submitBtn.removeClass("active").prop("disabled", true);

            var inputsNo = $(".otp-field > input").length;
            if (!$(".otp-field > input").eq(inputsNo - 1).prop("disabled") && $(".otp-field > input").eq(inputsNo - 1).val() !== "") {
                submitBtn.addClass("active").prop("disabled", false);
                var otpVal = $(".otp-input").map(function() {
                    return $(this).val();
                }).get().join("");
                otpButton.val(otpVal);
                return;
            }
        });
    });
};

window.resetOtpBoxes = function (otpButton) {
    otpButton.val('');
    $(".otp-field > input").val('');
    $(".otp-field > input").eq(0).focus();
    $(".otp-field > input").each(function() {
        var currentInput = $(this);
        var nextInput = currentInput.next();
        nextInput.prop("disabled", true);
    });
};

$(document).on('contextmenu', function(event) {
    event.preventDefault();
});

$(document).on('click', '#logoutButton', function (e) {
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: route('frontend.profile.logout'),
        beforeSend: function () {
            enableDisableFormFields(true);
        },
        success: function (response) {
            if (response.success && response.data && response.data.redirectUrl) {
                window.location.href = response.data.redirectUrl;
            }
        },
        error: function (err) {
            handleError(err);
        },
        complete: function () {
            $('#background_loader').addClass('d-none');
        }
    });
});

/**
 * Method used for translating locale strings
 * @param key
 * @param replace
 * @returns {T|*}
 */
// eslint-disable-next-line no-unused-vars
function trans(key, replace = {})
{
    let translation = window.translations[key];
    if(translation === null){ // If no translation available, return the ( default - en ) key
        return key;
    }
    for (var placeholder in replace) {
        translation = translation.replace(`:${placeholder}`, replace[placeholder]);
    }
    if(typeof translation === 'undefined'){
        return key;
    }
    return translation;
}

$(function() {
    setTimeZoneCookie();
});