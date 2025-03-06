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

    <script>
      function toggleBookmark(button, isLoggedIn) {
          if (!isLoggedIn) {
              window.location.href = "{{ route('login') }}"; // Redirect to login page if user is not logged in
              return;
          }
  
          let jobId = button.getAttribute('data-job-id');
  
          fetch("{{ route('candidate.shortlist.job') }}", {
              method: "POST",
              headers: {
                  "Content-Type": "application/json",
                  "X-CSRF-TOKEN": "{{ csrf_token() }}",
              },
              body: JSON.stringify({ job_id: jobId })
          })
          .then(response => response.json())
          .then(data => {
              if (data.status === 'added') {
                  button.classList.add("active"); // Add active class
              } else if (data.status === 'removed') {
                  button.classList.remove("active"); // Remove active class
              }
          })
          .catch(error => console.error("Error:", error));
      }
  </script>
  
  
  

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
