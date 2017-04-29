$(document).ready(function() {

    /**
     * Whether registration form or login form
     * is shown, add .form-active class to
     * appropriate title.
     */
    if($('.login-form').length) {
        $('.show-register-form').removeClass('form-active');
        $('.show-login-form').addClass('form-active');
    }
    else if($('.register-form').length) {
        $('.show-login-form').removeClass('form-active');
        $('.show-register-form').addClass('form-active');
    }
    
    function validateEmail($email) {
        const regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test($email);
    }

    /**
     * Registration form validation
     */
    $('#reg-form-first-name').on('keyup', function() {
       if(!$(this).val()) {
           $(this).addClass('input-warning');
       }
       else {
           $(this).removeClass('input-warning');
       }
    });
    
    $('#reg-form-last-name').on('keyup', function() {
       if(!$(this).val()) {
           $(this).addClass('input-warning');
       }
       else {
           $(this).removeClass('input-warning');
       }
    });
    
    $('#reg-form-email').on('keyup', function() {
       if(!$(this).val() || !validateEmail($(this).val())) {
           $(this).addClass('input-warning');
       }
       else {
           $(this).removeClass('input-warning');
       }
    });
    
    $('#reg-form-password').on('keyup', function() {
       if(!$(this).val()) {
           $(this).addClass('input-warning');
       }
       else {
           $(this).removeClass('input-warning');
       }
    });
    
    $('#reg-form-confirm-password').on('keyup', function() {
       if(!$(this).val() || $('#reg-form-password').val() !== $(this).val()) {
           $(this).addClass('input-warning');
       }
       else {
           $(this).removeClass('input-warning');
       }
    });
    
    $('#reg-form-submit-btn').on('click', function() {
        if(!$('#reg-form-first-name').val()) {
            $('#reg-form-first-name').addClass('input-warning');
        }
        else if(!$('#reg-form-last-name').val()) {
            $('#reg-form-first-name').removeClass('input-warning');
            $('#reg-form-last-name').addClass('input-warning');
        }
        else if(!$('#reg-form-email').val() || !validateEmail($('#reg-form-email').val())) {
            $('#reg-form-first-name').removeClass('input-warning');
            $('#reg-form-last-name').removeClass('input-warning');
            $('#reg-form-email').addClass('input-warning');
        }
        else if(!$('#reg-form-password').val()) {
            $('#reg-form-first-name').removeClass('input-warning');
            $('#reg-form-last-name').removeClass('input-warning');
            $('#reg-form-email').removeClass('input-warning');
            $('#reg-form-password').addClass('input-warning');
        }
        else if(!$('#reg-form-confirm-password').val() || $('#reg-form-password').val() !== $('#reg-form-confirm-password').val()) {
            $('#reg-form-first-name').removeClass('input-warning');
            $('#reg-form-last-name').removeClass('input-warning');
            $('#reg-form-email').removeClass('input-warning');
            $('#reg-form-password').removeClass('input-warning');
            $('#reg-form-confirm-password').addClass('input-warning');
        }
        else {
            $('#reg-form').submit();
        }
    });
    
    /**
     * Login form validation
     */
    $('#log-form-email').on('keyup', function() {
       if(!$(this).val() || !validateEmail($(this).val())) {
           $(this).addClass('input-warning');
       }
       else {
           $(this).removeClass('input-warning');
       }
    });
    
    $('#log-form-password').on('keyup', function() {
       if(!$(this).val()) {
           $(this).addClass('input-warning');
       }
       else {
           $(this).removeClass('input-warning');
       }
    });
    
    $('#log-form-submit-btn').on('click', function() {
        if(!$('#log-form-email').val() || !validateEmail($('#log-form-email').val())) {
            $('#log-form-email').addClass('input-warning');
        }
        else if(!$('#log-form-password').val()) {
            $('#log-form-email').removeClass('input-warning');
            $('#log-form-password').addClass('input-warning');
        }
        else {
            $('#log-form').submit();
        }
    });
});
