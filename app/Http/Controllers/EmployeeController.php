<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
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
        $category = Employee::where('status', 1)->get();
        return view('students.details', compact('class_section', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
    public function show($id)
    {
        //
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
        //
    }
}
