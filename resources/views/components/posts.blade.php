<div class="p-2">
    @forelse($posts as $post)
    <div class="mb-2">
        <a href="{{route('post.show', $post->id)}}" class="underline">{{ $post->topic }}</a>
        {{ $post->created_at->diffForHumans() }}
    </div>    
    @empty
    Du verkar inte har gjort några inlägg.
    @endforelse
</div>