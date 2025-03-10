<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Stylesheets -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/hirehub-favicon.svg') }}" sizes="512x512" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    
    <div class="page-wrapper dashboard">
        <!-- Preloader -->
        <div class="preloader"></div>
        @include('partials.dashboard_header')

        <!-- Sidebar Backdrop -->
        <div class="sidebar-backdrop"></div>

        <!-- Employer Sidebar -->
        @include('layouts.sidebar')

        <!-- Employer Dashboard Content -->
        <section class="user-dashboard">
            <div class="dashboard-outer">
                @yield('content')
            </div>
        </section>
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
    <script src="{{asset('js/chart.min.js')}}"></script>

    <script>
        setTimeout(function() {
              document.querySelectorAll('.alert').forEach(alert => alert.style.display = 'none');
          }, 3000);
        
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('jobPerformanceChart').getContext('2d');

            var jobPerformanceChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($chartData['labels']) !!}, // Job Titles
                    datasets: [{
                        label: 'Applications',
                        data: {!! json_encode($chartData['applications']) !!}, // Applications per job
                        backgroundColor: 'rgba(54, 162, 235, 0.6)', // Blue
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    }
                }
            });
        });
    </script>

</body>

</html>