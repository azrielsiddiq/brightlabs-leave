<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Manager
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h3 class="text-2xl font-bold mb-4">
                    Selamat Datang, {{ auth()->user()->name }}
                </h3>

                <p class="mb-2">
                    Role: <span class="font-semibold">{{ auth()->user()->role }}</span>
                </p>

                <p>
                    Anda login sebagai Manager.
                </p>

            </div>

        </div>
    </div>
</x-app-layout>