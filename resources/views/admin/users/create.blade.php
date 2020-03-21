@extends('layouts.admin')

@section('title', 'Create Users')

@section('page-name', 'Create Users')

@section('content')
    <div class="row">
        <div class="col-lg-9">
            <div class="card alert">
                <div class="card-header">
                    <h4>Create Users</h4>
                    <div class="card-header-right-icon">
                        <ul>
                            <li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
                            <li class="doc-link"><a href="#"><i class="ti-link"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="basic-form m-3" style="padding: 2rem 0rem;">

                        @include('includes.user_form_error')

                        {!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store', 'files' => true]) !!}

                        {{ csrf_field() }}

                            <div class="form-group">
                                {!! Form::label('name', 'Name ') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('email', 'Email Address ') !!}
                                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('role_id', 'Role ') !!}
                                {!! Form::select('role_id', ['' => 'Choose Option']  + $roles, null , ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('is_active', 'Status ') !!}
                                {!! Form::select('is_active', array('1' => 'Active', '0' => 'Not Active') , 0, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('password', 'Password ') !!}
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('photo_id', 'Photo ') !!}
                                {!! Form::file('photo_id', null) !!}
                            </div>

                            {!! Form::submit('Create User', ['class' => 'btn btn-default m-b-10']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div><!-- /# column -->
    </div><!-- /# row -->
@endsection
