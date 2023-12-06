<?php

namespace App\Imports;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TeacherImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $validator = Validator::make($rows->toArray(), [
            // '*.teacher_code' => 'required',
            // '*.image' => 'required|mimes:jpeg,png,jpg|image|max:2048',
            // '*.name' => 'required',
            // '*.mobile' => 'required',
            // '*.father_name' => 'required',
            // '*.mother_name' => 'required',
            // '*.religion' => 'required',
            // '*.gender' => 'required',
            // '*.category' => 'required',
            '*.dob' => 'required',
            // '*.designation' => 'required',
            // '*.date_of_joining' => 'required',
            // '*.address' => 'required',
            // '*.qualification' => 'required',
        ]);

        $validator->validate();
        if ($validator->fails()) {
            $response = array(
                'error' => true,
                'message' => $validator->errors()->first()
            );
            return response()->json($response);
        }
        $teacher_count = Teacher::count();
        $teacher_code = 'SST'. ($teacher_count + 1000 + 1);

        foreach ($rows as $row) {
            $teacher_plaintext_password = str_replace('-', '', date('d-m-Y', strtotime($row['dob'])));

            $user = new User();
            // $user->image = $row['file']('image')->store('teachers', 'public');
            $user->password = Hash::make($teacher_plaintext_password);
            $user->full_name = $row['name'];
            $user->email = $row['email'] ?? $teacher_code;
            $user->user_code = $teacher_code;
            $user->dob = date('Y-m-d', strtotime($row['dob']));
            $user->gender = $row['gender'];
            $user->mobile = $row['mobile'];
            $user->current_address = $row['address'];
            $user->save();

            $teacher = new Teacher();
            $teacher->user_id = $user->id;
            $teacher->code = $teacher_code;
            $teacher->father_name = $row['father_name'];
            $teacher->mother_name = $row['mother_name'];
            $teacher->religion = $row['religion'];
            $teacher->additional_mobile = $row['additional_mobile'];
            $teacher->category = $row['category'];
            $teacher->designation = $row['designation'];
            $teacher->date_of_joining = date('Y-m-d', strtotime($row['date_of_joining']));
            $teacher->address = $row['address'];
            $teacher->aadhar_card = $row['aadhar_card'];
            $teacher->pancard = $row['pancard'];
            $teacher->bank_name = $row['bank_name'];
            $teacher->bank_acc_no = $row['bank_acc_no'];
            $teacher->qualification = $row['qualification'];
            $teacher->ifsc_code = $row['ifsc_code'];

            $teacher->spouse = $row['spouse'];
            $teacher->marital_status = $row['marital_status'];
            $teacher->pincode = $row['pincode'];
            $teacher->salary_mode = $row['salary_mode'];
            $teacher->save();

            $user->assignRole('Teacher');

            $teacher_code++;
        }
    }
}
