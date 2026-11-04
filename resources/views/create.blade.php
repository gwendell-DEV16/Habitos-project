<x-layout>
    <main class="py-10">
        <h1 class="font-bold text-3xl text-center">
            Cadastrar Hábito
        </h1>

        <section class="bg-white max-w-[600px] mx-auto p-10 pb-6 border-2 mt-4">

            <form action="{{ route('habits.store') }}" method="POST">
                @csrf

                <div class="flex flex-col gap-2 mb-4">
                    <label for="name">
                        Novo Hábito
                    </label>

                    <input
                        type="text"
                        name="name"
                        id="name"
                        placeholder="Ex: Ler 30 minutos por dia"
                        value="{{ old('name') }}"
                        class="bg-white p-2 border-2"
                    >

                    @error('name')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-600 text-white p-2">
                    Salvar hábito
                </button>

                <a href="{{ route('site.dashboard') }}" class="ml-2 p-2 border-2">
                    Voltar
                </a>
            </form>

        </section>
    </main>
</x-layout>

