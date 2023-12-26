<?php

namespace App\Http\Controllers;

use App\Models\AlumniRegisteration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;

class AluminiFetchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('alumini.enquiry');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

        $sql = new AlumniRegisteration;

        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql->where('id', 'LIKE', "%$search%")
                ->orWhere('name', 'LIKE', "%$search%")
                ->orWhere('dob', 'LIKE', "%$search%")
                ->orWhere('profession', 'LIKE', "%$search%");
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

            // if (Auth::user()->can('employee-delete')) {
            $operate .= '<a class="btn btn-xs btn-gradient-danger btn-rounded btn-icon deletedata" data-id=' . $row->id . ' data-user_id=' . $row->id . ' data-url=' . url('alumini', $row->id) . ' title="Delete"><i class="fa fa-trash"></i></a>';
            // }

            $tempRow['id'] = $row->id;
            $tempRow['no'] = $no++;
            $tempRow['first_name'] = $row->first_name;
            $tempRow['last_name'] = $row->last_name;
            $tempRow['dob'] = $row->dob;
            $tempRow['gender'] = $row->gender;
            $tempRow['martial'] = $row->martial;
            $tempRow['phn_no'] = $row->phn_no;
            $tempRow['profession'] = $row->profession;
            $tempRow['email'] = $row->email;
            $tempRow['batch'] = $row->batch;
            $tempRow['last_class'] = $row->last_class;
            $tempRow['leaving_year'] = $row->leaving_year;
            $tempRow['batch'] = $row->batch;
            $tempRow['home_town'] = $row->home_town;
            $tempRow['country'] = $row->country;
            // $tempRow['image'] = 'storage/' . $row->image;
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
        try {
            $alumni = AlumniRegisteration::find($id);
            if ($alumni->image != "" && Storage::disk('public')->exists($alumni->image)) {
                Storage::disk('public')->delete($alumni->image);
            }

            if ($alumni->docs != "" && Storage::disk('public')->exists($alumni->docs)) {
                Storage::disk('public')->delete($alumni->docs);
            }

            $alumni->delete();
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
