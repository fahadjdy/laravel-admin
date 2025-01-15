@extends('layout.admin.base')

@section('content')
    

    <!-- breadcrumb  -->
    <x-breadcrumb page="User"></x-breadcrumb>


    <br>
    <br>
    <br>


    
    <h2>Welcome to the Admin Panel</h2>
    <p>Manage your dashboard, users, and settings here.</p>


    <br>
    <br>
    <br>


    <!-- buttons  -->
    <button class=" btn btn-primary"> <i class="fa fa-plus"></i>Add  </button>
    <button class=" btn btn-secondary"> <i class="fa fa-pen"></i>Edit </button>
    <button class=" btn btn-danger"> <i class="fa fa-trash"></i>Delete </button>


    <br>
    <br>
    <br>

    <!-- icons -->
    <i class="fa fa-plus btn-primary"></i>
    <i class="fa fa-pen btn-secondary"></i>
    <i class="fa fa-trash btn-danger"></i>


    <br>
    <br>
    <br>

    <table class="table table-striped table-bordered table-hover w-100" id="tbl">
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tbl').DataTable({
                serverSide: true,
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
                    { data: 'description' },
                    { data: 'actions', render: function(data, type, row) {
                        return data ? data : 'No access'; // Return action field if not empty, otherwise return empty string
                    }}
                ],
                responsive: true // Make the table responsive
            });
        });
    </script>

<!-- Start Generation Here -->
<style>
  
    #tbl tbody tr:hover {
        background-color: var(--light-color);
        color: var(--dark-color);
    }
</style>
<!-- End Generation Here -->
@endsection

