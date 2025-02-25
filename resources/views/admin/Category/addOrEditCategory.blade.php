@extends('layout.admin.base')

@section('content')

<!-- breadcrumb  -->
<div class="d-flex justify-content-between mb-3">
    <x-breadcrumb page="Category | Edit"></x-breadcrumb>
</div>

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
                <input type="text" class="form-control" id="name" maxlength="60" name="name" value="{{ $category->name ?? '' }}" required>
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



@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <script src="{{asset('admin/js/pages/category.js')}}"></script>
@endsection