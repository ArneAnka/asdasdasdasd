<div>
  <div class="container">
    @auth
    <div class="bg-white mt-5 p-4 rounded shadow flex flex-col space-y-2 md:flex-row justify-around items-center">
      <span>
        <livewire:create-url />
      </span>
      <span>
        <livewire:create-post />
      </span>
    </div>
    @endauth

    <div class="bg-white mt-5 p-4 rounded shadow space-y-4">
      <!-- själva runda -->
      <div>
        <p class="text-2xl border-b border-gray-200 uppercase">flödet 💦</p>
      </div>

      <div class="auto flex flex-row space-x-2">
        <x-input.text wire:model.debounce.300ms="search" placeholder="sök i flödet"></x-input.text>
        <x-button.primary wire:click="clear">
          <x-icon.trash /> rensa</x-button>
      </div>

      <div class="divide-y divide-black divide-opacity-25">
        <!-- nyehterna -->
        @forelse ($urls_news_and_posts as $collection)
          @if(class_basename($collection) == "Post")
            <livewire:post :collection="$collection" :key="$collection->id" />
          @elseif(class_basename($collection) == "Urls")
            <livewire:url :collection="$collection" :key="$collection->id" />
          @elseif(class_basename($collection) == "News")
            <livewire:news :collection="$collection" :key="$collection->id" />
          @endif
        @empty
          Inga sökresultat i vare <b>Nyheter</b>, <b>Länkar</b> eller <b>Inlägg</b>.
        @endforelse

      </div> <!-- /nyehterna -->
        <div class="mt-5">{{ $urls_news_and_posts->links() }}</div>
    </div> <!-- /själva runda -->
  </div> <!-- /container -->

</div>