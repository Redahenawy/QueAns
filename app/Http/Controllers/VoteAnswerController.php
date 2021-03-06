<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;

class VoteAnswerController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function __invoke(Request $request, Answer $answer)
    {
   	  $vote = (int) request()->vote;

   	  $votesCount = auth()->user()->voteAnswer($answer, $vote);

      if($request->expectsJson()) {
            return response()->json([
              'message' => "Thanks For The Feedback",
              'votesCount' => $votesCount
            ]);
     }

   	  return back();
    }
}
