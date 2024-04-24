@extends('admin.layouts.app')

@section('title', 'Cutomer Support Page')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/customerSupport.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <h1 class="my-4">Customer Support</h1>

    <div class="row mb-4">
        {{-- Search bar --}}
        <div class="col-8 my-2">
            <div class="navbar-nav">
                <form action="{{ route('admin.customerSupport.search') }}" method="GET">
                    <input type="search" name="search" placeholder="Search..." class="form-control">
                </form>
            </div>
        </div>

        {{-- Filter button --}}
        <div class="col my-2">
            <div class="h4 fw-bold filter">Filtered By </div>
            <div class="dropdown" id="dropdown-status">
                <a class="btn dropdown-toggle ms-2 mb-2 montserrat rounded-pill" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  ALL
                </a>
              
                <ul class="dropdown-menu h4">
                    @foreach ($inquiry_statuses as $inquiry_status)
                        <li>
                            <form action="{{ route('admin.customerSupport.search') }}" method="GET">
                                <input type="text" name="category" value="{{ $inquiry_status->id }}"
                                    style="visibility: hidden; height:0px;">
                                <button class="dropdown-item montserrat" type="submit">{{ $inquiry_status->id }}</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

        {{-- Table of Delivery Order List --}}
        <div class="row mb-4">
            <div class="col">
                <table class="table table-hover align-middle bg-white border text-center">
                    <thead class="small table-secondary text-light">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Inquiry Type</th>
                            <th>Content</th>
                            <th>Customer</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Show All Inquiries --}}
                        @foreach ($inquiries as $inquiry)
                            <tr>
                                {{-- ID --}}
                                <td>{{ $inquiry->id }}</td>

                                {{-- Title --}}
                                <td>{{ $inquiry->title }}</td>

                                {{-- Genres --}}
                                <td>{{ $inquiry->inquiryGenre->name }}</td>

                                {{-- Content --}}
                                <td>{{ $inquiry->content }}</td>

                                {{-- Customer Name --}}
                                <td>{{ $inquiry->customer->first_name }} {{ $inquiry->customer->last_name}}</td>

                                {{-- Status --}}
                                <td>
                                    @if ($inquiry->inquiryStatus->status == 1)
                                        Unsolved
                                    @elseif ($inquiry->inquiryStatus->status == 2)
                                        Answer
                                    @elseif ($inquiry->inquiryStatus->status == 3)
                                        Solved
                                    @endif
                                </td>

                                {{-- Change Status & Delete Button --}}
                                <td>
                                    @if ($inquiry->inquiry_status_id == '1')
                                        <button class="btn btn-sm custom-button2 rounded-pill shadow montserrat" type="button" data-bs-toggle="modal" data-bs-target="#change-status-{{ $inquiry->id }}">Answer</button>
                                        @include('admin.inquiry.modal.customerStatus')
                                    @else
                                        <button class="btn btn-sm custom-button2 rounded-pill shadow montserrat" type="button" data-bs-toggle="modal" data-bs-target="#translate-status-{{ $inquiry->id }}">Answer</button>
                                        @include('admin.inquiry.modal.translateStatus')
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('admin.customerSupport.destroy', $inquiry->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        
                                        <button onclick="return confirm('Do you want to delete this inquiry?')" class="btn btn-sm custom-button3 rounded-pill shadow montserrat" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $inquiries->links() }}


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