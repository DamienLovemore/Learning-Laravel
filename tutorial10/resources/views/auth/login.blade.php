<x-layout>
    <x-page-heading>Log In</x-page-heading>
    <x-forms.form action="{{ route('session.store') }}"  method="POST">
        <x-forms.input label="Email" name="email" type="email" />
        <x-forms.input label="Password" name="password" type="password" />

        <x-forms.button>Log In</x-forms.button>
    </x-forms.form>
</x-layout>
