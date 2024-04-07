<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .submit {
            background-color: #ff4c4f;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .submit:hover {
            background-color: #f35f64;
            /* Lighter shade of red */
        }

        .redirectBtn {
            background-color: #3dce3d;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .redirectBtn:hover {
            background-color: #3fb43f;
            color: #ffffff;

        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased">
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5 py-2">
            <h2 class="m-0 text-primary">
                @foreach ($settings as $set)
                    @if ($set->siteKey == 'Logo')
                        <img src="{{ asset('uploads/' . $set->siteValue) }}" alt=""
                            style="width: 140px; height: 60px" />
                    @endif
                @endforeach
            </h2>
        </a>
    </nav>
    <div class="flex flex-col justify-center items-center py-3"
        style="height: calc(100vh - 76px);   background: linear-gradient(to top left, #E6E6FA, #FFFFFF);
        ">
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('frontend/lib/wow/wow.min.js') }}"></script>
</body>

</html>
