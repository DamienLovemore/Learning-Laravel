<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('People') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- App\Models\Person::factory()->count(7)->create(); example how to save in database  -->
                    @foreach ($people as $person)
                        <p style="font-size: large;font-style:italic">{{ $person->firstname }}</p><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
