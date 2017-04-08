$(document).ready(function() {

    /**
     * Whether registration form or login form
     * is shown, add .form-active class to
     * appropriate title.
     */
    if($('.login-form').length) {
        $(".show-register-form").removeClass("form-active");
        $(".show-login-form").addClass("form-active");
    }
    else if($('.registration-form').length) {
        $(".show-login-form").removeClass("form-active");
        $(".show-register-form").addClass("form-active");
    }
});
