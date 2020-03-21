<?php

namespace App\Http\Controllers;

use App\Designation;
use App\District;
use App\Division;
use App\Employee;
use App\Photo;
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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $designations = Designation::pluck('name', 'id')->all();
        $districts = District::pluck('name','id')->all();
        return view('forms.employee', compact('designations','districts'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $input = $request->all();

        $passport_img = $request->file('passport_photo');
        $gov_front_img = $request->file('gov_front_image');
        $gov_back_img = $request->file('gov_back_image');

        if ($passport_img && $gov_front_img && $gov_back_img) {
            $passport_photo = time() . $passport_img->getClientOriginalName();
            $gov_front_image = time() . $gov_front_img->getClientOriginalName();
            $gov_back_image = time() . $gov_back_img->getClientOriginalName();

            $passport_photo->move('images/gov_img', $passport_photo);
            $gov_front_image->move('images/gov_img', $gov_front_image);
            $gov_back_image->move('images/passport_img', $gov_back_image);

            $photo_passport = Photo::create(['file' => $passport_photo]);
            $photo_gov_front = Photo::create(['file' => $gov_front_image]);
            $photo_gov_back = Photo::create(['file' => $gov_back_image]);

            $input['passport_photo'] = $photo_passport->id;
            $input['gov_front_image'] = $photo_gov_front->id;
            $input['gov_back_image'] = $photo_gov_back->id;
        }
        Employee::create($input);

        return redirect(route('forms.employee'))->with('success', 'The User has been created');
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
