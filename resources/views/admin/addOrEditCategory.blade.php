@extends('layout.admin.base')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header" style="background-color: var(--primary-color); color: var(--white-color);">
            <h4 id="formTitle">{{ isset($category) ? 'Edit Category' : 'Add Category' }}</h4>
        </div>
        <div class="card-body">
            <form id="categoryForm" enctype="multipart/form-data">
                <input type="hidden" id="category_id" name="category_id" value="{{ $category->id ?? '' }}">
                
                <div class="mb-3">
                    <label for="parent_category" class="form-label">Parent Category</label>
                    <select class="form-control" id="parent_category" name="parent_category">
                        <option value="">Select Parent Category</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ isset($category) && $category->parent_id == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name ?? '' }}" required>
                </div>

                <div class="mb-3">
                    <label for="images" class="form-label">Category Images</label>
                    <input type="file" class="form-control" id="images" name="images[]" multiple>

                    @if(isset($category) && $category->images && $category->images->count() > 0)
                        <div class="mt-2 d-flex flex-wrap">
                            @foreach($category->images as $image)
                                <div class="position-relative me-2 mb-2" style="display: inline-block; position: relative;">
                                    <img src="{{ asset($image->image_path) }}" alt="Category Image" width="100" class="border rounded">
                                    
                                    <!-- Delete Icon -->
                                    <button type="button" class="btn btn-danger btn-sm delete-image" 
                                        data-id="{{ $image->id }}" data-image="{{ asset($image->image_path) }}" 
                                        style="position: absolute; top: 5px; right: 5px; padding: 2px 6px; border-radius: 50%;">
                                        &times;
                                    </button>

                                    <br>
                                    <input type="radio" name="thumbnail" value="{{ $image->image_path }}" 
                                        {{ isset($category->thumbnail) && $category->thumbnail == $image->image_path ? 'checked' : '' }}>
                                    <small>Select as Thumbnail</small>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>



                
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="1" {{ isset($category) && $category->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ isset($category) && $category->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea id="content" name="content" class="form-control">{{ $category->content ?? '' }}</textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">{{ isset($category) ? 'Update' : 'Save' }}</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    $(document).ready(function () {
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
                        url: "{{ url('/admin/category/image/delete') }}/" + imageId,
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
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
