@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="hero-section d-flex align-items-center justify-content-center"
        style="background: linear-gradient(135deg, #007BFF, #007BFF); height: 350px; margin-top:-20px;">
        <div class="text-center">
            @isset($city)
                <h1 class="fw-bold text-white" style="font-size: 3rem; letter-spacing:1px;">
                    {{ ucfirst($city) }}
                </h1>
                <p class="mb-0 text-white" style="font-size: 1.2rem; opacity: 0.9;">
                    {{ ucfirst(str_replace('-', ' ', $region)) }}
                </p>
            @else
                <h1 class="fw-bold text-white" style="font-size: 3rem; letter-spacing:1px;">
                    Contact
                </h1>
                <p class="mb-0 text-white" style="font-size: 1.2rem; opacity: 0.9;">
                    Hubungi Kami
                </p>
            @endisset
        </div>
    </section>

    {{-- Form Contact --}}
    <form method="POST" action="#">
        @csrf
        <section class="contact-us section">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        {{-- Google Map --}}
                        <div class="col-lg-7 mb-4">
                            <div class="contact-us-left shadow rounded overflow-hidden">
                                <div id="myMap" style="width:100%; height:500px;"></div>
                                <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
                            </div>
                        </div>

                        {{-- Form Contact --}}
                        <div class="col-lg-5">
                            <div class="contact-us-form p-4 shadow rounded bg-white h-100">
                                <h2 class="mb-3">Contact With Us</h2>
                                <p class="text-muted">If you have any questions, feel free to contact us.</p>

                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <input type="text" name="name" class="form-control" placeholder="Name"
                                            required>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            required>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone"
                                            required>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <input type="text" name="subject" class="form-control" placeholder="Subject"
                                            required>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <textarea name="message" class="form-control" rows="5" placeholder="Your Message" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-2" type="submit">Send</button>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" id="newsletter" name="news">
                                            <label class="form-check-label" for="newsletter">
                                                Subscribe to our Newsletter?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Contact Info --}}
                <div class="contact-info mt-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-info">
                                <i class="icofont icofont-ui-call"></i>
                                <div class="content">
                                    <h3>+(000) 1234 56789</h3>
                                    <p>info@company.com</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <a id="mapLink" target="_blank" style="text-decoration:none; color:inherit;">
                                <div class="single-info">
                                    <i class="icofont-google-map"></i>
                                    <div class="content">
                                        <h3>2 Fire Brigade Road</h3>
                                        <p>Chittagonj, Lakshmipur</p>
                                    </div>
                                </div>
                            </a>

                            <script>
                                function initMap() {
                                    // Lokasi default (Jakarta)
                                    var lokasi = {
                                        lat: -6.200000,
                                        lng: 106.816666
                                    };

                                    // Kalau ada region
                                    @isset($region)
                                        @if ($region == 'jawa-tengah')
                                            lokasi = {
                                                lat: -7.150975,
                                                lng: 110.140259
                                            }; // contoh Semarang
                                        @endif
                                    @endisset

                                    // Buat map
                                    var map = new google.maps.Map(document.getElementById("myMap"), {
                                        zoom: 10,
                                        center: lokasi
                                    });

                                    new google.maps.Marker({
                                        position: lokasi,
                                        map: map,
                                        title: "Lokasi"
                                    });

                                    // 🔹 Update tombol agar link ke lokasi yang sama dengan map
                                    var gmapsLink = `https://www.google.com/maps?q=${lokasi.lat},${lokasi.lng}`;
                                    document.getElementById("mapLink").href = gmapsLink;
                                }
                            </script>
                            <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-info">
                                <i class="icofont icofont-wall-clock"></i>
                                <div class="content">
                                    <h3>Mon - Sat: 8am - 5pm</h3>
                                    <p>Sunday Closed</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </form>

    {{-- Notifikasi sukses --}}
    @if (session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif
@endsection

{{-- Tambahan CSS agar box tidak ikut melebar --}}
@push('styles')
    <style>
        .single-info {
            background: #1976d2;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            max-width: 350px;
            /* 🔹 batas lebar */
            margin: 10px auto;
            /* 🔹 supaya tetap center */
        }

        .single-info i {
            font-size: 2rem;
            margin-bottom: 10px;
            display: block;
        }

        .single-info h3 {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .single-info p {
            margin: 0;
            font-size: 0.95rem;
        }
    </style>
@endpush
