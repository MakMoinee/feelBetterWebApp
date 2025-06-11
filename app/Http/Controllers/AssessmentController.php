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
        $newAssessment->gender = $request->gender;
        $newAssessment->feeling = $request->feeling;
        $jsonString = json_encode($request->wellBeingAnswers);

        $originalQuestions = [
            "How often do you feel like your plate is full, but manageable?",
            "Do you notice any physical sensations that might suggest you're overexerting yourself?", // This question is inverted for scoring
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

        // Define the scoring for frequency options (standard)
        $scoreMapping = [
            'rarely' => 1,
            'sometimes' => 2,
            'often' => 3,
            'almost_always' => 4,
        ];

        // Define the inverse questions (where a higher frequency implies lower well-being)
        $inverseQuestions = [
            "Do you notice any physical sensations that might suggest you're overexerting yourself?",
        ];


        $wellBeingAnswers = $request->wellBeingAnswers;

        $totalWellBeingScore = 0;

        foreach ($wellBeingAnswers as $answerEntry) {
            $questionText = $answerEntry['question'];
            $answerValue = $answerEntry['answer'];

            // Get the base score from the mapping
            $score = $scoreMapping[$answerValue];

            // If it's an inverse question, reverse the score
            if (in_array($questionText, $inverseQuestions)) {
                $score = (5 - $score); // Converts 1->4, 2->3, 3->2, 4->1
            }

            $totalWellBeingScore += $score;
        }

        // Determine the well-being description based on the total score (25 questions * 4 max score = 100 max)
        $wellBeingDescription = 'Undetermined'; // Default in case no range is hit or an issue occurs

        if ($totalWellBeingScore >= 86) {
            $wellBeingDescription = 'Thriving & Radiant';
        } elseif ($totalWellBeingScore >= 71) {
            $wellBeingDescription = 'Balanced & Content';
        } elseif ($totalWellBeingScore >= 56) {
            $wellBeingDescription = 'Feeling A Bit Off';
        } elseif ($totalWellBeingScore >= 41) {
            $wellBeingDescription = 'Challenged & Seeking Calm';
        } else { // Scores from 25 to 40
            $wellBeingDescription = 'Seeking Support & Care';
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
            return response()->json(["error" => true], 500);
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
