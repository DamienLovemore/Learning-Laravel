<x-layout>
    @slot("heading")
        {{ __("Register") }}
    @endslot

    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        @method("PUT")

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field :columns="4">
                        <x-form-label for="first_name">First Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input :target="'first_name'"/>
                            {{-- <x-form-error :target="'title'" /> --}}
                        </div>
                    </x-form-field>

                    <x-form-field :columns="4">
                        <x-form-label for="last_name">Last Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input :target="'last_name'"/>
                            {{-- <x-form-error :target="'title'" /> --}}
                        </div>
                    </x-form-field>

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

                    <x-form-field :columns="4">
                        <x-form-label for="password_confirmation">Password Confirmation</x-form-label>
                        <div class="mt-2">
                            <x-form-input :target="'password_confirmation'" :type="'password'"/>
                            {{-- <x-form-error :target="'title'" /> --}}
                        </div>
                    </x-form-field>
                </div>

                <x-form-errors />
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <x-form-cancel-button>Cancel</x-form-cancel-button>
            <x-form-button>Save</x-form-button>
        </div>
    </form>
</x-layout>
