<x-layout>
    <x-slot:pageContent>
        <x-header>Posts Edit Page</x-header>
        <x-pagebuttons href="{{ route('posts.show', $post) }}" />
        <x-messages />

        <div class="max-w-2xl mx-auto p-4 pb-0 max-h-fit bg-slate-300 dark:bg-slate-800">
            <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="mb-6">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __("Title") }}</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('title') border-red-300 dark:border-red-600 @enderror" id="title" name="title" required minlength="3" maxlength="70" title="{{ __('Type the title of the post (no special characters)') }}" value="{{ $post->title }}">
                </div>
                <div class="mb-6">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __("Message") }}</label>
                    <textarea rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('content') border-red-300 dark:border-red-600 @enderror" placeholder="{{ __('Type your message here') }}" id="message" name="content" required minlength="10" title="Digite a mensagem(sem caracteres especiais)">{{ $post->content }}</textarea>
                </div>
                <div class="mb-6">
                    @php
                        $fileInputText = "Upload Thumbnail";
                        $postThumbnail = $post->thumbnail;

                        if(!empty($postThumbnail) || mb_strlen($postThumbnail) > 0)
                            $fileInputText = "Replace Thumbnail";

                        $translatedFileInputText = __($fileInputText);
                    @endphp
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">{{ $translatedFileInputText }}</label>
                    <input class="block w-full text-sm text-gray-900 dark:text-gray-400 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer bg-gray-50 focus:outline-none dark:bg-gray-700 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" name="thumbnail" type="file" accept=".png,.jpg,.jpeg,image/png,image/jpeg"><!-- Should include extensions and MIME types for better compatibility -->
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">{{ __("PNG, JPG, or JPEG (MIN. 200x200px; MAX. 800x800px)") }}</p>
                </div>
                <div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ __("Save") }}</button>
                </div>
            </form>
        </div>
    </x-slot>
</x-layout>
