document.addEventListener('DOMContentLoaded', function() {
    let requiredInputs = document.querySelectorAll('input[required]');
    let signUpButton = document.querySelector('#sign-up-button');

    function checkValidForm() {
        let isFormValid = Array.from(requiredInputs).every((input) => {
            return input.value.trim() !== ''; // Check if every input is not empty
        });

        signUpButton.disabled = !isFormValid; // Enable button if form is valid, else disable
    }

    Array.from(requiredInputs).forEach((input) => {
        input.addEventListener('input', checkValidForm); // Use 'input' event for real-time validation
    });

    checkValidForm(); // Initial check in case of autofill
});
