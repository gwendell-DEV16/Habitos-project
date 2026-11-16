<x-layout>
    <main class="py-10 min-h-[calc(100vh-160px)] px-4">

      <x-navbar/>

        @session('success')
            <div class="flex">
                <p class="bg-green-100 border-2 border-green-500 text-green-700 p-3 mb-4">
                    {{ session('success') }}
                </p>
            </div>
        @endsession

        <div>
            <h2 class="text-lg mt-8 mb-2">
                {{ date ('d/m/Y') }}
            </h2>

            <ul class="flex flex-col gap-2">
                @forelse ($habits as $item)
                    <li class="habit-shadow-lg p-2 bg-[#FFDAAC]">
                        <div class="flex gap-2 items-center">
                          <input type="checkbox" class="w-6 h-6" {{ $item ->is_completed ? 'checked' : '' }} disabled />
                            <p class="font-bold text-lg">
                                 {{ $item->name }}

                                <span class="font-light text-md">
                                    ({{ $item->created_at->format('d/m/Y') }})
                                </span>
                            </p>
                        </div>
                    </li>
                @empty
                    <p>
                        Nenhum hábito cadastrado.
                    </p>

                    <a href="{{ route('habits.create') }}" class="bg-white border-2 p-2 mb-4 text-sm rounded-md w-fit font-bold inline-block px-3 py-1.5">
                        Cadastrar um novo hábito
                    </a>
                @endforelse
            </ul>
        </div>
    </main>
</x-layout>
