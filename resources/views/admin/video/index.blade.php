@extends('layouts.layouts')

@section('content')
  <section style="margin-top: 120px">
    <div class="container col-xxl-8">

      <h4>Halaman Video Kegiatan</h4>

      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TambahVideo">
        Upload Video
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
              <th>Judul</th>
              <th>Video</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($videos as $video)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $video->judul }}</td>
                <td>
                  <iframe height="150" src="https://www.youtube.com/embed/{{ $video->youtube_code }}"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
                </td>
                <td>
                  <a href="#" class="btn btn-warning" data-bs-target="#editVideo{{ $video->id }}"
                    data-bs-toggle="modal">Edit</a>
                  <form action="{{ route('video.destroy', $video->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-dark"
                      onclick="return confirm('Yakin ingin menghapus artikel ini?')">Hapus</button>
                  </form>
                </td>
              </tr>

              <!-- Modal Edit -->
              <div class="modal fade" id="editVideo{{ $video->id }}" tabindex="-1"
                aria-labelledby="editVideoLabel{{ $video->id }}" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="editVideoLabel{{ $video->id }}">Modal Edit</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('video.update', $video->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id_video" value="{{ $video->id }}">

                        <div class="form-group mb-3">
                          <label for="">Judul</label>
                          <input type="text" class="form-control" name="judul" value="{{ $video->judul }}">
                        </div>

                        <div class="form-group mb-3">
                          <label for="">Youtube Code</label>
                          <input type="text" class="form-control" name="youtube_code"
                            value="{{ $video->youtube_code }}">
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
  <div class="modal fade" id="TambahVideo" tabindex="-1" aria-labelledby="UploadModalLabelVideo" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="UploadModalLabelVideo">Modal Upload</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('video.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
              <label for="">Judul Video</label>
              <input type="text" class="form-control" name="judul">
            </div>

            <div class="form-group mb-3">
              <label for="">Youtub Code</label>
              <input type="text" class="form-control" name="youtube_code">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
