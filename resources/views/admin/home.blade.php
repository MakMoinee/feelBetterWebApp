<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Feel Better - Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link href="/logo.png" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Playfair+Display:wght@400;500;600&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet (if needed, adjust paths) -->
    <link href="/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom Admin Styles (optional, for finer adjustments) -->
    <style>
        body {
            background-color: #f8f9fa;
            /* Light background for the admin page */
        }

        .admin-navbar {
            background-color: #ffffff;
            /* White background for admin navbar */
            border-bottom: 1px solid #dee2e6;
        }

        .card-header {
            background-color: #007bff;
            /* Primary color for card header */
            color: white;
            font-weight: bold;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .table thead th {
            background-color: #e9ecef;
            /* Lighter header background */
            color: #495057;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody tr:hover {
            background-color: #f2f2f2;
            /* Subtle hover effect */
        }

        .badge-wellbeing {
            padding: 0.5em 0.75em;
            border-radius: 0.25rem;
            font-size: 0.85em;
            font-weight: 600;
        }

        .badge-thriving {
            background-color: #8dc63f;
            color: white;
        }

        /* Green */
        .badge-balanced {
            background-color: #b0d749;
            color: white;
        }

        /* Light Green */
        .badge-bit-off {
            background-color: #ffcb05;
            color: white;
        }

        /* Yellow */
        .badge-challenged {
            background-color: #f68b1f;
            color: white;
        }

        /* Orange */
        .badge-seeking {
            background-color: #ef3c3e;
            color: white;
        }

        /* Red */

        /* Modal styling for JSON display */
        .modal-json-pre {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            padding: 15px;
            border-radius: 5px;
            max-height: 400px;
            overflow-y: auto;
            font-family: 'SFMono-Regular', Consolas, 'Liberation Mono', Menlo, Courier, monospace;
            font-size: 0.85em;
            white-space: pre-wrap;
            /* Ensures lines wrap */
            word-wrap: break-word;
            /* Breaks long words */
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light admin-navbar px-4 py-3">
        <a href="{{ url('/') }}" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><img src="/logo.png" alt="Logo" style="height: 40px;"> Feel Better Admin
            </h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
    </nav>

    <!-- Page Content -->
    <br>
    <br>
    <br>
    <div class="container-fluid py-5 mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="card shadow-sm border-0">
                        <div class="card-header">
                            Login
                        </div>
                        <form action="/login" method="post" autocomplete="off">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="username" class="text-dark">Username:<span
                                                class="text-danger">*</span> </label>
                                        <br>
                                        <input required type="text" name="username" id=""
                                            class="form-control mt-1">
                                    </div>

                                    <div class="form-group mt-4">
                                        <label for="password" class="text-dark">Password:<span
                                                class="text-danger">*</span> </label>
                                        <br>
                                        <input required type="password" name="password" id=""
                                            class="form-control mt-1">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary text-white" name="btnLogin"
                                            value="yes">Login</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/wow/wow.min.js"></script>
    <script src="/lib/easing/easing.min.js"></script>
    <script src="/lib/waypoints/waypoints.min.js"></script>
    <script src="/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="/js/main.js"></script>
    @if (session()->pull('errorLogin'))
        <script>
            setTimeout(() => {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Wrong Username or Password',
                    showConfirmButton: false,
                    timer: 800
                });
            }, 500);
        </script>
        {{ session()->forget('errorLogin') }}
    @endif
</body>

</html>
