
// Profile Page Js

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



// Bio Data Js 

ClassicEditor
.create(document.querySelector('#address'), {
    height: 300  // Optional: Set the height for the editor
})
.catch(error => {
    console.error(error);
});


// Site Detail Js

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


