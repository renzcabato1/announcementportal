<?php

namespace App\Http\Controllers;
use App\Survey;
use Illuminate\Http\Request;

class SurveryController extends Controller
{
    //
    public function submitsurvey(Request $request,$id)
    {
       $survey = new Survey;
       $survey->upload_pdf_id = $id;
       $survey->primary_reason = $request->primary_reason;
       $survey->other_primary = $request->others_primary;
       $survey->work_reason = $request->work_reason;
       $survey->work_remarks = $request->work_remarks;
       $survey->one = $request->one;
       $survey->comment_1 = $request->comment_1;    
       $survey->two = $request->two;
       $survey->comment_2 = $request->comment_2;
       $survey->three = $request->three;
       $survey->comment_3 = $request->comment_3;
       $survey->four = $request->four;
       $survey->comment_4 = $request->comment_4;
       $survey->five = $request->fifth;
       $survey->comment_5 = $request->comment_5;
       $survey->six = $request->six;
       $survey->comment_6 = $request->comment_6;
       $survey->seven = $request->seven;
       $survey->comment_7 = $request->comment_7;
       $survey->eight = $request->eight;
       $survey->comment_8 = $request->comment_8;
       $survey->nine = $request->nine;
       $survey->comment_9 = $request->comment_9;
       $survey->ten = $request->ten;
       $survey->comment_10 = $request->comment_10;
       $survey->eleven = $request->eleven;
       $survey->comment_11 = $request->comment_11;
       $survey->twelve = $request->twelve;
       $survey->comment_12 = $request->comment_12;
       $survey->other_suggestion = $request->other_suggestion;
       $survey->save();
       $request->session()->flash('status_survey','Successfully submitted your survey');
       return back();
    }
    public function update_submitsurvey(Request $request,$id)
    {
       $survey = Survey::findOrfail($id);
       $survey->primary_reason = $request->primary_reason;
       $survey->other_primary = $request->others_primary;
       $survey->work_reason = $request->work_reason;
       $survey->work_remarks = $request->work_remarks;
       $survey->one = $request->one;
       $survey->comment_1 = $request->comment_1;    
       $survey->two = $request->two;
       $survey->comment_2 = $request->comment_2;
       $survey->three = $request->three;
       $survey->comment_3 = $request->comment_3;
       $survey->four = $request->four;
       $survey->comment_4 = $request->comment_4;
       $survey->five = $request->fifth;
       $survey->comment_5 = $request->comment_5;
       $survey->six = $request->six;
       $survey->comment_6 = $request->comment_6;
       $survey->seven = $request->seven;
       $survey->comment_7 = $request->comment_7;
       $survey->eight = $request->eight;
       $survey->comment_8 = $request->comment_8;
       $survey->nine = $request->nine;
       $survey->comment_9 = $request->comment_9;
       $survey->ten = $request->ten;
       $survey->comment_10 = $request->comment_10;
       $survey->eleven = $request->eleven;
       $survey->comment_11 = $request->comment_11;
       $survey->twelve = $request->twelve;
       $survey->comment_12 = $request->comment_12;
       $survey->other_suggestion = $request->other_suggestion;
       $survey->save();
       $request->session()->flash('status_survey','Successfully submitted your survey');
       return back();
    }
}
