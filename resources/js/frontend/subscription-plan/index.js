let subscriptionPlan = {
    init: function () {
        subscriptionPlan.existingSchedulePlan();
    },

    /*  */
    existingSchedulePlan: function() {
        $(document).on('click', "#existing-schedule", function () {
            errorToaster('Previous plan upgradation in process');
        })
    }
}
$(function() {
    subscriptionPlan.init();
});