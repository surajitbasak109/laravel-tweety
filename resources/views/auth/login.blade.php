<x-master>
    <div class="container flex justify-center mx-auto">
        <div class="px-12 py-8 bg-gray-200 border border-gray-300 rounded-lg">
            <div class="col-md-8">
                <div class="mb-4 text-lg font-bold">{{ __('Login') }}</div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-6">
                        <label for="email"
                            class="block mb-2 text-xs font-bold text-gray-700 uppercase">
                            {{ __('E-Mail Address') }}
                        </label>

                        <input
                            class="w-full p-2 border border-gray-400"
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            autofocus
                            required
                        />

                        @error('email')
                        <p class="mt-2 text-xs to-red-500">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label
                            for="password"
                            class="block mb-2 text-xs font-bold text-gray-700 uppercase"
                        >
                            {{ __('Password') }}
                        </label>

                        <input
                            class="w-full p-2 border border-gray-400"
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password">

                        @error('password')
                        <p class="mt-2 text-xs to-red-500">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <div>
                            <input
                                class="mr-1"
                                type="checkbox"
                                name="remember"
                                id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="text-xs font-bold text-gray-700 uppercase" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                                class="px-4 py-2 mr-2 text-white bg-blue-400 rounded hover:bg-blue-500">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="text-xs text-gray-700" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-master>
