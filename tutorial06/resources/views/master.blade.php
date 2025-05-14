<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ __('E-comm Project') }}</title>

        <!-- CDN Imports -->
        <!-- Jquery-->
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

        <!-- Icons -->
        <!-- Unicons -->
        <script src=" https://cdn.jsdelivr.net/npm/@iconscout/unicons@4.2.0/script/monochrome/bundle.min.js "></script>
        <link href=" https://cdn.jsdelivr.net/npm/@iconscout/unicons@4.2.0/css/line.min.css " rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.css" integrity="sha512-GmZYQ9SKTnOea030Tbiat0Y+jhnYLIpsGAe6QTnToi8hI2nNbVMETHeK4wm4MuYMQdrc38x+sX77+kVD01eNsQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.js" integrity="sha512-Nxw1drpjN57DlFRzn8h+RaS7dTjhPOlHftsKYGRkCEj1lEbx3k1bqNz1qvLpRkEF19qe7YSHppCdnLc8FUmfnQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/brands.css" integrity="sha512-wiCAcyn1Z9FOqqMFKuerxELrSZr3TtHJvH4M9xtCRIMr/ydl9mptldoSP789oYknOdeaaDnd/CTKP0XCsqIFzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/brands.js" integrity="sha512-bbYc5g9O6b9TcnN6mLrRMZTja59kog26CsegC/B1XlGEPJSXeHvfYNbBms3r4QE8dbscc9E/LYqgR8knTjw8SA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <style>
            .custom-login
            {
                height: 25rem;
            }
        </style>
    </head>

    <body>
        {{View::make("header")}}
        <div class="container">
            @yield('content')
            {{View::make("footer")}}
        </div>

        <script>
            $(document).ready(() => {
                $("button").click(() => {
                    alert('{{ __("All set") }}');
                });
            });
        </script>
    </body>
</html>
