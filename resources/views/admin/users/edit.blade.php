@extends('layouts.admin')

@section('title', 'Edit Users')

@section('page-name', 'Edit Users')

@section('content')
    <div class="row">
        <div class="col-sm-3" style="padding-top:2rem;">
            <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400' }}" alt="User Image" class="img-responsive img-rounded">
        </div>

        <div class="col-sm-9">
            <div class="card alert">
                <div class="card-header">
                    <h4>Edit User</h4>
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

                        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}

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
                                {!! Form::select('is_active', array('1' => 'Active', '0' => 'Not Active') , null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('password', 'Password ') !!}
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('photo_id', 'Photo ') !!}
                                {!! Form::file('photo_id', null) !!}
                            </div>

                            {!! Form::submit('Update User', ['class' => 'btn btn-info col-sm-2']) !!}

                        {!! Form::close() !!}

                        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}

                            <span class="col-sm-8"></span>

                            <div class="form-group">
                                {!! Form::submit('Delete User', ['class' => 'btn btn-danger col-sm-2', 'onclick' => 'return confirm("Are you sure want to delete that user ?")' ]) !!}
                            </div>

                        {!! Form::close() !!}

                        <span style="margin:1rem;"></span>

                    </div>
                </div>
            </div>
        </div><!-- /# column -->
    </div><!-- /# row -->
@endsection
