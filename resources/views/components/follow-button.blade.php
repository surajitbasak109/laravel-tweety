@unless(current_user()->is($user))
<form method="POST"
    action="{{ route('follow', $user->username) }}"
>
    @csrf
    <button type="submit"
        class="px-4 py-2 text-xs text-white bg-blue-500 rounded-full shadow"
    >
        {{ auth()->user()->following($user) ? 'Unfollow Me' : 'Follow Me' }}
    </button>
</form>
@endunless
