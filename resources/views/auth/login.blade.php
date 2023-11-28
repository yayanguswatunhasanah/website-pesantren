@extends('layouts.layouts')

@section('content')
  <section style="margin-top: 100px">
    <div class="container col-xxl-6 py-5">
      <h3 class="fw-bold mb-3">Halaman Login Admin Pesantren</h3>

      <form action="/login" method="POST">
        @csrf

        <div class="form-group mb-3">
          <label for="">Masukan Email</label>
          <input type="email" name="email" class="form-control" placeholder="Masukan Email">
        </div>

        <div class="form-group mb-3">
          <label for="">Masukan Password</label>
          <input type="password" name="password" class="form-control" placeholder="Masukan Password">
        </div>

        <div class="form-group mb-3">
          <button type="submit" class="btn btn-danger">Login</button>
        </div>
      </form>
    </div>
  </section>
@endsection
