@extends('layouts.layouts')

@section('content')
  <section style="margin-top: 120px">
    <div class="container col-xxl-8">

      <h4>Halaman Photo Kegiatan</h4>

      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UploadModal">
        Upload Modal
      </button>

      {{-- Pesan Sukses --}}
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
          {{ session()->get('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      {{-- Pesan Error --}}
      @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <div class="table-responsive py-3">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Image</th>
              <th>Kegiatan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($photos as $photo)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <img src="{{ asset('storage/photo/' . $photo->image) }}" alt="" height="150" width="150"
                    style="object-fit: cover">
                </td>
                <td>{{ $photo->judul }}</td>
                <td>
                  <a href="#" class="btn btn-warning" data-bs-target="#editModal{{ $photo->id }}"
                    data-bs-toggle="modal">Edit</a>
                  <form action="{{ route('photo.destroy', $photo->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-dark"
                      onclick="return confirm('Yakin ingin menghapus artikel ini?')">Hapus</button>
                  </form>
                </td>
              </tr>

              <!-- Modal Edit -->
              <div class="modal fade" id="editModal{{ $photo->id }}" tabindex="-1"
                aria-labelledby="editModalLabel{{ $photo->id }}" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="editModalLabel{{ $photo->id }}">Modal Edit</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('photo.update', $photo->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id_photo" value="{{ $photo->id }}">

                        <div class="form-group mb-3">
                          <label for="">Pilih Photo</label>
                          <div class="col-lg-4">
                            <img src="{{ asset('storage/photo/' . $photo->image) }}" alt="" height="150">
                          </div>
                          <input type="hidden" name="old_image" value="{{ $photo->image }}">
                          <input type="file" class="form-control" name="image">
                        </div>

                        <div class="form-group mb-3">
                          <label for="">Nama Kegiatan</label>
                          <input type="text" class="form-control" name="judul" value="{{ $photo->judul }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- Modal -->
  <div class="modal fade" id="UploadModal" tabindex="-1" aria-labelledby="UploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="UploadModalLabel">Modal Upload</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
              <label for="">Pilih Photo</label>
              <input type="file" class="form-control" name="image">
            </div>

            <div class="form-group mb-3">
              <label for="">Nama Kegiatan</label>
              <input type="text" class="form-control" name="judul">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
