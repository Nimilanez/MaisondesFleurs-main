<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agendamentos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-4">Agendar Atendimento</h3>

                    <div class="mb-6 flex justify-between items-center">
                        <div>
                            <form action="{{ url('/dashboard') }}" method="GET">
                                <label for="search_date" class="block text-gray-700 dark:text-gray-400">Buscar por Data:</label>
                                <input id="search_date" name="search_date" type="date" value="{{ request('search_date') }}" class="mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#764a9b] focus:border-[#764a9b] dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:placeholder-gray-400">
                                <button type="submit" class="ml-2 bg-[#764a9b] hover:bg-[#d3b0ff] text-white px-4 py-2 rounded-full">Buscar</button>
                                <a href="{{ url('/dashboard') }}" class="ml-2 bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-full">Limpar</a>
                            </form>
                        </div>

                        <form action="{{ url('/adicionarA') }}" method="POST">
                            @csrf
                            <input type="date" name="data" required>
                            <input type="time" name="horario" required>
                            <button class="bg-[#764a9b] hover:bg-[#d3b0ff] text-white px-4 py-2 rounded-full">Adicionar Novo</button>
                        </form>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Data</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Hora</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Cliente</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agendamentos as $agendamento)
                                    <tr>
                                        <td>{{ $agendamento->data }}</td>
                                        <td>{{ $agendamento->horario }}</td>
                                        <td>{{ $agendamento->cliente->name }}</td> <!-- Acessa o nome do cliente -->
                                        <td>
                                            <a href="{{ url('/editarA/'.$agendamento->id) }}">Editar</a>
                                            <form action="{{ url('/excluirA/'.$agendamento->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
