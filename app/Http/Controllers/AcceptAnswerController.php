<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;

class AcceptAnswerController extends Controller
{
    public function __invoke(Answer $answer) 
    {
    	//dd('Accept Answer');
    	$this->authorize('accept', $answer);
    	$answer->question->AcceptBestAnswer($answer);
    	return back();
    }
}
