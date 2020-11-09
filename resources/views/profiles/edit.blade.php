<x-app>
    <form method="POST" action="{{ $user->path() }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-6">
            <label
                class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                for="name"
            >
                Name
            </label>
            <input
                class="w-full p-2 border border-gray-400"
                type="text"
                name="name"
                id="name"
                value="{{ $user->name }}"
                required
            />

            @error('name')
                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                for="username"
            >
                Username
            </label>
            <input
                class="w-full p-2 border border-gray-400"
                type="text"
                name="username"
                id="username"
                value="{{ $user->username }}"
                required
            />

            @error('username')
                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                for="avatar"
            >
                Avatar
            </label>
            <div class="flex">
                <input
                    class="w-full p-2 border border-gray-400"
                    type="file"
                    name="avatar"
                    id="avatar"
                />

                <img
                    src="{{ $user->avatar }}"
                    alt="your avatar"
                    width="40"
                />
            </div>

            @error('avatar')
                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                for="email"
            >
                Email
            </label>
            <input
                class="w-full p-2 border border-gray-400"
                type="email"
                name="email"
                id="email"
                value="{{ $user->email }}"
                required
            />

            @error('email')
                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                for="password"
            >
                Password
            </label>
            <input
                class="w-full p-2 border border-gray-400"
                type="password"
                name="password"
                id="password"
                required
            />

            @error('password')
                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                for="password_confirmation"
            >
                Confirm Password
            </label>
            <input
                class="w-full p-2 border border-gray-400"
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                required
            />

            @error('password_confirmation')
                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit"
                class="px-4 py-2 mr-4 text-white bg-blue-400 rounded hover:bg-blue-500"
            >
                Submit
            </button>

            <a href="{{ $user->path() }}" class="hover:underline">Cancel</a>
        </div>
    </form>
</x-app>
