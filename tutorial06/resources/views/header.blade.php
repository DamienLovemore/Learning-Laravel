<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">E-comm<i class="fa-brands fa-opencart"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">{{ __('Home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __("Orders") }}</a>
                </li>

                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="{{ __('Type your search') }}" aria-label="Search"/>
                    <button class="btn btn-outline-success" type="submit">{{ __('Search') }}</button>
                </form>
            </ul>

            <ul class="navbar-nav nav-right  mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">{{ __('Cart') }}(0)</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
