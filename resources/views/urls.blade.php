<x-guest-layout>
    @include('layouts.partials._header')
    <div class="container mx-auto">
        <div class="bg-white p-4 rounded shadow mb-5">
            <div class="border-b">
                @markdown($urls->topic)
                <a class="underline text-indigo-500"href="{{ $urls->url }}">{{ $urls->url }}</a>
            </div>
            <div>
                Författad av {{$urls->user->name}} <small>{{"@" . $urls->user->nickname}}</small>
            </div>
            <div>Inlagd {{$urls->created_at->diffForHumans()}} <small>({{$urls->created_at}})</small></div>
        </div>
        <livewire:comments :model="$urls" />
    </div>
</x-guest-layout>