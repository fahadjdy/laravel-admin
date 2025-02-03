@extends('layout.admin.base')

@section('content')
   
    <!-- breadcrumb  -->
     <div class="d-flex justify-content-between mb-3">
        <x-breadcrumb page="Category"></x-breadcrumb>
       <a href="{{url('/admin/category/add')}}"> <x-button type="primary" > Add Category </x-button></a>
    </div>
   
    <table class="table table-striped table-hover w-100 my-2" id="tbl">
        <thead>
            <tr>
                <th scope="col" width="5%">#</th>
                <th scope="col" width="25%">Title</th>
                <th scope="col" width="45%">Description</th>
                <th scope="col" width="25%">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data will be populated here -->
        </tbody>
    </table>

    
    <script>
        $(document).ready(function() {
            $('#tbl').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: location.origin + '/admin/table-data', // Adjust the URL to your API endpoint
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                    }
                },
                columns: [
                    { data: null, render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1; // Auto-incrementing index
                    }},
                    { data: 'title' },
                    { data: 'description' , orderable: false },
                    { data: 'actions', render: function(data, type, row) {
                        return data ? data : 'No access'; // Return action field if not empty, otherwise return empty string
                    }, orderable: false}
                ],
                responsive: true,
            });
        });
    </script>
@endsection

