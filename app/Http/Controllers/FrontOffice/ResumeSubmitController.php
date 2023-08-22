<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\ResumeSubmit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class ResumeSubmitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        if (!Auth::user()->can('resume-submit-list')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        $resumes = ResumeSubmit::get();
        return view('front_office.resume-submit.details', compact('resumes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function create()
    {
        if (!Auth::user()->can('resume-submit-create')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        return view('front_office.resume-submit.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        if (!Auth::user()->can('resume-submit-create') || !Auth::user()->can('resume-submit-edit')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        $request->validate([
            'candidate_name' => 'required',
            'father_name' => 'required',
            'mobile' => 'required',
            'apply_for' => 'required',
            'highest_qualification' => 'required',
            'current_organization' => 'required',
            'address' => 'required',
        ]);

        try {
            $resume = new ResumeSubmit();
            $resume->candidate_name = $request->candidate_name;
            $resume->father_name = $request->father_name;
            $resume->mobile = $request->mobile;
            $resume->apply_for = $request->apply_for;
            $resume->highest_qualification = $request->highest_qualification;
            $resume->current_organization = $request->current_organization;
            $resume->address = $request->address;
            $resume->save();

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if (!Auth::user()->can('resume-submit-list')) {
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

        $sql = ResumeSubmit::where('deleted_at', null);
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql->where('id', 'LIKE', "%$search%")
                ->where('candidate_name','LIKE',"%$search")
                ->where('father_name','LIKE',"%$search")
                ->where('mobile','LIKE',"%$search")
                ->where('apply_for','LIKE',"%$search")
                ->where('highest_qualification','LIKE',"%$search")
                ->where('current_organization','LIKE',"%$search")
                ->where('address','LIKE',"%$search");
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
            $operate .= '<a class="btn btn-xs btn-gradient-primary btn-rounded btn-icon editdata" data-id=' . $row->id . ' data-url=' . url('resume-submit') . ' title="Edit" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
            // }

            // if (Auth::user()->can('employee-delete')) {
            $operate .= '<a class="btn btn-xs btn-gradient-danger btn-rounded btn-icon deletedata" data-id=' . $row->id . ' data-user_id=' . $row->id . ' data-url=' . url('resume-submit', $row->id) . ' title="Delete"><i class="fa fa-trash"></i></a>';
            // }

            $tempRow['id'] = $row->id;
            $tempRow['no'] = $no++;
            $tempRow['candidate_name'] = $row->candidate_name;
            $tempRow['father_name'] = $row->father_name;
            $tempRow['mobile'] = $row->mobile;
            $tempRow['apply_for'] = $row->apply_for;
            $tempRow['highest_qualification'] = $row->highest_qualification;
            $tempRow['current_organization'] = $row->current_organization;
            $tempRow['address'] = $row->address;

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
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('resume-submit-create') || !Auth::user()->can('resume-submit-edit')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }

        try{
            $resume = ResumeSubmit::find($request->edit_id);
            $resume->candidate_name = $request->candidate_name;
            $resume->father_name = $request->father_name;
            $resume->mobile = $request->mobile;
            $resume->apply_for = $request->apply_for;
            $resume->highest_qualification = $request->highest_qualification;
            $resume->current_organization = $request->current_organization;
            $resume->address = $request->address;
            $resume->save();


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
        if (!Auth::user()->can('resume-submit-delete')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }

        try {
            $resume = ResumeSubmit::find($id);
            $resume->delete();

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
