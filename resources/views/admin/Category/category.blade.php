@extends('layout.admin.base')

@section('content')
   
    <!-- breadcrumb  -->
     <div class="d-flex justify-content-between mb-3">
        <x-breadcrumb page="Category"></x-breadcrumb>
       <a href="{{url('/admin/category/add')}}"> <x-button type="primary" > Add Category </x-button></a>
    </div>
   
    <table class="table display nowrap table-responsive table-striped table-hover my-2" id="category-table">
        <thead>
            <tr>
                <th scope="col" width="5%">#</th>
                <th scope="col" width="20%">Category Name</th>
                <th scope="col" width="15%">Parent Category</th>
                <th scope="col" width="10%">Status</th>
                <th scope="col" width="20%">Image</th>
                <th scope="col" width="30%">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data will be populated here dynamically -->
        </tbody>
    </table>
@endsection

@section('js')
    <script src="{{asset('admin/js/pages/category.js')}}"></script>
@endsection