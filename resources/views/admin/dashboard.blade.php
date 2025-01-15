@extends('layout.admin.base')

@section('content')
    

    <x-breadcrumb page="User"></x-breadcrumb>

    <h2>Welcome to the Admin Panel</h2>
    <p>Manage your dashboard, users, and settings here.</p>
    <button class=" btn btn-primary"> <i class="fa fa-plus"></i>Add  </button>
    <button class=" btn btn-secondary"> <i class="fa fa-pen"></i>Edit </button>
    <button class=" btn btn-danger"> <i class="fa fa-trash"></i>Delete </button>
    
    <i class="fa fa-plus btn-primary"></i>
    <i class="fa fa-pen btn-secondary"></i>
    <i class="fa fa-trash btn-danger"></i>
@endsection

