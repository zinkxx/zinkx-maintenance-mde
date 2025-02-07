document.addEventListener("DOMContentLoaded", function () {
    let statusField = document.querySelector('select[name="devtechnic_maintenance_status"]');
    let fieldsToToggle = document.querySelectorAll('input[name^="devtechnic_"], textarea[name^="devtechnic_"]');

    function toggleFields() {
        if (statusField.value === "enabled") {
            fieldsToToggle.forEach(field => field.disabled = false);
        } else {
            fieldsToToggle.forEach(field => field.disabled = true);
        }
    }

    statusField.addEventListener("change", toggleFields);
    toggleFields();
});
