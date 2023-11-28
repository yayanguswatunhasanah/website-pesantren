@extends('layouts.layouts')

@section('content')
  {{-- berita --}}
  <section id="berita py-5" style="margin-top: 140px; margin-bottom: 50px;">
    <div class="container">

      <div class="header-berita text-center">
        <h2 class="fw-bold">Berita Kegiatan Pondok Pesantren</h2>
      </div>

      <div class="row py-5">
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
    </div>
  </section>
  {{-- berita --}}
@endsection
