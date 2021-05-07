<section>
    <div class="bg-white shadow sm:rounded-lg sm:overflow-hidden">
        <div class="divide-y divide-gray-200">
            <div class="px-4 py-5 sm:px-6">
                <h2 class="text-lg font-medium text-gray-900">Kommentarer ({{ $comments->count() }})</h2>
            </div>
            <div class="px-4 pt-6 sm:px-6">
                <div class="space-y-8">
                    {{-- Start comment --}}
                    @forelse($comments as $comment)
                    <livewire:comment :comment="$comment" :key="$comment->id" />
                    @empty
                    <p>Inga kommentarer än så länge.</p>
                    @endforelse
                    {{-- End comment --}}
                    {{ $comments->links() }}
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-4 py-6 sm:px-6">
            @auth
            <div class="flex">
                <div class="flex-shrink-0 mr-4">
                    <img class="h-10 w-10 rounded-full" src="{{ auth()->user()->avatarUrl() }}" alt="{{ auth()->user()->name }}">
                </div>
                <div class="min-w-0 flex-1">

                    <form wire:submit.prevent="postComment">
                        <label for="comment" class="sr-only">Comment body</label>
                        <x-input.textarea wire:model.defer="newCommentState.body" id="newCommentState.body" placeholder="Skriv ditt inlägg" />
                        @error('newCommentState.body')
                        <span class="mt-2 text-sm text-red-500">{{ $message }}</span>
                        @enderror

                        <div class="mt-3 flex items-center justify-between">
                            <x-button.primary type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Comment
                            </x-button.primary>
                        </div>
                    </form>
                </div>
            </div>
            @endauth

            @guest
            <p>Logga in för att kommentera</p>
            @endguest
        </div>
    </div>
</section>