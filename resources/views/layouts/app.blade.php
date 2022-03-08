<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <title>{{ config('app.name', 'ShombhobHealth') }}</title>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="/logo.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        #printable { display: none; }

@media print
{
    #non-printable { display: none; }
    #printable { display: block; }
}
    </style>
    <!-- StyleSheets  -->
    @include('inc.css')
    @yield('css')
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            @include('inc.sidebar')
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                @include('inc.header')
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                @include('inc.footer')
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="/backend/js/bundle.js?ver=2.8.0"></script>
    <script src="/backend/js/scripts.js?ver=2.8.0"></script>
    <script src="/backend/js/charts/chart-ecommerce.js?ver=2.8.0"></script>
    <!-- toast -->
    <script src="{{ asset('js/iziToast.js') }}"></script>
    @include('vendor.lara-izitoast.toast')
    @yield('js')

    <script>
        @foreach($errors -> all() as $error)
        iziToast.warning({
            title: "Warning"
            , message: "{{ $error }}"
            , position: 'topRight'
            , });
        @endforeach

    </script>

</body>

</html>