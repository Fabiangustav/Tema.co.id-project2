@props(['var'])
<div class="portfolio section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Berita Terkini</h2>
                    <img src="{{ asset('img/section-img.png') }}" alt="#">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="owl-carousel portfolio-slider owl-theme">
                    @forelse($var as $berita)
                        <div class="single-pf">
                            <img src="{{ asset('storage/' . $berita->image) }}" alt="{{ $berita->title }}"
                                style="width:100%; height:200px; object-fit:cover;">
                            <a href="{{ route('berita.show', $berita->slug) }}" class="btn">
                                {{ \Illuminate\Support\Str::limit($berita->title, 30) }}
                            </a>
                        </div>
                    @empty
                        <div class="single-pf">
                            <p class="text-center">Belum ada berita tersedia.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
