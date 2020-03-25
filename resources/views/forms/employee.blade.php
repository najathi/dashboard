@extends('layouts.guest.guest')

@section('title')
    Employee Form
@endsection

@section('content')
    <!-- Title -->
    <div class="hk-pg-header" id="employee_form_header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span>Employee
            Details</h4>
    </div>
    <!-- /Title -->

    <!-- CSS Loader -->
    <div id="pure-css-loader1">
        <div class="center-pure-css">
            <div class="lds-ring">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">

            <!-- Employee Form Section           -->
            <section class="hk-sec-wrapper" id="employee_form_section" style="display: none;">
                <h5 class="hk-sec-title">Employee Form</h5>
                <p class="mb-25">An employee is an individual who was hired by an employer to do a specific job.</p>
                <div class="row">
                    <div class="col-sm">

                        <div class="alert" id="message" style="display: none"></div>

                        {!! Form::open(['method' => 'POST', 'route' => 'employee.store', 'files'=> true, 'id' => 'employee_form']) !!}


                        <div class="row">
                            <div class="col-md-6 form-group">
                                {!! Form::label('first_name', 'First Name ') !!} <span
                                    style="font-size: 1rem; color: red; font-weight: bold;"> * </span>
                                {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name', 'required' => 'required', 'maxlength' => '40']) !!}
                            </div>
                            <div class="col-md-6 form-group">
                                {!! Form::label('last_name', 'Last Name ') !!} <span
                                    style="font-size: 1rem; color: red; font-weight: bold;"> * </span>
                                {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name', 'required' => 'required', 'maxlength' => '40']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                {!! Form::label('email', 'E-Mail ') !!} <span
                                    style="font-size: 1rem; color: red; font-weight: bold;"> * </span>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-envelope"></i></span>
                                    </div>
                                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address', 'required' => 'required']) !!}
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                {!! Form::label('designation_id', 'Designation ') !!} <span
                                    style="font-size: 1rem; color: red; font-weight: bold;"> * </span>
                                <div class="input-group">
                                    <input type="hidden" name="area_manager_id" id="area_manager_id"
                                           value="{{request()->query('am')}}"/>
                                    {!! Form::select('designation_id', ['' => 'Select Designation']  + $designations, null , ['class' => 'form-control', 'id' => 'designation_id', 'required' => 'required']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('gender', 'Gender ', ['class' => 'control-label mb-10']) }} <span
                                style="font-size: 1rem; color: red; font-weight: bold;"> * </span>
                            <div>
                                <div class="custom-control custom-radio mb-5">
                                    {{Form::radio('gender', 'M' , false, ['id' => 'male', 'class' => 'custom-control-input', 'required' => 'required']) }}
                                    {{ Form::label('male', 'Male ', ['class' => 'custom-control-label']) }}
                                </div>
                                <div class="custom-control custom-radio">
                                    {!! Form::radio('gender', 'F' , false, ['id' => 'female', 'class' => 'custom-control-input', 'required' => 'required']) !!}
                                    {!! Form::label('female', 'Female ', ['class' => 'custom-control-label']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                {!! Form::label('civil_status', 'Civil Status ', ['class' => 'input_tags']) !!} <span
                                    style="font-size: 1rem; color: red; font-weight: bold;"> * </span>
                                {!! Form::select('civil_status', array('M' => 'Married', 'S' => 'Single') , 'S', ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                            <div class="col-md-6 form-group">
                                {!! Form::label('dob', 'Date of Birth ', ['class' => 'input_tags']) !!} <span
                                    style="font-size: 1rem; color: red; font-weight: bold;"> * </span>
                                {!! Form::date('dob', null, ['class' => 'form-control', 'placeholder' => '', 'max' => '2002-12-31', 'min' => '1950-01-01', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                {!! Form::label('address_1', 'Address Line 1') !!} <span
                                    style="font-size: 1rem; color: red; font-weight: bold;"> * </span>
                                {!! Form::text('address_1', null, ['class' => 'form-control', 'placeholder' => 'Address Line 1', 'required' => 'required', 'maxlength' => '50']) !!}
                            </div>
                            <div class="col-md-6 form-group">
                                {!! Form::label('address_2', 'Address Line 2 (Optional)') !!}
                                {!! Form::text('address_2', null, ['class' => 'form-control', 'placeholder' => 'Address Line 2', 'maxlength' => '50']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                {!! Form::label('nic', 'NIC No.') !!} <span
                                    style="font-size: 1rem; color: red; font-weight: bold;"> * </span>
                                {!! Form::text('nic', null, ['class' => 'form-control', 'placeholder' => 'NIC No.', 'required' => 'required', 'maxlength' => '12']) !!}
                            </div>
                            <div class="col-md-6 form-group">
                                {!! Form::label('mobile_no', 'Mobile No.') !!} <span
                                    style="font-size: 1rem; color: red; font-weight: bold;"> * </span>
                                {!! Form::text('mobile_no', null, ['class' => 'form-control', 'placeholder' => 'Mobile No.', 'required' => 'required', 'maxlength' => '10']) !!}
                            </div>
                        </div>

                        <div class="row mt-10 mb-10">
                            <div class="col-md-12 form-group" id="dist_div">
                                {!! Form::label('district_id', 'District ') !!}
                                <div class="input-group">
                                    {!! Form::select('district_id', ['' => 'Choose District']  + $districts, null , ['class' => 'form-control', 'id' => 'district_id', 'required' => 'required']) !!}
                                </div>
                            </div>
                            <div class="col-md-4 form-group" id="ds_div">
                                {!! Form::label('division_id', 'DS Division ') !!} <span
                                    style="font-size: 1rem; color: red; font-weight: bold;"> * </span>
                                <div class="input-group">
                                    {!! Form::select('division_id', ['' => 'Choose Option']  , null, ['class' => 'form-control', 'required' => 'required']) !!}
                                </div>
                            </div>
                            <div class="col-md-4 form-group" id="gn_div">
                                {!! Form::label('gn_division', 'GN Division ') !!} <span
                                    style="font-size: 1rem; color: red; font-weight: bold;"> * </span>
                                <div class="input-group">
                                    {!! Form::text('gn_division', null, ['class' => 'form-control', 'placeholder' => 'Gramaniladari Division', 'required' => 'required']) !!}
                                </div>
                            </div>
                        </div>
                        <div id="pure-css-loader2">
                            <div class="center-pure-css">
                                <div class="lds-ring">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('sim_card', 'Do you received a sim card from SLBI? ', ['class' => 'control-label mb-10']) }}
                            <span style="font-size: 1rem; color: red; font-weight: bold;"> * </span>
                            <div>
                                <div class="custom-control custom-radio mb-5">
                                    {{Form::radio('sim_card', 'Y' , false, ['id' => 'yes', 'class' => 'custom-control-input', 'required' => 'required']) }}
                                    {{ Form::label('yes', 'Yes ', ['class' => 'custom-control-label']) }}
                                </div>
                                <div class="custom-control custom-radio">
                                    {!! Form::radio('sim_card', 'N' , true, ['id' => 'no', 'class' => 'custom-control-input', 'required' => 'required']) !!}
                                    {!! Form::label('no', 'No ', ['class' => 'custom-control-label']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row mb-10" id="sim_section">
                            <div class="col-md-6 form-group">
                                {!! Form::label('sim_no', 'SLBI SIM No.') !!} <span
                                    style="font-size: 1rem; color: red; font-weight: bold;"> * </span>
                                {!! Form::text('sim_no', null, ['class' => 'form-control', 'placeholder' => 'SLBI SIM No.', 'maxlength' => '10']) !!}
                            </div>
                            <div class="col-md-6 form-group">
                                {!! Form::label('sim_serial_no', 'SLBI SIM Serial No.') !!} <span
                                    style="font-size: 1rem; color: red; font-weight: bold;"> * </span>
                                {!! Form::text('sim_serial_no', null, ['class' => 'form-control', 'placeholder' => 'SLBI SIM Serial No.', 'maxlength' => '16']) !!}
                            </div>
                        </div>

                        <section class="hk-sec-wrapper">
                            <h6 class="hk-sec-title">Passport Size Photo <span
                                    style="font-size: 1rem; color: red; font-weight: bold;"> * </span></h6>
                            <div class="row mb-10">
                                <div class="col-md-12 form-group">
                                    <div class="form-group mb-0">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control text-truncate" data-trigger="fileinput"><i
                                                    class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                                    class="fileinput-filename"></span></div>
                                            <span class="input-group-append">
                        														<span class=" btn btn-primary btn-file"><span
                                                                                        class="fileinput-new">Select file</span><span
                                                                                        class="fileinput-exists">Change</span>
                                                                        {!! Form::file('passport_photo',['required' => 'required', 'id' => 'passport_photo']) !!}
                                                                        </span>
                                                                        <a href="#"
                                                                           class="btn btn-secondary fileinput-exists"
                                                                           data-dismiss="fileinput">Remove</a>
                                                                        </span>
                                        </div>
                                    </div>

                                    <span id="passport_uploaded_image" passport_id=""></span>

                                </div>


                        </section>

                        <section class="hk-sec-wrapper">
                            <h6 class="hk-sec-title">NIC/Driving License Front Image<span
                                    style="font-size: 1rem; color: red; font-weight: bold;"> * </span></h6>
                            <div class="col-md-12 form-group">
                                <div class="form-group mb-0">
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">

                                        <div class="form-control text-truncate" data-trigger="fileinput"><i
                                                class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                                class="fileinput-filename"></span></div>
                                        <span class="input-group-append">
                        														<span class=" btn btn-primary btn-file"><span
                                                                                        class="fileinput-new">Select file</span><span
                                                                                        class="fileinput-exists">Change</span>
                                                                        {!! Form::file('gov_f_photo',['required' => 'required']) !!}
                                                                        </span>
                                                                        <a href="#"
                                                                           class="btn btn-secondary fileinput-exists"
                                                                           data-dismiss="fileinput">Remove</a>
                                                                        </span>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="hk-sec-wrapper">
                            <h6 class="hk-sec-title">NIC/Driving License Back Image<span
                                    style="font-size: 1rem; color: red; font-weight: bold;"> * </span></h6>
                            <div class="col-md-12 form-group">
                                <div class="form-group mb-0">
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control text-truncate" data-trigger="fileinput"><i
                                                class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                                class="fileinput-filename"></span></div>
                                        <span class="input-group-append">
                        														<span class=" btn btn-primary btn-file"><span
                                                                                        class="fileinput-new">Select file</span><span
                                                                                        class="fileinput-exists">Change</span>
                                                                        {!! Form::file('gov_b_photo',['required' => 'required']) !!}
                                                                        </span>
                                                                        <a href="#"
                                                                           class="btn btn-secondary fileinput-exists"
                                                                           data-dismiss="fileinput">Remove</a>
                                                                        </span>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="hk-sec-wrapper">
                            <h6 class="hk-sec-title">Your Signature<span
                                    style="font-size: 1rem; color: red; font-weight: bold;"> * </span></h6>
                            <div class="col-md-12">
                                <div id="signature-pad" class="signature-pad">
                                    <div class="signature-pad--body">
                                        <canvas></canvas>
                                    </div>
                                    <div class="signature-pad--footer">
                                        <div class="description">Sign above</div>

                                        <div class="signature-pad--actions">
                                            <div>
                                                <button type="button" class="btn btn-dark clear" data-action="clear">
                                                    Clear
                                                </button>
                                                <!--                                                <button type="button" class="btn btn-dark" data-action="change-color">Change color</button>-->
                                                <button type="button" class="btn btn-dark" data-action="undo">Undo
                                                </button>

                                            </div>
                                            <!--                                                <div>-->
                                            <!--                                                    <button type="button" class="button save" data-action="save-png">Save as PNG</button>-->
                                            <!--                                                    <button type="button" class="button save" data-action="save-jpg">Save as JPG</button>-->
                                            <!--                                                    <button type="button" class="button save" data-action="save-svg">Save as SVG</button>-->
                                            <!--                                                </div>-->
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>

                        <div style="display: flex; flex-direction: row; justify-content: center; align-items: center">

                            {!! Form::reset('Reset', ['class' => 'mt-3 btn btn-info mr-3 btn-lg']) !!}
                            {!! Form::submit('Complete', ['class' => 'mt-3 btn btn-primary btn-lg']) !!}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </section>
            <!-- End of Employee Form Section            -->

            <!-- Loader Modal -->
            <div class="modal fade" id="loader" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true"
                 data-backdrop="static" data-keyboard="false">
                <div class="vertical-alignment-helper">
                    <div class="modal-dialog vertical-align-center">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="loader"></div>
                                <h3 class="text-center">Loading Please Wait..</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Employee Success Section           -->
            <section class="hk-sec-wrapper" id="employee_success_section" style="display: none;">
                <h5 class="hk-sec-title">Your Resources:</h5>
                <p class="mb-25">We have received your information! Here are your resources, Save them in safer
                    place.</p>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-sm table-striped" id="resources_table">

                        </table>
                    </div>
                </div>
            </section>
            <!-- End of Employee Success Section  -->

            <!-- Modal -->
            <div class="modal" tabindex="-1" role="dialog" id="signatureModel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Put the signature!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Please provide a signature first.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Row -->
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {

            $("#employee_success_section").hide();

            if ($('#area_manager_id').val() === '') {
                $("#designation_id option[value='6']").remove();
                $("#designation_id option[value='7']").remove();
            } else {
                let i;
                for (i = 0; i <= 5; i++) {
                    $("#designation_id option[value='" + i + "']").remove();
                }
            }

            $('#ds_div').hide();
            $('#gn_div').hide();
            $("#sim_section").hide();
            $('#pure-css-loader1').hide();
            $('#employee_form_section').show();
            $('#pure-css-loader2').hide();

            $('#district_id').on('change', function () {

                $('#pure-css-loader2').show();

                var url = '{{ url('json') }}' + '/district/' + $(this).val() + '/divisions/';

                $.get(url, function (data) {
                    $('#pure-css-loader2').hide();
                    $('#dist_div').removeClass('col-md-12');
                    $('#dist_div').addClass('col-md-4');
                    $('#ds_div').show();
                    $('#gn_div').show();

                    $("#district_id option[value='']").remove();

                    var select = $('form select[name=division_id]');

                    select.empty();

                    $.each(data, function (key, value) {
                        select.append('<option value=' + value.id + '>' + value.name + '</option>');
                    });
                });
            });

            $('input[type="radio"]').click(function () {
                let value = $(this).val();
                if (value === 'Y') {
                    $("#sim_section").show();
                    $("input#yes").prop('required', true);
                    $("input#no").prop('required', true);
                } else if (value === 'N') {
                    $("#sim_section").hide();
                    $("input#yes").prop('required', false);
                    $("input#no").prop('required', false);
                }
            });

            $('#empCodeSpanBtn').click(function () {
                let $temp = $("<input>");
                $("body").append($temp);
                $temp.val($("#empCodeSpan").text()).select();
                document.execCommand("copy");
                $temp.remove();
            });

            $('#employee_form').on('submit', function (e) {
                e.preventDefault();
                var signUrl = '';
                var formData = new FormData(this);
                if (signaturePad.isEmpty()) {
                    return $("#signatureModel").modal('show');
                }

                formData.append('signature', signaturePad.toDataURL("image/svg+xml"));

                $.ajax({
                    url: "{{ route('employee.store') }}",
                    method: "POST",
                    data: formData,
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        $('#pure-css-loader1').show();
                        $('#employee_form_section').hide();
                    },
                    success: function (data) {
                        console.log(data);

                        if (data.success) {
                            $('#pure-css-loader1').hide();
                            $('#employee_form_section').remove();
                            $("#employee_success_section").show();
                            var table = $('#resources_table');

                            table.append(data.table);

                        } else {
                            $('#pure-css-loader1').hide();
                            $('#employee_form_section').show();
                            $('#message').css('display', 'block');
                            $('#message').removeClass()
                            $('#message').addClass("alert");
                            $('#message').addClass(data.class);

                            let errorMessages = "";
                            let i;
                            let message = Array.from(data.message);
                            for (i = 0; i < message.length; i++) {
                                errorMessages += message[i] + "<br />";
                            }

                            $('#message').html(errorMessages);
                            document.body.scrollTop = 0; // For Safari
                            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
                        }
                        // $('#uploaded_image').html(data.uploaded_image);
                    }
                }).done(function () {
                    $('#pure-css-loader1').hide();
                });
            });

        });

    </script>
@endsection

