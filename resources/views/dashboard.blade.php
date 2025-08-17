<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between gap-4 w-full">
            <div class="flex-1 text-left">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </div>
            <div class="flex-1 text-center">
                <span class="text-white">
                    <x-u-f-value />
                </span>
            </div>
            <div class="flex-1 text-right">
                <a href="{{ route('proyectos.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                    Ir a Proyectos
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    <div class="mt-6">
                        <a href="{{ route('proyectos.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                            Ir a Proyectos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
