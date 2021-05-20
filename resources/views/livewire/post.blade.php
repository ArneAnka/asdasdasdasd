<div class="flex mx-0 md:mx-auto my-0">
    <!--horizantil margin is just for display-->
    <div class="flex items-start px-0 py-4">
        <img class="hidden md:block w-12 h-12 rounded-full object-cover mr-4 shadow" src="{{ $collection->user->profile_photo_url }}" alt="avatar">
        <div class="">

            <div>
                <a href="{{route('post.show', $collection)}}">{{$collection->topic}}</a>
            </div>
            <div>
                <p class="mt-3 text-gray-700 text-sm">
                    @if($isEditing)
                <form wire:submit.prevent="editPost" class="">
                    <x-slot name="title">Ändra post</x-slot>
                    <x-input.textarea :error="$errors->first('editState.body')" wire:model.lazy="editState.body" id="body" placeholder="" />
                    @error('editState.body') <span class="text-red-500">{{ $message }}</span> @enderror
                    <x-button.primary type="submit" class="mt-3">
                        Ändra
                    </x-button.primary>
                </form>
                @else
                @markdown($collection->body)
                @endif
                </p>
                @if($collection->image)
                <img class="rounded-lg shadow h-80 mt-8" src="{{ asset('storage/' . $collection->image) }}" alt="uploaded file">
                @endif
            </div>
            <div>
                <!-- Vem är det som lagt in den -->
                Inlagd {{ $collection->created_at }} ({{ $collection->created_at->diffForhumans() }}), av
                <span class="text-gray-900 -mt-1 inline-flex items-center justify-between">
                    {{ $collection->user->name }}
                    @if($collection->user->is_verified)
                    <svg class="text-blue-500 fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                        <g>
                            <rect fill="none" height="24" width="24" />
                        </g>
                        <g>
                            <g>
                                <path d="M23,11.99l-2.44-2.79l0.34-3.69l-3.61-0.82L15.4,1.5L12,2.96L8.6,1.5L6.71,4.69L3.1,5.5L3.44,9.2L1,11.99l2.44,2.79 l-0.34,3.7l3.61,0.82L8.6,22.5l3.4-1.47l3.4,1.46l1.89-3.19l3.61-0.82l-0.34-3.69L23,11.99z M19.05,13.47l-0.56,0.65l0.08,0.85 l0.18,1.95l-1.9,0.43l-0.84,0.19l-0.44,0.74l-0.99,1.68l-1.78-0.77L12,18.85l-0.79,0.34l-1.78,0.77l-0.99-1.67l-0.44-0.74 l-0.84-0.19l-1.9-0.43l0.18-1.96l0.08-0.85l-0.56-0.65l-1.29-1.47l1.29-1.48l0.56-0.65L5.43,9.01L5.25,7.07l1.9-0.43l0.84-0.19 l0.44-0.74l0.99-1.68l1.78,0.77L12,5.14l0.79-0.34l1.78-0.77l0.99,1.68l0.44,0.74l0.84,0.19l1.9,0.43l-0.18,1.95l-0.08,0.85 l0.56,0.65l1.29,1.47L19.05,13.47z" />
                                <polygon points="10.09,13.75 7.77,11.42 6.29,12.91 10.09,16.72 17.43,9.36 15.95,7.87" />
                            </g>
                        </g>
                    </svg>
                    @endif
                    &nbsp;<small class="text-gray-400">{{ "@" . $collection->user->nickname }}</small>
                    &nbsp;
                </span>
            </div>

            <div class="flex items-center">
                <div class="flex mr-2 text-gray-700 text-sm mr-3">
                    <a wire:click.prevent="storeLike" href="#" class="inline-flex items-center @if($collection->user_has_liked) text-red-500 @endif">
                        <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </a>
                    <span>{{ $collection->likes()->count() }}</span>
                </div>
                <div class="flex mr-2 text-gray-700 text-sm mr-3">
                    <a href="{{ route('post.show', $collection) }}" class="inline-flex items-center">
                        <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                        </svg>
                        <span>{{ $collection->comments()->count() }}</span>
                    </a>
                </div>
                @can('delete', $collection)
                <div class="flex mr-2 text-gray-700 text-sm mr-8">
                    <span>
                        <a class="underline" href="#/" x-on:click="confirmPostDeletion" x-data="{
                            confirmPostDeletion () {
                                if(window.confirm('Säker?')){
                                    @this.call('deletePost')
                            }
                        }
                    }">Radera post</a>
                    </span>
                </div>
                @endcan
                @can('update', $collection)
                <div class="flex mr-2 text-gray-700 text-sm mr-8">
                    <span><a wire:click.prevent="$toggle('isEditing')" class="underline" href="#">Ändra post</a></span>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>