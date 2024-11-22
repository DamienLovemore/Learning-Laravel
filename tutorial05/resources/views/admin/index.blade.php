<x-layout>
    <x-slot:pageContent>
        <x-header>Posts Admin Area</x-header>
        <x-messages />

        <div class="m-4 p-6 bg-slate-300 dark:bg-slate-800">
            <section>
                <div class="flex justify-end mb-2">
                    <a href="{{ route('posts.create') }}" class="text-white bg-blue-700 dark:bg-blue-600 hover:bg-blue-800 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">{{ __("Create") }}</a>
                </div>
            </section>

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300">
                    <thead class="text-xs text-gray-700 dark:text-gray-400 uppercase bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __("Title") }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __("Created at") }}
                            </th>
                            <th scope="col" class="px-6 py-3">

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 0;
                            $target = "delete-modal";
                            $targetModal = "";
                        @endphp
                        @forelse ($posts as $post)
                            @php
                                $count++;
                                
                                $targetModal = $target . $count;
                            @endphp

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap" onclick="showPost({{ $post->id }})">
                                    {{ $post->id }}
                                </th>
                                <td class="px-6 py-4" onclick="showPost({{ $post->id }})">
                                    {{ $post->title }}
                                </td>
                                <td class="px-6 py-4" onclick="showPost({{ $post->id }})">
                                    {{ $post->created_at }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-row justify-center gap-x-8 flex-nowrap">
                                        <a href="{{ route('posts.edit', $post) }}" class="text-white bg-blue-700 dark:bg-blue-600 hover:bg-blue-800 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">{{ __("Edit") }}</a>
                                        <div>
                                            <button class="text-white bg-red-700 dark:bg-red-600 hover:bg-red-800 dark:hover:bg-red-700 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none" data-modal-target="{{ $targetModal }}" data-modal-toggle="{{ $targetModal }}">{{ __("Delete") }}</button>
                                            <x-delete-modal :post="$post->id" :index="$count"/>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ __("No posts have been registered") }}
                                </th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <script src={{ asset("js/admin.js") }}></script>
    </x-slot:pageContent>
</x-layout>
