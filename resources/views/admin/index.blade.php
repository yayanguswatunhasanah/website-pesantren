@extends('layouts.layouts')

@section('content')
  <section style="margin-top: 100px">
    <div class="container col-xxl-8 py-5">
      <h3 class="fw-bold mb-2">Halaman Dashboard Admin</h3>
      <p>Selamat datang di halaman dashboard admin</p>

      <div class="row">
        <div class="col-lg-4">
          <div class="card shadow-sm rounded-3 border-0">
            <img src="{{ asset('assets/images/il-berita-02.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Blog Artikel</h5>
              <p class="card-text">Atur dan kelola artikel kegian pesantren</p>
              <a href="{{ route('blog.index') }}" class="btn btn-primary">Detail</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card shadow-sm rounded-3 border-0">
            <img src="{{ asset('assets/images/il-join.jpeg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Photo Kegiatan</h5>
              <p class="card-text">Atur dan kelola photo kegiatan pesantren</p>
              <a href="{{ route('photo.index') }}" class="btn btn-primary">Detail</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card shadow-sm rounded-3 border-0">
            <img src="{{ asset('assets/images/il-paralax.jpeg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Youtube Video</h5>
              <p class="card-text">Atur dan kelola video kegiatan pesantren</p>
              <a href="{{ route('video.index') }}" class="btn btn-primary">Detail</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
