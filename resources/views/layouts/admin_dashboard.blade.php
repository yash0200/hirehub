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

    {{-- <style>
        .notification-list li.unread {
            background-color: #f8d7da; /* Highlight unread */
            font-weight: bold;
        }

        .notification-list li.read {
            background-color: #d4edda; /* Faded style for read */
        }

    </style> --}}

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
        @include('admin.layouts.sidebar')

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
        document.addEventListener("DOMContentLoaded", function () {
            const ctx = document.getElementById("chart").getContext("2d");
            let myChart;

            function fetchChartData(weeks = 4) {
                fetch(`/admin/chart-data?weeks=${weeks}`)
                    .then(response => response.json())
                    .then(data => {
                        const labels = Object.keys(data.candidates).map(week => `Week ${week}`);
                        const candidateCounts = Object.values(data.candidates);
                        const employerCounts = Object.values(data.employers);

                        if (myChart) myChart.destroy(); // Destroy old chart before rendering a new one

                        myChart = new Chart(ctx, {
                            type: "bar",
                            data: {
                                labels: labels,
                                datasets: [
                                    {
                                        label: "Candidates",
                                        data: candidateCounts,
                                        backgroundColor: "rgba(54, 162, 235, 0.5)",
                                        borderColor: "rgba(54, 162, 235, 1)",
                                        borderWidth: 2,
                                    },
                                    {
                                        label: "Employers",
                                        data: employerCounts,
                                        backgroundColor: "rgba(255, 99, 132, 0.5)",
                                        borderColor: "rgba(255, 99, 132, 1)",
                                        borderWidth: 2,
                                    }
                                ]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                scales: {
                                    y: { beginAtZero: true }
                                }
                            }
                        });
                    });
            }

            fetchChartData(); // Load default data

            document.getElementById("chartFilter").addEventListener("change", function () {
                fetchChartData(this.value);
            });
        });
    </script>

</body>

</html>