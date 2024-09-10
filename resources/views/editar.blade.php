<!-- resources/views/editar.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Agendamento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Page Title -->
                    <h3 class="text-2xl font-bold mb-4">Editar Atendimento</h3>

                    <!-- Edit Form -->
                    <form action="{{ route('atualizarA', $agendamento->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="date" name="data" value="{{ $agendamento->data }}" required>
                        <input type="time" name="horario" value="{{ $agendamento->horario }}" required>
                        <button class="bg-[#764a9b] hover:bg-[#d3b0ff] text-white px-4 py-2 rounded-full">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
