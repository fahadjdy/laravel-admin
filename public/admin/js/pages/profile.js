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