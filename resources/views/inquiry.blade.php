@extends('layouts.app')

@section('title', 'Inquiry')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @include('layouts.navbar')

    {{-- content  --}}
    <div class="container-fluid bg-white">        
        {{-- welcome banner  --}}
        <div class="row mb-3" id="welcome_banner">
            <div class="col-1"></div>
            <div class="col pt-4">
                <h1>FAQ</h1>
                <p class="fs-4">How can I help you ?</p>
            </div>
        </div>
        {{-- welcome banner end --}}

        {{-- most asked questions  --}}
        <div class="row mb-5">
            <div class="col px-5">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Most asked questions #1
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt placeat mollitia minus quo saepe distinctio itaque voluptate fugit et, ducimus inventore aliquam voluptatibus asperiores dicta animi expedita, reprehenderit ratione doloribus!</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            Most asked questions #2
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt placeat mollitia minus quo saepe distinctio itaque voluptate fugit et, ducimus inventore aliquam voluptatibus asperiores dicta animi expedita, reprehenderit ratione doloribus!</p>                                
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            Most asked questions #3
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt placeat mollitia minus quo saepe distinctio itaque voluptate fugit et, ducimus inventore aliquam voluptatibus asperiores dicta animi expedita, reprehenderit ratione doloribus!</p>                                
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            Most asked questions #4
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt placeat mollitia minus quo saepe distinctio itaque voluptate fugit et, ducimus inventore aliquam voluptatibus asperiores dicta animi expedita, reprehenderit ratione doloribus!</p>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- most asked questions end --}}

        {{-- Inquiry Form --}}
        <div class="row">
            <div class="col px-5">
                <h3 class="h1 fw-bold mb-3">Get In Touch With Me!</h3>

                <form action="" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title" autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="inquiry_type" class="form-label">Inquiry Type</label>
                        {{-- Todo: Fix this part when we create back-end --}}
                        <select name="inquiry_type" id="inquiry_type" class="form-select">
                            <option value="" hidden>Select Inquiry Type</option>
                            <option value="">Value1</option>
                            <option value="">Value2</option>
                            <option value="">Value3</option>
                            <option value="">Value4</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content" id="content" rows="5" class="form-control" placeholder="Description your issue "></textarea>
                    </div>
                </form>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn create-button">
                        Send a message
                    </button>
                </div>
            </div>
        </div>
        {{-- Inquiry Form end --}}
        
    </div>
    {{-- content end --}}

    @include('layouts.footer')
@endsection