<x-guest-layout>
    <div class="container mx-auto">
        <div class="bg-white p-4 rounded shadow mb-5">
            <div class="border-b">
                @markdown($urls->topic)
                <a class="underline text-indigo-500" href="{{ $urls->url }}">{{ $urls->url }}</a>
            </div>
            <div>
                Författad av {{$urls->user->name}} <small>{{"@" . $urls->user->nickname}}</small>
            </div>
            <div>
                Inlagd {{$urls->created_at->diffForHumans()}} <small>({{$urls->created_at}})</small>
            </div>
            <div>
                <!-- start how many likers -->
                @if($urls->likers->isNotEmpty())
                <div class="mt-3">
                    <h2>Gillad av {{ $urls->likers->count() }}</h2>
                    <div class="flex -space-x-1 overflow-hidden flex-wrap">
                        @foreach($urls->likers as $liker)
                        <img class="h-6 w-6 rounded-full ring-2 ring-white" src="{{ $liker->avatarUrl() }}" alt="">
                        @endforeach
                    </div>
                </div>
                @endif
            </div> <!-- end how many likers -->
        </div>
        <livewire:comments :model="$urls" />
    </div>
</x-guest-layout>