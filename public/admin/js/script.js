var profileImage = document.getElementById('profileImage');
if (profileImage) {
    profileImage.addEventListener('click', function() {
        var navMenu = document.getElementById('navMenu');
        if (navMenu) {
            navMenu.style.display = navMenu.style.display === 'none' ? 'block' : 'none';
        }
    });
}


// sidebar menu collaps Gallery menu toggle js
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


document.querySelector('.toggle-btn').addEventListener('click', function () {
    document.querySelectorAll('.toggle-btn').forEach(function(el) {
        el.classList.add('d-none');
    });
    document.querySelectorAll('.close-btn').forEach(function(el) {
        el.classList.remove('d-none');
    });
    const aside = document.querySelector('aside');
    aside.style.transform = 'translateX(0%)';
    aside.style.transition = 'all 0.4s ease';
});
  
document.querySelector('.close-btn').addEventListener('click', function () {
    document.querySelectorAll('.toggle-btn').forEach(function(el) {
        el.classList.remove('d-none');
    });
    document.querySelectorAll('.close-btn').forEach(function(el) {
        el.classList.add('d-none');
    });
    const aside = document.querySelector('aside');
    aside.style.transform = 'translateX(-100%)';
    aside.style.transition = 'all 0.4s ease';
});
  


// For lazy Loading 
document.addEventListener("DOMContentLoaded", function() {
    let lazyImages = document.querySelectorAll("img.lazy");
    let observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                let img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove("lazy");
                observer.unobserve(img);
            }
        });
    });

    lazyImages.forEach(img => observer.observe(img));
});