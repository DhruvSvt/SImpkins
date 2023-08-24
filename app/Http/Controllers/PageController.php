<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Throwable;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::get();
        return view('menu-pages.details-page',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::get();
        return view('menu-pages.create-page',compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request()->all());
        // if (!Auth::user()->can('employee-create') || !Auth::user()->can('employee-edit')) {
        //     $response = array(
        //         'message' => trans('no_permission_message')
        //     );
        //     return response()->json($response);
        // }
        $request->validate([
            'menu_id' => 'required',
            'page_name' => 'required',
            'banner_image' => 'required|mimes:jpeg,png,jpg|image|max:2048',
            'content_image' => 'mimes:jpeg,png,jpg|image|max:2048',
        ]);

        try {
            $menu = Menu::findOrFail($request->menu_id);

            $page = new Page();
            $page->menu_id = $menu->id;
            $page->page_name = $request->page_name;
            $page->slug = Str::slug($request->page_name);
            $page->content = $request->input('content');
            $page->banner_image = $request->file('banner_image')->store('menu_banners', 'public');
            $page->content_image = $request->file('content_image')->store('page_content', 'public');
            $page->save();

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

        $sql = Page::join('menus','menus.id','pages.menu_id');
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql->where('id', 'LIKE', "%$search%")
                ->orWhere('page_name', 'LIKE', "%$search%")
                ->orWhere('menus.name', 'LIKE', "%$search%");
        }

        $total = $sql->count();

        $sql->orderBy($sort, $order)->skip($offset)->take($limit);
        $res = $sql->select('pages.*','menus.name')->get();

        $bulkData = array();
        $bulkData['total'] = $total;
        $rows = array();
        $tempRow = array();
        $no = 1;
        $data = getSettings('date_formate');
        foreach ($res as $row) {
            $operate = '';
            // if (Auth::user()->can('menu-edit')) {
            $operate .= '<a class="btn btn-xs btn-gradient-primary btn-rounded btn-icon editdata" data-id=' . $row->id . ' data-url=' . url('pages') . ' title="Edit" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
            // }

            // if (Auth::user()->can('menu-delete')) {
            $operate .= '<a class="btn btn-xs btn-gradient-danger btn-rounded btn-icon deletedata" data-id=' . $row->id . ' data-user_id=' . $row->id . ' data-url=' . url('pages', $row->id) . ' title="Delete"><i class="fa fa-trash"></i></a>';
            // }

            $tempRow['id'] = $row->id;
            $tempRow['no'] = $no++;
            $tempRow['menu_id'] = $row->menu_id;
            $tempRow['menu_name'] = $row->name;
            $tempRow['page_name'] = $row->page_name;
            $tempRow['slug'] = $row->slug;
            $tempRow['banner_image'] = "storage/".$row->banner_image;
            $tempRow['content'] = $row->content;
            $tempRow['content_image'] = "storage/".$row->content_image;

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
            'menu_id' => 'required',
            'page_name' => 'required',
            'banner_image' => 'mimes:jpeg,png,jpg|image|max:2048',
            'content_image' => 'mimes:jpeg,png,jpg|image|max:2048',
        ]);

        try {
            $page = Page::where('id', $id)->firstOrFail();
            $page->menu_id = $request->menu_id;
            $page->page_name = $request->page_name;
            $page->slug = Str::slug($request->page_name);
            $page->content = $request->content;

            if ($request->hasFile('banner_image')) {
                if (Storage::disk('public')->exists($page->banner_image)) {
                    Storage::disk('public')->delete($page->banner_image);
                }
                $page->banner_image = $request->file('banner_image')->store('menu_banners', 'public');
            }
            if ($request->hasFile('content_image')) {
                if (Storage::disk('public')->exists($page->content_image)) {
                    Storage::disk('public')->delete($page->content_image);
                }
                $page->content_image = $request->file('content_image')->store('page_content', 'public');
            }
            $page->save();

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
        try {
            $page = Page::find($id);
            if ($page->banner_image != "" && Storage::disk('public')->exists($page->banner_image)) {
                Storage::disk('public')->delete($page->banner_image);
            }
            if ($page->content_image != "" && Storage::disk('public')->exists($page->content_image)) {
                Storage::disk('public')->delete($page->content_image);
            }
            $page->delete();

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
