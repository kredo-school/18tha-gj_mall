@extends('layouts.app')

@section('title', 'Search Products')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
    
    @include('layouts.navbar')

    {{-- content  --}}
    <div class="container-fluid p-0" style="min-height: 100vh">
        {{-- Search Bar Header  --}}
        <div class="row align-items-center px-3" id="search_bar_header">
            @if ($results->isNotEmpty())
                <div class="col">
                    <strong class="search-header text-truncate">
                        {{ $results->firstItem() }} - {{ $results->lastItem() }} of {{ $results->total() }} results for 
                        <span id="extra-font">"{{ $search }}"</span>
                    </strong>
                </div>
            @else
                <div class="col">
                    <strong class="search-header text-truncate">Search results for "<span id="extra-font">{{ $search }}</span>"</strong>
                </div>
            @endif      
            
            <div class="col-auto d-sm-none d-md-block d-none d-sm-block">
                <div class="dropdown">
                    <button class="btn style-seet color2 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Filter by: {{ $selectedCategory ?: 'All' }} <!-- Display selected category or 'All' if none selected -->
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('search', ['category' => '', 'search_term' => $search, 'sort' => $sort]) }}">
                                All <!-- Default "All" option -->
                            </a>
                        </li>
                        @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item" href="{{ route('search', ['category' => $category->name, 'search_term' => $search, 'sort' => $sort]) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>   
            
            <div class="col-auto d-sm-none d-md-block d-none d-sm-block">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sort by: {{ $sort }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('search', ['category' => $selectedCategory, 'search_term' => $search, 'sort' => 'price_low']) }}">Price: Low to High</a></li>
                        <li><a class="dropdown-item" href="{{ route('search', ['category' => $selectedCategory, 'search_term' => $search, 'sort' => 'price_high']) }}">Price: High to Low</a></li>
                        <li><a class="dropdown-item" href="{{ route('search', ['category' => $selectedCategory, 'search_term' => $search, 'sort' => 'newest']) }}">Newest Arrivals</a></li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- Search Bar Header End --}}

        <div class="p-3">
            {{-- Search Results  --}}
            @if ($results->isNotEmpty())
                <h1 class="fw-bold">Results</h1>  
            @endif

            {{-- item --}}
            <div class="row row-cols-xxl-auto row-cols-lg-auto row-cols-md-auto row-cols-xs-1 g-3 mb-5" id="card-row">
                @forelse ($results as $item)
                    <div class="col">
                        <div class="card h-100" id="card-item">
                            @if ($item->productImage->isNotEmpty())
                                <img src="{{ asset('storage/images/items/'. $item->productImage->first()->productImages->image) }}" class="card-img-top" alt="{{ $item->name }}">
                            @else
                                <img src="{{ asset('images/items/no-image.svg') }}" alt="Product Image" class="card-img-top">
                            @endif

                            @auth
                                @if ($item->isFavorite())
                                    <form action="{{ route('favorite.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                    
                                        <button type="submit" class="btn btn-sm shadow-none p-0">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon"></i>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('favorite.store', $item->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-sm shadow-none p-0">
                                            <i class="fa-solid fa-heart position-absolute top-0 end-0 m-3 heart-icon-no-favorite"></i>
                                        </button>
                                    </form>
                                @endif
                            @endauth

                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ route('productDetail', $item->id) }}" class="text-decoration-none text-dark">
                                            <h3 class="text-truncate">{{ $item->name }}</h3>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <h4>${{ $item->price }}</h4>
                                    </div>
                                </div>
                            
                                <a href="{{ route('seller.profile', $item->seller->id ) }}" class="text-muted text-decoration-none">
                                    {{ $item->seller->last_name }}{{ $item->seller->first_name }}
                                </a>

                                <ul class="list-group list-group-horizontal align-items-center my-2">
                                    @for ($i = 0; $i < 5; $i++)
                                        <li class="list-group-item p-0 border-0">
                                            <i class="fa-solid fa-star{{ $i < $item->averageRating ? ' text-warning' : '' }}"></i>
                                        </li>
                                    @endfor
                                    <li class="list-group-item p-0 border-0">
                                        <strong>({{ $item->totalReviews }})</strong>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>   
                @empty
                    <img src="{{ asset('images/common/noResults.svg') }}" alt="No Results" class="center">
                @endforelse
            </div>

            <div class="row justify-content-center my-5">
                <div class="col-auto">
                    {{ $results->appends(['search_term' => $search, 
                                          'sort'        => $sort, 
                                          'category'    => $selectedCategory ])
                                ->links() 
                    }}
                </div>
            </div>
            {{-- Search Results End --}}
        </div>
    </div>

    @include('layouts.footer')
    {{-- content end --}}
@endsection