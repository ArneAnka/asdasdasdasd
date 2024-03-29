<x-guest-layout>
    <div class="container mx-auto">
        <div class="bg-white p-4 rounded shadow mb-5">
            <div class="mb-3">
                <h1 class="text-2xl mb-2">
                    {{ $post->topic }}
                </h1>
                <div class="text-xs">
                    Författad av {{$post->user->name}} <small>{{"@" . $post->user->nickname}}</small>
                </div>
                <div class="text-xs">
                    Inlagd {{$post->created_at->diffForHumans()}} <small>({{$post->created_at}})</small>
                </div>
            </div>

            <div class="mb-2">
                @markdown($post->body)
                <div>
                    @if($post->image)
                    <a href="{{ asset('storage/' . $post->image) }}">
                        <img class="rounded h-80 inline-block mb-3" src="{{ asset('storage/' . $post->image) }}" alt="uploaded file">
                    </a>
                    @endif
                </div>
            </div>
            <div>
                <!-- start how many likers -->
                @if($post->likers->isNotEmpty())
                <div class="mt-3">
                    <h2>Gillad av {{ $post->likers->count() }}</h2>
                    <div class="flex -space-x-1 overflow-hidden flex-wrap">
                        @foreach($post->likers as $liker)
                        <img class="h-6 w-6 rounded-full ring-2 ring-white" src="{{ $liker->avatarUrl() }}" alt="">
                        @endforeach
                    </div>
                </div>
                @endif
            </div> <!-- end how many likers -->

        </div>
        <livewire:comments :model="$post" />
    </div>
</x-guest-layout>