<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Feel Better</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="/logo.png" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Playfair+Display:wght@400;500;600&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <link href="/css/style.css" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</head>

<body>
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
                </div>
            </div>
        </nav>
    </div>
    <div id="about" class="container-fluid about bg-light py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="about-img pb-5 ps-5">
                        <img src="img/about-1.jpg" class="img-fluid rounded w-100" style="object-fit: cover;"
                            alt="Image">
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
    <div id="assess" class="container-fluid feature py-5">
        <div class="container">
            <div class="appointment-form rounded p-5">

                <div class="row gy-3 gx-4">
                    <div class="col-md-12">
                        <h2>Well-being Check-in</h2>
                        <form id="stressForm" class="form" action="" method="POST">
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

                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" id="gender" required>
                                    <option value="" disabled selected>Select your gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Prefer Not to Say">Prefer Not to Say</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="feeling" class="form-label">How are you feeling today</label>
                                <select class="form-select" id="feeling" required>
                                    <option value="" disabled selected>Select your answer</option>
                                    <option value="joyful">Joyful</option>
                                    <option value="energetic">Energetic</option>
                                    <option value="sad">Sad</option>
                                    <option value="irritable">Irritable</option>
                                    <option value="anxious">Anxious</option>
                                </select>
                            </div>

                            <h4 class="mt-4">What's your current well-being like? (Select one per
                                question)</h4>
                            <div id="questionsContainer"></div>
                            <div id="paginationControls" class="mt-4"></div>

                            <div id="finalAffirmationContainer"></div>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary" id="submitButton" style="display: none;">Submit</button>
                            </div>
                        </form>
                        <div id="formMessage" class="mt-3 text-center" style="display: none;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>

    <div class="modal fade" id="resultsModal" tabindex="-1" aria-labelledby="resultsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resultsModalLabel">Your Well-being Snapshot</h5>
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/wow/wow.min.js"></script>
    <script src="/lib/easing/easing.min.js"></script>
    <script src="/lib/waypoints/waypoints.min.js"></script>
    <script src="/lib/owlcarousel/owl.carousel.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/justgage/1.4.0/justgage.min.js"></script>

    <script src="/js/main.js"></script>
    <script>
        // Randomized and shuffled well-being questions
        const questions = [
            "How often do you feel like your plate is full, but manageable?",
            "Do you notice any physical sensations that might suggest you're overexerting yourself?",
            "How often do you feel a sense of ease about what's ahead?",
            "Do you find it easy to get restful sleep most nights?",
            "How often do you feel capable of handling your daily responsibilities?",
            "Do you find it generally easy to stay focused on your tasks?",
            "Do you feel your daily activities are supporting your overall health?",
            "How often do you feel like you have enough time for rest and rejuvenation?",
            "Do you frequently find yourself letting go of concerns about things beyond your control?",
            "How often do you feel energized after a period of rest?",
            "Do you feel like you have enough time for personal pursuits and enjoyment?",
            "How much do you feel comfortable engaging in social activities?",
            "Do you feel your current pace supports your effectiveness at work/school?",
            "Do you find it easy to transition from work/school to relaxation?",
            "How often do you feel physically well and balanced?",
            "Do you often feel your workload is appropriately aligned with your capacity?",
            "Do you feel emotionally refreshed and resilient?",
            "How often do you feel calm and at peace without a clear reason for unease?",
            "Do you feel you've found a good rhythm between your commitments and downtime?",
            "How often do you find yourself approaching minor issues with a sense of calm?",
            "Do you feel more balanced and present throughout your day?",
            "How often do you find yourself in a generally positive or neutral mood?",
            "Do you feel your interactions with others are largely supportive and positive?",
            "How often do you rely on practices that genuinely support your well-being (e.g., healthy habits, self-care)?",
            "Do you find it easy to make decisions with clarity?"
        ];

        // Quotes/Bible verses related to mental health
        const mentalHealthMessages = [
            "The mind is everything. What you think you become. – Buddha",
            "You are not a drop in the ocean. You are the entire ocean in a drop. – Rumi",
            "And the peace of God, which transcends all understanding, will guard your hearts and your minds in Christ Jesus. – Philippians 4:7",
            "Be kind, for everyone you meet is fighting a harder battle. – Plato",
            "For God has not given us a spirit of fear, but of power and of love and of a sound mind. – 2 Timothy 1:7",
            "It's okay not to be okay. Just don't give up. – Unknown",
            "Come to me, all you who are weary and burdened, and I will give you rest. – Matthew 11:28"
        ];

        const finalAffirmations = [
            "You're doing great! Keep prioritizing your well-being.",
            "Excellent job reflecting on your mental health!",
            "Thank you for taking the time to assess your well-being. You're on the right track!",
            "Wonderful work! Your awareness is a powerful tool for self-care."
        ];

        const questionsPerPage = 10;
        let currentPage = 1;
        let shuffledQuestions = [...questions]; // Create a mutable copy
        // `selectedAnswers` will store answers for all questions by their original index
        let selectedAnswers = {}; 

        // Shuffle questions randomly
        function shuffleArray(arr) {
            for (let i = arr.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [arr[i], arr[j]] = [arr[j], arr[i]];
            }
        }

        // Render questions to the form
        function renderQuestions() {
            const container = document.getElementById('questionsContainer');
            const finalAffirmationContainer = document.getElementById('finalAffirmationContainer');
            const submitButton = document.getElementById('submitButton');

            container.innerHTML = ''; // Clear previous questions
            finalAffirmationContainer.innerHTML = ''; // Clear previous affirmations

            const startIndex = (currentPage - 1) * questionsPerPage;
            const endIndex = startIndex + questionsPerPage;
            const totalPages = Math.ceil(shuffledQuestions.length / questionsPerPage);

            // Hide/Show Submit Button based on current page
            if (currentPage === totalPages) {
                submitButton.style.display = 'block';
            } else {
                submitButton.style.display = 'none';
            }


            // If we've advanced beyond the last page, display final affirmation
            if (currentPage > totalPages) {
                document.getElementById('paginationControls').style.display = 'none';
                submitButton.style.display = 'none'; // Hide submit button if already finished
                displayFinalAffirmation();
                return;
            }

            document.getElementById('paginationControls').style.display = 'block';

            // Display mental health message using SweetAlert2 on the second page
            if (currentPage === 2) {
                const randomMessage = mentalHealthMessages[Math.floor(Math.random() * mentalHealthMessages.length)];
                Swal.fire({
                    position: 'center',
                    icon: 'info',
                    title: 'A Little Something For You:',
                    text: randomMessage,
                    showConfirmButton: true,
                    confirmButtonText: 'Got It!'
                });
            }

            const questionsToRender = shuffledQuestions.slice(startIndex, endIndex);

            // window.renderedQuestions is only for the current page's questions
            // This helps in validating answers only for the current page
            window.renderedQuestions = questionsToRender.map((q) => ({
                text: q,
                originalIndex: questions.indexOf(q) // Store original index for selectedAnswers object
            }));

            window.renderedQuestions.forEach((qObj) => {
                const questionDiv = document.createElement('div');
                questionDiv.classList.add('mb-3');
                // Use original index for unique ID and for accessing selectedAnswers
                const questionId = `q-${qObj.originalIndex}`; 
                questionDiv.innerHTML = `
                    <label for="${questionId}" class="form-label">${qObj.text}</label>
                    <select class="form-select" id="${questionId}" data-question-original-index="${qObj.originalIndex}" required>
                        <option value="" disabled selected>Select your answer</option>
                        <option value="rarely">Rarely or Never</option>
                        <option value="sometimes">Sometimes</option>
                        <option value="often">Often</option>
                        <option value="almost_always">Almost Always</option>
                    </select>
                `;
                container.appendChild(questionDiv);

                // Set previously selected answer if available
                if (selectedAnswers[qObj.originalIndex]) {
                    document.getElementById(questionId).value = selectedAnswers[qObj.originalIndex];
                }

                // Add event listener to save answers
                document.getElementById(questionId).addEventListener('change', (event) => {
                    selectedAnswers[qObj.originalIndex] = event.target.value;
                });
            });

            renderPaginationControls();
        }

        // Render pagination controls
        function renderPaginationControls() {
            const paginationContainer = document.getElementById('paginationControls');
            paginationContainer.innerHTML = ''; // Clear previous controls

            const totalPages = Math.ceil(shuffledQuestions.length / questionsPerPage);

            // Previous Button
            const prevButton = document.createElement('button');
            prevButton.classList.add('btn', 'btn-primary', 'me-2');
            prevButton.textContent = 'Previous';
            prevButton.disabled = currentPage === 1;
            prevButton.addEventListener('click', () => {
                currentPage--;
                renderQuestions();
            });
            paginationContainer.appendChild(prevButton);

            // Page Number Indicator
            const pageIndicator = document.createElement('span');
            pageIndicator.classList.add('me-2');
            pageIndicator.textContent = `Page ${currentPage} of ${totalPages}`;
            paginationContainer.appendChild(pageIndicator);

            // Next Button
            const nextButton = document.createElement('button');
            nextButton.classList.add('btn', 'btn-primary');
            nextButton.textContent = 'Next';
            // Disable next button on the last page as the submit button will appear
            nextButton.disabled = currentPage === totalPages;

            nextButton.addEventListener('click', () => {
                // Check if all questions on the current page are answered before proceeding
                const currentQuestions = window.renderedQuestions;
                const allAnsweredOnCurrentPage = currentQuestions.every(qObj => selectedAnswers[qObj.originalIndex]);

                if (!allAnsweredOnCurrentPage) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops!',
                        text: 'Please answer all questions on this page before proceeding.',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                currentPage++;
                renderQuestions();
            });
            // Only append Next button if not on the last page
            if (currentPage < totalPages) {
                paginationContainer.appendChild(nextButton);
            }
        }

        // Display final affirmation
        function displayFinalAffirmation() {
            const randomAffirmation = finalAffirmations[Math.floor(Math.random() * finalAffirmations.length)];
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: randomAffirmation,
                showConfirmButton: false,
                timer: 2000
            });
            document.getElementById('questionsContainer').innerHTML = ''; // Clear questions
            document.getElementById('paginationControls').innerHTML = ''; // Clear pagination controls
            document.getElementById('submitButton').style.display = 'none'; // Ensure submit button is hidden
        }

        // Function to display messages (for form submission status, not the gauge)
        function showMessage(message, type = 'success') {
            if (type === 'success') {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: message || 'Successfully Added Response',
                    showConfirmButton: false,
                    timer: 1500 // Increased timer slightly for clarity
                });
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: message,
                    showConfirmButton: true, // Keep confirm button for errors
                    confirmButtonText: 'OK'
                });
            }
        }

        // Function to show the results modal with gauge and emoji
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


        // Form submission handling
        document.getElementById('stressForm').addEventListener('submit', async function(event) {
            event.preventDefault(); // Prevent default form submission

            const form = event.target;
            // Validate form to ensure all initial required fields (age, gender, feeling) are filled
            const ageGroup = document.getElementById('ageGroup').value;
            const gender = document.getElementById('gender').value;
            const feeling = document.getElementById('feeling').value;

            if (!ageGroup || !gender || !feeling) {
                form.classList.add('was-validated'); // Add Bootstrap validation styles
                showMessage("Please fill out your age group, gender, and how you're feeling.", 'error');
                return;
            }
            
            // Check if all paginated questions have been answered
            const allPaginatedQuestionsAnswered = Object.keys(selectedAnswers).length === questions.length;
            if (!allPaginatedQuestionsAnswered) {
                 Swal.fire({
                    icon: 'warning',
                    title: 'Incomplete!',
                    text: 'Please ensure all well-being questions are answered before submitting.',
                    confirmButtonText: 'OK'
                });
                return;
            }

            form.classList.remove('was-validated'); // Remove validation styles if valid

            const data = {
                ageGroup: ageGroup,
                gender: gender,
                feeling: feeling,
                wellBeingAnswers: Object.keys(selectedAnswers).map(originalIndex => ({
                    question: questions[originalIndex], // Use original `questions` array for text
                    answer: selectedAnswers[originalIndex]
                }))
            };

            // Get CSRF token from meta tag
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
            if (!csrfToken) {
                showMessage("CSRF token not found. Please ensure it's included in your HTML head.", 'error');
                return;
            }

            try {
                const response = await fetch('/submit-assessment', { // Laravel route
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken // Pass the CSRF token
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (response.ok) {
                    showMessage(result.message || "Your responses have been recorded successfully!", 'success');
                    
                    // Clear answers and reset to first page after successful submission
                    selectedAnswers = {}; // Clear all stored answers
                    currentPage = 1; // Reset to the first page
                    shuffleArray(shuffledQuestions); // Reshuffle for a fresh start
                    renderQuestions(); // Re-render the first page of questions

                    // Show results in modal
                    if (result.analysis) {
                        showResultsModal(result.analysis.total_score, result.analysis.well_being_status, result
                            .analysis.current_feeling);
                    } else {
                        showMessage("Analysis results not received from the server.", 'error');
                    }

                } else {
                    showMessage(result.message ||
                        "There was an error submitting your responses. Please try again.", 'error');
                }
            } catch (error) {
                console.error('Error submitting form:', error);
                showMessage("Network error or server unreachable. Please check your connection.", 'error');
            }
        });

        // Initialize the form on page load
        window.onload = function() {
            shuffleArray(shuffledQuestions); // Shuffle only once on load
            renderQuestions();
        }
    </script>
</body>

</html>