<?php

namespace App\Http\Controllers;

use App\Imports\TeacherImport;
use Illuminate\Support\Facades\Mail;
use Throwable;
use App\Models\User;
use App\Models\Teacher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->can('teacher-list')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }

        return view('teacher.details');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('teacher-create')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $teacher_count = Teacher::count();
        $teacher_code = 'SST'. ($teacher_count + 1000 + 1);

        return view('teacher.index',compact('teacher_code'));
    }

    public function createBulkData()
    {
        if (!Auth::user()->can('teacher-create')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        // $class_section = ClassSection::with('class', 'section')->get();
        // $category = Category::where('status', 1)->get();
        // $data = getSettings('session_year');
        // $session_year = SessionYear::select('name')->where('id', $data['session_year'])->pluck('name')->first();
        // $get_teacher = Students::select('id')->latest('id')->pluck('id')->first();
        // $admission_no = $session_year . ($get_teacher + 1);

        return view('teacher.add_bulk_data');
    }

    public function storeBulkData(Request $request)
    {
        if (!Auth::user()->can('teacher-create') || !Auth::user()->can('teacher-edit')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        
        try {
            $class_section_id = $request->class_section_id;
            Excel::import(new TeacherImport($class_section_id), $request->file);
            $response = [
                'error' => false,
                'message' => trans('data_store_successfully')
            ];
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $response = array(
                'error' => true,
                'message' => trans('error_occurred'),
                'data' => $e->failures()
            );
        }
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('teacher-create') || !Auth::user()->can('teacher-edit')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        $request->validate([
            'teacher_code' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg|image|max:2048',
            'name' => 'required',
            'mobile' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'religion' => 'required',
            'gender' => 'required',
            'category' => 'required',
            'dob' => 'required',
            'designation' => 'required',
            'date_of_joining' => 'required',
            'address' => 'required',
            'qualification' => 'required',

        ]);

        try {
            $teacher_plaintext_password = str_replace('-', '', date('d-m-Y', strtotime($request->dob)));

            $user = new User();
            $user->image = $request->file('image')->store('teachers', 'public');    
            $user->password = Hash::make($teacher_plaintext_password);
            $user->full_name = $request->name;
            $user->email = $request->email ?? $request->teacher_code;
            $user->user_code = $request->teacher_code;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->gender = $request->gender;
            $user->mobile = $request->mobile;
            $user->current_address = $request->address;
            $user->save();  

            $teacher = new Teacher();
            $teacher->user_id = $user->id;
            $teacher->code = $request->teacher_code;
            $teacher->father_name = $request->father_name;
            $teacher->mother_name = $request->mother_name;
            $teacher->religion = $request->religion;
            $teacher->additional_mobile = $request->additional_mobile;
            $teacher->category = $request->category;
            $teacher->designation = $request->designation;
            $teacher->date_of_joining = date('Y-m-d', strtotime($request->date_of_joining));
            $teacher->address = $request->address;
            $teacher->aadhar_card = $request->aadhar_card;
            $teacher->pancard = $request->pancard;
            $teacher->bank_name = $request->bank_name;
            $teacher->bank_acc_no = $request->bank_acc_no;
            $teacher->qualification = $request->qualification;
            $teacher->ifsc_code = $request->ifsc_code;

            $teacher->spouse = $request->spouse;
            $teacher->marital_status = $request->marital_status;
            $teacher->pincode = $request->pincode;
            $teacher->salary_mode = $request->salary_mode;
            $teacher->save();

            $user->assignRole('Teacher');

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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if (!Auth::user()->can('employee-list')) {
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

        $sql = Teacher::with('user');
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql->where('id', 'LIKE', "%$search%")
                ->orWhere('user_id', 'LIKE', "%$search%")
                ->orWhere('code', 'LIKE', "%$search%")
                ->orWhere('father_name', 'LIKE', "%$search%")
                ->orWhere('mother_name', 'LIKE', "%$search%")
                ->orWhere('religion', 'LIKE', "%$search%")
                ->orWhere('additional_mobile', 'LIKE', "%$search%")
                ->orWhere('category', 'LIKE', "%$search%")
                ->orWhere('designation', 'LIKE', "%$search%")
                ->orWhere('date_of_joining', 'LIKE', "%$search%")
                ->orWhere('address', 'LIKE', "%$search%")
                ->orWhere('aadhar_card', 'LIKE', "%$search%")
                ->orWhere('pancard', 'LIKE', "%$search%")
                ->orWhere('bank_name', 'LIKE', "%$search%")
                ->orWhere('bank_acc_no', 'LIKE', "%$search%")
                ->orWhere('qualification', 'LIKE', "%$search%")
                ->orWhere('ifsc_code', 'LIKE', "%$search%")
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('full_name', 'LIKE', "%$search%")
                        ->orwhere('email', 'LIKE', "%$search%")
                        ->orwhere('mobile', 'LIKE', "%$search%")
                        ->orwhere('dob', 'LIKE', "%$search%");
                });
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
            $operate .= '<a class="btn btn-xs btn-gradient-primary btn-rounded btn-icon editdata" data-id=' . $row->id . ' data-url=' . url('teachers') . ' title="Edit" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
            // }

            // if (Auth::user()->can('employee-delete')) {
            $operate .= '<a class="btn btn-xs btn-gradient-danger btn-rounded btn-icon deletedata" data-id=' . $row->id . ' data-user_id=' . $row->user_id . ' data-url=' . url('teachers', $row->user_id) . ' title="Delete"><i class="fa fa-trash"></i></a>';
            // }

            $tempRow['id'] = $row->id;
            $tempRow['no'] = $no++;
            $tempRow['user_id'] = $row->user_id;
            $tempRow['full_name'] = $row->user->full_name;
            $tempRow['email'] = $row->user->email;
            $tempRow['dob'] = date($data['date_formate'], strtotime($row->user->dob));
            $tempRow['mobile'] = $row->user->mobile;
            $tempRow['image'] = $row->user->image;
            $tempRow['image_link'] = $row->user->image;
            $tempRow['address'] = $row->user->current_address;
            $tempRow['gender'] = $row->user->gender;

            $tempRow['teacher_code'] = $row->code;
            $tempRow['father_name'] = $row->father_name;
            $tempRow['mother_name'] = $row->mother_name;
            $tempRow['religion'] = $row->religion;
            $tempRow['additional_mobile'] = $row->additional_mobile;
            $tempRow['category'] = $row->category;
            $tempRow['designation'] = $row->designation;
            $tempRow['date_of_joining'] = date($data['date_formate'], strtotime($row->date_of_joining));
            $tempRow['aadhar_card'] = $row->aadhar_card;
            $tempRow['pancard'] = $row->pancard;
            $tempRow['bank_name'] = $row->bank_name;
            $tempRow['bank_acc_no'] = $row->bank_acc_no;
            $tempRow['qualification'] = $row->qualification;
            $tempRow['ifsc_code'] = $row->ifsc_code;

            $tempRow['spouse'] = $row->spouse;
            $tempRow['marital_status'] = $row->marital_status;
            $tempRow['pincode'] = $row->pincode;
            $tempRow['salary_mode'] = $row->salary_mode;


            $tempRow['operate'] = $operate;
            $rows[] = $tempRow;
        }

        $bulkData['rows'] = $rows;
        return response()->json($bulkData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        return response($teacher);
    }


    public function update(Request $request)
    {
        if (!Auth::user()->can('teacher-create') || !Auth::user()->can('teacher-edit')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        $request->validate([
            'teacher_code' => 'required',
            'image' => 'mimes:jpeg,png,jpg|image|max:2048',
            'name' => 'required',
            'mobile' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'religion' => 'required',
            'gender' => 'required',
            'category' => 'required',
            'dob' => 'required',
            'designation' => 'required',
            'date_of_joining' => 'required',
            'address' => 'required',
            'qualification' => 'required',
        ]);

        try {

            //Create Teacher User First
            $user = User::find($request->edit_id);
            $user->full_name = $request->name;
            $user->email = $request->email ?? $user->email;
            $user->mobile = $request->mobile ?? $request->mobile;

            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->current_address = $request->address;
            $user->gender = $request->gender;

            //password
            $teacher_plaintext_password = str_replace('-', '', date('d-m-Y', strtotime($user->dob)));
            $user->password = Hash::make($teacher_plaintext_password);

            //If Image exists then upload new image and delete the old image
            if ($request->hasFile('image')) {
                if (Storage::disk('public')->exists($user->image)) {
                    Storage::disk('public')->delete($user->image);
                }
                $user->image = $request->file('image')->store('teachers', 'public');
            }
            $user->save();

            $teacher = Teacher::where('user_id', $user->id)->firstOrFail();
            $teacher->user_id = $user->id;
            // $teacher->code = $request->teacher_code;
            $teacher->father_name = $request->father_name;
            $teacher->mother_name = $request->mother_name;
            $teacher->religion = $request->religion;
            $teacher->additional_mobile = $request->additional_mobile;
            $teacher->category = $request->category;
            $teacher->designation = $request->designation;
            $teacher->date_of_joining = date('Y-m-d', strtotime($request->date_of_joining));
            $teacher->address = $request->address;
            $teacher->aadhar_card = $request->aadhar_card;
            $teacher->pancard = $request->pancard;
            $teacher->bank_name = $request->bank_name;
            $teacher->bank_acc_no = $request->bank_acc_no;
            $teacher->qualification = $request->qualification;
            $teacher->ifsc_code = $request->ifsc_code;

            $teacher->spouse = $request->spouse;
            $teacher->marital_status = $request->marital_status;
            $teacher->pincode = $request->pincode;
            $teacher->salary_mode = $request->salary_mode;
            $teacher->save();

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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('teacher-delete')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        try {
            $user = User::find($id);
            if (Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }
            $user->delete();

            Teacher::where('user_id', $id)->delete();
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
