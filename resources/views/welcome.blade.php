<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0B2545">
    <title>EduTravel | Turismo educativo</title>
    <meta name="description" content="Conectamos instituciones de educación superior con agencias de viajes para organizar experiencias académicas.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy:#0B2545; --blue:#124E78; --teal:#19B5B0;
            --text:#26384B; --muted:#718096; --white:#fff;
            --background:#F5F8FC; --border:#E5EBF2;
        }
        *{box-sizing:border-box;margin:0;padding:0}
        html{scroll-behavior:smooth}
        body{font-family:'DM Sans',sans-serif;color:var(--text);background:#fff;line-height:1.6}
        h1,h2,h3,.brand{font-family:'Manrope',sans-serif}
        a{text-decoration:none;color:inherit}
        button,a{-webkit-tap-highlight-color:transparent}
        .container{width:min(1160px,90%);margin:0 auto}
        .navbar{position:sticky;top:0;z-index:100;background:rgba(255,255,255,.96);backdrop-filter:blur(14px);border-bottom:1px solid var(--border)}
        .nav-content{min-height:78px;display:flex;justify-content:space-between;align-items:center;gap:24px}
        .brand{display:inline-flex;align-items:center;gap:11px;color:var(--navy);font-size:21px;font-weight:800;letter-spacing:-.8px}
        .brand-icon{width:43px;height:43px;border-radius:13px;display:grid;place-items:center;color:#fff;background:linear-gradient(135deg,var(--blue),var(--teal));flex-shrink:0}
        .brand-icon svg{width:25px;height:25px}
        .brand small{display:block;color:var(--muted);font:500 10px 'DM Sans',sans-serif;letter-spacing:1.4px;text-transform:uppercase;margin-top:-4px}
        .nav-links{display:flex;align-items:center;gap:25px;font-size:14px;font-weight:600}
        .nav-links>a:not(.btn):hover,.footer-links a:hover{color:var(--teal)}
        .nav-actions{display:flex;align-items:center;gap:10px}
        .nav-actions form{margin:0}
        .btn{display:inline-flex;justify-content:center;align-items:center;gap:9px;min-height:46px;padding:0 20px;border-radius:10px;font-size:14px;font-weight:700;border:1px solid transparent;cursor:pointer;transition:.2s ease;font-family:inherit}
        .btn-primary{background:var(--blue);color:#fff;box-shadow:0 5px 15px rgba(18,78,120,.15)}
        .btn-primary:hover{background:var(--navy);transform:translateY(-2px)}
        .btn-outline{border-color:var(--border);color:var(--navy);background:#fff}
        .btn-outline:hover{border-color:var(--blue);background:#EAF3FB}
        .btn-light{background:#fff;color:var(--navy)}
        .btn-light:hover{background:#EAF3FB}
        .btn svg{width:18px;height:18px}
        .menu-toggle{display:none;border:0;background:#EAF3FB;color:var(--navy);border-radius:9px;padding:10px;cursor:pointer}
        .menu-toggle svg{width:23px;height:23px}

        /* HERO / CARRUSEL */
        .hero-slider{position:relative;min-height:620px;display:flex;align-items:center;padding:90px 0;overflow:hidden;background:var(--navy);isolation:isolate}
        .hero-slides,.hero-shade{position:absolute;inset:0;z-index:-1}
        .hero-slides{overflow:hidden}
        .hero-slide{position:absolute;inset:-8px;background-size:cover;background-position:center;opacity:0;transform:scale(1.04);filter:blur(1.5px);transition:opacity 1.2s ease,transform 7s ease,filter 1.2s ease}
        .hero-slide.active{opacity:1;transform:scale(1.10);filter:blur(1px)}
        .hero-shade{background:linear-gradient(90deg,rgba(7,27,53,.90) 0%,rgba(7,35,64,.76) 48%,rgba(7,35,64,.38) 100%)}
        .hero-content{position:relative;z-index:1;width:min(1160px,90%)}
        .hero-copy{max-width:720px;color:#fff;animation:heroEnter .8s ease both}
        .hero-tag{display:inline-block;margin-bottom:25px;padding:9px 14px;color:#C8FFFA;background:rgba(25,181,176,.15);border:1px solid rgba(143,242,231,.4);border-radius:30px;font-size:11px;font-weight:700;letter-spacing:1.5px}
        .hero-copy h1{margin-bottom:22px;color:#fff;font-size:clamp(38px,5.2vw,65px);font-weight:800;letter-spacing:-2px;line-height:1.13}
        .hero-copy h1 span{color:#66DED4}
        .hero-copy>p{max-width:590px;margin-bottom:30px;color:rgba(255,255,255,.88);font-size:16px;line-height:1.9}
        .hero-buttons{display:flex;flex-wrap:wrap;gap:13px}
        .hero-copy .btn-primary{background:var(--teal);color:#062D45}
        .hero-copy .btn-primary:hover{background:#6AE0D6}
        .hero-copy .btn-light{background:rgba(255,255,255,.12);color:#fff;border:1px solid rgba(255,255,255,.55);backdrop-filter:blur(8px)}
        .hero-copy .btn-light:hover{background:rgba(255,255,255,.23)}
        .hero-pagination{display:flex;gap:9px;margin-top:42px}
        .hero-dot{width:10px;height:10px;padding:0;border:0;border-radius:10px;background:rgba(255,255,255,.55);cursor:pointer;transition:width .3s ease,background .3s ease}
        .hero-dot.active{width:34px;background:#66DED4}
        @keyframes heroEnter{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}

        .trust-strip{border-top:1px solid var(--border);border-bottom:1px solid var(--border);background:#fff}
        .trust-grid{display:grid;grid-template-columns:repeat(3,1fr);padding:25px 0}
        .trust-item{display:flex;justify-content:center;align-items:center;gap:13px;padding:5px 18px}
        .trust-item+.trust-item{border-left:1px solid var(--border)}
        .trust-icon,.service-icon{display:grid;place-items:center;color:var(--blue);background:#EAF3FB;flex-shrink:0}
        .trust-icon{width:43px;height:43px;border-radius:12px}
        .trust-icon svg{width:22px;height:22px}
        .trust-item strong{display:block;color:var(--navy);font-size:13px}
        .trust-item span{color:var(--muted);font-size:11px}
        .section{padding:88px 0}
        .section-soft{background:var(--background)}
        .section-heading{max-width:650px;text-align:center;margin:0 auto 45px}
        .section-label{color:var(--blue);font-size:12px;font-weight:800;letter-spacing:1.7px;text-transform:uppercase;margin-bottom:13px}
        .section-heading h2{color:var(--navy);font-size:clamp(28px,3vw,39px);line-height:1.25;letter-spacing:-1.2px;margin-bottom:14px}
        .section-heading p{color:var(--muted);font-size:15px;line-height:1.8}
        .services-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:22px}
        .service-card{padding:29px;border:1px solid var(--border);border-radius:17px;background:#fff;transition:.25s ease}
        .service-card:hover{transform:translateY(-5px);border-color:#BCD9ED;box-shadow:0 18px 40px rgba(11,37,69,.07)}
        .service-icon{width:53px;height:53px;border-radius:15px;margin-bottom:23px}
        .service-icon svg{width:26px;height:26px}
        .service-card h3{font-size:17px;color:var(--navy);margin-bottom:11px}
        .service-card p{color:var(--muted);font-size:13px;line-height:1.85}
        .process-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:34px}
        .process-item{text-align:center;padding:8px 20px}
        .process-number{width:58px;height:58px;margin:0 auto 20px;display:grid;place-items:center;border-radius:18px;background:var(--blue);color:#fff;font:800 20px 'Manrope',sans-serif;box-shadow:0 8px 20px rgba(18,78,120,.2)}
        .process-item h3{color:var(--navy);font-size:17px;margin-bottom:10px}
        .process-item p{color:var(--muted);font-size:13px;line-height:1.8}
        .cta{padding:0 0 85px}
        .cta-panel{position:relative;overflow:hidden;display:flex;justify-content:space-between;align-items:center;gap:30px;padding:47px 52px;border-radius:22px;background:linear-gradient(115deg,#0B2545,#124E78);color:#fff}
        .cta-panel:after{content:"";position:absolute;width:310px;height:310px;right:13%;top:-210px;border-radius:50%;border:1px solid rgba(255,255,255,.15);box-shadow:0 0 0 35px rgba(255,255,255,.035),0 0 0 70px rgba(255,255,255,.025)}
        .cta-copy{position:relative;z-index:1;max-width:620px}
        .cta-copy h2{font-size:clamp(25px,3vw,34px);line-height:1.3;margin-bottom:12px}
        .cta-copy p{color:#D4E2F0;font-size:14px}
        .cta-actions{position:relative;z-index:1;flex-shrink:0}
        .footer{padding:32px 0;border-top:1px solid var(--border);background:#fff}
        .footer-content{display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:20px}
        .footer .brand{font-size:17px}
        .footer .brand-icon{width:36px;height:36px;border-radius:10px}
        .footer .brand-icon svg{width:21px}
        .footer-copy{color:var(--muted);font-size:12px}
        .footer-links{display:flex;align-items:center;gap:20px;font-size:12px;font-weight:600;color:var(--blue)}
        @media(max-width:950px){.nav-links{gap:15px}.hero-slider{min-height:580px}.cta-panel{padding:38px 32px}}
        @media(max-width:760px){
            .nav-content{min-height:70px}.menu-toggle{display:grid;place-items:center}
            .nav-links{display:none;position:absolute;top:70px;left:0;right:0;padding:22px 5%;background:#fff;border-bottom:1px solid var(--border);box-shadow:0 15px 25px rgba(11,37,69,.07);flex-direction:column;align-items:stretch;gap:20px}
            .nav-links.open{display:flex}.nav-actions{flex-direction:column;align-items:stretch}.nav-actions .btn,.nav-actions form,.nav-actions form button{width:100%}
            .hero-slider{min-height:590px;padding:75px 0}.hero-shade{background:linear-gradient(90deg,rgba(7,27,53,.88),rgba(7,35,64,.68))}
            .hero-copy h1{font-size:clamp(38px,9vw,53px);letter-spacing:-1.4px}.hero-copy>p{font-size:14px}
            .trust-grid{grid-template-columns:1fr;gap:15px}.trust-item{justify-content:flex-start;padding:5px 0}.trust-item+.trust-item{border-left:0}
            .section{padding:65px 0}.services-grid,.process-grid{grid-template-columns:1fr;gap:17px}.service-card{padding:24px}.process-item{padding:15px 8px}
            .cta{padding-bottom:60px}.cta-panel{align-items:flex-start;flex-direction:column;padding:33px 25px}.cta-actions,.cta-actions .btn{width:100%}
            .footer-content{flex-direction:column;align-items:flex-start}.footer-links{flex-wrap:wrap}
        }
        @media(max-width:380px){.brand{font-size:18px}.hero-buttons .btn{width:100%}}
        @media(prefers-reduced-motion:reduce){html{scroll-behavior:auto}.hero-slide,.hero-dot{transition:none}.hero-slide,.hero-slide.active{transform:none}.hero-copy{animation:none}}
    </style>
</head>
<body>
@php
    $panelUrl = url('/admin');
    $loginUrl = url('/admin/login');
    if (\Illuminate\Support\Facades\Route::has('filament.admin.pages.dashboard')) {
        $panelUrl = route('filament.admin.pages.dashboard');
    }
    if (\Illuminate\Support\Facades\Route::has('filament.admin.auth.login')) {
        $loginUrl = route('filament.admin.auth.login');
    }
    $logoutRoute = null;
    if (\Illuminate\Support\Facades\Route::has('filament.admin.auth.logout')) {
        $logoutRoute = 'filament.admin.auth.logout';
    } elseif (\Illuminate\Support\Facades\Route::has('logout')) {
        $logoutRoute = 'logout';
    }
@endphp

<header class="navbar">
    <div class="container nav-content">
        <a href="{{ url('/') }}" class="brand" aria-label="EduTravel inicio">
            <span class="brand-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 13.5 21 4l-6.5 17-3.2-7.2L3 13.5Z"/><path d="m11.3 13.8 4.2-4.2"/></svg>
            </span>
            <span>EduTravel<small>Turismo educativo</small></span>
        </a>

        <button class="menu-toggle" id="menuToggle" aria-label="Abrir menú" aria-expanded="false" aria-controls="navLinks">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>

        <nav class="nav-links" id="navLinks">
            <a href="#inicio">Inicio</a>
            <a href="#servicios">Servicios</a>
            <a href="#como-funciona">Cómo funciona</a>
            <div class="nav-actions">
                @auth
                    <a href="{{ $panelUrl }}" class="btn btn-primary">▦ Entrar al panel</a>
                    @if ($logoutRoute)
                        <form method="POST" action="{{ route($logoutRoute) }}">
                            @csrf
                            <button type="submit" class="btn btn-outline">Cerrar sesión</button>
                        </form>
                    @endif
                @else
                    <a href="{{ $loginUrl }}" class="btn btn-outline">Iniciar sesión</a>
                    <a href="{{ $loginUrl }}" class="btn btn-primary">Acceder al sistema →</a>
                @endauth
            </div>
        </nav>
    </div>
</header>

<main>
    <section class="hero-slider" id="inicio">
        <div class="hero-slides" aria-hidden="true">
            <div class="hero-slide active" style="background-image:url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=2000&q=85')"></div>
            <div class="hero-slide" style="background-image:url('https://images.unsplash.com/photo-1436491865332-7a61a109cc05?auto=format&fit=crop&w=2000&q=85')"></div>
            <div class="hero-slide" style="background-image:url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=2000&q=85')"></div>
        </div>
        <div class="hero-shade"></div>
        <div class="container hero-content">
            <div class="hero-copy">
                <span class="hero-tag">TURISMO EDUCATIVO · COLOMBIA</span>
                <h1>Conectamos la educación con nuevas <span>experiencias.</span></h1>
                <p>Conectamos instituciones de educación superior con agencias de viajes para facilitar la organización de salidas académicas, encuentros educativos y experiencias que amplían horizontes.</p>
                <div class="hero-buttons">
                    <a href="#servicios" class="btn btn-primary">Explorar servicios →</a>
                    @guest
                        <a href="{{ $loginUrl }}" class="btn btn-light">Iniciar sesión</a>
                    @else
                        <a href="{{ $panelUrl }}" class="btn btn-light">Entrar al panel</a>
                    @endguest
                </div>
                <div class="hero-pagination" aria-label="Seleccionar imagen del carrusel">
                    <button type="button" class="hero-dot active" data-slide="0" aria-label="Mostrar imagen 1"></button>
                    <button type="button" class="hero-dot" data-slide="1" aria-label="Mostrar imagen 2"></button>
                    <button type="button" class="hero-dot" data-slide="2" aria-label="Mostrar imagen 3"></button>
                </div>
            </div>
        </div>
    </section>

    <section class="trust-strip">
        <div class="container trust-grid">
            <div class="trust-item">
                <div class="trust-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18M5 21V7l7-4 7 4v14"/><path d="M9 10h.01M15 10h.01M9 14h.01M15 14h.01M10 21v-4h4v4"/></svg></div>
                <div><strong>Enfoque institucional</strong><span>Soluciones para instituciones educativas</span></div>
            </div>
            <div class="trust-item">
                <div class="trust-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a15 15 0 0 1 0 18M12 3a15 15 0 0 0 0 18"/></svg></div>
                <div><strong>Red de proveedores</strong><span>Conexión con servicios turísticos</span></div>
            </div>
            <div class="trust-item">
                <div class="trust-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M7 8h10M7 12h6M7 16h3"/></svg></div>
                <div><strong>Gestión centralizada</strong><span>Información organizada en un solo lugar</span></div>
            </div>
        </div>
    </section>

    <section class="section section-soft" id="servicios">
        <div class="container">
            <div class="section-heading">
                <div class="section-label">Nuestros servicios</div>
                <h2>Todo para organizar un viaje académico</h2>
                <p>Conectamos las necesidades de las instituciones educativas con proveedores turísticos en una sola plataforma.</p>
            </div>
            <div class="services-grid">
                <article class="service-card"><div class="service-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m2 16 20-9-6 15-4-7-10 1Z"/><path d="m12 15 4-5"/></svg></div><h3>Vuelos y transporte</h3><p>Organiza los requerimientos de transporte para salidas académicas y viajes institucionales.</p></article>
                <article class="service-card"><div class="service-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18M5 21V7l7-4 7 4v14"/><path d="M9 10h.01M15 10h.01M9 14h.01M15 14h.01"/></svg></div><h3>Alojamiento y estadía</h3><p>Integra opciones de hospedaje y servicios complementarios según cada institución.</p></article>
                <article class="service-card"><div class="service-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a15 15 0 0 1 0 18M12 3a15 15 0 0 0 0 18"/></svg></div><h3>Experiencias académicas</h3><p>Facilita la coordinación de visitas, encuentros y recorridos educativos.</p></article>
                <article class="service-card"><div class="service-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="10" cy="7" r="4"/><path d="M20 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg></div><h3>Instituciones educativas</h3><p>Centraliza la información institucional y organiza solicitudes y viajes.</p></article>
                <article class="service-card"><div class="service-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="7" width="18" height="14" rx="2"/><path d="M8 7V4h8v3M3 12h18"/></svg></div><h3>Agencias y proveedores</h3><p>Conecta las necesidades institucionales con agencias y proveedores de turismo.</p></article>
                <article class="service-card"><div class="service-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M8 2v4M16 2v4M3 10h18M8 14h3M8 17h6"/></svg></div><h3>Gestión de viajes</h3><p>Organiza los datos, servicios y detalles necesarios para cada viaje.</p></article>
            </div>
        </div>
    </section>

    <section class="section" id="como-funciona">
        <div class="container">
            <div class="section-heading">
                <div class="section-label">Cómo funciona</div>
                <h2>Una conexión sencilla entre educación y turismo</h2>
                <p>Un proceso práctico para facilitar la colaboración entre instituciones y agencias de viajes.</p>
            </div>
            <div class="process-grid">
                <article class="process-item"><div class="process-number">01</div><h3>La institución planifica</h3><p>Define el destino, las fechas, los participantes y los servicios necesarios.</p></article>
                <article class="process-item"><div class="process-number">02</div><h3>Se conectan los servicios</h3><p>La plataforma facilita la organización de los requerimientos y el contacto con proveedores.</p></article>
                <article class="process-item"><div class="process-number">03</div><h3>Se coordina el viaje</h3><p>La institución gestiona los servicios contratados para su experiencia académica.</p></article>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="container">
            <div class="cta-panel">
                <div class="cta-copy"><h2>Los grandes aprendizajes también suceden viajando.</h2><p>Conecta instituciones educativas y proveedores turísticos desde una sola plataforma.</p></div>
                <div class="cta-actions">
                    @auth
                        <a href="{{ $panelUrl }}" class="btn btn-light">Entrar al panel →</a>
                    @else
                        <a href="{{ $loginUrl }}" class="btn btn-light">Iniciar sesión →</a>
                    @endauth
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="footer">
    <div class="container footer-content">
        <a href="{{ url('/') }}" class="brand"><span class="brand-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 13.5 21 4l-6.5 17-3.2-7.2L3 13.5Z"/><path d="m11.3 13.8 4.2-4.2"/></svg></span><span>EduTravel</span></a>
        <p class="footer-copy">© {{ date('Y') }} EduTravel. Turismo educativo e institucional.</p>
        <div class="footer-links"><a href="#inicio">Inicio</a><a href="#servicios">Servicios</a><a href="{{ $loginUrl }}">Acceso al sistema</a></div>
    </div>
</footer>

<script>
    // Menú responsive
    const menuToggle = document.getElementById('menuToggle');
    const navLinks = document.getElementById('navLinks');

    menuToggle.addEventListener('click', function () {
        const open = navLinks.classList.toggle('open');
        menuToggle.setAttribute('aria-expanded', String(open));
        menuToggle.setAttribute('aria-label', open ? 'Cerrar menú' : 'Abrir menú');
    });

    navLinks.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
            navLinks.classList.remove('open');
            menuToggle.setAttribute('aria-expanded', 'false');
        });
    });

    // Carrusel automático del hero
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.hero-dot');
    let currentSlide = 0;
    let heroTimer = null;

    function showHeroSlide(index) {
        currentSlide = index;
        slides.forEach((slide, i) => slide.classList.toggle('active', i === index));
        dots.forEach((dot, i) => dot.classList.toggle('active', i === index));
    }

    function startHeroSlider() {
        clearInterval(heroTimer);
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
        heroTimer = setInterval(() => showHeroSlide((currentSlide + 1) % slides.length), 5500);
    }

    dots.forEach(dot => {
        dot.addEventListener('click', () => {
            showHeroSlide(Number(dot.dataset.slide));
            startHeroSlider();
        });
    });

    startHeroSlider();
</script>
</body>
</html>
