<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;

class AcceptAnswerController extends Controller
{
    public function __invoke(Request $request, Answer $answer) 
    {
    	//dd('Accept Answer');
    	$this->authorize('accept', $answer);

    	$answer->question->AcceptBestAnswer($answer);

    	if (request()->expectsJson()) {
    		return response()->json([
    			'message' => "You have accepted this answer as best answer"
    		]);
    	}
    	return back();
    }
}
