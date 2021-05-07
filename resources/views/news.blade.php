<x-guest-layout>
    @include('layouts.partials._header')
    <div class="container mx-auto">
        <div class="bg-white p-4 rounded shadow mb-5">
            <div class="border-b">
                @markdown($news->topic)
                <a class="underline text-indigo-500" href="{{ $news->url }}">{{ $news->url }}</a>
            </div>
            <div>
                Författad av bot
            </div>
            <div>Inlagd {{$news->created_at->diffForHumans()}} <small>({{$news->created_at}})</small></div>
        </div>
        <livewire:comments :model="$news" />
    </div>
</x-guest-layout>