<div class="mb-3 @if(!$notification->read_at) bg-yellow-100 @endif">
    <div class="underline">
        {{ $notification->created_at }} ({{ $notification->created_at->diffForHumans() }})
    </div>
    <div>
        Ny användare registrerad
        <div>
            <strong>Namn:</strong> {{ $notification->data['name'] }}
        </div>
        <div>
            <strong>Nickname:</strong> {{ $notification->data['nickname'] }}
        </div>
        <div>
            <strong>Email:</strong> {{ $notification->data['email'] }}
        </div>
    </div>
</div>