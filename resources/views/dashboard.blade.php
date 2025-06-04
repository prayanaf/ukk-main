<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold text-gray-700">
                    Selamat datang, {{ $siswa->nama ?? $user->name ?? 'Siswa' }}!
                </h1>
                <p class="mt-2 text-gray-600">
                    Semoga harimu menyenangkan 😊
                </p>
            </div>
        </div>
    </div>
</x-app-layout>