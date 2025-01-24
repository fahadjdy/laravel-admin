var profileImage = document.getElementById('profileImage');
if (profileImage) {
    profileImage.addEventListener('click', function() {
        var navMenu = document.getElementById('navMenu');
        if (navMenu) {
            navMenu.style.display = navMenu.style.display === 'none' ? 'block' : 'none';
        }
    });
}


// sidebar menu collaps menu toggle js
document.querySelectorAll('.toggle-gallery').forEach(function (toggle) {
    toggle.addEventListener('click', function () {
        const submenu = this.nextElementSibling;
        const icon = this.querySelector('.toggle-icon');
        if (submenu.style.display === 'none' || submenu.style.display === '') {
            submenu.style.display = 'block';
            icon.classList.remove('fa-angle-down');
            icon.classList.add('fa-angle-up');
        } else {
            submenu.style.display = 'none';
            icon.classList.remove('fa-angle-up');
            icon.classList.add('fa-angle-down');
        }
    });
});