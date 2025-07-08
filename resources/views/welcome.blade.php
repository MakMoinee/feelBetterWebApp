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
                        <h1 class="display-3 mb-4">Feel better offers evidence based approach to help
                            you understand and manage your emotions better.</h1>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <button id="btnStartQ" onclick="startQuestion()" class="btn btn-primary"
                        style="width: 100%;">Start</button>
                </div>
            </div>
        </div>
    </div>
    <div id="assess" class="container-fluid feature py-5 "
        style="display:none;background-image: url('/1.png');  background-size: cover; background-repeat: no-repeat; background-position: center; width: 100%; height: 500px;">
        <div class="container">
            <div class="appointment-form rounded p-5 mt-4"
                style="background-color: rgba(255, 255, 255, 0.8) !important;">

                <div class="row gy-3 gx-4">
                    <div class="col-md-12">
                        <h2>Well-being Check-in</h2>
                        <form id="stressForm" class="form" action="" method="POST">
                            <div id="initialQuestions">
                                <div class="mb-3">
                                    <label for="ageGroup" class="form-label text-dark">Select Your Age Group</label>
                                    <select class="form-select" id="ageGroup" required>
                                        <option value="" disabled selected>Select your age group</option>
                                        <option value="Gen Z High School">Gen Z</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="gender" class="form-label text-dark">Gender</label>
                                    <select class="form-select" id="gender" required>
                                        <option value="" disabled selected>Select your gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Prefer Not to Say">Prefer Not to Say</option>
                                    </select>
                                </div>

                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-primary"
                                        id="startSurveyButton">Start</button>
                                </div>
                            </div>


                            <div id="wellBeingQuestions" style="display:none; ">
                                <h4 class="mt-4 text-dark">What's your current well-being like? (Select one per
                                    question)</h4>
                                <div id="questionsContainer"></div>
                                <div id="paginationControls" class="mt-4"></div>

                                <div id="finalAffirmationContainer"></div>

                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-primary" id="submitButton"
                                        style="display: none;">Submit</button>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
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
                    <br>
                    <p class="display-4 mt-4" id="modalEmoji"></p>
                    <p class="text-muted small">Score range: 0 (lowest) to 120 (highest)</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        onclick="window.location.href='/'">Close</button>
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
        // All 50 well-being questions
        const allQuestions = [
            "I often feel sad or down for no clear reason",
            "I feel emotionally overwhelmed by everyday tasks",
            "I find it difficult to feel genuinely happy or excited",
            "I have trouble calming down when I'm upset.",
            "I feel emotionally numb or disconnected.",
            "I feel hopeless about the future.",
            "I feel like I'm not good enough or constantly compare myself to others.",
            "I feel anxious or on edge, even when nothing seems wrong.",
            "I find it hard to express my emotions clearly.",
            "I feel burned out or mentally exhausted",
            "I feel left out or isolated on social media.",
            "I compare my life to others online and feel worse about myself.",
            "I feel pressure to always be 'on' or available digitally.",
            "l avoid real-life social interactions in favor of online ones.",
            "I feel more comfortable online than in person.",
            "I feel anxious when I don't get likes or responses online.",
            "I doomscroll or consume content that makes me feel worse.",
            "I struggle with FOMO (fear of missing out).",
            "I have experienced cyberbullying or negative online interactions.",
            "I find social media negatively affects my mood.",
            "I have trouble concentruting or focusing on tasks.",
            "I procrastinate or avoid responsibilities even when they stress me out.",
            "I struggle to sleep due to overthinking or screen use.",
            "I overthink things to the point of distress.",
            "I feel stuck or unmotivated to do things I once enjoyed",
            "I turn to substances, food, or screen time to escape feelings",
            "I have difficulty setting boundaries with others",
            "I feel like I can't ask for help or open up to others",
            "I worry excessively about school, work, or the future",
            "I've had thoughts of self-harm, hopelessness, or wishing I didn't exist"
        ];

        // New quotes/messages to be shuffled and displayed
        const inspirationalMessages = [
            "You don’t have to control your thoughts. You just have to stop letting them control you. — Dan Millman",
            "Your present circumstances don’t determine where you can go; they merely determine where you start. — Nido Qubein",
            "Start where you are. Use what you have. Do what you can. — Arthur Ashe",
            "Just when the caterpillar thought the world was over, it became a butterfly. — Anonymous proverb",
            "You are stronger than you think, and you have survived everything you’ve been through. — Unknown",
            "It’s okay to rest. Resting doesn’t mean you’re giving up — it means you’re refueling.",
            "Your thoughts are not facts. You can observe them without believing every one.",
            "You’ve gotten through difficult moments before — give yourself credit for that.",
            "There is no shame in needing help. Everyone has tough moments — asking is brave.",
            "Right now, just being here and trying is enough."
        ];

        const finalAffirmations = [
            "You're doing great! Keep prioritizing your well-being.",
            "Excellent job reflecting on your mental health!",
            "Thank you for taking the time to assess your well-being. You're on the right track!",
            "Wonderful work! Your awareness is a powerful tool for self-care."
        ];

        const NUM_QUESTIONS_TO_USE = 30; // Define how many questions to use
        let questions = []; // This will hold our 25 selected and shuffled questions
        let shuffledMessages = []; // This will hold our shuffled inspirational messages

        let currentPage = 0; // Start at 0 to account for initial demographic page
        let lastCurrentPage = 0;
        let selectedAnswers = {}; // `selectedAnswers` will store answers for all questions by their original index
        let imagePic = 1;
        let lastImagePic = 1;
        let messageCounter = 0; // To cycle through shuffledMessages

        // Shuffle and select a subset of questions
        function shuffleAndSelectQuestions(arr, numToSelect) {
            // Create a shallow copy to avoid modifying the original array
            const shuffled = [...arr];
            for (let i = shuffled.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [shuffled[i], shuffled[j]] = [shuffled[j], shuffled[i]];
            }
            return shuffled.slice(0, numToSelect);
        }

        // Generic shuffle function
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
            const paginationContainer = document.getElementById('paginationControls');

            container.innerHTML = ''; // Clear previous questions
            finalAffirmationContainer.innerHTML = ''; // Clear previous affirmations

            const totalQuestionPages = questions.length; // Each question is a page

            // Show/Hide Submit Button based on current page
            if (currentPage === totalQuestionPages) { // If it's the last question page
                submitButton.style.display = 'block';
                paginationContainer.style.display = 'none'; // Hide pagination on the last page before submit
            } else {
                submitButton.style.display = 'none';
                paginationContainer.style.display = 'flex'; // Show pagination for questions
            }

            // Display mental health message using SweetAlert2 every 5 *question* pages
            if (currentPage > 0 && currentPage % 10 === 0) {
                lastCurrentPage = currentPage;
                // Get the current message from the shuffled messages and cycle through them
                const randomMessage = inspirationalMessages[messageCounter % inspirationalMessages.length];
                messageCounter++; // Increment for the next message

                // Swal.fire({
                //     position: 'center',
                //     icon: 'info',
                //     title: 'A Little Something For You:',
                //     text: randomMessage,
                //     showConfirmButton: true,
                //     confirmButtonText: 'Got It!'
                // });

                imagePic++;
                if (imagePic <= 3) { // Ensure you have images 1.png through 6.png
                    let assess = document.getElementById('assess');
                    assess.setAttribute("style",
                        `background-image: url('/${imagePic}.png');  background-size: cover; background-repeat: no-repeat; background-position: center; width: 100%; height: 900px;`
                    );
                } else if (imagePic > 3) {
                    imagePic = 3;
                } else {
                    imagePic = 1;
                }
            }


            // Render the current question
            if (currentPage > 0 && currentPage <= totalQuestionPages) {
                const currentQuestionIndexInSelectedArray = currentPage - 1; // Adjust for 0-indexed array
                const qText = questions[currentQuestionIndexInSelectedArray];
                // Find the original index from `allQuestions` to maintain consistent `selectedAnswers` keys
                const originalIndex = allQuestions.indexOf(qText);

                const questionDiv = document.createElement('div');
                questionDiv.classList.add('mb-3');
                const questionId = `q-${originalIndex}`;
                questionDiv.innerHTML = `
                <label for="${questionId}" class="form-label text-dark">${qText}</label>
                <select class="form-select" id="${questionId}" data-question-original-index="${originalIndex}" required>
                    <option value="" disabled selected>Select your answer</option>
                    <option value="rarely">Rarely or Never</option>
                    <option value="sometimes">Sometimes</option>
                    <option value="often">Often</option>
                    <option value="almost_always">Almost Always</option>
                </select>
            `;
                container.appendChild(questionDiv);

                // Set previously selected answer if available
                if (selectedAnswers[originalIndex]) {
                    document.getElementById(questionId).value = selectedAnswers[originalIndex];
                }

                // Add event listener to save answers
                document.getElementById(questionId).addEventListener('change', (event) => {
                    selectedAnswers[originalIndex] = event.target.value;
                });
            } else if (currentPage === 0) {
                // This is the initial demographic page, questionsContainer should be empty
                // The initial questions are handled by the 'initialQuestions' div
            } else {
                // Beyond the last question page, means survey is complete or submitted
                document.getElementById('wellBeingQuestions').style.display = 'none';
                displayFinalAffirmation();
                return;
            }

            renderPaginationControls(totalQuestionPages);
        }

        // Render pagination controls
        function renderPaginationControls(totalQuestionPages) {
            const paginationContainer = document.getElementById('paginationControls');
            paginationContainer.innerHTML = ''; // Clear previous controls

            // Previous Button
            const prevButton = document.createElement('button');
            prevButton.classList.add('btn', 'btn-primary', 'me-2');
            prevButton.textContent = 'Previous';
            prevButton.disabled = currentPage <= 1; // Disable on first question page or demographics
            prevButton.addEventListener('click', () => {
                currentPage--;
                renderQuestions();
            });
            paginationContainer.appendChild(prevButton);

            // Page Number Indicator
            const pageIndicator = document.createElement('span');
            pageIndicator.classList.add('me-2');
            if (currentPage === 0) {
                pageIndicator.textContent = 'Demographics';
            } else {
                pageIndicator.textContent = `Question ${currentPage} of ${totalQuestionPages}`;
            }
            paginationContainer.appendChild(pageIndicator);

            // Next Button
            const nextButton = document.createElement('button');
            nextButton.classList.add('btn', 'btn-primary');
            nextButton.textContent = 'Next';
            nextButton.disabled = currentPage === totalQuestionPages; // Disable on the last question page

            nextButton.addEventListener('click', () => {
                if (currentPage === 0) { // On demographics page
                    const ageGroup = document.getElementById('ageGroup').value;
                    const gender = document.getElementById('gender').value;

                    if (!ageGroup || !gender) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops!',
                            text: 'Please fill out all demographic fields before proceeding.',
                            confirmButtonText: 'OK'
                        });
                        return;
                    }
                    // Hide initial questions and show well-being questions
                    document.getElementById('initialQuestions').style.display = 'none';
                    document.getElementById('wellBeingQuestions').style.display = 'block';
                } else { // On a question page
                    const currentQuestionText = questions[currentPage -
                        1]; // Get the question text from the selected questions array
                    const currentQuestionOriginalIndex = allQuestions.indexOf(
                        currentQuestionText); // Find its original index

                    if (!selectedAnswers[currentQuestionOriginalIndex]) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops!',
                            text: 'Please answer the current question before proceeding.',
                            confirmButtonText: 'OK'
                        });
                        return;
                    }
                }
                currentPage++;
                renderQuestions();
            });
            paginationContainer.appendChild(nextButton);
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
                    timer: 1500
                });
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: message,
                    showConfirmButton: true,
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
            modalWellBeingDescription.setAttribute("style", "margin-bottom: 50px;");
            gaugeContainer.setAttribute("style", "margin-bottom: 50px;");

            let emoji = '';
            let gaugeColors = [];
            let finalStat = "";

            // Map well-being status to emoji and gauge colors
            switch (wellBeingStatus) {
                case 'Functioning well overall':
                    emoji = '😄';
                    gaugeColors = [{
                        from: 0,
                        to: 85,
                        color: "#ef3c3e"
                    }, {
                        from: 86,
                        to: 120,
                        color: "#8dc63f"
                    }]; // Green
                    finalStat = "Low Distress";
                    break;
                case 'Consider self-care and social support':
                    emoji = '🙂';
                    gaugeColors = [{
                        from: 0,
                        to: 70,
                        color: "#f68b1f"
                    }, {
                        from: 71,
                        to: 120,
                        color: "#b0d749"
                    }]; // Light Green
                    finalStat = "Moderate Distress";
                    break;
                case 'Consider talking to a counselor or therapist':
                    emoji = '😐';
                    gaugeColors = [{
                        from: 0,
                        to: 55,
                        color: "#f68b1f"
                    }, {
                        from: 56,
                        to: 120,
                        color: "#ffcb05"
                    }]; // Yellow
                    finalStat = "High Distress";
                    break;
                case 'Seek Professinal Help as soon as possible':
                    emoji = '😟';
                    gaugeColors = [{
                        from: 0,
                        to: 40,
                        color: "#ef3c3e"
                    }, {
                        from: 41,
                        to: 120,
                        color: "#f68b1f"
                    }]; // Orange
                    break;
                default:
                    emoji = '❓';
                    gaugeColors = [{
                        from: 0,
                        to: 120,
                        color: "#cccccc"
                    }];
                    finalStat = "Very High Distress";
            }

            modalEmoji.textContent = emoji;
            modalEmoji.setAttribute("style", "margin-top:50px;")

            // Clear previous gauge if it exists
            gaugeContainer.innerHTML = '';

            // Initialize JustGage
            new JustGage({
                id: 'gaugeContainer', // ID of the div where the gauge will be rendered
                value: totalScore,
                min: 0, // Minimum possible score
                max: 120, // Maximum possible score
                title: 'Well-being Score',
                label: finalStat,
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

            if (!ageGroup || !gender) {
                form.classList.add('was-validated'); // Add Bootstrap validation styles
                showMessage("Please fill out your age group, gender, and how you're feeling.", 'error');
                return;
            }

            // Check if all selected questions have been answered
            const allSelectedQuestionsAnswered = Object.keys(selectedAnswers).length === questions.length;
            if (!allSelectedQuestionsAnswered) {
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
                feeling: "",
                wellBeingAnswers: Object.keys(selectedAnswers).map(originalIndex => ({
                    question: allQuestions[
                        originalIndex], // Use original `allQuestions` array for text
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
                    currentPage = 0; // Reset to the initial demographics page
                    questions = shuffleAndSelectQuestions(allQuestions,
                        NUM_QUESTIONS_TO_USE); // Reshuffle and re-select questions for a fresh start
                    shuffleArray(inspirationalMessages); // Reshuffle the inspirational messages
                    messageCounter = 0; // Reset message counter
                    document.getElementById('initialQuestions').style.display = 'block'; // Show demographics
                    document.getElementById('wellBeingQuestions').style.display = 'none'; // Hide questions
                    form.reset(); // Reset form fields
                    renderQuestions(); // Re-render the initial state

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

        // Event listener for the "Start Well-being Questions" button
        document.getElementById('startSurveyButton').addEventListener('click', () => {
            const ageGroup = document.getElementById('ageGroup').value;
            const gender = document.getElementById('gender').value;

            if (!ageGroup || !gender) {
                // Add Bootstrap validation styles to the demographic fields
                document.getElementById('ageGroup').reportValidity();
                document.getElementById('gender').reportValidity();
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops!',
                    text: 'Please fill out all demographic fields before starting the well-being questions.',
                    confirmButtonText: 'OK'
                });
                return;
            }

            // Hide initial questions and show well-being questions
            document.getElementById('initialQuestions').style.display = 'none';
            document.getElementById('wellBeingQuestions').style.display = 'block';
            currentPage = 1; // Move to the first question page
            renderQuestions();
        });

        // Initialize the form on page load
        window.onload = function() {
            questions = shuffleAndSelectQuestions(allQuestions,
                NUM_QUESTIONS_TO_USE); // Shuffle and select 25 questions on load
            shuffleArray(inspirationalMessages); // Shuffle the inspirational messages on load
            renderQuestions(); // Render the initial state (demographics)
        }

        function startQuestion() {
            let btnStartQ = document.getElementById("btnStartQ");
            let assess = document.getElementById("assess");
            btnStartQ.setAttribute("style", "display:none;");
            assess.removeAttribute("style");
            assess.setAttribute("style",
                "background-image: url('/1.png');  background-size: cover; background-repeat: no-repeat; background-position: center; width: 100%; height: 900px; "
            );

            let about = document.getElementById("about");
            about.setAttribute("style", "display:none;");
        }
    </script>
</body>

</html>
