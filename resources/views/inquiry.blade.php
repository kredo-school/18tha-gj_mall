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
                <h1 class="my-3">Most Asked Questions</h1>
                @forelse ($inquiries as $inquiry)
                    <div class="accordion" id="accordionPanels">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-panel{{ $inquiry->id }}" aria-expanded="false" aria-controls="accordion-panel{{ $inquiry->id }}">
                                    {{ $inquiry->title }}
                                </button>
                            </h2>
                            <div id="accordion-panel{{ $inquiry->id }}" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <p class="lead text-break">{{ $inquiry->content }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div>
                        <p class="fs-4">No results found.</p>
                    </div>
                @endforelse
            </div>
        </div>
        {{-- most asked questions end --}}


        {{-- Inquiry Form --}}
            <div class="row">
                <div class="col px-5">
                    <h1 class="mb-3">Get In Touch With Me!</h1>

                    <form action="{{ route('inquiry.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Title" autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="inquiry_genre" class="form-label">Inquiry Genre</label>

                            <select name="inquiry_genre" id="inquiry_genre" class="form-select">
                                <option value="" hidden>Select Inquiry Genre</option>

                                @foreach ($inquiry_genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                    {{-- error message area --}}
                                    @error('genre')
                                        <p class="text-danger small">{{ $message }}</p>
                                    @enderror
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" id="content" rows="5" class="form-control" placeholder="Description your issue "></textarea>
                        </div>

                        @if ( Auth::id() )
                            <div class="mb-3 text-center">
                                <button type="submit" class="btn create-button">
                                    Send a message
                                </button>
                            </div>
                        @else
                            <div class="mb-3 text-center">
                                <p class="text-danger small mb-1">Please Sign-in first.</p>
                                <button type="submit" class="btn create-button" disabled>
                                    Send a message
                                </button>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        {{-- Inquiry Form end --}}
        
    </div>
    {{-- content end --}}

    @include('layouts.footer')
@endsection