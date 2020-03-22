@extends('layouts.guest.guest')

@section('title')
    Employee Form
@endsection

@section('content')
    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span>Employee
            Form</h4>
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Employee Details</h5>
                <p class="mb-25">An employee is an individual who was hired by an employer to do a specific job.</p>
                <div class="row">
                    <div class="col-sm">

                        {!! Form::open(['method' => 'POST', 'route' => 'employee.store', 'files'=> true]) !!}


                        <div class="row">
                            <div class="col-md-6 form-group">
                                {!! Form::label('first_name', 'First Name ') !!}
                                {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
                            </div>
                            <div class="col-md-6 form-group">
                                {!! Form::label('last_name', 'Last Name ') !!}
                                {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                {!! Form::label('email', 'E-Mail ') !!}
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-envelope"></i></span>
                                    </div>
                                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address']) !!}
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                {!! Form::label('designation_id', 'Designation ') !!}
                                <div class="input-group">
                                    {!! Form::select('designation_id', ['' => 'Choose Option']  + $designations, null , ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('gender', 'Gender ', ['class' => 'control-label mb-10']) }}
                            <div>
                                <div class="custom-control custom-radio mb-5">
                                    {{Form::radio('gender', 'M' , false, ['id' => 'male', 'class' => 'custom-control-input']) }}
                                    {{ Form::label('male', 'Male ', ['class' => 'custom-control-label']) }}
                                </div>
                                <div class="custom-control custom-radio">
                                    {!! Form::radio('gender', 'F' , false, ['id' => 'female', 'class' => 'custom-control-input']) !!}
                                    {!! Form::label('female', 'Female ', ['class' => 'custom-control-label']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                {!! Form::label('civil_status', 'Civil Status ', ['class' => 'input_tags']) !!}
                                {!! Form::select('civil_status', array('M' => 'Married', 'S' => 'Single') , 'S', ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-6 form-group">
                                {!! Form::label('dob', 'Date of Birth ', ['class' => 'input_tags']) !!}
                                {!! Form::date('dob', null, ['class' => 'form-control', 'placeholder' => '', 'max' => '2002-12-31', 'min' => '1950-01-01']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                {!! Form::label('address_1', 'Address Line 1') !!}
                                {!! Form::text('address_1', null, ['class' => 'form-control', 'placeholder' => 'Address Line 2']) !!}
                            </div>
                            <div class="col-md-6 form-group">
                                {!! Form::label('address_2', 'Address Line 2 (Optional)') !!}
                                {!! Form::text('address_2', null, ['class' => 'form-control', 'placeholder' => 'Address Line 2',]) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                {!! Form::label('nic', 'NIC No.') !!}
                                {!! Form::text('nic', null, ['class' => 'form-control', 'placeholder' => 'NIC No.']) !!}
                            </div>
                            <div class="col-md-6 form-group">
                                {!! Form::label('mobile_no', 'Mobile No.') !!}
                                {!! Form::tel('mobile_no', null, ['class' => 'form-control', 'placeholder' => 'Mobile No.',]) !!}
                            </div>
                        </div>

                        <div class="row mt-10 mb-10">
                            <div class="col-md-4 form-group">
                                {!! Form::label('district_id', 'District ') !!}
                                <div class="input-group">
                                    {!! Form::select('district_id', ['' => 'Choose Option']  + $districts, null , ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                {!! Form::label('division_id', 'DS Division ') !!}
                                <div class="input-group">
                                    {!! Form::select('division_id', ['' => 'Choose Option']  , null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                {!! Form::label('gn_division', 'GN Division ') !!}
                                <div class="input-group">
                                    {!! Form::text('gn_division', null, ['class' => 'form-control', 'placeholder' => 'Gramaniladari Division']) !!}
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 form-group">
                                {!! Form::label('sim_no', 'SLBI SIM No.') !!}
                                {!! Form::text('sim_no', null, ['class' => 'form-control', 'placeholder' => 'SLBI SIM No.']) !!}
                            </div>
                            <div class="col-md-6 form-group">
                                {!! Form::label('sim_serial_no', 'SLBI SIM Serial No.') !!}
                                {!! Form::text('sim_serial_no', null, ['class' => 'form-control', 'placeholder' => 'SLBI SIM Serial No.',]) !!}
                            </div>
                        </div>

                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Custom file upload</h5>
                            <p class="mb-40">A custom file browser with change and remove function.</p>
                            <div class="row mb-10">
                                <div class="col-md-6 form-group">
                                    <div class="form-group mb-0">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Passport Size Photo</span>
                                            </div>
                                            <div class="form-control text-truncate" data-trigger="fileinput"><i
                                                    class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                                    class="fileinput-filename"></span></div>
                                            <span class="input-group-append">
                        														<span class=" btn btn-primary btn-file"><span
                                                                                        class="fileinput-new">Select file</span><span
                                                                                        class="fileinput-exists">Change</span>
                                                                        {!! Form::file('passport_photo', null) !!}
                                                                        </span>
                                                                        <a href="#"
                                                                           class="btn btn-secondary fileinput-exists"
                                                                           data-dismiss="fileinput">Remove</a>
                                                                        </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <div class="form-group mb-0">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="input-group-prepend">
                                                                            <span
                                                                                class="input-group-text">NIC/Driving License Front Image</span>
                                            </div>
                                            <div class="form-control text-truncate" data-trigger="fileinput"><i
                                                    class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                                    class="fileinput-filename"></span></div>
                                            <span class="input-group-append">
                        														<span class=" btn btn-primary btn-file"><span
                                                                                        class="fileinput-new">Select file</span><span
                                                                                        class="fileinput-exists">Change</span>
                                                                        {!! Form::file('gov_f_photo', null) !!}
                                                                        </span>
                                                                        <a href="#"
                                                                           class="btn btn-secondary fileinput-exists"
                                                                           data-dismiss="fileinput">Remove</a>
                                                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <div class="form-group mb-0">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">NIC/Driving License Back Image</span>
                                            </div>
                                            <div class="form-control text-truncate" data-trigger="fileinput"><i
                                                    class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                                    class="fileinput-filename"></span></div>
                                            <span class="input-group-append">
                                                    <span class=" btn btn-primary btn-file"><span
                                                            class="fileinput-new">Select file</span><span
                                                            class="fileinput-exists">Change</span>
                                            {!! Form::file('gov_b_photo', null) !!}
                                            </span>
                                                                        <a href="#"
                                                                           class="btn btn-secondary fileinput-exists"
                                                                           data-dismiss="fileinput">Remove</a>
                                                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </section>

                        {!! Form::reset('Reset', ['class' => 'mt-3 btn btn-info mr-3']) !!}
                        {!! Form::submit('Complete', ['class' => 'mt-3 btn btn-primary']) !!}


                        {!! Form::close() !!}

                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- /Row -->
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {

            $('#district_id').on('change', function () {

                var url = '{{ url('json') }}' + '/district/' + $(this).val() + '/divisions/';

                $.get(url, function (data) {
                    var select = $('form select[name=division_id]');

                    select.empty();

                    $.each(data, function (key, value) {
                        select.append('<option value=' + value.id + '>' + value.name + '</option>');
                    });
                });
            });

        });

    </script>
@endsection

