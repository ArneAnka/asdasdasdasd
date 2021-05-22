<x-guest-layout>
    <div class="container mx-auto">
        <div class="bg-white p-4 rounded shadow mb-5">
            <div class="mb-3">
                <h1 class="text-2xl mb-2 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z" />
                    </svg>
                    {{$urls->topic}}
                </h1>
                <div class="text-xs">
                    Författad av {{$urls->user->name}} <small>{{"@" . $urls->user->nickname}}</small>
                </div>
                <div class="text-xs">
                    Inlagd {{$urls->created_at->diffForHumans()}} <small>({{$urls->created_at}})</small>
                </div>
            </div>

            <div class="">
                <a class="underline text-indigo-500" href="{{ $urls->url }}">{{ $urls->url }}</a>
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