<x-layout>
    @slot("heading")
        {{ __("Testing Colors") }}
    @endslot

    <div class="border-8 border-violet-200 border-dotted">
        <div class="flex h-40 border-b-8 border-violet-200">
            <div class="flex-1 bg-ra-purple text-gray-100">
                <span class="block mt-[40%] text-center">{{ __("Purple") }}</span>
            </div>

            <div class="flex-1 bg-ra-blue text-gray-100">
                <span class="block mt-[40%] text-center">{{ __("Blue") }}</span>
            </div>

            <div class="flex-1 bg-ra-lg-blue text-gray-100">
                <span class="block mt-[40%] text-center">{{ __("Light Blue") }}</span>
            </div>

            <div class="flex-1 bg-ra-green">
                <span class="block mt-[40%] text-center">{{ __("Green") }}</span>
            </div>

            <div class="flex-1 bg-ra-yellow">
                <span class="block mt-[40%] text-center">{{ __("Amarelo") }}</span>
            </div>

            <div class="flex-1 bg-ra-orange">
                <span class="block mt-[40%] text-center">{{ __("Laranja") }}</span>
            </div>

            <div class="flex-1 bg-ra-red">
                <span class="block mt-[40%] text-center">{{ __("Vermelho") }}</span>
            </div>
        </div>

        <div class="flex h-30 border-b-8 border-violet-200 text-center">
            <div class="bg-va-pink flex-1">
                <span class="block mt-[8%] text-white">{{ __("Pink") }}</span>
            </div>

            <div class="bg-white flex-1">
                <span class="block mt-[8%] text-va-pink">{{ __("Pink") }}</span>
            </div>
        </div>

        <div class="flex h-30">
            <div class="bg-va-pink-50 flex-1">
            </div>

            <div class="bg-va-pink-100 flex-1">
            </div>

            <div class="bg-va-pink-200 flex-1">
            </div>

            <div class="bg-va-pink-300 flex-1">
            </div>

            <div class="bg-va-pink-400 flex-1">
            </div>

            <div class="bg-va-pink-500 flex-1">
            </div>

            <div class="bg-va-pink-600 flex-1">
            </div>

            <div class="bg-va-pink-700 flex-1">
            </div>

            <div class="bg-va-pink-800 flex-1">
            </div>

            <div class="bg-va-pink-900 flex-1">
            </div>

            <div class="bg-va-pink-950 flex-1">
            </div>

            <div class="bg-va-pink flex-1">
            </div>
        </div>
    </div>
</x-layout>
