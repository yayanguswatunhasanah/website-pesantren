@extends('layouts.layouts')

@section('content')
  <section style="margin-top: 120px">
    <div class="container col-xxl-8">
      {{-- Navigasi --}}
      <div class="d-flex">
        <a href="{{ route('blog.index') }}">Blog</a>
        <div class="mx-1"> . </div>
        <a href="{{ route('blog.create') }}">Buat Artikel</a>
      </div>

      <h4>Halaman Edit Artikel</h4>

      <form action="{{ route('blog.update', $artikel->id) }}" method="POST" enctype="multipart/form-data" class="py-3">
        @csrf
        @method('PUT')

        <div class="form-group mb-4">
          <label for="">Masukan Judul Kegiatan</label>
          <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
            value="{{ old('judul', $artikel->judul) }}">

          @error('judul')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group mb-4">
          <label for="">Pilih Photo Kegiatan</label>
          <input type="hidden" name="old_image" value="{{ $artikel->image }}">
          <div>
            <img src="{{ asset('storage/artikel/' . $artikel->image) }}" alt="" class="col-lg-4">
          </div>
          <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

          @error('image')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group mb-4">
          <label for="">Artikel Berita</label>
          <textarea name="desc" id="summernote" rows="10">{!! $artikel->desc !!}</textarea>

          @error('desc')
            <div class="text-danger">
              {{ $message }}
            </div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </section>
@endsection
