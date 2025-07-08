<?php

namespace App\Http\Controllers;

use App\Models\Assessments;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $newAssessment = new Assessments();
        $newAssessment->ageGroup = $request->ageGroup;
        $newAssessment->gender = $request->gender;
        // Corrected a typo here: previously $newAssessment->gender = $request->gender; appeared twice
        $newAssessment->feeling = $request->feeling ?? "none"; // Using null coalescing operator for cleaner default

        $jsonString = json_encode($request->wellBeingAnswers);

        // All 50 original questions (same as in your JavaScript)
        $allOriginalQuestions = [
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

        // Define the scoring for frequency options (standard)
        $scoreMapping = [
            'rarely' => 1,
            'sometimes' => 2,
            'often' => 3,
            'almost_always' => 4,
        ];

        // Define the inverse questions (where a higher frequency implies lower well-being)
        // Ensure this list is comprehensive for all questions where higher frequency means worse well-being
        $inverseQuestions = [
            "Do you feel tired?",
            "Do you often feel sad or down for no specific reason?",
            "Do you find it hard to enjoy things you used to like?",
            "Do you feel emotionally lost or empty?",
            "Do you feel more irritable than usual?",
            "Do you cry more easily than before?",
            "Do you find yourself overthinking everything?",
            "Do you feel like you are moving or speaking more slowly than usual?",
            "Do you experience sudden mood swings?",
            "Do you feel hopeless about the future?",
            "Do you feel hard to recharge?",
            "Do you find it hard to control your worrying?",
            "Do you feel nervous in social situations?",
            "Do you avoid certain activities due to fear or anxiety?",
            "Do you feel like something bad is going to happen?",
            "Do you have physical symptoms like a racing heart, trembling, or sweating without reason?",
            "Do you experience panic attacks or moments of intense fear?",
            "Do you feel anxious even when you’re not under pressure?",
            "Do you avoid responsibilities because they feel overwhelming?",
            "Do you feel mentally lost most of the time?",
            "Do you have trouble falling asleep?",
            "Do you wake up frequently during the night?",
            "Do you sleep much more or much less than usual?",
            "Do you find it hard to get out of bed in the morning?",
            "Do you find it hard to concentrate?",
            "Do you forget things more easily lately?",
            "Do you feel unmotivated to do daily tasks?",
            "Do you procrastinate more than usual?",
            "Do you struggle to make decisions?",
            "Do you feel like a burden to others?",
            "Do you think negatively about yourself?",
            "Do you feel like you’re not good enough?",
            "Do you blame yourself for things beyond your control?",
            "Do you compare yourself negatively to others?",
            "Do you experience frequent headaches?",
            "Do you have stomachaches or digestion issues without a medical cause?",
            "Do your muscles feel tense or sore even when you’re not active?",
            "Do you feel unusually tired even after resting?",
            "Do you experience changes in appetite (eating more or less)?",
            "Have you withdrawn from friends or family?",
            "Do you avoid things you used to enjoy?",
            "Do you find yourself using alcohol, food, or substances to cope?",
            "Do you lash out or lose your temper more easily?",
            "Do you engage in risky behaviors or impulsive actions?",
            "Do you often feel like life has no meaning?",
            "Do you think about hurting yourself or others?",
            "Do you feel like no one understands you?",
            "Do you feel disconnected from yourself or your surroundings?",
            "Do you wish you could just disappear or escape your life?"
        ];


        $wellBeingAnswers = $request->wellBeingAnswers;

        $totalWellBeingScore = 0;
        $numberOfQuestionsAnswered = count($wellBeingAnswers); // This will be 25 based on frontend logic

        foreach ($wellBeingAnswers as $answerEntry) {
            $questionText = $answerEntry['question'];
            $answerValue = $answerEntry['answer'];

            // Get the base score from the mapping
            $score = $scoreMapping[$answerValue];

            // If it's an inverse question, reverse the score
            // We use allOriginalQuestions as the reference point for `in_array`
            // since the `questionText` coming from the frontend is directly from the
            // `allQuestions` array in JavaScript (which is the same as `$allOriginalQuestions` here).
            if (in_array($questionText, $inverseQuestions)) {
                $score = (5 - $score); // Converts 1->4, 2->3, 3->2, 4->1
            }

            $totalWellBeingScore += $score;
        }

        // Calculate the maximum possible score for the answered questions
        // Since each question has a max score of 4, the max score is 25 * 4 = 100
        $maxPossibleScore = $numberOfQuestionsAnswered * 4;

        // Determine the well-being description based on the total score
        // The ranges need to be adjusted for a max score of 100 (25 questions * 4 max score)
        $wellBeingDescription = 'Undetermined'; // Default

        if ($totalWellBeingScore >= 91) { // 71-85 (Balanced)
            $wellBeingDescription = 'Seek Professinal Help as soon as possible';
        } elseif ($totalWellBeingScore >= 61) { // 56-70 (Feeling A Bit Off)
            $wellBeingDescription = 'Consider talking to a counselor or therapist';
        } elseif ($totalWellBeingScore >= 31) { // 41-55 (Challenged)
            $wellBeingDescription = 'Consider self-care and social support';
        } else { // 25-40 (Seeking Support & Care)
            $wellBeingDescription = 'Functioning well overall';
        }


        $newAssessment->wellBeingAnswers = $jsonString;
        $newAssessment->result = $wellBeingDescription;
        $newAssessment->score = $totalWellBeingScore;
        $isSave = $newAssessment->save();

        if ($isSave) {
            return response()->json([
                'message' => 'Assessment submitted successfully!',
                'analysis' => [
                    'total_score' => $totalWellBeingScore,
                    'well_being_status' => $wellBeingDescription,
                    'current_feeling' => $request->feeling // Include the self-reported feeling
                ]
            ], 200);
        } else {
            return response()->json(["error" => true, 'message' => 'Failed to save assessment.'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
