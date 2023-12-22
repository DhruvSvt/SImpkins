<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\AdmissionEnquiry;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class AdmissionEnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->can('admission-enquiry-list')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $admissions = AdmissionEnquiry::get();
        // dd($admissions);
        return view('front_office.admission-enquiry.details', compact('admissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('admission-enquiry-create')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        return view('front_office.admission-enquiry.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('admission-enquiry-create') || !Auth::user()->can('admission-enquiry-edit')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
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
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if (!Auth::user()->can('admission-enquiry-list')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }

        $offset = 0;
        $limit = 10;
        $sort = 'id';
        $order = 'DESC';

        if (isset($_GET['offset']))
            $offset = $_GET['offset'];
        if (isset($_GET['limit']))
            $limit = $_GET['limit'];

        if (isset($_GET['sort']))
            $sort = $_GET['sort'];
        if (isset($_GET['order']))
            $order = $_GET['order'];

        $sql = AdmissionEnquiry::where('deleted_at', null);
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql->where('id', 'LIKE', "%$search%")
                ->where('student_name','LIKE',"%$search%")
                ->where('admitted_class','LIKE',"%$search%")
                ->where('contact_no','LIKE',"%$search%")
                ->where('previous_school_name','LIKE',"%$search%")
                ->where('father_name','LIKE',"%$search%")
                ->where('mother_name','LIKE',"%$search%")
                ->where('last_class','LIKE',"%$search%")
                ->where('father_mobile','LIKE',"%$search%")
                ->where('address','LIKE',"%$search%")
                ->where('date','LIKE',"%$search%");
        }

        $total = $sql->count();

        $sql->orderBy($sort, $order)->skip($offset)->take($limit);
        $res = $sql->get();

        $bulkData = array();
        $bulkData['total'] = $total;
        $rows = array();
        $tempRow = array();
        $no = 1;
        $data = getSettings('date_formate');
        foreach ($res as $row) {
            $operate = '';
            // if (Auth::user()->can('employee-edit')) {
                // $operate .= '<a class="btn btn-xs btn-gradient-primary btn-rounded btn-icon editdata" data-id=' . $row->id . ' data-url=' . url('admission-enquiry') . ' title="Edit" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
            // }

            // if (Auth::user()->can('employee-delete')) {
                $operate .= '<a class="btn btn-xs btn-gradient-danger btn-rounded btn-icon deletedata" data-id=' . $row->id . ' data-user_id=' . $row->id . ' data-url=' . url('admission-enquiry', $row->id) . ' title="Delete"><i class="fa fa-trash"></i></a>';
            // }

            $tempRow['id'] = $row->id;
            $tempRow['no'] = $no++;
            $tempRow['student_name'] = $row->student_name;
            $tempRow['admitted_class'] = $row->admitted_class;
            $tempRow['contact_no'] = $row->contact_no;
            $tempRow['previous_school_name'] = $row->previous_school_name;
            $tempRow['father_name'] = $row->father_name;
            $tempRow['mother_name'] = $row->mother_name;
            $tempRow['last_class'] = $row->last_class;
            $tempRow['father_mobile'] = $row->father_mobile;
            $tempRow['address'] = $row->address;
            $tempRow['dob'] = date($data['date_formate'], strtotime($row->dob));
            $tempRow['date'] = date($data['date_formate'], strtotime($row->created_at));

            $tempRow['operate'] = $operate;
            $rows[] = $tempRow;
        }

        $bulkData['rows'] = $rows;
        return response()->json($bulkData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!Auth::user()->can('admission-enquiry-create') || !Auth::user()->can('admission-enquiry-edit')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        try{
            $admission = AdmissionEnquiry::find($request->edit_id);
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
        } catch (Exception $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred'),
                'data' => $e
            );
        }
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('admission-enquiry-delete')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        try {
            $admission = AdmissionEnquiry::find($id);
            $admission->delete();

            $response = [
                'error' => false,
                'message' => trans('data_delete_successfully')
            ];
        } catch (Throwable $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred')
            );
        }
        return response()->json($response);
    }
}
