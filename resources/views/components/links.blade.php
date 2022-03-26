<div class="p-2">
    @forelse($urls as $url)
    <div class="mb-2">
        <a href="{{route('url.show', $url->id)}}" class="underline">{{ $url->topic }}</a>
        {{ $url->created_at->diffForHumans() }}
    </div>    
    @empty
        Du verkar inte har lagt till några länkar.
    @endforelse
</div>