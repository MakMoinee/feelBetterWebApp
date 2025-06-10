<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Feel Better</title>
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

    <!-- /libraries Stylesheet -->
    <link href="/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/css/style.css" rel="stylesheet">
</head>

<body>



    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0">
            <a href="index.html" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><img src="/logo.png" alt="Logo">Feel Better</h1>

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="/" class="nav-item nav-link active">Home</a>
                    <a href="/#about" class="nav-item nav-link">About</a>
                    <a href="/#assess" class="nav-item nav-link">Assesment</a>
                </div>
            </div>
        </nav>


        <!-- Carousel Start -->
        <div class="header-carousel owl-carousel">
            <div class="header-carousel-item">
                <img src="img/carousel-1.jpg" class="img-fluid w-100" alt="Image">
                <div class="carousel-caption">
                    <div class="carousel-caption-content p-3">
                        <h5 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Physiotherapy
                            Center</h5>
                        <h1 class="display-1 text-capitalize text-white mb-4">Best Solution For Painful Life</h1>
                        <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        </p>
                        <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="#">Book
                            Appointment</a>
                    </div>
                </div>
            </div>
            <div class="header-carousel-item">
                <img src="img/carousel-2.jpg" class="img-fluid w-100" alt="Image">
                <div class="carousel-caption">
                    <div class="carousel-caption-content p-3">
                        <h5 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Physiotherapy
                            Center</h5>
                        <h1 class="display-1 text-capitalize text-white mb-4">Best Solution For Painful Life</h1>
                        <p class="mb-5 fs-5 animated slideInDown">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                            1500s,
                        </p>
                        <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="#">Book
                            Appointment</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->
    </div>
    <!-- Navbar & Hero End -->




    <!-- About Start -->
    <div id="about" class="container-fluid about bg-light py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="about-img pb-5 ps-5">
                        <img src="img/about-1.jpg" class="img-fluid rounded w-100" style="object-fit: cover;"
                            alt="Image">
                        <div class="about-img-inner">
                            <img src="img/about-2.jpg" class="img-fluid rounded-circle w-100 h-100" alt="Image">
                        </div>
                        <div class="about-experience">Years Of Experience</div>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInRight" data-wow-delay="0.4s">
                    <div class="section-title text-start mb-5">
                        <h4 class="sub-title pe-3 mb-0">About Us</h4>
                        <h1 class="display-3 mb-4">We are Ready to Help You.</h1>
                        <p class="mb-4" style="text-align: justify">At Feel Better, we are committed to improving
                            mental well-being through
                            accessible, user-friendly technology. Our mission is to provide individuals with the tools,
                            resources, and support they need to navigate mental health challenges and foster a sense of
                            balance and peace in their lives.

                            Feel Better is designed to be a safe space where users can explore various mental health
                            resources, including mood tracking, personalized and coping strategies.
                            Whether you’re struggling with stress, Feel Better offers
                            evidence-based approaches to help you understand and manage your emotions better.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Feature Start -->
    <div id="assess" class="container-fluid feature py-5">
        <div class="container">
            <div class="appointment-form rounded p-5">
                <p class="fs-4 text-uppercase text-primary">Get Help</p>

                <div class="row gy-3 gx-4">
                    <div class="col-md-12">
                        <h2>Stress Level Assessment</h2>
                        <form id="stressForm" class="form" action="" method="POST">
                            @csrf
                            <!-- Age Group Selection -->
                            <div class="mb-3">
                                <label for="ageGroup" class="form-label">Select Your Age Group</label>
                                <select class="form-select" id="ageGroup" required>
                                    <option value="" disabled selected>Select your age group</option>
                                    <option value="Gen Z High School">Gen Z - High School</option>
                                    <option value="Gen Z Senior High">Gen Z - Senior High</option>
                                    <option value="Gen Z College">Gen Z - College</option>
                                    <option value="Professor">Professor</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <!-- Gender Selection -->
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" id="gender" required>
                                    <option value="" disabled selected>Select your gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Prefer Not to Say">Prefer Not to Say</option>
                                </select>
                            </div>

                            <!-- Stress Level Questions (Shuffled) -->
                            <h4 class="mt-3">How stressed do you feel right now? (Select one per
                                question)</h4>
                            <div id="questionsContainer"></div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>







    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript /libraries -->
    <script src="https://ajax.googleapis.com/ajax//libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/wow/wow.min.js"></script>
    <script src="/lib/easing/easing.min.js"></script>
    <script src="/lib/waypoints/waypoints.min.js"></script>
    <script src="/lib/owlcarousel/owl.carousel.min.js"></script>


    <!-- Template Javascript -->
    <script src="/js/main.js"></script>
    <script>
        // Randomized and shuffled stress level questions
        const questions = [
            "How often do you feel overwhelmed by tasks?",
            "Do you experience physical symptoms like headaches or muscle tension due to stress?",
            "How often do you feel anxious about your future?",
            "Do you find it hard to sleep because of stress?",
            "How often do you feel like you can't cope with everything?",
            "Do you have trouble focusing on tasks because of stress?",
            "Do you feel that stress is affecting your health?",
            "How often do you feel like you need a break but can't find the time?",
            "Do you frequently worry about things out of your control?",
            "How often do you feel tired even after resting?",
            "Do you feel like you have no time for yourself?",
            "How much do you avoid social activities because of stress?",
            "Do you feel like stress is affecting your performance at work/school?",
            "Do you have a hard time relaxing after work/school?",
            "How often do you feel physically drained?",
            "Do you often feel that your workload is too heavy to manage?",
            "Do you feel emotionally exhausted?",
            "How often do you feel nervous or anxious without a clear reason?",
            "Do you struggle to find balance between work/school and relaxation?",
            "How often do you find yourself feeling overwhelmed by minor issues?",
            "Do you feel more stressed in the mornings or evenings?",
            "How often do you find yourself in a bad mood due to stress?",
            "Do you feel like stress negatively impacts your relationships?",
            "How often do you rely on unhealthy coping mechanisms (e.g., smoking, drinking)?",
            "Do you find it difficult to make decisions because of stress?"
        ];

        // Shuffle questions randomly
        function shuffleArray(arr) {
            for (let i = arr.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [arr[i], arr[j]] = [arr[j], arr[i]];
            }
        }

        // Render questions to the form
        function renderQuestions() {
            shuffleArray(questions);
            const container = document.getElementById('questionsContainer');
            questions.slice(0, 25).forEach((question, index) => {
                const questionDiv = document.createElement('div');
                questionDiv.classList.add('mb-3');
                questionDiv.innerHTML = `
                    <label for="q${index + 1}" class="form-label">${question}</label>
                    <select class="form-select" id="q${index + 1}" required>
                        <option value="" disabled selected>Select your answer</option>
                        <option value="Resting">Resting</option>
                        <option value="Low Stress">Low Stress</option>
                        <option value="Medium Stress">Medium Stress</option>
                        <option value="High Stress">High Stress</option>
                    </select>
                `;
                container.appendChild(questionDiv);
            });
        }

        // Initialize the form on page load
        window.onload = function() {
            renderQuestions();
        }

        // Form submission handling
        document.getElementById('stressForm').addEventListener('submit', function(event) {
            event.preventDefault();
            alert("Your response has been recorded. Thank you for participating!");
        });
    </script>
</body>

</html>
