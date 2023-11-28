@extends('layouts.layouts')

@section('content')
  {{-- foto --}}
  <section id="foto" class="section-foto paralax" data-aos="zoom-in-up" style="margin-top: 90px; margin-bottom: 50px;">
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
        <div class="col-lg-3 col-md-6 col-6">
          <a class="image-link" href="{{ asset('assets/images/il-photo-01.png') }}">
            <img loading="lazy" src="{{ asset('assets/images/il-photo-01.png') }}" class="img-fluid" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-6 col-6">
          <a class="image-link" href="{{ asset('assets/images/il-photo-02.png') }}">
            <img loading="lazy" src="{{ asset('assets/images/il-photo-02.png') }}" class="img-fluid" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-6 col-6">
          <a class="image-link" href="{{ asset('assets/images/il-photo-03.png') }}">
            <img loading="lazy" src="{{ asset('assets/images/il-photo-03.png') }}" class="img-fluid" alt="">
          </a>
        </div>
        <div class="col-lg-3 col-md-6 col-6">
          <a class="image-link" href="{{ asset('assets/images/il-photo-04.png') }}">
            <img loading="lazy" src="{{ asset('assets/images/il-photo-04.png') }}" class="img-fluid" alt="">
          </a>
        </div>
      </div>
    </div>
  </section>
  {{-- foto --}}
@endsection
