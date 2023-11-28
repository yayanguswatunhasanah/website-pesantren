@extends('layouts.layouts')


@section('content')
  {{-- hero --}}
  <section id="hero" class="">
    <div class="container text-center text-white">
      <div class="hero-title" data-aos="fade-up">
        <div class="hero-text">Selamat Datang <br> di Pesantren Al Hijrah</div>
        <h4>Pondok Pesantren Modern dengan Konsep Islam Kaffah</h4>
      </div>
    </div>
  </section>
  {{-- hero --}}

  {{-- program --}}
  <section id="program" style="margin-top: -30px">
    <div class="container col-xxl-9">
      <div class="row">
        <div class="col-lg-3 col-md-6 col mb-2" data-aos="flip-left">
          <div class="bg-white rounded-3 shadow p-3 mb-2 d-flex align-items-center justify-content-between">
            <div>
              <h6>Pendidikan <br> Berkualitas</h6>
            </div>
            <img src="{{ asset('assets/images/ic-book.png') }}" height="55" height="55" alt="">
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col mb-2" data-aos="flip-left">
          <div class="bg-white rounded-3 shadow p-3 mb-2 d-flex align-items-center justify-content-between">
            <div>
              <h6>Pendidikan <br> Beraklak</h6>
            </div>
            <img src="{{ asset('assets/images/ic-globe.png') }}" height="55" height="55" alt="">
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col mb-2" data-aos="flip-left">
          <div class="bg-white rounded-3 shadow p-3 mb-2 d-flex align-items-center justify-content-between">
            <div>
              <h6>Pendidikan <br> Muamalah</h6>
            </div>
            <img src="{{ asset('assets/images/ic-neraca.png') }}" height="55" height="55" alt="">
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col mb-2" data-aos="flip-left">
          <div class="bg-white rounded-3 shadow p-3 mb-2 d-flex align-items-center justify-content-between">
            <div>
              <h6>Pendidikan <br> Teknologi</h6>
            </div>
            <img src="{{ asset('assets/images/ic-komputer.png') }}" height="55" height="55" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- program --}}

  {{-- berita --}}
  <section id="berita py-5">
    <div class="container">

      <div class="header-berita text-center">
        <h2 class="fw-bold">Berita Kegiatan Pondok Pesantren</h2>
      </div>

      <div class="row py-5" data-aos="flip-up">
        @foreach ($artikels as $artikel)
          <div class="col-lg-4">
            <div class="card border-0">
              <img loading="lazy" src="{{ asset('storage/artikel/' . $artikel->image) }}" alt=""
                class="img-fluid mb-3">
              <div class="konten-berita">
                <p class="mb-3 text-secondary">{{ $artikel->created_at }}</p>
                <h4 class="fw-bold mb-3">{{ $artikel->judul }}</h4>
                <p class="text-secondary">#pesantrenmoderen</p>
                <a href="/berita/{{ $artikel->slug }}" class="text-decoration-none text-danger">Selengkapnya</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <div class="footer-berita text-center">
        <a href="/berita" class="btn btn-outline-danger">Berita Lainya</a>
      </div>
    </div>
  </section>
  {{-- berita --}}

  {{-- join --}}
  <section id="join" class="py-5" data-aos="flip-down">
    <div class="container py-5">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6">
          <div class="d-flex align-items-center">
            <div class="stripe me-2"></div>
            <h5>Daftar Santri</h5>
          </div>
          <h1 class="fw-bold mb-2">Gabung bersama kami, mewujudkan generasi rabbani</h1>
          <p class="mb-3">
            Pesantren Al Hijrah merupakan pesantren terbaik di jawa barat, dengan meluluskan santri dan menjadi ustadz
            terkemuka mendakwahkan di pelosok nusantara
          </p>
          <button class="btn btn-outline-danger">Register</button>
        </div>
        <div class="col-lg-6">
          <img loading="lazy" src="{{ asset('assets/images/il-jj.jpeg') }}" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </section>
  {{-- join --}}

  {{-- vidio --}}
  <section id="video" class="py-5">
    <div class="container py-5">
      <div class="text-center" data-aos="zoom-in">
        <iframe width="100%" height="315" src="https://www.youtube.com/embed/A927ale9-vI?si=25rIeHQ8F-7bG9Pc"
          title="YouTube video player" frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowfullscreen></iframe>
      </div>
    </div>
  </section>
  {{-- vidio --}}

  {{-- vidio youtube --}}
  <section id="vidio_youtube" class="py-5">
    <div class="container">
      <div class="header-berita text-center mb-5">
        <h2 class="fw-bold">Vidio Kegiatan Pondok Pesantren</h2>
      </div>

      <div class="row py-5" data-aos="zoom-in">
        @foreach ($videos as $video)
          <div class="col-lg-4">
            <iframe width="100%" height="215" src="https://www.youtube.com/embed/{{ $video->youtube_code }}"
              title="YouTube video player" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowfullscreen></iframe>
          </div>
        @endforeach
      </div>

      <div class="footer-berita text-center"><a href="" class="btn btn-outline-danger">Vidio Lainya</a></div>
    </div>
  </section>
  {{-- vidio youtube --}}

  {{-- foto --}}
  <section id="foto" class="section-foto paralax" data-aos="zoom-in-up">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-5">
        <div class="d-flex align-items-center">
          <div class="stripe-putih me-2"></div>
          <h5 class="fw-bold text-white">Foto Kegiatan</h5>
        </div>
        <div>
          <a href="/foto" class="btn btn-outline-white">Foto Lainya</a>
        </div>
      </div>

      <div class="row">
        @foreach ($photo as $p)
          <div class="col-lg-3 col-md-6 col-6">
            <a class="image-link" href="{{ asset('storage/photo/' . $p->image) }}">
              <img loading="lazy" src="{{ asset('storage/photo/' . $p->image) }}" class="img-fluid" alt="">
            </a>
            <p>{{ $p->judul }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  {{-- foto --}}

  {{-- fasilitas --}}
  <section id="fasilitas" class="py-5" data-aos="zoom-in">
    <div class="container py-5">
      <div class="text-center">
        <h3 class="fw-bold">Fasilitas Pesantren</h3>
      </div>

      <img loading="lazy" src="{{ asset('assets/images/il-f.jpeg') }}" class="img-fluid py-5" alt="">

      <div class="text-center"><a href="" class="btn btn-outline-danger">Fasilitas Lainya</a></div>
    </div>

  </section>
  {{-- fasilitas --}}
@endsection
