$(document).ready(function () {

    
    // Common JS    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    // ****** Category Page Js *****

    $('#tbl').DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            url: location.origin + '/admin/category/getAjaxCategory',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            }
        },
        columns: [
            { data: null, render: function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1; 
            }},
            { data: 'name' },
            { data: 'parent_name', defaultContent: 'None' }, 
            { data: 'status', render: function(data) {
                return data ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
            }},
            { data: 'image', render: function(data) {
                return data ? `<img src="${location.origin}/${data}" width="50" height="50">` : 'No Image';
            }, orderable: false },
            { data: 'actions', orderable: false, searchable: false }
        ],
        responsive: true,
    });

    $(document).on('click', '.delete-category', function() {
        let categoryId = $(this).data('id');
        
        if (confirm('Are you sure you want to delete this category?')) {
            $.ajax({
                url: window.localtion.origin + '/admin/category/delete/' + categoryId,
                type: 'DELETE',
                success: function(response) {
                    alert(response.success);
                    $('#categoryTable').DataTable().ajax.reload(); 
                    $('#tbl').DataTable().row($(this).parents('tr')).remove().draw();
                },
                error: function(xhr) {
                    alert('Error deleting category. Please try again.');
                }
            });
        }
    });



    // ***** Category Add/Edit Page Js *****


    // category content CKEEditor 
    ClassicEditor
        .create(document.querySelector('#content'), {
            height: 300  // Optional: Set the height for the editor
        })
        .catch(error => {
            console.error(error);
        });


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
                    reverseButtons: true // This ensures "Go to Category Listing" is on the right
                }).then((result) => {
                    if (result.isConfirmed) {
                        let redirectUrl = typeof pre !== 'undefined' ? pre : location.origin + '/admin/category';
                        window.location.href = redirectUrl;
                    }else{
                        window.location.reload();
                    }
                });
                
                $('#categoryForm')[0].reset();
            },
            error: function (xhr) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong!',
                    icon: 'error',
                    confirmButtonColor: 'var(--primary-color)'
                });
            }
        });
    });
});