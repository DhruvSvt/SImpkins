<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use App\Models\VisitorBook;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class VisitorBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors = VisitorBook::get();
        return view('front_office.visitor-book.details', compact('visitors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('front_office.visitor-book.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'visitor_name' => 'required',
            'date' => 'required',
            'in_time' => 'required',
            'purpose' => 'required',
            'remarks' => 'required',
        ]);

        try {
            $resume = new VisitorBook();
            $resume->visitor_name = $request->visitor_name;
            $resume->date = date('Y-m-d', strtotime($request->date));
            $resume->in_time = Carbon::parse($request->in_time);
            $resume->out_time = Carbon::parse($request->out_time);
            $resume->purpose = $request->purpose;
            $resume->remarks = $request->remarks;
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

        $sql = VisitorBook::where('deleted_at', null);
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql->where('id', 'LIKE', "%$search%")
                ->where('visitor_name','LIKE',"%$search")
                ->where('date','LIKE',"%$search")
                ->where('in_time','LIKE',"%$search")
                ->where('out_time','LIKE',"%$search")
                ->where('purpose','LIKE',"%$search")
                ->where('remarks','LIKE',"%$search");
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
            $operate .= '<a class="btn btn-xs btn-gradient-primary btn-rounded btn-icon editdata" data-id=' . $row->id . ' data-url=' . url('visitor-book') . ' title="Edit" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
            // }

            // if (Auth::user()->can('employee-delete')) {
            $operate .= '<a class="btn btn-xs btn-gradient-danger btn-rounded btn-icon deletedata" data-id=' . $row->id . ' data-user_id=' . $row->id . ' data-url=' . url('visitor-book', $row->id) . ' title="Delete"><i class="fa fa-trash"></i></a>';
            // }

            $tempRow['id'] = $row->id;
            $tempRow['no'] = $no++;
            $tempRow['visitor_name'] = $row->visitor_name;
            $tempRow['date'] = $row->date;
            $tempRow['in_time'] = $row->in_time;
            $tempRow['out_time'] = $row->out_time;
            $tempRow['purpose'] = $row->purpose;
            $tempRow['remarks'] = $row->remarks;

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
        try{
            $resume = VisitorBook::find($request->edit_id);
            $resume->visitor_name = $request->visitor_name;
            $resume->date = date('Y-m-d', strtotime($request->date));
            $resume->in_time = Carbon::parse($request->in_time);
            $resume->out_time = Carbon::parse($request->out_time);
            $resume->purpose = $request->purpose;
            $resume->remarks = $request->remarks;
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
        try {
            $resume = VisitorBook::find($id);
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
