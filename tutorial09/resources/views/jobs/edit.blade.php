<x-layout>
    @php
        //Disable input type number arrows
        $css_noarrows = "[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none";

        $job_title    = (!empty(request()->old("title")))   ? request()->old("title")   : $job->title;
        $job_salary   = (!empty(request()->old("salary")))  ? request()->old("salary")  : number_format($job->salary, 2, ",", "");

        $id_crip      = base64_encode($job->id);
    @endphp

    @slot("back_button")
        <x-back-button href="{{ route('jobs.info', $id_crip) }}" />
    @endslot
    @slot("heading")
        {{ __("Edit Job Page") }}: {{ $job->title }}
    @endslot

    <form action="{{ route('jobs.update', $id_crip) }}" method="POST">
        @csrf
        @method("PATCH")

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">{{__("Title") }}</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input id="title" type="text" name="title" class="block min-w-0 grow py-1.5 pr-3 px-2 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" value="{{ $job_title }}" required />
                            </div>

                            {{-- @error("title")
                                <p class="text-sm text-red-500 italic">*{{ $message }}</p>
                            @enderror --}}
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm/6 font-medium text-gray-900">{{__("Salary") }}</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input id="salary" type="number" min="{{ round(1518/2) }}" max="1000000" step="0.01" name="salary" class="block min-w-0 grow py-1.5 pr-3 px-2 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 {{ $css_noarrows }}" value="{{ $job_salary }}" required/><!-- step="0.01" to allow float, not only integers -->
                            </div>

                            {{-- @error("salary")
                                <p class="text-sm text-red-500 italic">*{{ $message }}</p>
                            @enderror --}}
                        </div>
                    </div>

                    <div class="mt-3 block sm:col-span-6">
                        @if($errors->any())
                            <ul class="text-red-500 font-bold">
                                @foreach ($errors->all() as $error)
                                    <li>*{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-gray-900" onclick="window.history.back()">{{ __("Cancel") }}</button>
            <button type="submit" class="rounded-md bg-pink-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-pink-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-600">{{ __("Save") }}</button>
        </div>
    </form>
</x-layout>
