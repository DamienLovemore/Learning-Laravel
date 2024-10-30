<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Posts") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route("posts.create") }}">{{ __("Add new post") }}</a>

                    <table>
                        <thead>
                            <th>{{ __("Title") }}</th>
                            <th>{{ __("Category") }}</th>
                            <th></th>
                        </thead>

                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td class="px-4">{{ $post->category->name }}</td>

                                    <td class="px-4">
                                        <a href="{{ route('posts.edit', $post) }}">{{__("Edit")}}</a>
                                        <form method="POST" action="{{ route("posts.destroy", $post) }}">
                                            @csrf
                                            @method("DELETE")

                                            <button type="submit" onclick="return confirm({{ __('Are you sure?') }})">{{ __("Delete") }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
