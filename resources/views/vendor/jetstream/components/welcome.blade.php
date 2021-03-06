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
                Du verkar inte ha några notifieringar.
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
                @forelse($posts as $post)
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

        <!-- urls -->
        <div class="ml-12">
            <h2 class="text-2xl">Dina länkar ({{ $urls->count() }})</h2>
            <div class="mt-2 text-sm text-gray-500 divide-y divide-solid">
                @forelse($urls as $url)
                <div class="pt-5 pb-5">
                    <span class="font-bold">
                        <a href="{{ route('url.show', $url) }}" class="underline text-indigo-500">{{ $url->topic }}</a>
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