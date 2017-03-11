@extends('backpack::layout') @section('header')
<section class="content-header">
    <h1>
        {{ 'Users' }}<small>{{ 'All information about User'  }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('users') }}</li>
    </ol>
    <br>
    <a href="{{ url('admin/users') }}"><i class="glyphicon glyphicon-arrow-left"></i> Back to all Users</a>
</section>
@endsection @section('content')

    @if (Session::has('message'))
        <div class="alert alert-danger">{{ Session::get('message') }}</div>
    @endif

<div class="row">
    <div class="col-md-6">
        <h3>User</h3>
        <div class="box box-default">
            <div class="box-header with-border">
                <div class="info-box">
                    <!-- Apply any bg-* class to to the icon to color it -->
                    <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">id: {{ $users->id }}</span>
                        <span class="info-box-text">name: {{ $users->first_name }}</span>
                        <span class="info-box-text">email: {{ $users->email }}</span>
                        <span class="info-box-text">phone: {{ $users->phone }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <a href="{{ url('admin/users/' . $users->id . '/viewaddpolicy' ) }}" class="btn btn-primary ladda-button">
                    <span class="ladda-label">
                            <i class="fa fa-plus"></i> Add Policy</span></a>


                <a href="#" class="btn btn-warning ladda-button">
                    <span class="ladda-label">
                           {{ $countpolicy }}</span></a>
            </div>

        </div>
        {{--row finish--}}
    </div>
    <div class="col-md-6">
        <h3>Agent</h3>
        <div class="box box-default">
            <div class="box-header with-border">
                <div class="info-box">
                    <!-- Apply any bg-* class to to the icon to color it -->
                    <span class="info-box-icon bg-blue"><i class="fa fa-user"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">id: {{ $agent_id }}</span>
                        <span class="info-box-text">name: {{ $agent_name }}</span>
                        <span class="info-box-text">email: {{ $agent_email }}</span>
                        <span class="info-box-text">phone: {{ $agent_phone }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <a href="{{ url('admin/agents/' . $agent_id  ) }}" class="btn btn-primary ladda-button">
                    <span class="ladda-label">
                            View</span></a>

            </div>

        </div>
        {{--row finish--}}
    </div>

    {{--<div class="col-md-6">--}}
    {{--<!-- Profile Image -->--}}
        {{--<h3>Agent</h3>--}}
        {{--<div class="box box-primary">--}}
            {{--<div class="box-body box-profile">--}}
                {{--<img class="profile-user-img img-responsive img-rounded" src="{{ $agent_image }}" alt="User profile picture">--}}

                {{--<h3 class="profile-username text-center">Name: {{ $agent_name }}</h3>--}}

                {{--<p class="text-muted text-center">Id: {{ $agent_id }}</p>--}}

                {{--<ul class="list-group list-group-unbordered">--}}
                    {{--<li class="list-group-item">--}}
                        {{--<b>Agency Name</b> <a class="pull-right">{{ $agency_name }}</a>--}}
                    {{--</li>--}}
                    {{--<li class="list-group-item">--}}
                        {{--<b>Email</b> <a class="pull-right">{{ $agent_email }}</a>--}}
                    {{--</li>--}}
                    {{--<li class="list-group-item">--}}
                        {{--<b>Phone</b> <a class="pull-right">{{ $agent_phone }}</a>--}}
                    {{--</li>--}}
                    {{--<li class="list-group-item">--}}
                    {{--<b>language</b> <a class="pull-right">{{ $agents->language }}</a>--}}
                    {{--</li>--}}
                    {{--<li class="list-group-item">--}}
                    {{--<b>language</b> <a class="pull-right">{{ $agents->short_description }}</a>--}}
                    {{--</li>--}}
                    {{--<li class="list-group-item">--}}
                    {{--<b>language</b> <a class="pull-right">{{ $agents->description }}</a>--}}
                    {{--</li>--}}
                    {{--<li class="list-group-item">--}}
                    {{--<b>language</b> <a class="pull-right">{{ $agents->phone_number }}</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}

                {{--<a href="{{url('/admin/agents/edit')}}" class="btn btn-primary btn-block"><b>Edit</b></a>--}}
            {{--</div>--}}
            {{--<!-- /.box-body -->--}}
        {{--</div>--}}
        {{--<!-- /.box -->--}}
    {{--</div>--}}
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <div class="info-box">
                    <h3><b> {{ $users->first_name }} </b>policys</h3>
                    @foreach($policy as $polic)

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">{{ App\Models\Policytype::find($polic->policytype_id)->description }}</h3>
                        </div>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>policytype_id</th>
                                    <th>agent id</th>
                                    <th>company id</th>
                                    <th>{{ App\Models\Policytype::find($polic->policytype_id)->name1 }}</th>
                                    <th>{{ App\Models\Policytype::find($polic->policytype_id)->name2 }}</th>
                                    <th>{{ App\Models\Policytype::find($polic->policytype_id)->name3 }}</th>
                                    <th>{{ App\Models\Policytype::find($polic->policytype_id)->name4 }}</th>
                                    <th>{{ App\Models\Policytype::find($polic->policytype_id)->name5 }}</th>
                                    <th>{{ App\Models\Policytype::find($polic->policytype_id)->name6 }}</th>
                                    <th>{{ App\Models\Policytype::find($polic->policytype_id)->name7 }}</th>
                                    <th>{{ App\Models\Policytype::find($polic->policytype_id)->name8 }}</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>{{ $polic->policytype_id }}</td>
                                    <td>{{ $polic->agent_id }}</td>
                                    <td>{{ $polic->company_id }}</td>
                                    <td>{{ $polic->field1 }}</td>
                                    <td>{{ $polic->field2 }}</td>
                                    <td>{{ $polic->field3 }}</td>
                                    <td>{{ $polic->field4 }}</td>
                                    <td>{{ $polic->field5 }}</td>
                                    <td>{{ $polic->field6 }}</td>
                                    <td>{{ $polic->field7 }}</td>
                                    <td>{{ $polic->field8 }}</td>
                                    <td>
                                        <!-- Buttons, labels, and many other things can be placed here! -->
                                        <!-- Here is a label for example -->
                                        <a href="{{ url('/admin/policy/'.$polic->id). '/edit' }}" class="btn btn-xs btn-default bg-green"><i class="fa fa-edit"></i> edit</a>
                                        <a onclick="return confirm('Are you sure you want to delete a policy')" href="{{ url('/admin/users/'.$polic->id). '/deletepolicy' }}" class="btn btn-xs btn-default bg-red" data-button-type="delete"><i class="fa fa-trash" ></i> {{ trans('backpack::crud.delete') }}</a>

                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                    @endforeach

                    <!-- /.box-body -->
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
