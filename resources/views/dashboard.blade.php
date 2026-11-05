<x-layout>
    <main class="py-10">
        <h1 class="font-bold text-4xl text-center">
            Dashboard
        </h1>

        <a href="{{ route('habits.create') }}" class="inline-block px-3 py-1.5 border-2 bg-white font-bold text-sm">
            Cadastrar novo hábito
        </a>

        @session('success')
            <div class="flex">
                <p class="bg-green-100 border-2 border-green-500 text-green-700 p-3 mb-4">
                    {{ session('success') }}
                </p>
            </div>
        @endsession

        <div>
            <h2 class="text-xl mt-4">
                Listagem de hábitos
            </h2>

            <ul class="flex flex-col gap-2">
                @forelse ($habits as $item)
                    <li class="pl-4">
                        <div class="flex gap-2 items-center">
                            <p class="font-bold text-xl">
                                - {{ $item->name }}

                                <span class="font-light text-md">
                                    ({{ $item->created_at->format('d/m/Y') }})
                                </span>
                            </p>

                            <p>
                                [{{ $item->habitLogs->count() }}]
                            </p>
                            <form action="{{ route('habits.destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="bg-red-500 text-white p-1 hover:opacity-50 cursor-pointer">
                                    <x-icons.trash />
                                </button>
                            </form>
                        </div>
                    </li>
                @empty
                    <li>
                        Nenhum hábito cadastrado.
                    </li>

                    <p>
                        Ainda não há hábitos cadastrados.
                    </p>
                @endforelse
            </ul>
        </div>
    </main>
</x-layout>
