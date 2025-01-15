
/**
 * @author : Fahadjdy
 * @function : togglePasswordVisibility
 * @description : Toggles the visibility of the password input field. When the password is hidden, the function changes the input type to "text" and updates the eye icon to indicate that the password is visible. Conversely, when the password is visible, it changes the input type back to "password" and updates the eye icon to indicate that the password is hidden.
 * @use : just add "js-text-field" class at input field
*/
function togglePasswordVisibility() {
        
    var passwordInput = document.getElementById('password');
    var eyeIcon = document.getElementById('eye-icon');

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = "password";
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    }
}

