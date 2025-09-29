<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wazuh Alerts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('error'))
                        <div class="text-red-500">
                            {{ session('error') }}
                        </div>
                    @endif

                    <table class="min-w-full table-auto mt-4">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2 text-left">Alert ID</th>
                                <th class="px-4 py-2 text-left">Description</th>
                                <th class="px-4 py-2 text-left">Timestamp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($alerts as $alert)
                                <tr>
                                    <td class="border px-4 py-2">{{ $alert['id'] }}</td>
                                    <td class="border px-4 py-2">{{ $alert['description'] }}</td>
                                    <td class="border px-4 py-2">{{ $alert['timestamp'] }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4">No alerts found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $alerts->links() }}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
