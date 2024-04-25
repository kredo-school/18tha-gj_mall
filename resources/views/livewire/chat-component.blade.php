<div>
    @foreach ($convo as $convoItem)
        <div class="row mb-2">
            <div class="col-auto">
                @if ($convoItem['avatar'] && $convoItem['target'] == 'customer')
                    <img src="{{ asset('storage/images/customer/'. $convoItem['avatar']) }}" alt="user_avatar" class="rounded-circle" style="object-fit: cover; width: 50px; height: 50px;">
                @elseif ($convoItem['avatar'] && $convoItem['target'] == 'seller')
                    <img src="{{ asset('storage/images/sellers/'. $convoItem['avatar']) }}" alt="user_avatar" class="rounded-circle" style="object-fit: cover; width: 50px; height: 50px;">
                @else
                    <img src="{{ asset('images/customer/no_user.svg') }}" alt="user_avatar" class="rounded-5" style="object-fit: cover; width: 50px; height: 50px;">            
                @endif 
            </div>
            <div class="col-5">
                <strong class="d-block">{{ $convoItem['username'] }}</strong>
                <p class="text-wrap">{{ $convoItem['message'] }}</p>
            </div>
        </div>
    @endforeach

    <form wire:submit="submitMessage">
        <input type="text" wire:model="message" class="form-control d-inline w-50">
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>

