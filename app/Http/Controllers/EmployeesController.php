<?php

namespace App\Http\Controllers;

use App\Designation;
use App\District;
use App\Division;
use App\Employee;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use PDF;

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
        $districts = District::pluck('name', 'id')->all();
        return view('forms.employee', compact('designations', 'districts'));
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
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'first_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'last_name' => 'required|regex:/^[\pL\s\-]+$/u',
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
                'message' => $validate->errors()->all(),
                'class' => 'alert-danger',
                'success' => false
            ]);
        }


        if ($validate->validated()) {

            $input = $request->all();
            $input['first_name'] = ucwords(strtolower(preg_replace('#[\s]+#', ' ', $request->first_name)));
            $input['last_name'] = ucwords(strtolower(preg_replace('#[\s]+#', ' ', $request->last_name)));
            $input['address_1'] = ucwords(strtolower(preg_replace('#[\s]+#', ' ', $request->address_1)));
            $input['address_2'] = ucwords(strtolower(preg_replace('#[\s]+#', ' ', $request->address_2)));
            $input['email'] = strtolower(str_replace(' ', '', $request->email));
            $input['gn_division'] = ucwords(strtolower(preg_replace('#[\s]+#', ' ', $request->gn_division)));
            $input['nic'] = strtoupper(str_replace(' ', '', $request->nic));


            $exist_data = [];

            $exist_data['nic'] = Employee::where('nic', $input['nic'])->get();
            $exist_data['email'] = Employee::where('email', $input['email'])->get();
            $exist_data['mobile_no'] = Employee::where('mobile_no', str_replace(' ', '', $input['mobile_no']))->get();
            $exist_data['sim_no'] = Employee::where('sim_no', str_replace(' ', '', $input['sim_no']))->get();
            $exist_data['sim_serial_no'] = Employee::where('sim_serial_no', str_replace(' ', '', $input['sim_serial_no']))->get();
            $exist_data['designation_id'] = Employee::where('designation_id', $input['designation_id'])->where('district_id', $input['district_id'])->get();

            $exist_data_errors = [];

            $email_accounts_api = file_get_contents('http://slbi.lk/rest-api/email_accounts.php');
            $email_accounts = json_decode($email_accounts_api, TRUE);


            if (!array_key_exists($input['email'], $email_accounts)) {
                array_push($exist_data_errors, 'Your email address is not valid!');
            }


            if (count($exist_data['nic']) != 0) {
                array_push($exist_data_errors, 'NIC No is already exists!');
            }

            if (count($exist_data['email']) != 0) {
                array_push($exist_data_errors, 'Email is already exists!');
            }

            if (count($exist_data['mobile_no']) != 0) {
                array_push($exist_data_errors, 'Mobile No is already exists!');
            }

            if (count($exist_data['sim_no']) != 0) {
                array_push($exist_data_errors, 'Sim No is already exists!');
            }

            if (count($exist_data['sim_serial_no']) != 0) {
                array_push($exist_data_errors, 'Sim Serial no is already exists!');
            }

            if (count($exist_data['designation_id']) != 0) {
                array_push($exist_data_errors, 'District Manager for this district already exists!');
            }

            if (count($exist_data_errors) === 0) {

                if ($input['signature'] != '') {
                    $encoded_image = explode(",", $input['signature'])[1];
                    $decoded_image = base64_decode($encoded_image);
                    $image_name = time() . '-sign.svg';

                    $success = file_put_contents(public_path() . '/media/uploads/' . $image_name, $decoded_image);

                    $signature = Photo::create(['file' => $image_name]);
                    $input['signature'] = $signature->id;
                }

                $passport_photo = $request->file('passport_photo');
                $gov_f_photo = $request->file('gov_f_photo');
                $gov_b_photo = $request->file('gov_b_photo');

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
                            $input['area_manager_id'] . '/PI/' . $employee->id;
                        break;
                    default:
                        $empcode = $employee->id;
                        break;
                }

                $update_emp_code = Employee::find($employee->id);
                $update_emp_code->emp_code = $empcode;
                $update_emp_code->save();


//        return redirect(route('employee.create'))->with('success', 'The User has been created');

                if ($input['designation_id'] === '5') {
                    $parent_link = route('employee.index') . '?am=' . $employee->id;
                    $success_array['table'] = '<tr scope="row"><th><strong>ID Number</strong></th><td>' . $empcode . '</td></tr>'
                        . '<tr scope="row"><th><strong>Parent Link</strong></th><td><input type="text" id="parent_link" class="form-control" value="' . $parent_link . '"></td></tr>'
                        . '<tr scope="row"><th><strong>ID Card</strong></th><td><a target="_blank" href="' . route('employee.index') . '/' . $employee->id . '/id_card">Download</a></td></tr>'
                        . '<tr scope="row"><th><strong>Certificate</strong></th><td><a target="_blank" href="' . route('employee.index') . '/' . $employee->id . '/assign_cert">Download</a></td></tr>'
                        . '<tr scope="row"><th><strong>Visiting Card</strong></th><td><a target="_blank" href="' . route('employee.index') . '/' . $employee->id . '/visit_card">Download</a></td></tr>';
                } else {
//                    $success_array['table'] = '<tr scope="row"><th><strong>ID Number</strong></th><td>' . $empcode . '</td></tr>';
                    $success_array['table'] = '<tr scope="row"><th><strong><span>ID Number</strong></th><td>' . $empcode . '</td></tr>'
                        . '<tr scope="row"><th><strong>ID Card</strong></th><td><a target="_blank" href="' . route('employee.index') . '/' . $employee->id . '/id_card">Download</a></td></tr>'
                        . '<tr scope="row"><th><strong>Certificate</strong></th><td><a target="_blank" href="' . route('employee.index') . '/' . $employee->id . '/assign_cert">Download</a></td></tr>'
                        . '<tr scope="row"><th><strong>Visiting Card</strong></th><td><a target="_blank" href="' . route('employee.index') . '/' . $employee->id . '/visit_card">Download</a></td></tr>';
                }

                $success_array['success'] = true;

                return response()->json($success_array);

            } else {

                return response()->json([
                    'message' => $exist_data_errors,
                    'class' => 'alert-danger',
                    'success' => false
                ]);
            }

        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function divisions($id)
    {
        $divisions = Division::where('district_id', $id)->get(['id', 'name']);
        return $divisions;
    }

    public function printPDFIdCard($id)
    {
        // This  $data array will be passed to our PDF blade
        $data = [
            'title' => 'First PDF for Medium',
            'heading' => 'Hello from 99Points.info',
            'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged."
        ];

        $pdf = PDF::loadView('pdf.pdf_id_card', $data);
        return $pdf->download('id_card.pdf');
    }

    public function printPDFAssCert($id)
    {
        // This  $data array will be passed to our PDF blade
        $data = [
            'title' => 'First PDF for Medium',
            'heading' => 'Hello from 99Points.info',
            'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged."
        ];

        $pdf = PDF::loadView('pdf.pdf_assign_cert', $data);
        return $pdf->download('assign_cert.pdf');
    }

    public function printPDFVisitCard($id)
    {
        // This  $data array will be passed to our PDF blade
        $data = [
            'title' => 'First PDF for Medium',
            'heading' => 'Hello from 99Points.info',
            'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged."
        ];

        $pdf = PDF::loadView('pdf.pdf_visit_card', $data);
        return $pdf->download('visit_card.pdf');
    }

}
