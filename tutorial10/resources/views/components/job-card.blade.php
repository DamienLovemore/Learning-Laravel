<!-- group,group-hover -> https://tailwindcss.com/docs/hover-focus-and-other-states#styling-based-on-parent-state -->
<x-panel class="flex flex-col text-center">
    <div class="self-start text-sm">Laracasts</div>

    <div class="py-8">
        <h3 class="group-hover:text-blue-800 text-xl font-bold transition-colors duration-300">Video Producer</h3>
        <p class="text-sm mt-4">Full Time - From $60,000</p>
    </div>

    <div class="flex justify-between items-center mt-auto">
        <div>
            <x-tag>Tag</x-tag>
            <x-tag>Tag</x-tag>
            <x-tag>Tag</x-tag>
        </div>

        <x-employer-logo />
    </div>
</x-panel>
