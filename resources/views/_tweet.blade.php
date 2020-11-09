<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400' }}">
    <div class="flex-shrink-0 mr-2">
        <a href="{{ $tweet->user->path() }}">
            <img
                src="{{ $tweet->user->avatar }}"
                alt="Avatar"
                class="mr-2 rounded-full"
                width="50"
                height="50"
            >
        </a>
    </div>

    <div>
        <h5 class="mb-4 font-bold">
            <a href="{{ $tweet->user->path() }}">
               {{ $tweet->user->name }}
            </a>
        </h5>

        <p class="mb-3 text-sm">
            {{ $tweet->body }}
        </p>

        <x-like-buttons :tweet="$tweet" />
    </div>
</div>
