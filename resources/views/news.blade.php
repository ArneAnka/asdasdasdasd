<x-guest-layout>
    <div class="container mx-auto">
        <div class="bg-white p-4 rounded shadow mb-5">
            <div class="border-b">
                @markdown($news->topic)
                <a class="underline text-indigo-500" href="{{ $news->url }}">{{ $news->url }}</a>
            </div>
            <div>
                Författad av bot
            </div>
            <div>
                Inlagd {{$news->created_at->diffForHumans()}} <small>({{$news->created_at}})</small>
            </div>
            <div>
                <!-- start how many likers -->
                @if($news->likers->isNotEmpty())
                <div class="mt-3">
                    <h2>Gillad av {{ $news->likers->count() }}</h2>
                    <div class="flex -space-x-1 overflow-hidden flex-wrap">
                        @foreach($news->likers as $liker)
                        <img class="h-6 w-6 rounded-full ring-2 ring-white" src="{{ $liker->avatarUrl() }}" alt="">
                        @endforeach
                    </div>
                </div>
                @endif
            </div> <!-- end how many likers -->
        </div>
        <livewire:comments :model="$news" />
    </div>
</x-guest-layout>