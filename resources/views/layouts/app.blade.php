<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'HireHub')</title>

    <!-- Stylesheets -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link rel="shortcut icon"  href="{{ asset('images/hirehub-favicon.svg') }}" sizes="512x512" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <style>
  .position-relative {
    position: relative;
  }

  .eye-toggle {
    position: absolute;
    top: 50%;
    right: 15px;
    transform: translateY(-50%);
    cursor: pointer;
    color: #777;
  }

  .eye-toggle:hover {
    color: #333;
  }
</style> -->
</head>
<body data-anm=".anm">

    <div class="page-wrapper">
        @include('partials.header')
        <main>
            @yield('content')
        </main>
        @include('partials.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/chosen.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('js/jquery.modal.min.js') }}"></script>
    <script src="{{ asset('js/mmenu.polyfills.js') }}"></script>
    <script src="{{ asset('js/mmenu.js') }}"></script>
    <script src="{{ asset('js/appear.js') }}"></script>
    <script src="{{ asset('js/anm.min.js') }}"></script>
    <script src="{{ asset('js/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('js/rellax.min.js') }}"></script>
    <script src="{{ asset('js/owl.js') }}"></script>
    <script src="{{ asset('js/wow.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- <script>
  function togglePassword(fieldId) {
    let inputField = document.getElementById(fieldId);
    let eyeIcon = inputField.nextElementSibling.querySelector('i');

    if (inputField.type === "password") {
      inputField.type = "text";
      eyeIcon.classList.remove("la-eye");
      eyeIcon.classList.add("la-eye-slash");
    } else {
      inputField.type = "password";
      eyeIcon.classList.remove("la-eye-slash");
      eyeIcon.classList.add("la-eye");
    }
  }
</script> -->
</body>
</html>
