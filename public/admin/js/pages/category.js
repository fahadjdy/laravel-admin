$(document).ready(function () {

    
    // Common JS    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    // ****** Category Page Js *****

    $('#category-table').DataTable({
        serverSide: true,
        processing: true,
        responsive: true, 
        autoWidth: false, 
        ajax: {
            url: location.origin + '/admin/category/getAjaxCategory',
            type: 'POST',
        },
        order: [[0, 'desc']], // Default sorting by ID in DESC order
        columns: [
            { data: null, render: function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1; 
            }},
            { data: 'name', orderable: true, searchable: true }, // Category Name (sortable)
            { data: 'parent_name', orderable: true, searchable: true }, // Parent Category (sortable)
            { data: 'status', render: function(data) {
                return data ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
            }},
            { data: 'image', render: function(data) {
                return data ? `<img data-src="${location.origin}/${data}" width="50" height="50" class="lazy">` : 'N/A';
            }, orderable: false },
            { data: 'actions', orderable: false, searchable: false }
        ],
        responsive: true
    });
    
    
    

    $(document).on('click', '.delete-category', function() {
        let categoryId = $(this).data('id');
        
        if (confirm('Are you sure you want to delete this category?')) {
            $.ajax({
                url: window.location.origin + '/admin/category/delete/' + categoryId,
                type: 'DELETE',
                success: function(response) {
                    alert(response.success);
                    $('#categoryTable').DataTable().ajax.reload(); 
                    $('#category-table').DataTable().row($(this).parents('tr')).remove().draw();
                },
                error: function(xhr) {
                    alert('Error deleting category. Please try again.');
                }
            });
        }
    });



    // ***** Category Add/Edit Page Js *****

    // category content CKEEditor 
    if(typeof ClassicEditor !== 'undefined'){

        ClassicEditor
        .create(document.querySelector('#content'), {
            height: 300  // Optional: Set the height for the editor
        })
        .catch(error => {
            console.error(error);
        });
    }


    // Handle image delete
    $('.delete-image').click(function () {
        let imageId = $(this).data('id');
        let imageUrl = $(this).data('image');
        let parentDiv = $(this).closest('.position-relative');

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this image?",
            imageUrl: imageUrl,
            imageWidth: 100,
            imageHeight: 100,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: location.origin + "/admin/category/image/delete/" + imageId,
                    type: "DELETE",
                    success: function (response) {
                        Swal.fire(
                            'Deleted!',
                            'Image has been deleted.',
                            'success'
                        );
                        parentDiv.remove(); // Remove image div from UI
                    },
                    error: function () {
                        Swal.fire(
                            'Error!',
                            'Something went wrong.',
                            'error'
                        );
                    }
                });
            }
        });
    });



    $('#categoryForm').on('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        let id = $('#category_id').val();
        let url = id ? location.origin + '/admin/category/update/' + id : location.origin + '/admin/category/store';

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.fire({
                    title: 'Success!',
                    text: response.message,
                    icon: 'success',
                    showCancelButton: true,
                    cancelButtonText: 'Stay on Page',
                    confirmButtonText: 'Go to Category Listing',
                    cancelButtonColor: '#6c757d',
                    confirmButtonColor: 'var(--primary-color)',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        let redirectUrl = typeof pre !== 'undefined' ? pre : location.origin + '/admin/category';
                        window.location.href = redirectUrl;
                    } else {
                        window.location.reload();
                    }
                });

                $('#categoryForm')[0].reset();
                $('.error-message').remove(); // Clear previous errors
            },
            error: function (xhr) {
                if (xhr.status === 422) { // Laravel validation error
                    let errors = xhr.responseJSON.errors;
                    $('.error-message').remove(); // Clear previous errors

                    $.each(errors, function (key, messages) {
                        let inputField = $('[name="' + key + '"]');
                        inputField.after('<small class="text-danger error-message">' + messages[0] + '</small>');
                    });

                    Swal.fire({
                        title: 'Validation Error!',
                        text: 'Please correct the errors and try again.',
                        icon: 'error',
                        confirmButtonColor: 'var(--primary-color)'
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Something went wrong. Please try again.',
                        icon: 'error',
                        confirmButtonColor: 'var(--primary-color)'
                    });
                }
            }
        });
    });

});