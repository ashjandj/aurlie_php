let profile = {
    init: function () {
        profile.update();
        profile.changeCountry();
        profile.changeState();
        profile.updateCountryCode();
        profile.selectBoxValidation();
    },

    update: function () {
        $(document).on('click', '#profileBtn', function(e) {
            e.preventDefault();
            let form = $('#updateProfileForm');
            let btn = $(this);
            let btnName = btn.text();
            let url = form.attr('action');
        
            if (form.valid()) {
                showButtonLoader(btn, btnName, 'disabled');
                $.ajax({
                    type: 'PUT',
                    url: url,
                    data: form.serialize(),
                    beforeSend: function() {
                        showButtonLoader(btn, btnName, true);
                    },
                    success: function(response) {
                        if (response.success) {
                            successToaster(response.message, '');
                            $('.user-name').text(response.data.name);
                            $('.lead-text').text(response.data.name);
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

    changeCountry: function () {
        $(document).on('change', '#country_id', function () {
            let countryId = $(this).val();
            stateContainer = $('#state_id');
            cityContainer = $('#city_id');
            if (countryId) {
                setStatebyCountryId(countryId, stateContainer, cityContainer);
            }
        });   
    },

    changeState: function () {
        $(document).on('change', '#state_id', function () {
            let stateId = $(this).val();
            cityContainer = $('#city_id');
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

$(function () {
    profile.init();

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
