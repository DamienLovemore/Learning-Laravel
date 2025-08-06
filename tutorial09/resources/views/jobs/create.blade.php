<x-layout>
    @slot("heading")
        {{ __("Create Job Page") }}
    @endslot

    <form action="{{ route('jobs.store') }}" method="POST">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">{{ __("Create a New Job") }}</h2>
                <p class="mt-1 text-sm/6 text-gray-600">{{ __("We just need a handful of details from you") }}.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input :target="'title'" :placeholder="'Information Systems Manager'" />
                            {{-- <x-form-error :target="'title'" /> --}}
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <x-form-label for="salary">Salary</x-form-label>
                        <div class="mt-2">
                            <x-form-input :target="'salary'" :placeholder="'1518,00'" :type="'number'"/>
                            {{-- <x-form-error :target="'salary'" /> --}}
                        </div>
                    </div>
                </div>

                <x-form-errors />
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-gray-900" onclick="window.history.back()">{{ __("Cancel") }}</button>
            <button type="submit" class="rounded-md bg-pink-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-pink-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-600">{{ __("Save") }}</button>
        </div>
    </form>
</x-layout>
