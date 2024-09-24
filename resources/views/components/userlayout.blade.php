<!DOCTYPE html>
<html>

<head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>


        @vite(['resources/css/argon-dashboard.css', 'resources/css/argon-dashboard.css', 'resources/js/user.js'])
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    </head>
</head>

<body class="bg-secondary">
    <div class="container mt-5 ">
        <nav class="d-flex my-5 justify-content-between">
            <h2 class="">welcome <span class="bg-warning p-2 rounded">{{ Auth::user()->name }}</span></h2>
            <form method="POST" class="logout" id="logout" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger" form="logout" type="submit"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    Logout</button>

            </form>
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </nav>
        <div class="divifr" style="height: 400px;">
            <iframe title="advanced chart TradingView widget" lang="en" id="tradingview_657d4" frameborder="0"
                allowtransparency="true" scrolling="no" allowfullscreen="true"
                src="https://s.tradingview.com/widgetembed/?hideideas=1&amp;overrides=%7B%7D&amp;enabled_features=%5B%5D&amp;disabled_features=%5B%5D&amp;locale=en#%7B%22symbol%22%3A%22BITFINEX%3ABTCUSD%22%2C%22frameElementId%22%3A%22tradingview_657d4%22%2C%22interval%22%3A%221%22%2C%22hide_side_toolbar%22%3A%220%22%2C%22allow_symbol_change%22%3A%221%22%2C%22save_image%22%3A%221%22%2C%22calendar%22%3A%221%22%2C%22studies%22%3A%22BB%40tv-basicstudies%22%2C%22theme%22%3A%22Dark%22%2C%22style%22%3A%229%22%2C%22timezone%22%3A%22Etc%2FUTC%22%2C%22studies_overrides%22%3A%22%7B%7D%22%2C%22utm_source%22%3A%22simplexproftrade.com%22%2C%22utm_medium%22%3A%22widget_new%22%2C%22utm_campaign%22%3A%22chart%22%2C%22utm_term%22%3A%22BITFINEX%3ABTCUSD%22%2C%22page-uri%22%3A%22simplexproftrade.com%2Fi%2Fuser%2Fdashboard%22%7D"
                style="width: 100%; height: 100%; margin: 0px !important; padding: 0px !important;"></iframe>
        </div>
        {{ $slot }}

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
