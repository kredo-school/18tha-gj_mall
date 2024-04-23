@extends('admin.layouts.app')

@section('title', 'Management User')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/management/managementUser.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <h1 class="my-4">Management User</h1>

    <div class="row mb-4">
        {{-- Search bar --}}
        <div class="col-8 my-2">
            <form action="{{ route('admin.managementUser.search') }}">
                <input type="search" name="search" placeholder="Search..." class="form-control">
            </form>
        </div>
        {{-- Create User --}}
        <div class="col mt-2">
            <button class="btn custom-button shadow w-100 montserrat" data-bs-toggle="modal" data-bs-target="#create-user">Create User</button>
            @include('admin.management.modal.create')
        </div>
    </div>

    <div class="row mb-4">
        <div class="col">
            <table class="table table-hover align-middle border text-center">
                <thead class="small table-secondary text-light">
                    <tr>
                        <th>ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Role</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody >
                    {{-- Show all Admins --}}
                    @foreach ($admins as $admin)
                        <tr>
                            {{-- ID --}}
                            <td>{{ $admin->id }}</td>

                            {{-- first name --}}
                            <td>{{ $admin->first_name }}</td>

                            {{-- last name --}}
                            <td>{{ $admin->last_name }}</td>

                            {{-- email --}}
                            <td>{{ $admin->email }}</td>

                            {{-- phone number --}}
                            <td>{{ $admin->phone_number }}</td>

                            {{-- role --}}
                            <td>
                                @if ($admin->role == 1)
                                    Admin
                                @elseif ($admin->role == 2)
                                    Stuff
                                @elseif ($admin->role == 3)
                                    Translator
                                @elseif ($admin->role == 4)
                                    Assessor
                                @elseif ($admin->role == 5)
                                    Delivery
                                @endif
                            </td>

                            {{-- Edit & Delete Button --}}
                            <td>
                                <button class="btn text-decoration-none edit-icon" data-bs-toggle="modal" type="button" data-bs-target="#edit-user-{{ $admin->id }}">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                                @include('admin.management.modal.edit')
        
                                <button class="btn btn-sm delete-icon" data-bs-toggle="modal" type="button" data-bs-target="#delete-user-{{ $admin->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                @include('admin.management.modal.delete')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    {{ $admins->links() }}


    <div class="row banner mx-1">
        <div class="col-auto p-0">
            <img src="{{ asset('images/common/logo.svg') }}" alt="gj-mall-logo" class="logo">

        </div>
        <div class="col pt-4">
            <h3 class="gj-mall">GJ-MALL</h3>
            <h4 class="sub-title">Japanese HighQuality Products E-commerce Site</h4>
        </div>
    </div>

@endsection