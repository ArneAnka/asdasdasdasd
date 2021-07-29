<div class="mb-3 @if(!$notification->read_at) bg-yellow-100 @endif">
    <div class="underline">
        {{ $notification->created_at }} ({{ $notification->created_at->diffForHumans() }})
    </div>
    <div>
        Kommentar på "<a class="underline" href="{{ route(strtolower($notification->data['type']) . '.show', $notification->data['id']) }}">{{ $notification->data['topic'] }}</a>".
    </div>
</div>