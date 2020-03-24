<?php

namespace App\Http\Controllers;

use App\Designation;
use App\District;
use App\Division;
use App\Employee;
use App\Http\Requests\EmployeeRequest;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designations = Designation::pluck('name', 'id')->all();
        $districts = District::pluck('name','id')->all();
        return view('forms.employee', compact('designations','districts'));
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
     * @return array
     */
    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'gender' => 'required',
            'civil_status' => 'required',
            'dob' => 'required|date_format:Y-m-d',
            'address_1' => 'required',
            'nic' => 'required|max:12|min:9',
            'passport_photo' => 'required|image',
            'mobile_no' => 'required|numeric',
            'email' => 'required|email:rfc,dns',
            'designation_id' => 'required',
            'district_id' => 'required',
            'division_id' => 'required',
            'gn_division' => 'required|max:50',
            'gov_f_photo' => 'required|image',
            'gov_b_photo' => 'required|image',
        ]);

            if ($validate->errors()->count() >= 1) {
                return response()->json([
                    'message'   => $validate->errors()->all(),
                    'class'  => 'alert-danger',
                    'success' => false
                ]);
            }


            if ($validate->validated()) {

            $input = $request->all();

            $passport_photo = $request->file('passport_photo');
            $gov_f_photo = $request->file('gov_f_photo');
            $gov_b_photo = $request->file('gov_b_photo');


                if ($input['signature'] != '') {
                    $encoded_image = explode(",", $input['signature'])[1];
                    $decoded_image = base64_decode($encoded_image);
                    $image_name = time().'-sign.svg';

                    $success = file_put_contents(public_path().'/media/uploads/'.$image_name, $decoded_image);

                    $signature = Photo::create(['file' => $image_name]);
                    $input['signature'] = $signature->id;
                }

            if ($passport_photo || $gov_f_photo || $gov_b_photo) {
                $passport_photo_name = time() . $passport_photo->getClientOriginalName();
                $gov_f_photo_name = time() . $gov_f_photo->getClientOriginalName();
                $gov_b_photo_name = time() . $gov_b_photo->getClientOriginalName();

                $passport_photo->move('media/uploads/', $passport_photo_name);
                $gov_f_photo->move('media/uploads/', $gov_f_photo_name);
                $gov_b_photo->move('media/uploads/', $gov_b_photo_name);

                $passport = Photo::create(['file' => $passport_photo_name]);
                $gov_front = Photo::create(['file' => $gov_f_photo_name]);
                $gov_back = Photo::create(['file' => $gov_b_photo_name]);

                $input['passport_photo'] = $passport->id;
                $input['gov_f_photo'] = $gov_front->id;
                $input['gov_b_photo'] = $gov_back->id;
            }
            $employee = Employee::create($input);

            $emp_id = $employee->id;
            $empcode = "";

            switch ($input['designation_id']) {
                case "1":
                    $empcode = "DR/" . $employee->id;
                    break;
                case "2":
                    $empcode = "AD/" . $employee->id;
                    break;
                case "3":
                    $empcode = District::where('id', $input['district_id'])->get('short_code')[0]->short_code . '/' . $employee->id;
                    break;
                case "4":
                    $empcode = District::where('id', $input['district_id'])->get('short_code')[0]->short_code . '/AD/' . $employee->id;
                    break;
                case "5":
                    $empcode = District::where('id', $input['district_id'])->get('short_code')[0]->short_code
                        . '/' . Division::where('id', $input['division_id'])->get('short_code')[0]->short_code . '/' . $employee->id;
                    break;
                case "6":
                    $empcode = District::where('id', $input['district_id'])->get('short_code')[0]->short_code
                        . '/' . Division::where('id', $input['division_id'])->get('short_code')[0]->short_code . '/' .
                        $input['area_manager_id'] . '/AM/' . $employee->id;
                    break;
                case "7":
                    $empcode = District::where('id', $input['district_id'])->get('short_code')[0]->short_code
                        . '/' . Division::where('id', $input['division_id'])->get('short_code')[0]->short_code . '/' .
                        $input['area_manager_id'] . '/' . $employee->id;
                    break;
                default:
                    $empcode = $employee->id;
                    break;
            }

            $update_emp_code = Employee::find($employee->id);
            $update_emp_code->emp_code = $empcode;
            $update_emp_code->save();


//        return redirect(route('employee.create'))->with('success', 'The User has been created');

            return response()->json([
                'message' => 'Employee Form Submitted Successfully',
                'class' => 'alert-success',
                'success' => true
            ]);

        }

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

    public function divisions($id)
    {
        $divisions = Division::where('district_id', $id)->get(['id','name']);
        return $divisions;
    }

}
