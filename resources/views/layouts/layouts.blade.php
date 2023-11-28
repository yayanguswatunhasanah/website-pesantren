<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/ico/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/ico/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/ico/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('assets/images/ico/site.webmanifest') }}">

  {{-- Meta untuk tampil di Whatsapp --}}
  @if (Request::segment(1) == '')
    <meta property="og:title" content="Pesantren Al Hijrah" />
    <meta name="description" content="Pesantren Moderan dengan Fasilitas Lengkap" />
    <meta property="og:url" content="http://pesantrenalhijrah.com" />
    <meta property="og:description" content="Pesantren Al Hijrah" />
    <meta property="og:image" content="{{ asset('assets/icons/ic-logo.png') }}" />
    <meta property="og:type" content="article" />
    <title>Pesantren Al Hijrah</title>
  @elseif (Request::segment(1) == 'detail')
    <meta property="og:title" content="{{ $artikel->judul }}" />
    <meta name="description" content="{{ $artikel->judul }}" />
    <meta property="og:url" content="http://pesantrenalhijrah.com/detail/{{ $artikel->slug }}" />
    <meta property="og:description" content="{{ $artikel->judul }}" />
    @if ($artikel->image)
      <meta property="og:image" content="{{ asset('storage/artikel/' . $artikel->image) }}" />
    @else
      <meta property="og:image" content="{{ asset('assets/icons/ic-logo.png') }}" />
    @endif
    <meta property="og:type" content="article" />

    <title>Pesantren Al Hijrah | {{ $artikel->title }}</title>
  @endif

  {{-- Meta untuk tampil di Whatsapp --}}

  {{-- Bootstap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  {{-- AOS --}}
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  {{-- Macnific --}}
  <link rel="stylesheet" href="{{ asset('assets/css/magnific.css') }}">

  {{-- Summer Note --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" />

  {{-- Costum Style --}}
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


</head>

<body>

  {{-- navbar --}}
  @include('layouts.navbar')
  {{-- navbar --}}

  {{-- content --}}
  @yield('content')
  {{-- content --}}

  {{-- footer --}}
  @include('layouts.footer')
  {{-- footer --}}

  {{-- Bootrap --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  {{-- AOS --}}
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  {{-- Jquery --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

  {{-- Magnific --}}
  <script src="{{ asset('assets/js/magnific.js') }}"></script>

  {{-- Summer Note --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>

  <script>
    const navbar = document.querySelector('.fixed-top');
    window.onscroll = () => {
      if (window.scrollY > 100) {
        navbar.classList.add('scroll-nav-active');
        navbar.classList.add('text-nav-active');
      } else {
        navbar.classList.remove('scroll-nav-active');
      }
    }

    // AOS
    AOS.init();

    $(document).ready(function() {
      // Magnific
      $('.image-link').magnificPopup({
        type: 'image',
        retina: {
          ratio: 1,
          replaceSrc: function(item, ratio) {
            return item.src.replace(/\.\w+$/, function(m) {
              return '@2x' + m;
            });
          }
        }
      });

      // Summer Note
      $('#summernote').summernote({
        height: 200,
      });
    })
  </script>

</body>

</html>
