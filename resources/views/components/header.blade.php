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
                    <div class="row">
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


                                        <li class="nav-item {{ Route::is('tema') ? 'active' : '' }}">
                                            <a class="nav-link scrollto" href="/">TEMA</a>
                                        </li>

                                        <li class="nav-item {{ Route::is('about') ? 'active' : '' }}">
                                            <a class="nav-link scrollto" href="/#about">About</a>
                                        </li>

                                        <li class="nav-item {{ Route::is('Berita') ? 'active' : '' }}">
                                            <a class="nav-link scrollto" href="/#berita">Berita</a>
                                        </li>

                                        <li><a class="nav-link scrollto" href="/#blog">Blog</a></li>
                                        <li><a class="nav-link scrollto" href="/#kontak">Kontak</a></li>

                                        <li class="nav-item dropdown">
                                            <a href="#" class="nav-link">West Java <i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="{{ route('contact.show', ['west-java', 'bandung']) }}">Bandung</a></li>
                                                <li><a href="{{ route('contact.show', ['west-java', 'cimahi']) }}">Cimahi</a></li>
                                                <li><a href="{{ route('contact.show', ['west-java', 'cileunyi']) }}">Cileunyi</a></li>
                                                <li><a href="{{ route('contact.show', ['west-java', 'cililin']) }}">Cililin</a></li>
                                                <li><a href="{{ route('contact.show', ['west-java', 'garut']) }}">Garut</a></li>
                                                <li><a href="{{ route('contact.show', ['west-java', 'lembang']) }}">Lembang</a></li>
                                                <li><a href="{{ route('contact.show', ['west-java', 'soreang']) }}">Soreang</a></li>
                                                <li><a href="{{ route('contact.show', ['west-java', 'sumedang']) }}">Sumedang</a></li>
                                            </ul>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a href="#" class="nav-link">NTB <i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="{{ route('contact.show', ['ntb', 'bima']) }}">Bima</a></li>
                                                <li><a href="{{ route('contact.show', ['ntb', 'dompu']) }}">Dompu</a></li>
                                                <li><a href="{{ route('contact.show', ['ntb', 'lombok-barat']) }}">Lombok Barat</a></li>
                                                <li><a href="{{ route('contact.show', ['ntb', 'lombok-tengah']) }}">Lombok Tengah</a></li>
                                                <li><a href="{{ route('contact.show', ['ntb', 'lombok-timur']) }}">Lombok Timur</a></li>
                                                <li><a href="{{ route('contact.show', ['ntb', 'lombok-utara']) }}">Lombok Utara</a></li>
                                                <li><a href="{{ route('contact.show', ['ntb', 'mataram']) }}">Mataram</a></li>
                                                <li><a href="{{ route('contact.show', ['ntb', 'sumbawa']) }}">Sumbawa</a></li>
                                                <li><a href="{{ route('contact.show', ['ntb', 'taliwang']) }}">Taliwang</a></li>
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
