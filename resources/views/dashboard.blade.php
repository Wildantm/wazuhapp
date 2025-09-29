<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <div class="mt-8">
                        <h3 class="text-lg font-medium text-gray-900">Wazuh Alerts</h3>
                        <table class="min-w-full table-auto mt-4">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 text-left">Alert ID</th>
                                    <th class="px-4 py-2 text-left">Description</th>
                                    <th class="px-4 py-2 text-left">Timestamp</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Loop through alerts and display data -->
                                @forelse($alerts as $alert)
                                <tr class="border-b">
                                    <td class="px-4 py-2">{{ $alert['id'] ?? 'N/A' }}</td>
                                    <td class="px-4 py-2">{{ $alert['description'] ?? 'No description' }}</td>
                                    <td class="px-4 py-2">{{ $alert['timestamp'] ?? 'N/A' }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-2 text-center text-gray-500">No alerts available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
