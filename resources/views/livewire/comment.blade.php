<div>
    <div class="flex">
        <div class="flex-shrink-0 mr-4">
            <img class="h-10 w-10 rounded-full" src="{{ $comment->user->avatarUrl() }}" alt="{{ $comment->user->name }}">
        </div>
        <div class="flex-grow">
            <div>
                <a href="#/" class="font-medium text-gray-900">{{ $comment->user->name }} <small>{{ "@" . $comment->user->nickname }}</small></a>
            </div>
            <div class="mt-1 flex-grow w-full">
                @if($isEditing)
                <form wire:submit.prevent="editComment" class="mb-2">
                    <div>
                        <label for="comment" class="sr-only">Comment body</label>
                        <x-input.textarea wire:model.defer="editState.body" id="editState.body" placeholder="Skriv ditt inlägg" />
                        @error('editState.body')
                        <span class="mt-2 text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-3 flex items-center justify-between">
                        <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Ändra
                        </button>
                    </div>
                </form>
                @else
                <p class="text-gray-700">{{ $comment->body }}</p>
                @endif
            </div>
            <div class="mt-2 space-x-2">
                <span class="text-gray-500 font-medium">{{ $comment->created_at->diffForHumans() }}</span>
                @auth
                @if(!$comment->parent_id)
                <button wire:click="$toggle('isReplying')" type="button" class="text-gray-900 font-medium">
                    Svara
                </button>
                @endif
                @can('update', $comment)
                <button wire:click="$toggle('isEditing')" type="button" class="text-gray-900 font-medium">
                    Ändra
                </button>
                @endcan
                @can('delete', $comment)
                <button type="button" class="text-gray-900 font-medium" x-on:click="confirmCommentDeleteion" x-data="{
                    confirmCommentDeleteion(){
                        if(window.confirm('Säker?')){
                            @this.call('deleteComment')
                    }
                }
            }">
                    Radera
                </button>
                @endcan
                @endauth
            </div>
        </div>
    </div>

    <div class="ml-14 mt-6">
        @if($isReplying)
        <form wire:submit.prevent="postReply" class="mb-2">
            <div>
                <label for="comment" class="sr-only">Comment body</label>
                <x-input.textarea wire:model.defer="replyState.body" id="replyState.body" placeholder="Skriv ditt inlägg" />
                @error('replyState.body')
                <span class="mt-2 text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-3 flex items-center justify-between">
                <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Svara
                </button>
            </div>
        </form>
        @endif

        @foreach($comment->children as $child)
        <livewire:comment :comment="$child" :key="$child->id" />
        @endforeach
    </div>
</div>