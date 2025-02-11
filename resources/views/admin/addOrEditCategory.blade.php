@extends('layout.admin.base')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header" style="background-color: var(--primary-color); color: var(--white-color);">
            <h4 id="formTitle">Add Category</h4>
        </div>
        <div class="card-body">
            <form id="categoryForm" enctype="multipart/form-data">
                <input type="hidden" id="category_id" name="category_id">
                
                <div class="mb-3">
                    <label for="parent_category" class="form-label">Parent Category</label>
                    <select class="form-control" id="parent_category" name="parent_category">
                        <option value="">Select Parent Category</option>
                        @foreach($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Category Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea id="content" name="content" class="form-control"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        tinymce.init({
            selector: '#content',
            height: 300
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
                        confirmButtonColor: 'var(--primary-color)'
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
</script>
@endsection
