<?php

namespace App\Http\Controllers;

use App\Models\Aluminai;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;

class AluminaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aluminais = Aluminai::latest()->get();
        return view('aluminai.aluminai-list', compact('aluminais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aluminai.aluminai');
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
            'name' => 'required',
            'std_title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);
        try 
        {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $fileName);

            $aluminai = new Aluminai;
            $aluminai->name = $request->name;
            $aluminai->std_title = $request->std_title;
            $aluminai->description = $request->description;
            $aluminai->image = $fileName;
            $aluminai->save();
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

            return response()->json($response);
        }

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aluminai  $aluminai
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

        $sql = new Aluminai;
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql->where('id', 'LIKE', "%$search%")
                ->orWhere('name', 'LIKE', "%$search%")
                ->orWhere('std_title', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%");
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
            $operate .= '<a class="btn btn-xs btn-gradient-primary btn-rounded btn-icon editdata" data-id=' . $row->id . ' data-url=' . url('aluminai') . ' title="Edit" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
            // }

            // if (Auth::user()->can('employee-delete')) {
            $operate .= '<a class="btn btn-xs btn-gradient-danger btn-rounded btn-icon deletedata" data-id=' . $row->id . ' data-user_id=' . $row->id . ' data-url=' . url('aluminai', $row->id) . ' title="Delete"><i class="fa fa-trash"></i></a>';
            // }

            $tempRow['id'] = $row->id;
            $tempRow['no'] = $no++;
            $tempRow['name'] = $row->name;
            $tempRow['std_title'] = $row->std_title;
            $tempRow['description'] = $row->description;
            $tempRow['image'] = 'storage/images/' . $row->image;
            $tempRow['operate'] = $operate;
            $rows[] = $tempRow;
        }

        $bulkData['rows'] = $rows;
        return response()->json($bulkData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aluminai  $aluminai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluminai = Aluminai::find($id);
        return response($aluminai);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aluminai  $aluminai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'std_title' => 'required',
            'description' => 'required',
        ]);

        try {

            //Create Aluminai
            $aluminai = Aluminai::find($request->edit_id);
            $aluminai->name = $request->name;
            $aluminai->std_title = $request->email ?? $aluminai->std_title;
            $aluminai->description = $request->mobile ?? $aluminai->description;


            //If Image exists then upload new image and delete the old image
            if ($request->hasFile('image')) {
                if (Storage::disk('public')->exists($aluminai->image)) {
                    Storage::disk('public')->delete($aluminai->image);
                }
                $aluminai->image = $request->file('image')->store('aluminai', 'public');
            }
            $aluminai->save();

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
     * @param  \App\Models\Aluminai  $aluminai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $aluminai = Aluminai::find($id);
            if ($aluminai->image != "" && Storage::disk('public')->exists($aluminai->image)) {
                Storage::disk('public')->delete($aluminai->image);
            }
            $aluminai->delete();
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
