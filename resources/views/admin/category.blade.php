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


    
    <script>
    $(document).ready(function() {
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
                    url: '/admin/category/delete/' + categoryId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}' // Ensure CSRF protection
                    },
                    success: function(response) {
                        alert(response.success);
                        $('#categoryTable').DataTable().ajax.reload(); // Reload DataTable after deletion
                        $('#tbl').DataTable().row($(this).parents('tr')).remove().draw();
                    },
                    error: function(xhr) {
                        alert('Error deleting category. Please try again.');
                    }
                });
            }
        });

    });
</script>

@endsection

