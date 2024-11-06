@props(["active" => false])

<li>
    <a {{ $attributes }} @class([ //$attributes get all the attributes passed to the
        'block py-2 px-3 rounded md:p-0', //Aplicado sempre (sem condição)
        'text-white bg-blue-700 md:bg-transparent md:text-blue-700 dark:text-white md:dark:text-blue-500' => $active, //Só quando a condição for verdadeira (página atual)
        'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' => !$active,
    ]) aria-current="page">@lang($slot->toHtml())</a><!--Pega o conteúdo do slot em texto e traduz (mesmo que __()) -->
</li>
