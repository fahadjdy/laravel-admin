

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

        fetch('/admin/profile/logo/save', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
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

// ****** Site Detail Js [End] ******





// ****** Social Media Js [Start] ******

    let socialMediaTable = $('#social-media-table').DataTable({
        processing: true,
        serverSide: true,
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
        let data = { icon: $('#social-icon').val(), name: $('#social-name').val(), link: $('#social-link').val() };
        let url = id ? location.origin + `/admin/profile/social-media/update/${id}` :  location.origin + "/admin/profile/social-media/store";

        $.post(url, data, function(response) {
            $('#socialMediaModal').modal('hide'); 
            $('#social-id').val(''); 
            $('#social-icon, #social-name, #social-link').val(''); 
            socialMediaTable.ajax.reload(null, false); 
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