<div>
    <div class="container">
      @auth
        <div class="bg-white mt-5 p-4 rounded shadow flex flex-col space-y-2 md:flex-row justify-around items-center">
          <span>
            <x-button wire:click="test">Sortera</x-button>
          </span>
          <span>
            <x-button wire:click="test">Visa bara artiklar</x-button>
          </span>
          <span>
            <x-button wire:click="test"><x-icon.plus />Ny länk</x-button>
          </span>
          <span>
            <x-button wire:click="test"><x-icon.plus />Nytt inlägg</x-button>
          </span>
        </div>
      @endauth

      <div class="bg-white mt-5 p-4 rounded shadow space-y-4"> <!-- själva runda -->
      <div>
        <p class="text-2xl border-b border-gray-200 uppercase">nyheter</p>
      </div>

        <div class="auto flex flex-row space-x-2">
            <x-input.text wire:model.debounce.300ms="search" placeholder="sök i nyheter"></x-input.text>
            <x-button.primary wire:click="clear"><x-icon.trash /> rensa</x-button>
        </div>

        <div> <!-- nyehterna -->
        <div class="flex flex-col space-y-1">
          @forelse($newsLinks as $news)
          <div>
              <div class="">
                <a class="text-lg underline" href="{{ $news->url }}">{{ $news->topic }}</a> <span>({{ $news->site }})</span>
              </div>
              <div>
                 Inlagd {{ $news->created_at }} ({{ $news->created_at->diffForHumans() }})
              </div>
            </div>
          @empty
            <span>🥴&nbsp;</span>
            <span>finns inget som passar in på söktermen.</span>
          @endforelse
          </div>

            {{ $newsLinks->links() }}
        </div> <!-- /nyehterna -->
      </div> <!-- /själva runda -->
    </div> <!-- /container -->

    <form wire:submit.prevent="save">
        <x-modal.dialog wire:model.defer="showCreateModal">
            <x-slot name="title">Ny länk</x-slot>
            <x-slot name="content">
                <x-input.group for="title" label="Passande rubrik" :error="$errors->first('title')">
                    <x-input.text wire:model="title" id="title" placeholder="Passande rubrik till din länk" />
                </x-input.group>

               <x-input.group for="url" label="Url pls" :error="$errors->first('url')">
                    <x-input.text wire:model="url" id="url" placeholder="Giltig url" />
                </x-input.group>

               <x-input.group for="sticky" label="Klistra längst upp" :error="$errors->first('sticky')">
                    <x-input.checkbox wire:model="sticky" id="sticky" />
                </x-input.group>

            </x-slot>

            <x-slot name="footer">
                <x-button.secondary wire:click="$set('showCreateModal', false)">Avbryt</x-button.secondary>
                <x-button.primary type="submit">Spara</x-button.primary>
            </x-slot>

        </x-modal.dialog>
    </form>
</div>
