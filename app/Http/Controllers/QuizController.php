<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::with(['answers' => function ($query) {
            $query->inRandomOrder();
        }])->inRandomOrder()->get();
        return Inertia::render('Quiz', [
            'questions' => $questions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function results(Request $request)
    {
        $score = $request[0]['results']['score'];
        $totalQuestions = $request[0]['results']['totalQuestions'];

        $parcentage = ceil(($score / $totalQuestions) * 100);

        $comment = match (true) {
            $parcentage >= 80 && $parcentage <= 100 => 'Congratulations',
            $parcentage >= 60 && $parcentage <= 79 => 'Impressive',
            $parcentage >= 40 && $parcentage <= 59 => 'Almost There!',
            $parcentage < 40 => 'Oh-No',
            default => 'Well how did you reach here?'
        };

        return Inertia::render('Result', [
            'parcentage' => $parcentage,
            'comment' => $comment,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
