<div>
    <div class="">
        <div class="">
            <img class="w-5 h-5 inline" src="{{ asset("storage/images/" . $collection->site . "-favicon.png") }}" alt="">
            @if($this->collection->sticky)
            <span class="bg-yellow-300 text-black p-1 rounded  leading-none inline-block">
                Klistrad
            </span>
            @endif
            <a class="text-lg underline" href="{{ $collection->url }}">{{ $collection->topic }}</a> <span>({{ $collection->site }})</span>
        </div>
        <div>
            <!-- Vem är det som lagt in den -->
            Inlagd {{ $collection->created_at }} ({{ $collection->created_at->diffForHumans() }})
        </div>
    </div>
    <div class="mt-0 flex items-center">
        <div class="flex mr-2 text-gray-700 text-sm mr-3">
            <a href="#" wire:click.prevent="storeLike" class="inline-flex items-center @if($collection->user_has_liked) text-red-500 @endif">
                <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </a>
            <span>{{ $collection->likes()->count() }}</span>
        </div>
        <div class="flex mr-2 text-gray-700 text-sm mr-8">
            <a href="{{ route('news.show', $collection->id) }}" class="inline-flex items-center">
                <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                </svg>
            </a>
            <span>{{ $collection->comments()->count() }}</span>
        </div>
        @can('delete', $collection)
        <div class="flex mr-2 text-gray-700 text-sm mr-8">
            <span>
                <a class="underline" href="#/" x-on:click="confirmNewsDeletion" x-data="{
                            confirmNewsDeletion () {
                                if(window.confirm('Säker?')){
                                    @this.call('deleteNews')
                            }
                        }
                    }">Radera nyhet</a>
            </span>
        </div>
        @endcan
        @can('update', $collection)
        <div class="flex mr-2 text-gray-700 text-sm mr-8">
            <span>
                <a class="underline" href="#/" wire:click.prevent="stickyNews">Klistra nyhet</a>
            </span>
        </div>
        @endcan
    </div>
</div>