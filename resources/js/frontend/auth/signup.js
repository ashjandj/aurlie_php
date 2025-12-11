let signUp = {
    init: function () {
        signUp.startSignUpProcess();
        signUp.changeCountry();
        signUp.changeState();
        signUp.updateCountryCode();
        signUp.selectBoxValidation();
        signUp.handleConditionalFields();
    },

    startSignUpProcess: function () {
        $(document).on('submit', '#signupForm', function(e) {
            e.preventDefault();
            let form = $(this);
            let btn = form.find('button[type="submit"]');
            let btnName = btn.text();
            let url = form.attr('action');

            if (form.valid()) {
                showButtonLoader(btn, btnName, 'disabled');
                
                // Serialize form data properly for arrays
                let formData = form.serialize();
                
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    processData: true, // Let jQuery handle the serialization
                    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                    beforeSend: function() {
                        showButtonLoader(btn, btnName, true);
                    },
                    success: function(response) {
                        if (response.success) {
                            successToaster(response.message, '');
                            setTimeout(function() {
                                if (response.data && response.data.redirectUrl) {
                                    window.location.href = response.data.redirectUrl;
                                } else {
                                    window.location.reload();
                                }
                            }, 1000);
                        }
                    },
                    error: function(err) {
                        handleError(err);
                    },
                    complete: function() {
                        showButtonLoader(btn, btnName, false);
                    }
                });
            }
        });
    },

    handleConditionalFields: function () {
        // Handle language other field
        $(document).on('change', 'input[name="languages[]"]', function() {
            if ($('input[name="languages[]"][value="other"]').is(':checked')) {
                $('#languageOtherInput').show().prop('required', true);
            } else {
                $('#languageOtherInput').hide().prop('required', false).val('');
            }
        });

        // Handle gender self-describe field
        $(document).on('change', 'input[name="gender"]', function() {
            if ($(this).val() === 'self-describe') {
                $('#genderSelfDescribeInput').show().prop('required', true);
            } else {
                $('#genderSelfDescribeInput').hide().prop('required', false).val('');
            }
        });

        // Handle pronouns other field
        $(document).on('change', 'input[name="pronouns"]', function() {
            if ($(this).val() === 'other-pronouns') {
                $('#pronounsOtherInput').show().prop('required', true);
            } else {
                $('#pronounsOtherInput').hide().prop('required', false).val('');
            }
        });

        // Handle currently working fields
        $(document).on('change', 'input[name="currentlyWorking"]', function() {
            if ($(this).val() === 'yes') {
                $('#workTypeField').show();
                $('#organisationField').show();
                $('#workTypeField input[type="radio"]').prop('required', true);
                $('#organisationField input').prop('required', true);
            } else {
                $('#workTypeField').hide();
                $('#organisationField').hide();
                $('#workTypeField input[type="radio"]').prop('required', false);
                $('#organisationField input').prop('required', false).val('');
                $('#workTypeOtherInput').hide().prop('required', false).val('');
            }
        });

        // Handle work type other field
        $(document).on('change', 'input[name="workType"]', function() {
            if ($(this).val() === 'other-work') {
                $('#workTypeOtherInput').show().prop('required', true);
            } else {
                $('#workTypeOtherInput').hide().prop('required', false).val('');
            }
        });

        // Initialize conditional fields visibility
        if ($('input[name="languages[]"][value="other"]').is(':checked')) {
            $('#languageOtherInput').show();
        } else {
            $('#languageOtherInput').hide();
        }

        if ($('input[name="gender"]:checked').val() === 'self-describe') {
            $('#genderSelfDescribeInput').show();
        } else {
            $('#genderSelfDescribeInput').hide();
        }

        if ($('input[name="pronouns"]:checked').val() === 'other-pronouns') {
            $('#pronounsOtherInput').show();
        } else {
            $('#pronounsOtherInput').hide();
        }

        if ($('input[name="currentlyWorking"]:checked').val() === 'yes') {
            $('#workTypeField').show();
            $('#organisationField').show();
        } else {
            $('#workTypeField').hide();
            $('#organisationField').hide();
        }

        if ($('input[name="workType"]:checked').val() === 'other-work') {
            $('#workTypeOtherInput').show();
        } else {
            $('#workTypeOtherInput').hide();
        }
    },

    changeCountry: function () {
        $(document).on('change', '#country', function () {
            let countryId = $(this).val();
            stateContainer = $('#state');
            cityContainer = $('#city');
            if (countryId) {
                setStatebyCountryId(countryId, stateContainer, cityContainer);
            }
        });   
    },

    changeState: function () {
        $(document).on('change', '#state', function () {
            let stateId = $(this).val();
            cityContainer = $('#city');
            if (stateId) {
                setCitybyStateId(stateId, cityContainer);
            }
        });   
    },

    updateCountryCode: function () {
        $(document).on('change', '.select-country', function () {
            const selectedOption = $(this).find('option:selected');
            const code = selectedOption.data('code');
            
            $(`#country_code`).val(code);
        });
    },

    // selectBoxValidation function start
    selectBoxValidation: function () {
        $(document).on('change', '.form-select', function () {
            const id = $(this).attr('name');
        
            if ($(this).valid()) {
                $(`#${id}-error`).text('');
            } 
        });
    },
    // selectBoxValidation function end
};

// Toggle membership details
function toggleDetails(detailsId) {
    $('#' + detailsId).slideToggle();
}

$(function () {
    signUp.init();

    // For tooltip
    $('[data-toggle="tooltip"]').tooltip();


    // for display flags
    $(".js-select2").select2();
    $("#countries").select2({
        templateResult: function(item) {
        return window.format(item, false);
        },
        templateSelection: function(item) {
        return window.format(item, true);
        }
    });
});
