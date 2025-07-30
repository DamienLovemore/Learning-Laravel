<x-layout>
    @slot("heading")
        {{ __("Create Job Page") }}
    @endslot

    @php
        //Disable input type number arrows
        $css_noarrows = "[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none";
    @endphp

    <form>
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">{{ __("Profile") }}</h2>
                <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">{{__("Title") }}</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input id="title" type="text" name="title" placeholder="{{ __('Information Systems Manager') }}" class="block min-w-0 grow py-1.5 pr-3 px-2 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm/6 font-medium text-gray-900">{{__("Salary") }}</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input id="salary" type="number" min="{{ round(1518/2) }}" max="1000000" step="0.01" name="salary" placeholder="1518,00" class="block min-w-0 grow py-1.5 pr-3 px-2 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 {{ $css_noarrows }}" /><!-- step="0.01" to allow float, not only integers -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-gray-900">{{ __("Cancel") }}</button>
            <button type="submit" class="rounded-md bg-pink-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-pink-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-600">{{ __("Save") }}</button>
        </div>
    </form>
</x-layout>
