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
        // function validateLocation(input) {
        //     let value = input.value.trim();
        //     let error = document.getElementById("locationError");

        //     if (/^\d{6}$/.test(value) || /^[a-zA-Z\s]+$/.test(value)) {
        //         error.style.display = "none"; // Hide error if valid
        //     } else {
        //         error.style.display = "block"; // Show error if invalid
        //     }
        // }
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
        setTimeout(function() {
                document.querySelectorAll('.alert').forEach(alert => alert.style.display = 'none');
        }, 3000);

        $(document).ready(function() {
            $('#show-more-btn').on('click', function() {
                let nextPageUrl = $(this).data('next-page');
                if (!nextPageUrl) return;

                $.ajax({
                    url: nextPageUrl,
                    type: "GET",
                    beforeSend: function() {
                        $('#show-more-btn').text('Loading...');
                    },
                    success: function(response) {
                        console.log("Response received:", response); // Debugging Step

                        if (response.jobs) {
                            $('#job-list').append(response.jobs); // Directly append jobs

                            // Update job count
                            let newCount = $('#job-list .job-block').length;
                            $('#job-count').text(newCount);

                            // Update progress bar
                            let totalJobs = parseInt($('#total-jobs').text());
                            let percentage = (newCount / totalJobs) * 100;
                            $('.bar-inner').css('width', percentage + '%');

                            // Update next page URL or hide button
                            if (response.next_page_url) {
                                $('#show-more-btn').data('next-page', response.next_page_url).text('Show More');
                            } else {
                                $('#show-more-btn').remove();
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", error);
                        $('#show-more-btn').text('Show More');
                    }
                });
            });
            
        });
  </script>
  

</body>
</html>
