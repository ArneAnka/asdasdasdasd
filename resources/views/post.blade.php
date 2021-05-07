<x-guest-layout>
    @include('layouts.partials._header')
    <div class="container mx-auto">
        <div class="bg-white p-4 rounded shadow mb-5">
            <div class="border-b">
                @markdown($post->body)
            </div>
            <div>
                Författad av {{$post->user->name}} <small>{{"@" . $post->user->nickname}}</small>
            </div>
            <div>Inlagd {{$post->created_at->diffForHumans()}} <small>({{$post->created_at}})</small></div>
        </div>
        <livewire:comments :model="$post" />
    </div>
</x-guest-layout>