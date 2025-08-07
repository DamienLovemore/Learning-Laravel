<x-layout>
    @slot("heading")
        {{ __("Login") }}
    @endslot

    <form action="{{ route('user.login') }}" method="POST">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field :columns="4">
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input :target="'email'" :type="'email'"/>
                            {{-- <x-form-error :target="'title'" /> --}}
                        </div>
                    </x-form-field>

                    <x-form-field :columns="4">
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input :target="'password'" :type="'password'"/>
                            {{-- <x-form-error :target="'title'" /> --}}
                        </div>
                    </x-form-field>
                </div>

                <x-form-errors />
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <x-form-cancel-button>Cancel</x-form-cancel-button>
            <x-form-button>Enter</x-form-button>
        </div>
    </form>
</x-layout>
