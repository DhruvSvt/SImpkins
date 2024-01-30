<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\StdMonthlyJourney as ModelsStdMonthlyJourney;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StdMonthlyJourney extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $std_reviews = ModelsStdMonthlyJourney::all();

        // Pluck all teacher_id values from the collection
        $teacherIds = $std_reviews->pluck('teacher_id')->unique()->toArray();

        // Retrieve all teachers with the specified teacher_ids
        $teachers = Teacher::whereIn('id', $teacherIds)->get();

        return response()->json([
            'status' => true,
            'std_reviews' => $std_reviews,
            'teachers' => $teachers,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'teacher_id' => 'required',
            'std_id' => 'required',
            'classroom_conduct' => 'required',
            'uniform' => 'required',
            'punctuality' => 'required',
            'intelligence' => 'required',
            'creativity' => 'required',
            'handwriting' => 'required',
            'reading' => 'required',
            'speaking' => 'required',
            'participation' => 'required',
        ]);

        if ($validator->fails()) {
            $response = array(
                'error' => true,
                'message' => $validator->errors()->first(),
                'code' => 102,
            );
            return response()->json($response);
        }

        // $auth = Auth::user();


        try {
            $std_review = new ModelsStdMonthlyJourney;
            $std_review->teacher_id = $request->user()->teacher;
            $std_review->std_id = $request->std_id;
            $std_review->classroom_conduct = $request->classroom_conduct;
            $std_review->uniform = $request->uniform;
            $std_review->punctuality = $request->punctuality;
            $std_review->intelligence = $request->intelligence;
            $std_review->creativity = $request->creativity;
            $std_review->handwriting = $request->handwriting;
            $std_review->reading = $request->reading;
            $std_review->speaking = $request->speaking;
            $std_review->participation = $request->participation;

            $std_review->save();

            $response = array(
                'error' => false,
                'message' => trans('data_store_successfully'),
                'code' => 200,
            );
        } catch (\Exception $e) {
            $response = array(
                'error' => true,
                'message' => trans($e->getMessage()),
                'code' => 103,
            );
        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $std_review = ModelsStdMonthlyJourney::where('id', $id)
            ->whereMonth('created_at', Carbon::now()->month)
            ->first();
        if ($std_review) {
            $teacher = Teacher::where('id', $std_review->teacher_id)->get();
            return response()->json([
                'status' => true,
                'std_reviews' => $std_review,
                'teachers' => $teacher,
            ]);
        } else {
            return response()->json([
                'status' => "No Records Found",
                'std_reviews' => $std_review,
            ]);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
