<div class="mt-3 block sm:col-span-6">
    @if ($errors->any())
        <ul class="text-red-500 font-bold">
            @foreach ($errors->all() as $error)
                <li>*{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
