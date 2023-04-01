<!DOCTYPE html>
<html lang="en">

<head>
    @section('title', 'Web App with stats about football')
    <link rel="shortcut icon" href="/footballapp/public/favicon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- external links -->
    <link rel="stylesheet" href="/footballapp/public/css/style.css">
    <!-- CSS of Bootstrap -->
    <link rel="stylesheet" href="/footballapp/public/css/bootstrap.min.css">
    <title>App en desarrollo</title>
    <!-- JavaScript of Bootstrap -->
    <script src="/footballapp/public/js/bootstrap.min.js"></script>
</head>

<body>
    <header>
        <button id="toggle-aside" class="btn btn-primary" >Toggle Aside</button>
        <!-- HEADER CONTENT -->
        @include('partials.aside')
    </header>

    <main class="main-content">
        <!-- dynamic content -->
        @yield('content')
    </main>

    <footer>
        <!-- FOOTER CONTENT -->
    </footer>
</body>

</html>
