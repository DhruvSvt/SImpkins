<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use Throwable;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->can('employee-list')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        $category = Employee::with('user')->get();
        return view('employees.details', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('employee-create')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return redirect(route('home'))->withErrors($response);
        }
        return view('employees.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('employee-create') || !Auth::user()->can('employee-edit')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        $request->validate([
            'employee_code' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg|image|max:2048',
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'religion' => 'required',
            'gender' => 'required',
            'category' => 'required',
            'dob' => 'required',
            'designation' => 'required',
            'date_of_joining' => 'required',
            'address' => 'required',
        ]);

        try{
            $full_name = explode(" ", $request->name);
            if(count($full_name) > 1) {
                $lastname = array_pop($full_name);
                $firstname = implode(" ", $full_name);
            }
            else
            {
                $firstname = $request->name;
                $lastname = " ";
            }

            $user = new User();
            $employee_plaintext_password = $request->password ?? rand(10000,99999);
            $user->image = $request->file('image')->store('employees', 'public');
            $user->password = Hash::make($employee_plaintext_password);
            $user->first_name = $firstname;
            $user->last_name = $lastname;
            $user->email = $request->email ?? $request->employee_code.rand(10000,99999);
            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->gender = $request->gender;
            $user->current_address = $request->address;
            $user->save();

            $employee = new Employee();
            $employee->user_id = $user->id;
            $employee->code = $request->employee_code;
            $employee->father_name = $request->father_name;
            $employee->mother_name = $request->mother_name;
            $employee->religion = $request->religion;
            $employee->category = $request->category;
            $employee->designation = $request->designation;
            $employee->date_of_joining =  date('Y-m-d', strtotime($request->date_of_joining));
            $employee->address = $request->address;
            $employee->aadhar_card = $request->aadhar_card;
            $employee->pancard = $request->pancard;
            $employee->bank_name = $request->bank_name;
            $employee->bank_acc_no = $request->bank_acc_no;
            $employee->ifsc_code = $request->ifsc_code;
            $employee->save();

            if($request->front_office == 1 || $request->front_office == '1'){
                $employee->is_front_office = true;
                $employee->save();

                //assigning role
                $frontOfficeRole = Role::where('name', 'Front Office')->first();
                $user->assignRole($frontOfficeRole);
            }

            $response = [
                'error' => false,
                'message' => trans('data_store_successfully')
            ];
        }
        catch (Throwable $e) {
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

        $sql = Employee::with('user');
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql->where('id', 'LIKE', "%$search%")
                ->orWhere('user_id','LIKE',"%$search%")
                ->orWhere('code','LIKE',"%$search%")
                ->orWhere('father_name','LIKE',"%$search%")
                ->orWhere('mother_name','LIKE',"%$search%")
                ->orWhere('religion','LIKE',"%$search%")
                ->orWhere('category','LIKE',"%$search%")
                ->orWhere('designation','LIKE',"%$search%")
                ->orWhere('date_of_joining','LIKE',"%$search%")
                ->orWhere('address','LIKE',"%$search%")
                ->orWhere('aadhar_card','LIKE',"%$search%")
                ->orWhere('pancard','LIKE',"%$search%")
                ->orWhere('bank_name','LIKE',"%$search%")
                ->orWhere('bank_acc_no','LIKE',"%$search%")
                ->orWhere('ifsc_code','LIKE',"%$search%")
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('first_name', 'LIKE', "%$search%")
                        ->orwhere('last_name', 'LIKE', "%$search%")
                        ->orwhere('email', 'LIKE', "%$search%")
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
                $operate .= '<a class="btn btn-xs btn-gradient-primary btn-rounded btn-icon editdata" data-id=' . $row->id . ' data-url=' . url('employees') . ' title="Edit" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
            // }

            // if (Auth::user()->can('employee-delete')) {
                $operate .= '<a class="btn btn-xs btn-gradient-danger btn-rounded btn-icon deletedata" data-id=' . $row->id . ' data-user_id=' . $row->user_id . ' data-url=' . url('employees', $row->user_id) . ' title="Delete"><i class="fa fa-trash"></i></a>';
            // }

            $tempRow['id'] = $row->id;
            $tempRow['no'] = $no++;
            $tempRow['user_id'] = $row->user_id;
            $tempRow['first_name'] = $row->user->first_name;
            $tempRow['last_name'] = $row->user->last_name;
            $tempRow['email'] = $row->user->email;
            $tempRow['dob'] = date($data['date_formate'], strtotime($row->user->dob));
            $tempRow['mobile'] = $row->user->mobile;
            $tempRow['image'] = $row->user->image;
            $tempRow['image_link'] = $row->user->image;
            $tempRow['address'] = $row->user->current_address;
            $tempRow['gender'] = $row->user->gender;

            $tempRow['employee_code'] = $row->code;
            $tempRow['father_name'] = $row->father_name;
            $tempRow['mother_name'] = $row->mother_name;
            $tempRow['religion'] = $row->religion;
            $tempRow['category'] = $row->category;
            $tempRow['designation'] = $row->designation;
            $tempRow['date_of_joining'] = date($data['date_formate'], strtotime($row->date_of_joining));
            $tempRow['aadhar_card'] = $row->aadhar_card;
            $tempRow['pancard'] = $row->pancard;
            $tempRow['bank_name'] = $row->bank_name;
            $tempRow['bank_acc_no'] = $row->bank_acc_no;
            $tempRow['ifsc_code'] = $row->ifsc_code;
            $tempRow['is_front_office'] = $row->is_front_office;
            $tempRow['is_front_office_text'] = $row->is_front_office ? 'Yes' : 'No';


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
        if (!Auth::user()->can('employee-create') || !Auth::user()->can('employee-edit')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        $request->validate([
            'employee_code' => 'required',
            'image' => 'mimes:jpeg,png,jpg|image|max:2048',
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'religion' => 'required',
            'gender' => 'required',
            'category' => 'required',
            'dob' => 'required',
            'designation' => 'required',
            'date_of_joining' => 'required',
            'address' => 'required',
        ]);

        try {
            $full_name = explode(" ", $request->name);
            if(count($full_name) > 1) {
                $lastname = array_pop($full_name);
                $firstname = implode(" ", $full_name);
            }
            else
            {
                $firstname = $request->name;
                $lastname = " ";
            }

            //Create Employee User First
            $user = User::find($request->edit_id);
            $user->first_name = $firstname;
            $user->last_name = $lastname;
            $user->email = $request->email ?? $request->email;
            $user->mobile = $request->mobile ?? $request->mobile;

            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->current_address = $request->address;
            $user->gender = $request->gender;

            //If Image exists then upload new image and delete the old image
            if ($request->hasFile('image')) {
                if (Storage::disk('public')->exists($user->image)) {
                    Storage::disk('public')->delete($user->image);
                }
                $user->image = $request->file('image')->store('employees', 'public');
            }
            $user->save();

            $employee = Employee::where('user_id', $user->id)->firstOrFail();
            $employee->user_id = $user->id;
            $employee->code = $request->employee_code;
            $employee->father_name = $request->father_name;
            $employee->mother_name = $request->mother_name;
            $employee->religion = $request->religion;
            $employee->category = $request->category;
            $employee->designation = $request->designation;
            $employee->date_of_joining =  date('Y-m-d', strtotime($request->date_of_joining));
            $employee->address = $request->address;
            $employee->aadhar_card = $request->aadhar_card;
            $employee->pancard = $request->pancard;
            $employee->bank_name = $request->bank_name;
            $employee->bank_acc_no = $request->bank_acc_no;
            $employee->ifsc_code = $request->ifsc_code;
            $employee->save();

            $frontOfficeRole = Role::where('name', 'Front Office')->first();

            //detaching role
            if($user->hasRole('Front Office')){
                $user->removeRole('Front Office');
                $employee->is_front_office = false;
                $user->email = $request->employee_code.rand(10000,99999).'@gmail.com';
            }

            //for front office
            if($request->is_front_office == 1 || $request->is_front_office == '1'){
                //update email
                if(isset($request->email))
                    $user->email = $request->email;
                //update password
                if(isset($request->password)){
                    $employee_plaintext_password = $request->password ?? rand(10000,99999);
                    $user->password = Hash::make($employee_plaintext_password);
                }
                //assigning role
                $employee->is_front_office = true;
                $user->assignRole($frontOfficeRole);
            }

            $employee->save();
            $user->save();

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
        if (!Auth::user()->can('employee-delete')) {
            $response = array(
                'message' => trans('no_permission_message')
            );
            return response()->json($response);
        }
        try {
            $user = User::find($id);
            if ($user->image != "" && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }
            $user->delete();

            $employee_id = Employee::select('id')->where('user_id', $id)->pluck('id')->first();
            $employee = Employee::find($employee_id);
            $employee->delete();

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
