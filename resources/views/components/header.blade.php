<header class="bg-white border-b-2 flex items-center justify-between p-2">
    {{-- LOGO --}}
    <div>
        Logo
    </div>

    {{-- AÇÕES --}}
    <div class="flex items-center gap-4">
        <a href="https://github.com/" target="_blank" class="text-gray-700 hover:text-black">
            GitHub
        </a>


@auth
    <form class="inline" action="{{ route('logout') }}" method="POST" class="inline">
        @csrf
        <button
            type="submit"
            class="cursor-pointer rounded-md border border-gray-300 bg-white px-4 py-2 text-gray-700 hover:bg-gray-100">
            Sair
        </button>
    </form>
@endauth



@guest
    <a href="{{ route('login') }}"
       class="inline-block cursor-pointer rounded-md border border-gray-300 bg-white px-4 py-2 text-gray-700 hover:bg-gray-100">
        Login
    </a>
@endguest

    </div>
</header>
