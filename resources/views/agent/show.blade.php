@extends('backpack::layout') @section('header')
    <section class="content-header">
        <h1>
            {{ 'Agent' }}<small>{{ 'All information about Agent'  }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
            <li class="active">{{ trans('users') }}</li>
        </ol>
        <br>
        <a href="{{ url('admin/agents') }}"><i class="glyphicon glyphicon-arrow-left"></i> Back to all agents</a>
    </section>
@endsection @section('content')

        <div class="row">
            <div class="col-md-6">
                <!-- will be used to show any messages -->
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-rounded" src="{{ $agents->images }}" alt="User profile picture">

                        <h3 class="profile-username text-center">Name: {{ $agents->agent_name }}</h3>

                        <p class="text-muted text-center">Id: {{ $agents->post_id }}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Agency Name</b> <a class="pull-right">{{ $agents->agency_name }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Rating</b> <a class="pull-right">{{ $agents->rating_average }}</a>
                            </li>
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
                        </ul>

                        <a href="{{url('/admin/agents/'.$agents->post_id.'/edit')}}" class="btn btn-primary btn-block"><b>Edit</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

    </div>
    <div class="row">
                    <div class="col-md-6">

                <!-- Profile Image -->
                <div class="box box-primary">
                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agents Information</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Continent</strong>

                        <p class="text-muted">
                            {{ $agents->continent }}
                        </p>
                        <strong><i class="fa fa-book margin-r-5"></i> language</strong>

                        <p class="text-muted">
                            {{ $agents->language }}
                        </p>

                        <hr>
                        <strong><i class="fa fa-book margin-r-5"></i> Website</strong>

                        <p class="text-muted">
                            <a href="{{ $agents->website }}">{{ $agents->website }}</a>
                        </p>

                        <hr>
                        <strong><i class="fa fa-book margin-r-5"></i> Phone</strong>

                        <p class="text-muted">
                            {{ $agents->phone_number }}
                        </p>

                        <hr>
                        <strong><i class="fa fa-book margin-r-5"></i> Email</strong>

                        <p class="text-muted">
                            {{ $agents->agencyagent_contact_email }}
                        </p>

                        <hr>
                        <strong><i class="fa fa-book margin-r-5"></i> insurance Type</strong>

                        <p class="text-muted">
                            {{ $agents->insurance_type }}
                        </p>

                        <hr>
                        <strong><i class="fa fa-book margin-r-5"></i> Insurance Company</strong>

                        <p class="text-muted">
                            {{ $agents->insurance_companies }}
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                        <p class="text-muted"><b>State: </b>{{$agents->state}}</p>
                        <p class="text-muted"><b>Area City: </b>{{$agents->areacity}}</p>
                        <p class="text-muted"><B>Post Code: </B>{{$agents->postcode}}</p>
                        <p class="text-muted"><B>Adress: </B>{{$agents->business_street_adress}}</p>

                        <hr>

                        <strong><i class="fa fa-pencil margin-r-5"></i> Level</strong>

                        <p>
                            {{--<span class="label label-danger">UI Design</span>--}}
                            {{--<span class="label label-success">Coding</span>--}}
                            {{--<span class="label label-info">Javascript</span>--}}
                            <span class="label label-warning">{{ $agents->featured_level }}</span>
                            {{--<span class="label label-primary">Node.js</span>--}}
                        </p>

                        <hr>
                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Short Description</strong>

                        <p>{{$agents->short_description}}</p>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Description</strong>

                        <p>{{$agents->description}}</p>
                        <strong><i class="fa fa-book margin-r-5"></i> Expired Day</strong>

                        <p class="text-muted">
                            {{ $agents->expires_on }}
                        </p>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>




@endsection
