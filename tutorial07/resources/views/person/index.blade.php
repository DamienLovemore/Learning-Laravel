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
                    <div class="flex items-center justify-end">
                        <a class="bg-blue-600 text-white py-2 px-3 rounded-full" href="{{ route('person.create') }}">{{__('Add Person')}}</a>
                    </div>

                    <!-- App\Models\Person::factory()->count(7)->create(); example how to save in database  -->
                    {{-- @foreach ($people as $person)
                        <p style="font-size: large;font-style:italic">{{ $person->firstname }}</p><br>
                    @endforeach --}}
                    <table class="table-fixed border-separate border-spacing-6">
                        <thead>
                            <tr>
                                <th>
                                    {{__('Name')}}
                                </th>
                                <th>
                                    {{__('Email')}}
                                </th>
                                <th>
                                    {{__('Phone')}}
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($people as $person)
                                <tr>
                                    <td>{{ $person->firstname }} {{ $person->lastname }}</td>
                                    <td>{{ $person->email }}</td>
                                    <td>{{ $person->phone }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
