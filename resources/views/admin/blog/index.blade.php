@extends('layouts.layouts')

@section('content')
  <section style="margin-top: 120px">
    <div class="container col-xxl-8">

      <h4>Halaman Blog Artikel</h4>

      <a href="{{ route('blog.create') }}" class="btn btn-primary">Buat Artikel</a>

      {{-- Psen Sukses --}}
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
          {{ session()->get('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <div class="table-responsive py-3">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Image</th>
              <th>Judul</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($articles as $artikel)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <img src="{{ asset('storage/artikel/' . $artikel->image) }}" alt="" height="150"
                    width="150" style="object-fit: cover">
                </td>
                <td>{{ $artikel->judul }}</td>
                <td>
                  <a href="{{ route('blog.edit', $artikel->id) }}" class="btn btn-warning">Edit</a>
                  <form action="{{ route('blog.destroy', $artikel->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-dark"
                      onclick="return confirm('Yakin ingin menghapus photo kegiatan ini?')">Hapus</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
@endsection
