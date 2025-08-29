@extends('layouts.app') {{-- kalau kamu punya layout utama --}}

@section('content')
<div class="container">
    <h1>Halaman Contact</h1>

    {{-- Kalau ada region & city dari route dinamis --}}
    @isset($region)
        <p><strong>Region:</strong> {{ $region }}</p>
    @endisset

    @isset($city)
        <p><strong>City:</strong> {{ $city }}</p>
    @endisset

    {{-- Form Contact --}}
    <form method="POST" action="{{ route('contact.send') }}">
        @csrf
        <section class="contact-us section">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-6">
							<div class="contact-us-left">
								<!--Start Google-map -->
								<div id="myMap"><div id="myMap" style="width:100%; height:350px;"></div>

                                    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
                                    <script>
                                        function initMap() {
                                            // Lokasi default (Jakarta)
                                            var lokasi = { lat: -6.200000, lng: 106.816666 };

                                            // Kalau ada region & city dari controller, bisa oper ke JS
                                            @isset($region)
                                                @if($region == 'jawa-tengah')
                                                    lokasi = { lat: -7.150975, lng: 110.140259 }; // contoh Semarang
                                                @endif
                                            @endisset

                                            var map = new google.maps.Map(document.getElementById("myMap"), {
                                                zoom: 10,
                                                center: lokasi
                                            });

                                            new google.maps.Marker({
                                                position: lokasi,
                                                map: map,
                                                title: "Lokasi"
                                            });
                                        }

                                        // Panggil function
                                        initMap();
                                    </script>
                                    </div>
								<!--/End Google-map -->
							</div>
						</div>
						<div class="col-lg-6">
							<div class="contact-us-form">
								<h2>Contact With Us</h2>
								<p>If you have any questions please fell free to contact with us.</p>
								<!-- Form -->
								<form class="form" method="post" action="mail/mail.php">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<input type="text" name="name" placeholder="Name" required="">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<input type="email" name="email" placeholder="Email" required="">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<input type="text" name="phone" placeholder="Phone" required="">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<input type="text" name="subject" placeholder="Subject" required="">
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<textarea name="message" placeholder="Your Message" required=""></textarea>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group login-btn">
												<button class="btn" type="submit">Send</button>
											</div>
											<div class="checkbox">
												<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">Do you want to subscribe our Newsletter ?</label>
											</div>
										</div>
									</div>
								</form>
								<!--/ End Form -->
							</div>
						</div>
					</div>
				</div>
				<div class="contact-info">
					<div class="row">
						<!-- single-info -->
						<div class="col-lg-4 col-12 ">
							<div class="single-info">
								<i class="icofont icofont-ui-call"></i>
								<div class="content">
									<h3>+(000) 1234 56789</h3>
									<p>info@company.com</p>
								</div>
							</div>
						</div>
						<!--/End single-info -->
						<!-- single-info -->
						<div class="col-lg-4 col-12 ">
							<div class="single-info">
								<i class="icofont-google-map"></i>
								<div class="content">
									<h3>2 Fir e Brigade Road</h3>
									<p>Chittagonj, Lakshmipur</p>
								</div>
							</div>
						</div>
						<!--/End single-info -->
						<!-- single-info -->
						<div class="col-lg-4 col-12 ">
							<div class="single-info">
								<i class="icofont icofont-wall-clock"></i>
								<div class="content">
									<h3>Mon - Sat: 8am - 5pm</h3>
									<p>Sunday Closed</p>
								</div>
							</div>
						</div>
						<!--/End single-info -->
					</div>
				</div>
			</div>
		</section>

    </form>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif
</div>
@endsection
