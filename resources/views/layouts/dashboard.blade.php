<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Stylesheets -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/hirehub-favicon.svg') }}" sizes="512x512" type="image/x-icon">
    <style>
        
    .bar {
        width: 100%;
        height: 5px;
        background-color: #e0e0e0;
        border-radius: 10px;
        overflow: hidden;
        position: relative;
    }
    
    .bar-inner {
        display: block;
        height: 100%;
        width: 0; /* Default to 0% */
        border-radius: 10px;
        transition: width 1.5s ease-in-out;
    }
    </style>
    

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
        setTimeout(function() {
            document.querySelectorAll('.alert').forEach(alert => alert.style.display = 'none');
        }, 3000);


        //for chart in employer dashbaord
        document.addEventListener("DOMContentLoaded", function() {
            var userType = "{{ $userType }}"; // Get user type from Blade variable

            // Only run the chart script for employers
            if (userType === 'employer') {
                @if(!empty($chartData))
                var ctx = document.getElementById('jobPerformanceChart').getContext('2d');

                var jobPerformanceChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($chartData['labels'] ?? []) !!}, 
                        datasets: [{
                            label: 'Applications',
                            data: {!! json_encode($chartData['applications'] ?? []) !!}, 
                            backgroundColor: 'rgba(54, 162, 235, 0.6)', 
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
                @endif
            }
            //for action in employer all pplicant tab
            document.querySelectorAll('.approve-btn').forEach(button => {
                button.addEventListener('click', function () {
                    let applicantId = this.getAttribute('data-id');
                    // console.log(applicantId);

                    fetch(`/employer/applicants/${applicantId}/approve`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message);
                        location.reload();
                    })
                    .catch(error => console.error('Error:', error));
                });
            });


            document.querySelectorAll('.reject-btn').forEach(button => {
                button.addEventListener('click', function () {
                    let applicantId = this.getAttribute('data-id');

                    fetch(`/employer/applicants/${applicantId}/reject`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message);
                        location.reload();
                    })
                    .catch(error => console.error('Error:', error));
                });
            });


        });

        // for candidate actions
        $(document).ready(function () {
            // Delete Application
            $('.delete-btn').on('click', function () {
                let applicationId = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to undo this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/candidate/applications/${applicationId}/delete`,
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (response) {
                                Swal.fire('Deleted!', response.success, 'success');
                                location.reload(); // Refresh page to reflect changes
                            },
                            error: function (response) {
                                Swal.fire('Error!', response.responseJSON.error, 'error');
                            }
                        });
                    }
                });
            });

            // Accept Offer
            $('.accept-offer-btn').on('click', function () {
                let applicationId = $(this).data('id');

                $.ajax({
                    url: `/candidate/applications/${applicationId}/accept-offer`,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        Swal.fire('Success!', response.success, 'success').then(() => {
                        location.reload(); // Reload the page only after the user closes the alert
                    });
                    },
                    error: function (response) {
                        Swal.fire('Error!', response.responseJSON.error, 'error');
                    }
                });
            });
        });


    </script>

</body>

</html>