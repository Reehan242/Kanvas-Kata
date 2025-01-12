<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- My CSS --}}
    <link rel="stylesheet" href="/css/style.css">

    {{-- favicon --}}
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">

    <title>KanvasKata | {{ $title }}</title>
</head>

<body class="scrollspy-example {{ in_array(Route::currentRouteName(), ['login', 'register']) ? 'body-bg-img' : '' }}"
    data-bs-spy="scroll" data-bs-target="#navbarMain" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true"
    tabindex="0">
    <header class="fixed-top">
        @include('partials.navbar')
    </header>
    <section id="header">
    </section>

    <main>
        <a href="#header" id="backToTop" class="back-to-top">↑</a>
        @yield('container')
    </main>

    <footer class="py-4">
        <p class="text-light text-center mt-2 footer-text">Copyright &copy;2025 KanvasKata. <br> <span class="text-secondary">Developed by Raihan Hammam Sukma</span></p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>



    <script src="/js/script.js"></script>

    <script>
        // Pilih semua elemen yang memiliki class animasi
        const animatableElements = document.querySelectorAll(
            '.animate-title, .animate-description, .animate-button, .animate-card');

        // Buat Intersection Observer
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible'); // Tambahkan class 'visible'
                    observer.unobserve(entry.target); // Hentikan observasi setelah animasi dijalankan
                }
            });
        }, {
            threshold: 0.1
        }); // Elemen dianggap terlihat saat 10% area-nya masuk viewport

        // Observe setiap elemen yang dapat dianimasikan
        animatableElements.forEach(element => observer.observe(element));
    </script>
</body>

</html>
