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
            background-color: #ffffff;
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
        <div class="collapse navbar-collapse" id="adminNavbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ url('/admin/assessments') }}" class="nav-item nav-link active">Assessments</a>
                <a href="{{ url('/logout') }}" class="nav-item nav-link">Logout</a>
            </div>
        </div>
    </nav>

    <br>
    <br>
    <br>
    <!-- Page Content -->
    <div class="container-fluid py-5 mt-4">
        <div class="container">
            <div class="card shadow-sm border-0">
                <div class="card-header">
                    Well-being Assessment Responses
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">#ID</th>
                                    <th scope="col">Age Group</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Feeling</th>
                                    <th scope="col">Well-being Status</th>
                                    <th scope="col">Submission Date</th>
                                    <th scope="col">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($assessments as $assessment)
                                    <tr>
                                        <td>{{ $assessment->id }}</td>
                                        <td>{{ $assessment->ageGroup }}</td>
                                        <td>{{ $assessment->gender }}</td>
                                        <td>{{ $assessment->feeling }}</td>
                                        <td>
                                            @php
                                                $badgeClass = '';
                                                switch ($assessment->result) {
                                                    case 'Thriving & Radiant':
                                                        $badgeClass = 'badge-thriving';
                                                        break;
                                                    case 'Balanced & Content':
                                                        $badgeClass = 'badge-balanced';
                                                        break;
                                                    case 'Feeling A Bit Off':
                                                        $badgeClass = 'badge-bit-off';
                                                        break;
                                                    case 'Challenged & Seeking Calm':
                                                        $badgeClass = 'badge-challenged';
                                                        break;
                                                    case 'Seeking Support & Care':
                                                        $badgeClass = 'badge-seeking';
                                                        break;
                                                    default:
                                                        $badgeClass = 'bg-secondary';
                                                        break;
                                                }
                                            @endphp
                                            <span
                                                class="badge badge-wellbeing {{ $badgeClass }}">{{ $assessment->result }}</span>
                                        </td>
                                        <td>{{ (new DateTime($assessment->created_at))->setTimezone(new DateTimeZone('Asia/Manila'))->format('Y-m-d h:i A') }}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm"
                                                onclick="showResultsModal({{ $assessment->score }}, '{{ $assessment->result }}', '{{ $assessment->feeling }}');">
                                                View
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                data-bs-target="#deleteModal" data-bs-toggle="modal"
                                                onclick="deleteThis({{ $assessment->id }});">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No assessment responses found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Assessment Details Modal -->
    <div class="modal fade" id="assessmentDetailsModal" tabindex="-1" aria-labelledby="assessmentDetailsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="assessmentDetailsModalLabel">Well-being Assessment Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <pre id="wellBeingAnswersJson" class="modal-json-pre"></pre>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="/admin" method="post" id="deleteForm">
                    @method('delete')
                    @csrf
                    <div class="modal-body text-center">

                        <h5 class="modal-title" id="resultsModalLabel">Are You Sure You Want To Delete This Record?
                        </h5>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success text-white" name="btnDeleteAssessment"
                            value="yes">Yes, Proceed</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="resultsModal" tabindex="-1" aria-labelledby="resultsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resultsModalLabel">Well-being Snapshot</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="lead" id="modalWellBeingDescription"></p>
                    <div id="gaugeContainer" style="width: 100%; height: 200px;"></div>
                    <p class="display-4 mt-3" id="modalEmoji"></p>
                    <p class="text-muted small">Score range: 25 (lowest) to 100 (highest)</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/justgage/1.4.0/justgage.min.js"></script>

    <!-- Template Javascript -->
    <script src="/js/main.js"></script>

    <script>
        // JavaScript to handle the modal for wellBeingAnswers details
        document.addEventListener('DOMContentLoaded', function() {
            const assessmentDetailsModal = document.getElementById('assessmentDetailsModal');
            assessmentDetailsModal.addEventListener('show.bs.modal', function(event) {
                // Button that triggered the modal
                const button = event.relatedTarget;
                // Extract info from data-json attribute
                const wellBeingAnswersJson = button.getAttribute('data-json');

                // Update the modal's content.
                const modalBodyInput = assessmentDetailsModal.querySelector('#wellBeingAnswersJson');
                try {
                    const parsedJson = JSON.parse(wellBeingAnswersJson);
                    modalBodyInput.textContent = JSON.stringify(parsedJson, null, 2); // Pretty print JSON
                } catch (e) {
                    console.error("Error parsing JSON for wellBeingAnswers:", e);
                    modalBodyInput.textContent = "Error loading details. Invalid JSON data.";
                }
            });
        });

        function deleteThis(id) {
            let deleteForm = document.getElementById("deleteForm");
            deleteForm.action = `/admin/${id}`;
        }

        function showResultsModal(totalScore, wellBeingStatus, currentFeeling) {
            const modalWellBeingDescription = document.getElementById('modalWellBeingDescription');
            const modalEmoji = document.getElementById('modalEmoji');
            const gaugeContainer = document.getElementById('gaugeContainer');

            modalWellBeingDescription.textContent = `${wellBeingStatus}`;

            let emoji = '';
            let gaugeColors = [];

            // Map well-being status to emoji and gauge colors
            switch (wellBeingStatus) {
                case 'Thriving & Radiant':
                    emoji = '😄';
                    gaugeColors = [{
                        from: 0,
                        to: 85,
                        color: "#ef3c3e"
                    }, {
                        from: 86,
                        to: 100,
                        color: "#8dc63f"
                    }]; // Green
                    break;
                case 'Balanced & Content':
                    emoji = '🙂';
                    gaugeColors = [{
                        from: 0,
                        to: 70,
                        color: "#f68b1f"
                    }, {
                        from: 71,
                        to: 100,
                        color: "#b0d749"
                    }]; // Light Green
                    break;
                case 'Feeling A Bit Off':
                    emoji = '😐';
                    gaugeColors = [{
                        from: 0,
                        to: 55,
                        color: "#f68b1f"
                    }, {
                        from: 56,
                        to: 100,
                        color: "#ffcb05"
                    }]; // Yellow
                    break;
                case 'Challenged & Seeking Calm':
                    emoji = '😟';
                    gaugeColors = [{
                        from: 0,
                        to: 40,
                        color: "#ef3c3e"
                    }, {
                        from: 41,
                        to: 100,
                        color: "#f68b1f"
                    }]; // Orange
                    break;
                case 'Seeking Support & Care':
                    emoji = '😞';
                    gaugeColors = [{
                        from: 0,
                        to: 100,
                        color: "#ef3c3e"
                    }]; // Red
                    break;
                default:
                    emoji = '❓';
                    gaugeColors = [{
                        from: 0,
                        to: 100,
                        color: "#cccccc"
                    }];
            }

            modalEmoji.textContent = emoji;

            // Clear previous gauge if it exists
            gaugeContainer.innerHTML = '';

            // Initialize JustGage
            new JustGage({
                id: 'gaugeContainer', // ID of the div where the gauge will be rendered
                value: totalScore,
                min: 25, // Minimum possible score
                max: 100, // Maximum possible score
                title: 'Well-being Score',
                label: wellBeingStatus,
                valueMinFontSize: 24,
                relativeGaugeSize: true, // Scale gauge size with container
                // This section defines the color zones for the gauge.
                // The ranges should match your scoring logic in Laravel.
                // Each range covers 25-100.
                ranges: [{
                    from: 25,
                    to: 40,
                    color: "#ef3c3e" // Red for "Seeking Support & Care"
                }, {
                    from: 41,
                    to: 55,
                    color: "#f68b1f" // Orange for "Challenged & Seeking Calm"
                }, {
                    from: 56,
                    to: 70,
                    color: "#ffcb05" // Yellow for "Feeling A Bit Off"
                }, {
                    from: 71,
                    to: 85,
                    color: "#b0d749" // Light Green for "Balanced & Content"
                }, {
                    from: 86,
                    to: 100,
                    color: "#8dc63f" // Dark Green for "Thriving & Radiant"
                }],
                // Other gauge options for aesthetics
                hideInnerShadow: true,
                startAnimationTime: 1000,
                startAnimationType: "easeOutBounce",
                refreshAnimationTime: 1000,
                refreshAnimationType: "easeOutBounce"
            });

            // Show the modal
            const resultsModal = new bootstrap.Modal(document.getElementById('resultsModal'));
            resultsModal.show();
        }
    </script>

    @if (session()->pull('successDelete'))
        <script>
            setTimeout(() => {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Successfully Deleted Record',
                    showConfirmButton: false,
                    timer: 800
                });
            }, 500);
        </script>
        {{ session()->forget('successDelete') }}
    @endif
    @if (session()->pull('errorDelete'))
        <script>
            setTimeout(() => {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Failed To Delete Record, Please Try Again Later',
                    showConfirmButton: false,
                    timer: 800
                });
            }, 500);
        </script>
        {{ session()->forget('errorDelete') }}
    @endif
    @if (session()->pull('successLogin'))
        <script>
            setTimeout(() => {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Login Successfully',
                    showConfirmButton: false,
                    timer: 800
                });
            }, 500);
        </script>
        {{ session()->forget('successLogin') }}
    @endif
</body>

</html>
