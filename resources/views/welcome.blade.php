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



    <!-- ================= NAVBAR ================= -->
    <nav class="navbar navbar-expand-lg nav1 fixed-top p-0" style="z-index:1000">
        <div class="container m-0">
            <a class="navbar-brand fw-bold text-white" href="#">
                <x-application-logo />
            </a>

            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-lg-3">
                    <li class="nav-item"><a class="nav-link" href="#accueil">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#apropos">Àpropos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#service">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#populaire">Populaires</a></li>
                    <li class="nav-item"><a class="nav-link" href="#categorie">Catégories</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>

                <div class="d-flex gap-2">
                    <a href="{{ route('login') }}" class="btn btn-light1 btn-sm">Connexion</a>
                    <a href="{{ route('register') }}" class="btn btn-dark1 btn-sm">Inscription</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- ================= MAIN ================= -->
    <main>

        {{-- ACCUEIL --}}
        <section id="accueil" class="hero text-center text-white">
            <div class="container">
                <h1 class="fw-bold">Trouvez rapidement un exécutant fiable</h1>
                <p>Publiez vos missions, recevez des propositions, choisissez le meilleur.</p>
                <a href="{{ route('register') }}" class="btn btn-dark1 btn-sm">Commencer</a>
            </div>
        </section>

        {{-- A Propos --}}
        <section id="apropos" class="py-5 apropos-section">
            <div class="container">
                <h2 class="text-center p-2 titre mb-5 fw-bold">À propos</h2>


                <div class="row align-items-stretch g-4">

                    {{-- Texte --}}
                    <div class="col-md-6 d-flex  ">
                        <div class="card shadow-sm w-100 p-2">
                            <h3 class="fw-bold mb-3">Pourquoi choisir <span class="text_warning">diba</span><span
                                    class="text-primary">Connect</span> ?</h2>
                                <div class="row align-items-start">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <p class="text-muted">
                                            DibaConnect est une plateforme de mise
                                            en relation entre clients et exécutants
                                            qualifiés pour réaliser tous types de
                                            services rapidement et en toute sécurité.
                                        </p>
                                    </div>
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <ul class="list-unstyled ">
                                            <li class="mb-2">✅ Exécutants vérifiés</li>
                                            <li class="mb-2">✅ Paiement sécurisé</li>
                                            <li class="mb-2">✅ Évaluations et commentaires</li>
                                            <li class="mb-2">✅ Support client 7j/7</li>
                                        </ul>
                                    </div>
                                </div>
                                <a href="{{ route('register') }}" class="btn btn-dark1 mt-auto">
                                    Rejoindre la plateforme
                                </a>
                        </div>

                    </div>

                    {{-- Cartes statistiques --}}
                    <div class="col-md-6 d-flex">
                        <div class="px-auto w-100  h-100 shadow-sm align-items-center">
                            <div class="row g-4 w-100 h-100 pt-1">

                                <div class="col-6">
                                    <div class="stat-card text-center flex-fill p-4">
                                        <h3 class="fw-bold">500+</h3>
                                        <p class="mb-0 text-muted">Exécutants</p>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="stat-card flex-fill text-center p-4">
                                        <h3 class="fw-bold">1K+</h3>
                                        <p class="mb-0 text-muted">Clients</p>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="stat-card flex-fill text-center p-4">
                                        <h3 class="fw-bold">5K+</h3>
                                        <p class="mb-0 text-muted">Missions</p>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="stat-card flex-fill text-center p-4">
                                        <h3 class="fw-bold">4.8★</h3>
                                        <p class="mb-0 text-muted">Satisfaction</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        {{-- SERVICES  --}}
        <section id="service" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center titre p-2 mb-5 fw-bold">Nos Services</h2>

                <div class="row g-2 mb-2">
                    @foreach ([['icon' => '🛠️', 'title' => 'Réparation', 'desc' => 'Réparation rapide et efficace.'], ['icon' => '🚚', 'title' => 'Livraison', 'desc' => 'Livraison rapide et sécurisée de vos produits.'], ['icon' => '🧹', 'title' => 'Nettoyage', 'desc' => 'Service de nettoyage professionnel pour maison et bureau.'], ['icon' => '💻', 'title' => 'Informatique', 'desc' => 'Assistance et maintenance informatique personnalisée.'], ['icon' => '🌐', 'title' => 'landing page', 'desc' => 'Developpement site web dinamyque et responsive .'], ['icon' => '📦', 'title' => 'Gestion Stock', 'desc' => 'Mise en place de site web avec laravle et angular.'], ['icon' => '🛒', 'title' => 'Site Ecommerce', 'desc' => 'Site Securisé et rapidement accessible grace un seo exceptionnel.'], ['icon' => '🏭', 'title' => 'Exploitation', 'desc' => 'Guide à lutlisation des materiels pour .']] as $service)
                        <div class="col-md-3 col-sm-6">
                            <div class="service-card text-center p-4">
                                <div class="service-icon mb-3">{{ $service['icon'] }}</div>
                                <h5 class="fw-bold">{{ $service['title'] }}</h5>
                                <p class="text-muted card-description">{{ $service['desc'] }}</p>
                                <a href="#contact" class="btn btn-sm btn-success mt-2">Demander</a>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- <div class="row g-2 mt-2">
                    @forelse($missions as $mission)
                        <div class="col-md-3 col-sm-6">
                            <div class="service-card  p-4">
                                <div><strong>Titre :</strong> {{ $mission->title }}
                                </div>
                                <p><strong>Description
                                        :</strong>{{ \Illuminate\Support\Str::limit($mission->description, 40) }}
                                </p>
                                <p class=""><strong>Budget max :</strong>
                                    {{ $mission->budget_max ?? '—' }}
                                </p>
                                <a href="#contact" class="btn btn-sm btn-success mt-2">Demander</a>
                            </div>
                        </div>

                    @empty
                        <p class="text-center">Aucune mission trouver</p>
                    @endempty --}}
            </div>
        </div>

        </div>

    </section>

    {{-- POPULAIRES --}}
    <section id="populaire" class="py-5">
        <div class="container">
            <h2 class="text-center titre p-2 mb-4">Exécutants Populaires</h2>

            <div class="row g-4">
                @for ($i = 1; $i <= 4; $i++)
                    <div class="col-md-3 col-sm-6">
                        <div class="card text-center p-3">
                            <img src="https://via.placeholder.com/80" class="rounded-circle mx-auto">
                            <h6 class="mt-2">Exécutant {{ $i }}</h6>
                            <small class="text-muted">⭐ 4.5</small>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- ===== CATEGORIES ===== -->
    <section id="categorie" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center titre p-2 mb-4">Catégories</h2>

            <div class="d-flex flex-wrap justify-content-center gap-3">
                @foreach (['Maison', 'Transport', 'Tech', 'Événement', 'Autres'] as $cat)
                    <span class="badge bg-primary p-3">{{ $cat }}</span>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ===== CONTACT ===== -->
    <section id="contact" class="py-5">
        <div class="container">
            <h2 class="text-center titre p-2 mb-4">Contact</h2>

            <div class="row justify-content-center">
                <div class="col-md-6 card p-2">
                    <form method="POST" action="">
                        <input class="form-control mb-3" placeholder="Nom">
                        <input class="form-control mb-3" placeholder="Email">
                        <textarea class="form-control mb-3" rows="4" placeholder="Message"></textarea>
                        <div class="d-flex flex-wrap justify-content-end pe-4">
                            <button class="btn btn-dark1 ">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main>
<!-- ================= FOOTER ================= -->
<footer class="footer mt-5 bg-secondary">
    <div class="container py-5">
        <div class="row g-4">

            <!-- Logo / Description -->
            <div class="col-md-4">
                <x-application-logo />
                <p class="text-light small">
                    Plateforme de mise en relation entre clients et prestateurs
                    pour des services rapides, fiables et sécurisés.
                </p>
            </div>

            <!-- Liens rapides -->
            <div class="col-md-2">
                <h6 class="text-white">Liens</h6>
                <ul class="list-unstyled small">
                    <li><a href="#accueil" class="footer-link text-light">Accueil</a></li>
                    <li><a href="#apropos" class="footer-link text-light">À propos</a></li>
                    <li><a href="#service" class="footer-link text-light">Services</a></li>
                    <li><a href="#contact" class="footer-link text-light">Contact</a></li>
                </ul>
            </div>

            <!-- Catégories -->
            <div class="col-md-3">
                <h6 class="text-white">Catégories</h6>
                <ul class="list-unstyled small">
                    <li class="text-light">Maison</li>
                    <li class="text-light">Transport</li>
                    <li class="text-light">Informatique</li>
                    <li class="text-light">Événement</li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="col-md-3">
                <h6 class="text-white">Contact</h6>
                <p class="text-light small mb-1">📍 Sénégal</p>
                <p class="text-light small mb-1">📞 +221 77 000 00 00</p>
                <p class="text-light small">✉ dibaconnect@gmail.com</p>
            </div>

        </div>

        <hr class="border-light my-4">

        <div class="text-center text-light small">
            © {{ date('Y') }} <span class="text_warning fw-semibold">diba</span><span
                class="text_primary fw-semibold">Connect</span>
            — Tous droits réservés.
        </div>
    </div>
</footer>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.querySelectorAll('#mainNav .nav-link').forEach(link => {
        link.addEventListener('click', () => {
            const menu = document.getElementById('mainNav');
            const bsCollapse = bootstrap.Collapse.getInstance(menu) ||
                new bootstrap.Collapse(menu, {
                    toggle: false
                });
            bsCollapse.hide();
        });
    });
</script>


</body>

</html>
