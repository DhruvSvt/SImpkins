<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\StdMonthlyJourney as ModelsStdMonthlyJourney;
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
        $std_review = ModelsStdMonthlyJourney::all();
        return response()->json([
            'status' => true,
            'std_review' => $std_review
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
            'teacher_id' => 'required',
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

        $auth = Auth::user();

        try {
            $std_review = new ModelsStdMonthlyJourney;
            $std_review->teacher_id = $auth->id;
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
                'message' => trans('error_occurred'),
                'code' => 103,
            );
        }
        return response()->json($response);
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
