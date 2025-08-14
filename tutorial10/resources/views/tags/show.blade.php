<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-6">
            <div class="flex">
                <a class="text-4xl cursor-pointer py-2 text-blue-800 hover:text-blue-400" onclick="window.history.back()"><i class="fa-solid fa-arrow-left"></i></a>
                <h1 class="font-bold text-4xl flex-1">Tag Information</h1>
            </div>

            <div class="mt-6" >
                <p type="text" class="rounded-xl bg-white/15 border-white/10 px-5 py-4 w-full max-w-3xl mx-auto">{{ $tag->name }}</p>
            </div>
        </section>
    </div>
</x-layout>
