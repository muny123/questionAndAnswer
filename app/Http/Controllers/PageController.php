<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index(){
        
        $questions = Question::paginate(10);
        return view('welcome')->with('questions', $questions);

    }

    public function submitQuestion(Request $request)
    {
       $this->validate($request, [
        'title' => 'nullable',
        'question' => 'required',
       ]);

    //    using OOP method
       $question = new Question();

       $question->email = Auth::User()->email ;
       $question->title = $request->title;
       $question->question = $request->question;

       if($question->save()){
            return redirect()->route('index')->with('success', 'Your question has been successfully submitted!');

       }else{
            return redirect()->back()->with('error', "Something went wrong!");

       }




    // using procedural method
    //    $userEmail = Auth::User()->email;
    //    $save = DB::insert("INSERT INTO questions (email, title, question) VALUES ('$userEmail','$request->title', '$request->question')");
       

    //    if($save){
    //     return redirect()->route('index')->with('success', 'Your question has been successfully submitted!');
    //    }else{
    //     return redirect()->back()->with('error', "Something went wrong!");
    //    }

    }



    public function deleteQuestion(Request $request, $id){

    }

}
