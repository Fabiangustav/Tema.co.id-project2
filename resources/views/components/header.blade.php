<body>
<header class="header">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-5 col-12">
                    <ul class="top-link">
                        <li><a href="#">Distribution Operation Partner PT. XL Axiata, Tbk</a></li>
                        <li><a href="#">Tema Hotel</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-7 col-12">
                    <ul class="top-contact">
                        <li><i class="fa fa-phone"></i>+62 878 5068 6888</li>
                        <li><i class="fa fa-envelope"></i><a href="mailto:hrd@tema.co.id">hrd@tema.co.id</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="inner">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-12">
                        <div class="logo">
                            <a href="#tema"><img src="{{ asset('img/logotema.png') }}" alt="Tema Logo"></a>
                        </div>
                        <div class="mobile-nav"></div>
                    </div>

                    <div class="col-lg-9 col-md-9 col-12">
                        <div class="main-menu">
                            <nav id="navbar" class="navigation">
                                <ul class="nav menu">

                                    <li class="nav-item">
    <li class="nav-item">
  <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
     href="{{ route('home') }}#tema" data-section="tema">TEMA</a>
</li>
<li class="nav-item"><a class="nav-link" href="{{ route('home') }}#about"  data-section="about">About</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('home') }}#berita" data-section="berita">Berita</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('home') }}#blog"   data-section="blog">Blog</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('home') }}#kontak" data-section="kontak">Kontak</a></li>




                                    <!-- ini WAJIB untuk garis biru -->



                                    <li class="nav-item dropdown">
                                        <a href="#"
                                        class="nav-link {{ request()->routeIs('contact.show') && request()->route('region') === 'west-java' ? 'active' : '' }}">
                                            West Java <i class="icofont-rounded-down"></i>
                                        </a>
                                        <ul class="dropdown">
                                            <li>
                                                <a class="{{ request()->routeIs('contact.show') && request()->route('city') === 'bandung' ? 'active' : '' }}"
                                                href="{{ route('contact.show', ['west-java', 'bandung']) }}">
                                                    Bandung
                                                </a>
                                            </li>
                                            <li>
                                                <a class="{{ request()->routeIs('contact.show') && request()->route('city') === 'cimahi' ? 'active' : '' }}"
                                                href="{{ route('contact.show', ['west-java', 'cimahi']) }}">
                                                    Cimahi
                                                </a>
                                            </li>
                                            <li>
                                                <a class="{{ request()->routeIs('contact.show') && request()->route('city') === 'cileunyi' ? 'active' : '' }}"
                                                href="{{ route('contact.show', ['west-java', 'cileunyi']) }}">
                                                    Cileunyi
                                                </a>
                                            </li>
                                            <li>
                                                <a class="{{ request()->routeIs('contact.show') && request()->route('city') === 'cililin' ? 'active' : '' }}"
                                                href="{{ route('contact.show', ['west-java', 'cililin']) }}">
                                                    Cililin
                                                </a>
                                            </li>
                                            <li>
                                                <a class="{{ request()->routeIs('contact.show') && request()->route('city') === 'garut' ? 'active' : '' }}"
                                                href="{{ route('contact.show', ['west-java', 'garut']) }}">
                                                    Garut
                                                </a>
                                            </li>
                                            <li>
                                                <a class="{{ request()->routeIs('contact.show') && request()->route('city') === 'lembang' ? 'active' : '' }}"
                                                href="{{ route('contact.show', ['west-java', 'lembang']) }}">
                                                    Lembang
                                                </a>
                                            </li>
                                            <li>
                                                <a class="{{ request()->routeIs('contact.show') && request()->route('city') === 'soreang' ? 'active' : '' }}"
                                                href="{{ route('contact.show', ['west-java', 'soreang']) }}">
                                                    Soreang
                                                </a>
                                            </li>
                                            <li>
                                                <a class="{{ request()->routeIs('contact.show') && request()->route('city') === 'sumedang' ? 'active' : '' }}"
                                                href="{{ route('contact.show', ['west-java', 'sumedang']) }}">
                                                    Sumedang
                                                </a>
                                            </li>
                                            <span class="nav-indicator"></span>

                                        </ul>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a href="#"
                                        class="nav-link {{ request()->routeIs('contact.show') && request()->route('region') === 'ntb' ? 'active' : '' }}">
                                            NTB <i class="icofont-rounded-down"></i>
                                        </a>
                                        <ul class="dropdown">
                                            <li>
                                                <a class="{{ request()->routeIs('contact.show') && request()->route('city') === 'bima' ? 'active' : '' }}"
                                                href="{{ route('contact.show', ['ntb', 'bima']) }}">
                                                    Bima
                                                </a>
                                            </li>
                                            <li>
                                                <a class="{{ request()->routeIs('contact.show') && request()->route('city') === 'dompu' ? 'active' : '' }}"
                                                href="{{ route('contact.show', ['ntb', 'dompu']) }}">
                                                    Dompu
                                                </a>
                                            </li>
                                            <li>
                                                <a class="{{ request()->routeIs('contact.show') && request()->route('city') === 'lombok-barat' ? 'active' : '' }}"
                                                href="{{ route('contact.show', ['ntb', 'lombok-barat']) }}">
                                                    Lombok Barat
                                                </a>
                                            </li>
                                            <li>
                                                <a class="{{ request()->routeIs('contact.show') && request()->route('city') === 'lombok-tengah' ? 'active' : '' }}"
                                                href="{{ route('contact.show', ['ntb', 'lombok-tengah']) }}">
                                                    Lombok Tengah
                                                </a>
                                            </li>
                                            <li>
                                                <a class="{{ request()->routeIs('contact.show') && request()->route('city') === 'lombok-timur' ? 'active' : '' }}"
                                                href="{{ route('contact.show', ['ntb', 'lombok-timur']) }}">
                                                    Lombok Timur
                                                </a>
                                            </li>
                                            <li>
                                                <a class="{{ request()->routeIs('contact.show') && request()->route('city') === 'lombok-utara' ? 'active' : '' }}"
                                                href="{{ route('contact.show', ['ntb', 'lombok-utara']) }}">
                                                    Lombok Utara
                                                </a>
                                            </li>
                                            <li>
                                                <a class="{{ request()->routeIs('contact.show') && request()->route('city') === 'mataram' ? 'active' : '' }}"
                                                href="{{ route('contact.show', ['ntb', 'mataram']) }}">
                                                    Mataram
                                                </a>
                                            </li>
                                            <li>
                                                <a class="{{ request()->routeIs('contact.show') && request()->route('city') === 'sumbawa' ? 'active' : '' }}"
                                                href="{{ route('contact.show', ['ntb', 'sumbawa']) }}">
                                                    Sumbawa
                                                </a>
                                            </li>
                                            <li>
                                                <a class="{{ request()->routeIs('contact.show') && request()->route('city') === 'taliwang' ? 'active' : '' }}"
                                                href="{{ route('contact.show', ['ntb', 'taliwang']) }}">
                                                    Taliwang
                                                </a>
                                            </li>
                                        </ul>
                                    </li>


                                </ul>

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- WAJIB: section dengan id yang sama -->
<!-- contoh minimal (hapus kalau sudah ada di halamanmu) -->
<!--
<section id="tema" style="height:100vh"></section>
<section id="about" style="height:100vh"></section>
<section id="berita" style="height:100vh"></section>
<section id="blog" style="height:100vh"></section>
<section id="kontak" style="height:100vh"></section>
-->
