

$(document).ready(function () {
 // Common JS    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});


// ****** Profile Page Js [Start] ******
let profileIcon = document.getElementById('profile-icon');
let profileFile = document.getElementById('profile-file');
let profileImg = document.getElementById('profile-img');

profileIcon.addEventListener('click', function () {
    profileFile.click();
});

profileFile.addEventListener('change', function () {
    if (this.files && this.files[0]) {
        let file = this.files[0];
        let allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];

        // Check if the selected file is a valid image type
        if (!allowedTypes.includes(file.type)) {
            Swal.fire({
                icon: 'error',
                title: 'Invalid File Type!',
                text: 'Please select a valid image file (JPEG, PNG, JPG, GIF).',
            });
            return; // Stop execution if invalid file type
        }

        var formData = new FormData();
        formData.append('logo', file);

        fetch(location.origin + '/admin/profile/site-detail/logo/save', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                profileImg.src = data.image;
                Swal.fire({
                    icon: 'success',
                    title: 'Logo Updated!',
                    text: 'Your profile logo has been updated successfully.',
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Upload Failed!',
                    text: data.message,
                });
            }
        })
        .catch(error => console.error('Error:', error));
    }
});

// ****** Profile Page Js [End] ******



// ****** Bio Data Js [Start] ******

    ClassicEditor
    .create(document.querySelector('#address'), {
        height: 300  // Optional: Set the height for the editor
    })
    .catch(error => {
        console.error(error);
    });

    // Save Profile Data via AJAX
    $('#bio-save-btn').click(function(e) {
        e.preventDefault(); // Prevent default form submission

        $('.admin-name span').text($('#bio-name').val());    
        $('.admin-name p').text($('#bio-slogan').val());    

        let formData = $('#bioDataForm').serialize(); // Get form data

        $.ajax({
            url: location.origin + "/admin/profile/bio-data/save",
            type: "POST",
            data: formData,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Profile Updated!',
                        text: response.message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: response.message
                    });
                }
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Failed!',
                    text: 'Something went wrong. Please try again.'
                });
            }
        });
    });
// ****** Bio Data Js [End] ******



// ****** Site Detail Js [Start] ******

    let faviconIcon = document.getElementById('favicon-icon');
    let faviconFile = document.getElementById('favicon-file');
    let faviconImg = document.getElementById('favicon-img');

    faviconIcon.addEventListener('click', function () {
        faviconFile.click();
    });

    faviconFile.addEventListener('change', function () {
        if (this.files && this.files[0]) {
            let file = this.files[0];
            let allowedTypes = ['image/x-icon', 'image/png', 'image/svg+xml'];

            // Check if the selected file is a valid favicon type
            if (!allowedTypes.includes(file.type)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid File Type!',
                    text: 'Please select a valid favicon file (ICO, PNG, SVG).',
                });
                return;
            }

            var formData = new FormData();
            formData.append('favicon', file);

            fetch(location.origin + '/admin/profile/site-detail/favicon/save', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    faviconImg.src = data.image;
                    Swal.fire({
                        icon: 'success',
                        title: 'Favicon Updated!',
                        text: 'Your favicon has been updated successfully.',
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Upload Failed!',
                        text: data.message,
                    });
                }
            })
            .catch(error => console.error('Error:', error));
        }
    });

  
    // ******** About Image ********
    let aboutImgIcon = document.getElementById('about-img-icon');
    let aboutImgFile = document.getElementById('about-img-file');
    let aboutImg = document.getElementById('about_img');
    
    aboutImgIcon.addEventListener('click', function () {
        aboutImgFile.click();
    });
    
    aboutImgFile.addEventListener('change', function () {
        if (this.files && this.files[0]) {
            let file = this.files[0];
            let allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
    
            // Check if the selected file is a valid image type
            if (!allowedTypes.includes(file.type)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid File Type!',
                    text: 'Please select a valid image file (JPG, PNG, WEBP).',
                });
                return;
            }
    
            var formData = new FormData();
            formData.append('about_image', file);
    
            fetch(location.origin + '/admin/profile/site-detail/about_image/save', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    aboutImg.src = data.image;
                    Swal.fire({
                        icon: 'success',
                        title: 'Image Updated!',
                        text: 'Your about image has been updated successfully.',
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Upload Failed!',
                        text: data.message,
                    });
                }
            })
            .catch(error => console.error('Error:', error));
        }
    });
    




    $('#siteDetailsForm').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
            type: 'POST',
            url: url,
            data: form.serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                Swal.fire({
                    title: "Success!",
                    text: "Site Details updated successfully!",
                    icon: "success"
                });
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: "Error!",
                    text: "There was an error updating the site Details.",
                    icon: "error"
                });
            }
        });
    });
    
// ****** Site Detail Js [End] ******





// ****** Social Media Js [Start] ******

    let socialMediaTable = $('#social-media-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true, 
        autoWidth: false, 
        ajax: location.origin + '/admin/profile/social-media/getAjaxSocialMedia',
        columns: [
            { data: 'id' },
            { data: 'icon', orderable: false, searchable: false },
            { data: 'name' },
            { data: 'link', orderable: false },
            { data: 'actions', orderable: false, searchable: false }
        ]
    });

    $('#save-social').click(function() {
        let id = $('#social-id').val();
        let data = {
            icon: $('#social-icon').val(),
            name: $('#social-name').val(),
            link: $('#social-link').val()
        };
        let url = id ? location.origin + `/admin/profile/social-media/update/${id}` : location.origin + "/admin/profile/social-media/store";
    
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(response) {
                $('#socialMediaModal').modal('hide');
                $('#social-id').val('');
                $('#social-icon, #social-name, #social-link').val('');
                socialMediaTable.ajax.reload(null, false);
                Swal.fire('Success', response.message, 'success');
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $('.error-message').remove();
    
                    $.each(errors, function(key, message) {
                        let input = $('#social-' + key);
                        input.after('<small class="text-danger error-message">' + message[0] + '</small></br>');
                    });
    
                } else {
                    Swal.fire('Error!', 'Something went wrong. Please try again.', 'error');
                }
            }
        });
    });
    

    $(document).on('click', '.delete-social', function () {
        let id = $(this).data('id');
        if (confirm('Are you sure you want to delete this record?')) {
            $.ajax({
                url: location.origin + `/admin/profile/social-media/delete/${id}`,
                type: 'DELETE',
                success: function (response) {
                    socialMediaTable.ajax.reload(null, false); 
                },
                error: function (xhr) {
                    alert('Something went wrong! Please try again.');
                }
            });
        }
    });


    $(document).on('click', '.add-social-media', function () {
        $('#social-icon').val(''); 
        $('#social-name').val('');
        $('#social-link').val('');    
    })

    $(document).on('click', '.edit-social', function () {
        let id = $(this).data('id');
        let row = $(this).closest('tr');

        // Get values from row
        let icon = row.find('td:eq(1) i').attr('class'); // Extract icon class from <i>
        let name = row.find('td:eq(2)').text().trim();
        let link = row.find('td:eq(3) a').attr('href');

        // Fill modal form inputs
        $('#social-id').val(id);
        $('#social-icon').val(icon);
        $('#social-name').val(name);
        $('#social-link').val(link);

        // Show modal
        $('#socialMediaModal').modal('show');
    });

// ****** Social Media Js [End] ******



// Change Password 
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("changePasswordForm");

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        let oldPassword = document.getElementById("oldPassword").value.trim();
        let newPassword = document.getElementById("newPassword").value.trim();
        let confirmPassword = document.getElementById("confirmPassword").value.trim();

        // Basic validation
        if (!oldPassword || !newPassword || !confirmPassword) {
            alert("All fields are required.");
            return;
        }

        if (newPassword.length < 6) {
            alert("New password must be at least 6 characters long.");
            return;
        }

        if (newPassword !== confirmPassword) {
            alert("New password and confirm password do not match.");
            return;
        }

        // Prepare data for AJAX request
        let formData = new FormData();
        formData.append("oldPassword", oldPassword);
        formData.append("newPassword", newPassword);

        fetch("/admin/profile/change-password", {
            method: "POST",
            body: formData,
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Password changed successfully.");
                form.reset();
            } else {
                createToast(
                    {
                         status : "fail", 
                         icon : 'fa fa-cros', 
                         title : 'Fail', 
                         message : data.message, 
                         duration :3000 }
                );

            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("An unexpected error occurred.");
        });
    });
});
