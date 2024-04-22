@extends('layouts.app')

@section('title', 'Live Chat')

@section('content')
    @include('layouts.navbar')

    <div class="container p-3">   
        <h1 class="h3 mb-3"># {{ $product->name }}</span></h1>

        <div>
            @livewire('chat-component', 
                    ['product_id' => $product->id, 
                     'user_id'    => $user_id ?? null,
                     'seller_id'  => $product->seller_id
                    ]
            )
        </div>
    </div>
@endsection
