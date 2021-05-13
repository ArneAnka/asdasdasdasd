<div>
    <x-button wire:click="newUrl">
        <x-icon.plus />Ny länk
    </x-button>

    <!-- new url modal -->
    <form wire:submit.prevent="save">
        <x-modal.dialog wire:model.defer="showCreateNewUrlModal">
            <x-slot name="title">Ny länk</x-slot>
            <x-slot name="content">

                <x-input.group for="title" label="Passande rubrik" :error="$errors->first('title')" help-text="En passande rubrik till länken som du lägger in.">
                    <x-input.text wire:model=" title" id="title" placeholder="Passande rubrik till din länk" />
                </x-input.group>

                <x-input.group for="url" label="Url pls" :error="$errors->first('url')" help-text="Länken skall inte sedan tidigare finnas i databasen. Behöver inledas med http://">
                    <x-input.text wire:model=" url" id="url" placeholder="http://www.example.com" />
                </x-input.group>

            </x-slot>

            <x-slot name="footer">
                <x-button.secondary wire:click="$set('showCreateNewUrlModal', false)">Avbryt</x-button.secondary>
                <x-button.primary type="submit">Spara</x-button.primary>
            </x-slot>

        </x-modal.dialog>
    </form>
</div>