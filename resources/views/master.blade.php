<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/dataTables.bootstrap5.css">
    <style>
        .footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 20px;
            font-size: 14px;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <header>
        <nav class=" navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a href="/" class="navbar-brand">Logo</a>
                <ul class="navbar-nav ">
                    <li class="nav-item"><a href="{{ route('todos.index') }}" class="nav-link">To Do Module</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="content">
        @yield('content')
      </main>
    <footer class="footer bg-dark text-center text-white">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <p>© 2024 My Website. All Rights Reserved.</p>
        </div>
    </footer>
    <script src="{{ asset('/') }}assets/js/bootstrap.bundle.js"></script>
    <script src="{{ asset('/') }}assets/js/jquery-3.7.1.js"></script>
    <script src="{{ asset('/') }}assets/js/dataTables.js"></script>
    <script src="{{ asset('/') }}assets/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#example');
    </script>
</body>

</html>
