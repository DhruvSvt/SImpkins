<?php

namespace App\Http\Controllers;

use App\Models\AdmissionEnquiry;
use App\Models\ContactEnquiry;
use App\Models\ContactEnuiry;
use App\Models\EventNotice;
use Illuminate\Http\Request;
use Throwable;

class EnquiryController extends Controller
{
    public function enuiryAdmission(Request $request)
    {
        $request->validate([
            'student_name' => 'required',
            'admitted_class' => 'required',
            'previous_school_name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'last_class' => 'required',
            'father_mobile' => 'required',
            'address' => 'required',
            'date' => 'required',
        ]);

        try {

            $admission = new AdmissionEnquiry();
            $admission->student_name = $request->student_name;
            $admission->admitted_class = $request->admitted_class;
            $admission->previous_school_name = $request->previous_school_name;
            $admission->father_name = $request->father_name;
            $admission->mother_name = $request->mother_name;
            $admission->last_class = $request->last_class;
            $admission->father_mobile = $request->father_mobile;
            $admission->address = $request->address;
            $admission->date = date('Y-m-d', strtotime($request->date));
            $admission->save();

            $response = [
                'error' => false,
                'message' => trans('data_store_successfully')
            ];
        } catch (Throwable $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred'),
                'data' => $e
            );
        }
        return redirect()->back()->with('response', $response);
    }

    public function enuiryContact(Request $request){
        try {

            $enquiry = new ContactEnquiry;
            $enquiry->name = $request->name;
            $enquiry->email = $request->email;
            $enquiry->mobile = $request->mobile;
            $enquiry->comments = $request->comments;
            $enquiry->ip = $request->ip();
            $enquiry->save();

            $response = [
                'error' => false,
                'message' => trans('data_store_successfully')
            ];
        } catch (Throwable $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred'),
                'data' => $e
            );
        }
        return redirect()->back()->with('response', $response);
    }

}
