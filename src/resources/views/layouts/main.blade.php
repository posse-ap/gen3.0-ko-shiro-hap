<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>independent production</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/6c20dffe37.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__left">
                <div class="header__logo">
                    <a href="/">
                        <img src="{{ asset('images/logo.svg') }}" alt="POSSEロゴ">
                    </a>
                </div>
                <span>4th week</span>
            </div>
            @yield('header-button')
        </div>
    </header>

    <main class="main">

        @yield('content')

    </main>

    @yield('calendar')


    <!-- chart.js-------------------------------------------- -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"
        integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- chartjs-plugin-datalabels------------------------------ -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.1.0"></script>

    <!-- チャートを別ファイルで処理 -->
    @yield('chart')

    <!-- js--------------------------------------------- -->
    {{-- <script src="./js/chart.js"></script> --}}
    <script src="{{ mix('js/main.js') }}"></script>
    <script src="{{ mix('js/calendar.js') }}"></script>

</body>

</html>
