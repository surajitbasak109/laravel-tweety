<x-master>

    <section class="px-8">
        <main class="container mx-auto mb-10">
            <div class="lg:flex lg:justify-center">
                @if (auth()->check())
                    <div class="lg:w-32">
                        @include('_sidebar-links')
                    </div>
                @endif

                <div class="lg:flex-1 lg:mx-10" style="max-width: 700px;">
                    {{ $slot }}
                </div>

                @if (auth()->check())
                    @include('_friends-list')
                @endif
            </div>
        </main>
    </section>

</x-master>
