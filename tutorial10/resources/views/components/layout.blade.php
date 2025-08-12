<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pixels Positions</title>
    <!-- Tailwind Framework -->
    @vite("resources/css/app.css")

    <!-- Font-Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/js/all.js" integrity="sha512-txwxTmf1qsISfr3XOw6e84Mkz3UdsQDAsfY65eb6YWNj1rMqtCQsCCfCuvo6Zzp+z5l2RQDpEtEYSC3/NycAJg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom Fonts -->
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@400;500;600&display=swap" rel="stylesheet">

    @vite("resources/js/app.js")
</head>
<body class="bg-black text-white font-hanken-grotesk">
    @php
        $logo = Vite::asset("resources/images/logo.svg")//For versioning, hash, and cache
    @endphp
    <div class="px-10">
        <nav class="flex justify-between items-center py-4 border-b border-white/10"><!-- white/10 10% - white -->
            <div>
                <a href="{{ route("home") }}">
                    <img src="{{ $logo }}" alt="Logo">
                </a>
            </div>

            <div class="space-x-6 font-bold">
                <a href="#">Jobs</a>
                <a href="#">Careers</a>
                <a href="#">Salaries</a>
                <a href="#">Companies</a>
            </div>

            <div>
                <a href="#">Post a Job</a>
            </div>
        </nav>

        <main class="mt-10 max-w-[76.7%] mx-auto">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
