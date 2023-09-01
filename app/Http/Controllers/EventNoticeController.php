<?php

namespace App\Http\Controllers;

use App\Models\EventNotice;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;

class EventNoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('events-notices.details');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events-notices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (!Auth::user()->can('employee-create') || !Auth::user()->can('employee-edit')) {
        //     $response = array(
        //         'message' => trans('no_permission_message')
        //     );
        //     return response()->json($response);
        // }
        $request->validate([
            'title' => 'required',
            'type' => 'required|string:EVENT,NOTICE',
        ]);

        try {
            $event_notice = new EventNotice();
            $event_notice->title = $request->title;
            $event_notice->order = $request->order;
            if ($request->hasFile('file_upload')) {
                $event_notice->link = $request->file('file_upload')->store('event_notices', 'public');
            }
            $event_notice->type = $request->type;
            $event_notice->is_new = (int)$request->is_new;
            $event_notice->save();

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
        // if (!Auth::user()->can('employee-list')) {
        //     $response = array(
        //         'message' => trans('no_permission_message')
        //     );
        //     return response()->json($response);
        // }
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

        $sql = EventNotice::where('deleted_at', null);
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql->where('id', 'LIKE', "%$search%")
                ->orWhere('title', 'LIKE', "%$search%")
                ->orWhere('type', 'LIKE', "%$search%")
                ->orWhere('order', 'LIKE', "%$search%");
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
            // if (Auth::user()->can('menu-edit')) {
            $operate .= '<a class="btn btn-xs btn-gradient-primary btn-rounded btn-icon editdata" data-id=' . $row->id . ' data-url=' . url('event-notice') . ' title="Edit" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
            // }

            // if (Auth::user()->can('menu-delete')) {
            $operate .= '<a class="btn btn-xs btn-gradient-danger btn-rounded btn-icon deletedata" data-id=' . $row->id . ' data-user_id=' . $row->id . ' data-url=' . url('event-notice', $row->id) . ' title="Delete"><i class="fa fa-trash"></i></a>';
            // }

            $tempRow['id'] = $row->id;
            $tempRow['no'] = $no++;
            $tempRow['title'] = $row->title;
            $tempRow['order'] = $row->order;
            $tempRow['type'] = $row->type;
            $tempRow['is_new'] = $row->is_new;
            $tempRow['is_new_text'] = $row->is_new ? 'Yes' : 'No';
            $tempRow['link'] = "storage/" . $row->link;

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
        $request->validate([
            'title' => 'required',
            'type' => 'required|string:EVENT,NOTICE',
        ]);

        try {
            $event_notice = EventNotice::where('id', $id)->firstOrFail();
            $event_notice->title = $request->title;
            $event_notice->type = $request->type;
            $event_notice->order = $request->order;
            $event_notice->is_new = (int)$request->is_new;

            if ($request->hasFile('file_upload')) {
                if (Storage::disk('public')->exists($event_notice->link)) {
                    Storage::disk('public')->delete($event_notice->link);
                }
                $event_notice->link = $request->file('file_upload')->store('event_notices', 'public');
            }
            $event_notice->save();

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
        // if (!Auth::user()->can('employee-delete')) {
        //     $response = array(
        //         'message' => trans('no_permission_message')
        //     );
        //     return response()->json($response);
        // }
        try{
            // $employee_id = EventNotice::select('id')->where('user_id', $id)->pluck('id')->first();
            $event_notice = EventNotice::find($id);
            if ($event_notice->link != "" && Storage::disk('public')->exists($event_notice->link)) {
                Storage::disk('public')->delete($event_notice->link);
            }
            $event_notice->delete();

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
