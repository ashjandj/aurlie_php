
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
    "closeHtml": `<span class="btn-trigger">Close</span>`,
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
        ],
        callbacks: {
            onFocus: function() {
                $('.'+descriptionClass).summernote('editor.restoreRange');
            },
            onKeydown: function(e) {
                const content = $('.'+descriptionClass).summernote('code');
                if (e.keyCode === 32 && (content.length == 0 || content == '<p><br></p>')) {
                    e.preventDefault();
                }
            }
        }
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

window.getLocalTime = function(datetime, format = 'DD-MM-YYYY')
{
    return moment.utc(datetime).local().format(format);
}

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
        url: route('admin.users.getStates', countryId),
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
                var newState = new Option('Select State', "", false, false);
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
        url: route('admin.users.getCities', stateId),
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
                var newCity = new Option('Select City', "", false, false);
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

/* for close */
$(document).on('click', '.custom-close', function(e) {
    e.preventDefault();
    var modal = $(this).parents('div.modal');
    var form = modal.find('form');
    form[0].reset();
    modal.find('.error-help-block').html('');
    modal.modal('hide');
});


$(function () {
    $('.admin.profile.show').attr('disabled',true);
    $('.admin.profile.edit').attr('disabled',true);
    $('.admin.profile.destroy').attr('disabled',true);

    $('.admin.roles.show').attr('disabled',true);
    $('.admin.roles.edit').attr('disabled',true);
    $('.admin.roles.destroy').attr('disabled',true);
});

$(document).on('change', '.admin.profile.index', function () {
    if ($(this).is(':checked')) {
        $('.admin.profile.show').attr('disabled',false);
        $('.admin.profile.edit').attr('disabled',false);
        $('.admin.profile.destroy').attr('disabled',false);
    } else {
        $('.admin.profile.show').attr('disabled',true);
        $('.admin.profile.edit').attr('disabled',true);
        $('.admin.profile.destroy').attr('disabled',true);
    }
});

$(document).on('change', '.admin.roles.index', function () {
    if ($(this).is(':checked')) {
        $('.admin.roles.show').attr('disabled',false);
        $('.admin.roles.edit').attr('disabled',false);
        $('.admin.roles.destroy').attr('disabled',false);
    } else {
        $('.admin.roles.show').attr('disabled',true);
        $('.admin.roles.edit').attr('disabled',true);
        $('.admin.roles.destroy').attr('disabled',true);
    }
});
// don't allow spaces in input html
$(document).on('keypress', ".noSpaceAllow", (function(e) {
    if (e.which === 32)
        return false;
}));
// only allow number in input html
$(document).on('keypress', ".onlyNumbers", (function(event) {
	var e = event || evt; // for trans-browser compatibility
	var charCode = e.which || e.keyCode;
	if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;

	return true;
}));

// Set the cookie with the timezone information
window.setTimeZoneCookie = function () {
    var now = new Date();
    var timeZoneOffset = now.getTimezoneOffset();
    var timeZoneName = Intl.DateTimeFormat().resolvedOptions().timeZone;
    document.cookie = "time_zone = " + timeZoneName;
}

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

$(document).on('click', '#themeDarkMode', function(e) {
    e.preventDefault();
    var themeDarkMode = $("#themeDarkMode").attr('data-theme_dark_mode');
    $.ajax({
        type: 'POST',
        url: route('admin.setting.update-theme-dark-mode'),
        data: { 'theme_dark_mode': themeDarkMode},
        success: function(response) {
            if (response.success) {
                successToaster(response.message, 'Setting');
                $("#themeDarkMode").attr('data-theme_dark_mode', response.data)
            }
        },
        error: function(err) {
            handleError(err);
        }
    });
});