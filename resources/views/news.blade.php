<x-guest-layout>
    <div class="container mx-auto">
        <div class="grid grid-rows md:grid-cols-3 gap-4 pb-2">
            <div class="bg-white p-4 rounded shadow md:col-span-2">
                <div class="">
                    <h1 class="text-2xl mb-2">
                        <svg class="inline-block" xmlns=" http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z" />
                        </svg>
                        {{$news->topic}}
                    </h1>
                    <div class="text-xs">
                        Författad av <small>bot</small>
                    </div>
                    <div class="text-xs">
                        Inlagd {{$news->created_at->diffForHumans()}} <small>({{$news->created_at}})</small>
                    </div>
                </div>
                <div class="flex items-center">
                    <a class="underline text-indigo-500 break-all" href="{{ $news->url }}">{{ $news->url }}</a>
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
            <div class="bg-white p-4 rounded shadow">
                <h1 class="text-2xl">Relaterat</h1>
                @forelse($news->similar as $similar)
                <div>
                    <p><a class="underline" href="{{route('news.show', $similar)}}">{{ $similar->topic }}</a> <small>({{ $similar->created_at->diffForHumans() }})</small></p>
                </div>
                @empty
                <p>Inget relaterat.</p>
                @endcan
            </div>
        </div>

        <livewire:comments :model="$news" />
    </div>
</x-guest-layout>