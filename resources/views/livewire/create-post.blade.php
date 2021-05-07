<div>
    <x-button wire:click="newPost">
        <x-icon.plus />Nytt inlägg
    </x-button>

    <!-- new url post -->
    <form wire:submit.prevent="savePost">
        <x-modal.dialog wire:model.defer="showCreateNewPostModal">
            <x-slot name="title">Ny post</x-slot>
            <x-slot name="content">
                <x-input.group for="topic" label="Passande rubrik" :error="$errors->first('topic')">
                    <x-input.text wire:model.lazy="topic" id="topic" placeholder="Passande rubrik till din länk" />
                </x-input.group>

                <x-input.group for="body" label="body pls" :error="$errors->first('body')" help-text="**bold**, *italic*, # rubrik, * lista">
                    <x-input.textarea wire:model.lazy="body" id="body" placeholder="Skriv ditt inlägg" />
                </x-input.group>

                <x-input.group label="Add Image" for="image" :error="$errors->first('image')">
                    <x-input.file-upload wire:model="image" id="image">
                        <span class="h-12 w-12 rounded overflow-hidden bg-gray-100">
                            @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" alt="Image">
                            @endif
                        </span>
                    </x-input.file-upload>
                </x-input.group>

            </x-slot>

            <x-slot name="footer">
                <x-button.secondary wire:click="$set('showCreateNewPostModal', false)">Avbryt</x-button.secondary>
                <x-button.primary type="submit">
                    <x-icon.upload />Spara
                </x-button.primary>
            </x-slot>

        </x-modal.dialog>
    </form>
</div>