<?php

namespace App\Http\Controllers;

use App\Models\AdmissionEnquiry;
use App\Models\ContactEnquiry;
use App\Models\ResumeSubmit;
use Illuminate\Http\Request;
use Throwable;

class EnquiryController extends Controller
{
    public function enuiryAdmission(Request $request)
    {
        
        $request->validate([
            'student_name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'contact_no' => 'required',
            'admitted_class' => 'required',
            'previous_school_name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            // 'last_class' => 'required',
            // 'father_mobile' => 'required',
            // 'mother_mobile' => 'required',
            'address' => 'required',
            // 'date' => 'required',
        ]);

        try {

            $admission = new AdmissionEnquiry();
            $admission->student_name = $request->student_name;
            $admission->dob = $request->dob;
            $admission->gender = $request->gender;
            $admission->contact_no = $request->contact_no;
            $admission->admitted_class = $request->admitted_class;
            $admission->previous_school_name = $request->previous_school_name;
            $admission->father_name = $request->father_name;
            $admission->mother_name = $request->mother_name;
            // $admission->last_class = $request->last_class;
            // $admission->father_mobile = $request->father_mobile;
            // $admission->mother_mobile = $request->mother_mobile;
            $admission->address = $request->address;
            // $admission->date = date('Y-m-d', strtotime($request->date));
            $admission->save();

            // $response = [
            //     'error' => false,
            //     'message' => trans('data_store_successfully')
            // ];
            return redirect()->back()->with('success', trans('data_store_successfully'));
        } catch (Throwable $e) {
            // $response = array(
            //     'error' => true,
            //     'message' => trans('error_occurred'),
            //     'data' => $e
            // );
            return redirect()->back()->with('error', $e->getMessage());
        }
        // return redirect()->back()->with('response', $response);
    }

    public function enuiryJob(Request $request)
    {
        $request->validate([
            'candidate_name' => 'required',
            'father_name' => 'required',
            'mobile' => 'required',
            'apply_for' => 'required',
            'highest_qualification' => 'required',
            'current_organization' => 'required',
            'address' => 'required',
            'resume' => 'required|mimes:pdf|max:2048',
        ]);

        try {

            $resume = new ResumeSubmit();
            $resume->resume = $request->file('resume')->store('resume', 'public');
            $resume->candidate_name = $request->candidate_name;
            $resume->father_name = $request->father_name;
            $resume->mobile = $request->mobile;
            $resume->apply_for = $request->apply_for;
            $resume->highest_qualification = $request->highest_qualification;
            $resume->current_organization = $request->current_organization;
            $resume->address = $request->address;
            $resume->save();

            return redirect()->back()->with('success', trans('data_store_successfully'));
        } catch (Throwable $e) {
            // $response = array(
            //     'error' => true,
            //     'message' => trans('error_occurred'),
            //     'data' => $e
            // );
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function enuiryContact(Request $request) {
        try {
            $enquiry = new ContactEnquiry;
            $enquiry->name = $request->name;
            $enquiry->email = $request->email;
            $enquiry->mobile = $request->mobile;
            $enquiry->comments = $request->comments;
            $enquiry->ip = $request->ip();
            $enquiry->save();

            return redirect()->back()->with('success', 'Thank you !! \n We have Reached Out You Soon ');
        }
            catch (Throwable $e) {
                return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
