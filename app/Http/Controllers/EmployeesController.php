<?php

namespace App\Http\Controllers;

use App\Designation;
use App\District;
use App\Division;
use App\Employee;
use App\Http\Requests\EmployeeRequest;
use App\Photo;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
    public function store(EmployeeRequest $request)
    {
        //

        $input = $request->all();

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
        Employee::create($input);

        return redirect(route('employee.create'))->with('success', 'The User has been created');

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
