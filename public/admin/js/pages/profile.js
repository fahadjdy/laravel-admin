let profileIcon = document.getElementById('profile-icon');
let profileFile = document.getElementById('profile-file');
let profileImg = document.getElementById('profile-img');

profileIcon.addEventListener('click', function() {
    profileFile.click();
});

profileFile.addEventListener('change', function() {
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            profileImg.src = e.target.result;
        }
        reader.readAsDataURL(this.files[0]);
    }
});


let faviconIcon = document.getElementById('favicon-icon');
let faviconFile = document.getElementById('favicon-file');
let faviconImg = document.getElementById('favicon-img');
faviconIcon.addEventListener('click', function() {
    faviconFile.click();
});

faviconFile.addEventListener('change', function() {
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            faviconImg.src = e.target.result;
        }
        reader.readAsDataURL(this.files[0]);
    }
});


$(document).ready(function(){
    $('#edit-btn').on('click', function(){
        $('#edit-btn').hide();
        $('#save-btn').show();
        $('#name-text').addClass('d-none');
        $('#name').removeClass('d-none');
        $('#slogan-text').addClass('d-none');
        $('#slogan').removeClass('d-none');
        $('#email-text').addClass('d-none');
        $('#email').removeClass('d-none');
        $('#contact-text').addClass('d-none');
        $('#contact').removeClass('d-none');
        $('#address-text').addClass('d-none');
        $('#address').removeClass('d-none');
    });
    $('#save-btn').on('click', function(){
        $('#edit-btn').show();
        $('#save-btn').hide();
        $('#name-text').removeClass('d-none');
        $('#name').addClass('d-none');
        $('#slogan-text').removeClass('d-none');
        $('#slogan').addClass('d-none');
        $('#email-text').removeClass('d-none');
        $('#email').addClass('d-none');
        $('#contact-text').removeClass('d-none');
        $('#contact').addClass('d-none');
        $('#address-text').removeClass('d-none');
        $('#address').addClass('d-none');
    });
});