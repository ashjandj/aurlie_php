let matching = {
    init: function() {
        matching.userSelect();
        matching.checkboxSelection();
        matching.sendRecommendations();
    },

    /* Start function user select */
    userSelect: function() {
        $(document).on('change', '#userSelect', function() {
            let userId = $(this).val();
            if (userId) {
                window.location.href = route('admin.matching.index', { user_id: userId });
            } else {
                window.location.href = route('admin.matching.index');
            }
        });
    },
    /* End function user select */

    /* Start function checkbox selection */
    checkboxSelection: function() {
        const maxSelections = 5;
        const minSelections = 2;

        // Select all checkbox
        $(document).on('change', '#selectAll', function() {
            let isChecked = $(this).is(':checked');
            $('.user-checkbox').prop('checked', isChecked);
            matching.updateSelectionCount();
        });

        // Individual checkbox
        $(document).on('change', '.user-checkbox', function() {
            let checkedCount = $('.user-checkbox:checked').length;
            
            if (checkedCount > maxSelections) {
                $(this).prop('checked', false);
                errorToaster(`You can only select up to ${maxSelections} profiles.`, 'Match & Recommend');
                return;
            }

            matching.updateSelectionCount();
        });

        // Update selection count
        matching.updateSelectionCount = function() {
            let checkedCount = $('.user-checkbox:checked').length;
            $('#selectedCount').text(`${checkedCount} selected`);
            
            // Enable/disable send button
            if (checkedCount >= minSelections && checkedCount <= maxSelections) {
                $('#sendRecommendationsBtn').prop('disabled', false);
            } else {
                $('#sendRecommendationsBtn').prop('disabled', true);
            }

            // Update select all checkbox
            let totalCheckboxes = $('.user-checkbox').length;
            if (checkedCount === totalCheckboxes && totalCheckboxes > 0) {
                $('#selectAll').prop('checked', true);
            } else {
                $('#selectAll').prop('checked', false);
            }
        };
    },
    /* End function checkbox selection */

    /* Start function send recommendations */
    sendRecommendations: function() {
        $(document).on('submit', '#recommendationForm', function(e) {
            e.preventDefault();
            let form = $(this);
            let btn = $('#sendRecommendationsBtn');
            let btnName = btn.html();
            let checkedBoxes = $('.user-checkbox:checked');
            let checkedCount = checkedBoxes.length;

            if (checkedCount < 2) {
                errorToaster('Please select at least 2 profiles to recommend.', 'Match & Recommend');
                return;
            }

            if (checkedCount > 5) {
                errorToaster('You can only select up to 5 profiles.', 'Match & Recommend');
                return;
            }

            Swal.fire({
                allowOutsideClick: false,
                title: 'Send Recommendations?',
                text: `Are you sure you want to send ${checkedCount} profile recommendation(s) to this user?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, send it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    showButtonLoader(btn, btnName, true);
                    $.ajax({
                        type: 'POST',
                        url: route('admin.matching.send-recommendations'),
                        data: form.serialize(),
                        success: function (response) {
                            if (response.success) {
                                successToaster(response.message, 'Match & Recommend');
                                // Optionally reload or reset form
                                setTimeout(function() {
                                    location.reload();
                                }, 1500);
                            }
                        },
                        error: function (err) {
                            handleError(err);
                        },
                        complete: function () {
                            showButtonLoader(btn, btnName, false);
                        }
                    });
                }
            });
        });
    },
    /* End function send recommendations */
};

$(function() {
    matching.init();
});

