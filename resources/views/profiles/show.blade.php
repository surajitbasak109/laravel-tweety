<x-app>
    <header class="relative mb-6">
        <div class="relative">
            <img
                src="/images/default-profile-banner.jpg"
                alt="Banner"
                class="mb-2"
                />

            <img
                src="{{ $user->avatar }}"
                alt="Avatar"
                class="absolute bottom-0 mr-2 rounded-full transform -translate-x-1/2 translate-y-1/2"
                style="left: 50%;"
                width="150"
                />
        </div>

        <div class="flex items-center justify-between mb-6">
            <div style="max-width: 270px;">
                <h2 class="mb-0 text-2xl font-bold">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}
            </div>

            <div class="flex">
                @can('edit', $user)
                <a
                    href="{{ $user->path('edit') }}"
                    class="px-4 py-2 mr-2 text-xs text-black border border-gray-300 rounded-full"
                >
                    Edit Profile
                </a>
                @endcan
                <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>

        <p class="text-sm">Consectetur delectus placeat incidunt optio laboriosam earum commodi? Sunt fuga minus placeat nisi obcaecati. Perspiciatis perspiciatis quasi omnis fuga asperiores? Quis voluptatum ratione culpa provident dolore? Ullam alias exercitationem est</p>
    </header>

    @include('_timeline', [
        'tweets' => $tweets
    ])
</x-app>
