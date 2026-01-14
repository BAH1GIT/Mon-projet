<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- Styles / Scripts -->


</head>

<body>

    <header>

        @if (Route::has('login'))
            <nav class="d-flex nav1 align-items-center justify-content-between gap-4 w-full"
                style=">
                <!-- Logo ou titre -->
                <div class=" align-items-center">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </div>
                <div>
                    <ul class="nav d-flex align-items-center   mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="#accueil">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#apropos">À propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#service">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#populaire">Populaires</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                    </ul>

                </div>

                <!-- Liens -->
                <div class="d-flex align-items-center gap-1">
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn color1">Connexcion</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn color2">S'inscrire</a>
                        @endif
                    @endauth
                </div>
            </nav>
        @endif
    </header>

    <!-- Contenu principal -->
    <main class="mt-3">
        <section id="accueil" class="my-3">
            <div class=" mx-3 h3 py-3 bg">
                <p>
                    Bienvenue a notre site
                </p>
            </div>
        </section>
        <section id="apropos" class="m-3">
            <div class=" mx-3 h3 py-3 ">
                <p>
                    section apropos
                </p>
            </div>
        </section>
    </main>

</body>

</html>
