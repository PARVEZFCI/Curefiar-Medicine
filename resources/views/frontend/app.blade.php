<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Describes the encoding of the page to the browser -->
    <meta charset="utf-8">

    <!-- Sets the title of the page.  Shown in the tab of your browser -->
    <title>Sombob Health</title>

    <!-- Required for Bootstrap's responsive media queries to function -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png"> -->

    <!-- Meta tag for basic SEO -->
    <meta name="description" content="shombobhealth">

    <!-- Main Theme CSS styles -->
    <link href="/frontend/css/theme.css" rel="stylesheet" type="text/css" media="all">

    <!-- Responsive Css Styles -->
    <link rel="stylesheet" href="/frontend/css/responsive.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <script>
        (function () {
            window.Laravel = {
                csrfToken: '{{ csrf_token() }}'
            };
        })();
    </script> --}}

    {{-- <script>
        window.App = {!! json_encode([
            'apiToken' => Auth::user()->api_token,
        ]) !!};
    </script> --}}
</head>


<body id="body">
    <!-- Page Wrapping -->
    <div class="app-root" id="app">
        @if (Auth::check())
        <main-app :user="{{ Auth::user() }}"></main-app>
        @else
        <main-app :user="false"></main-app>
        @endif
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>