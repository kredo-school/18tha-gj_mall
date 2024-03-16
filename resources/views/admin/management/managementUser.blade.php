@extends('admin.layouts.app')

@section('title', 'Management User')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/management/managementUser.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="container main">
        <div class="row justify-content-center pt-2">
            <h1>Management User</h1>

            {{-- Search bar --}}
            <div class="col-8 my-2">
                <div class="navbar-nav">
                    <form action="#">
                        <input type="search" name="search" placeholder="Search..." class="form-control form-control-sm">
                    </form>
                </div>
            </div>
            {{-- Create User --}}
            <div class="col-4 mb-4">
                <button class="btn btn-sm create-button shadow montserrat" data-bs-toggle="modal" data-bs-target="#create-user-">Create User</button>
                @include('admin.management.modal.create')
            </div>

            <div class="table main">
                <table class="table table-hover align-middle border">
                    <thead class="table-secondary">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody >
                    {{-- No.1 --}}
                        <tr>
                            <td>1</td>
                            <td>John Smith</td>
                            <td>johnsmith@gmail.com</td>
                            <td>Admin</td>
                            <td>
                                <button class="btn btn-sm edit-button shadow" data-bs-toggle="modal" data-bs-target="#edit-user-">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                @include('admin.management.modal.edit')
    
                            </td>
                            <td>
                                <button class="btn btn-sm delete-button shadow" data-bs-toggle="modal" data-bs-target="#delete-user-">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                @include('admin.management.modal.delete')
                            </td>
                        </tr>
                        {{-- No.2 --}}
                        <tr>
                            <td>2</td>
                            <td>Will Smith</td>
                            <td>willsmith@gmail.com</td>
                            <td>Seller</td>
                            <td>
                                <button class="btn btn-sm shadow edit-button" data-bs-toggle="modal" data-bs-target="#edit-user-">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                @include('admin.management.modal.edit')
                            </td>
                            <td>
                                <button class="btn btn-sm delete-button shadow" data-bs-toggle="modal" data-bs-target="#delete-user-">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                @include('admin.management.modal.delete')
                            </td>
                        </tr>
                        {{-- No.3 --}}
                        <tr>
                            <td>3</td>
                            <td>Mark Twain</td>
                            <td>marktwain@gmail.com</td>
                            <td>Stuff</td>
                            <td>
                                <button class="btn btn-sm edit-button shadow" data-bs-toggle="modal" data-bs-target="#edit-user-">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                @include('admin.management.modal.edit')
    
                            </td>
                            <td>
                                <button class="btn btn-sm delete-button shadow" data-bs-toggle="modal" data-bs-target="#delete-user-">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                @include('admin.management.modal.delete')
                            </td>
                        </tr>

                        {{-- No.4 --}}
                        <tr>
                            <td>4</td>
                            <td>John F. Kennedy</td>
                            <td>john-f-kennedy@gmail.com</td>
                            <td>Translator</td>
                            <td>
                                <button class="btn btn-sm edit-button shadow" data-bs-toggle="modal" data-bs-target="#edit-user-">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                @include('admin.management.modal.edit')
    
                            </td>
                            <td>
                                <button class="btn btn-sm delete-button shadow" data-bs-toggle="modal" data-bs-target="#delete-user-">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                @include('admin.management.modal.delete')
                            </td>
                        </tr>

                        {{-- No.5 --}}
                        <tr>
                            <td>5</td>
                            <td>Sutan Sjahrir</td>
                            <td>sutan-sjahrir@gmail.com</td>
                            <td>Assessor</td>
                            <td>
                                <button class="btn btn-sm edit-button shadow" data-bs-toggle="modal" data-bs-target="#edit-user-">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                @include('admin.management.modal.edit')
    
                            </td>
                            <td>
                                <button class="btn btn-sm delete-button shadow" data-bs-toggle="modal" data-bs-target="#delete-user-">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                @include('admin.management.modal.delete')
                            </td>
                        </tr>

                        {{-- No.6 --}}
                        <tr>
                            <td>6</td>
                            <td>Taro Yamada</td>
                            <td>taroyamada@gmail.com</td>
                            <td>Delivery</td>
                            <td>
                                <button class="btn btn-sm edit-button shadow" data-bs-toggle="modal" data-bs-target="#edit-user-">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                @include('admin.management.modal.edit')
    
                            </td>
                            <td>
                                <button class="btn btn-sm delete-button shadow" data-bs-toggle="modal" data-bs-target="#delete-user-">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                @include('admin.management.modal.delete')
                            </td>
                        </tr>

                        {{-- No.7 --}}
                        <tr>
                            <td>7</td>
                            <td>Jackie Chan</td>
                            <td>jackiechan@gmail.com</td>
                            <td>User</td>
                            <td>
                                <button class="btn btn-sm edit-button shadow" data-bs-toggle="modal" data-bs-target="#edit-user-">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                @include('admin.management.modal.edit')
    
                            </td>
                            <td>
                                <button class="btn btn-sm delete-button shadow" data-bs-toggle="modal" data-bs-target="#delete-user-">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                @include('admin.management.modal.delete')
                            </td>
                        </tr>
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row my-5">
            <div class="col banner mx-auto">
                <div class="row mt-3">
                    <div class="col-auto">
                        <img src="{{ asset('images/common/Logo.png') }}" alt="gj-mall-logo" class="logo">
                    </div>
                    <div class="col">
                        <h2 class="gj-mall">GJ-MALL</h2>
                        <h4 class="sub-title">Japanese HighQuality Products E-commerce Site</h4>
                    </div>
                </div>
            </div>
        </div>
  </div>
    
@endsection