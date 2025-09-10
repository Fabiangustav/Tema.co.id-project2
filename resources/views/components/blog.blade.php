@props(['var'])

<section class="blog section" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Blog Terbaru</h2>
                    <img src="{{ asset('img/section-img.png') }}" alt="#">
                </div>
            </div>
        </div>

        <div class="row">
            @forelse($var as $blog)
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Blog -->
                    <a href="{{ route('ShowBlog', $blog->slug) }}" class="blog-link">
                        <div class="single-news">
                            <div class="news-head">
                                <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('img/default.jpg') }}"
                                    alt="{{ $blog->title }}">
                            </div>
                            <div class="news-body">
                                <div class="news-content">
                                    <div class="date">{{ $blog->created_at->format('Y') }}</div>
                                    <h2>{{ $blog->title }}</h2>
                                    <p class="text">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($blog->updated_at), 100) }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!-- End Single Blog -->
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Belum ada blog terbaru.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- End Blog Area -->
