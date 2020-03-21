@extends('layouts.admin')

@section('title', 'All Users')

@section('page-name', 'All Users')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card alert">
            <div class="card-header">
                <h4>Users  </h4>
                <div class="card-header-right-icon">
                    <ul>
                        <li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
                        {{-- <li class="card-option drop-menu"><i class="ti-settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                            <ul class="card-option-dropdown dropdown-menu">
                                <li><a href="#"><i class="ti-loop"></i> Update data</a></li>
                                <li><a href="#"><i class="ti-menu-alt"></i> Detail log</a></li>
                                <li><a href="#"><i class="ti-pulse"></i> Statistics</a></li>
                                <li><a href="#"><i class="ti-power-off"></i> Clear ist</a></li>
                            </ul>
                        </li> --}}
                        {{-- <li class="doc-link"><a href="#"><i class="ti-link"></i></a></li> --}}
                    </ul>
                </div>
            </div>

            @include('includes.flush_msg')

            <div class="card-body" style="padding: 2rem 0rem;">
                <table class="table table-responsive table-hover ">
                    <thead>
                        <tr>
                            <th><b>{{'#'}}</b></th>
                            <th><b>Photo</b></th>
                            <th><b>Name</b></th>
                            <th><b>Email</b></th>
                            <th><b>Role</b></th>
                            <th><b>Status</b></th>
                            <th><b>Created</b></th>
                            <th><b>Updated</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users)
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user->id) }}"><img height="50" src="{{ $user->photo ? $user->photo->file : 'http://placehold.it/400x400' }}" alt="Profile">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user->id) }}" style="color: #026aa7;">{{ $user->name }}
                                        </a>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role ? $user->role->name : 'User has no role' }}</td>
                                    <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
                                    <td>{{ $user->created_at ? \Carbon\Carbon::parse($user->created_at)->diffForHumans() : '' }}</td>
                                    <td>{{ $user->updated_at ? \Carbon\Carbon::parse($user->updated_at)->diffForHumans() : '' }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-sm-6">
                        Showing <b>{{$users->firstItem()}}</b> To <b>{{$users->lastItem()}}</b> of <b>{{$users->total()}}</b> entries
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">
                        {{-- {{$users->links()}} --}}
                        {{$users->render()}}
                    </div>
                </div>

            </div>
        </div><!-- /# card -->
    </div><!-- /# column -->
</div><!-- /# row -->

@endsection
