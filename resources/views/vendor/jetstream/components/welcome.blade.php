<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="text-gray-500">
        Dina förehavanden och händelser
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="flex items-center">
            <svg class="w-8 h-8 text-gray-400" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="26" height="26">
                <path d="M3.5 11.493H4v-.5h-.5v.5zm0 2.998H3a.5.5 0 00.8.4l-.3-.4zm4-2.998v-.5h-.167l-.133.1.3.4zm-3-7.496H4v1h.5v-1zm6 1h.5v-1h-.5v1zm-6 1.998H4v1h.5v-1zm4 1H9v-1h-.5v1zM3 11.493v2.998h1v-2.998H3zm.8 3.398l4-2.998-.6-.8-4 2.998.6.8zm3.7-2.898h6v-1h-6v1zm6 0c.829 0 1.5-.67 1.5-1.5h-1c0 .277-.223.5-.5.5v1zm1.5-1.5V1.5h-1v8.994h1zM15 1.5c0-.83-.671-1.5-1.5-1.5v1c.277 0 .5.223.5.5h1zM13.5 0h-12v1h12V0zm-12 0C.671 0 0 .67 0 1.5h1c0-.277.223-.5.5-.5V0zM0 1.5v8.993h1V1.5H0zm0 8.993c0 .83.671 1.5 1.5 1.5v-1a.499.499 0 01-.5-.5H0zm1.5 1.5h2v-1h-2v1zm3-6.996h6v-1h-6v1zm0 2.998h4v-1h-4v1z" fill="currentColor"></path>
            </svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Notifieringar</div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                @forelse (Auth::user()->notifications as $notification)
                @include('auth.partials.notifications._' . class_basename($notification->type))
                {{ $notification->markAsRead() }}
                @empty
                Du verkar inte ha några notifieringar.
                @endforelse
            </div>
        </div>
    </div>



    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            <svg class="w-8 h-8 text-gray-400" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="26" height="26">
                <path d="M.5 4.5l7 4 7-4m-13-3h12a1 1 0 011 1v10a1 1 0 01-1 1h-12a1 1 0 01-1-1v-10a1 1 0 011-1z" stroke="currentColor"></path>
            </svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Dina inlägg ({{ $posts->count() }})</div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500 divide-y divide-solid">
                @forelse($posts->sortByDesc('created_at') as $post)
                <div class="pt-5 pb-5">
                    <span class="font-bold">
                        <a href="{{ route('post.show', $post) }}" class="underline text-indigo-500">{{ $post->topic }}</a>
                    </span>
                    <span class="float-right">{{ $post->created_at }}</span>
                    <span>@markdown($post->body)</span>
                    @if($post->image)
                    <img class="rounded w-50 h-50" src="{{ asset('storage/' . $post->image) }}" alt="uploaded file">
                    @endif
                </div>
                @empty
                Du verkar inte ha gjort några inlägg.
                @endforelse
            </div>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#000000" class="w-8 h-8 text-gray-400">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path d="M16.5 3c-1.74 0-3.41.81-4.5 2.09C10.91 3.81 9.24 3 7.5 3 4.42 3 2 5.42 2 8.5c0 3.78 3.4 6.86 8.55 11.54L12 21.35l1.45-1.32C18.6 15.36 22 12.28 22 8.5 22 5.42 19.58 3 16.5 3zm-4.4 15.55l-.1.1-.1-.1C7.14 14.24 4 11.39 4 8.5 4 6.5 5.5 5 7.5 5c1.54 0 3.04.99 3.57 2.36h1.87C13.46 5.99 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5 0 2.89-3.14 5.74-7.9 10.05z" />
            </svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Gillade ({{ auth()->user()->likes->count() }})</div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                @forelse(auth()->user()->likes->sortByDesc('created_at') as $like)
                <div>
                    * {{ $like->likeable->topic ?? 'övrigt' }} ({{ $like->likeable->site ?? 'övrigt' }})
                </div>
                @empty
                    Du verkar inte ha gillat något än.
                @endforelse
            </div>
        </div>
    </div>
    <div class="p-6 border-t border-gray-200 md:border-l">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path d="M17 7h-4v2h4c1.65 0 3 1.35 3 3s-1.35 3-3 3h-4v2h4c2.76 0 5-2.24 5-5s-2.24-5-5-5zm-6 8H7c-1.65 0-3-1.35-3-3s1.35-3 3-3h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-2zm-3-4h8v2H8z" />
            </svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Dina länkar ({{ $urls->count() }})</div>
        </div>

        <!-- urls -->
        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                <div class="mt-2 text-sm text-gray-500 divide-y divide-solid">
                    @forelse($urls->sortByDesc('created_at') as $url)
                    <div class="pt-5 pb-5">
                        <span class="font-bold">
                            <a href="{{ route('url.show', $url) }}" class="underline text-indigo-500">{{ $url->topic }}</a> ({{ ($url->site) }})
                        </span>
                        <span class="float-right">{{ $url->created_at }}</span>
                    </div>
                    @empty
                    Du verkar inte ha gjort några inlägg.
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>