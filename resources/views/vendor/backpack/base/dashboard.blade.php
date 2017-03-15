@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        {{ trans('backpack::base.dashboard') }}<small>{{ trans('backpack::base.first_page_you_see') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="box box-default">
                <div class="info-box">
                    <!-- Apply any bg-* class to to the icon to color it -->
                    <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Agents</span>
                        <span class="info-box-number">{{ $agents }}</span>
                        <a href="{{ url('admin/agents') }}" class="btn btn-primary btn-flat" style="float: right">View Table</a>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
        </div>
        <div class="col-md-3">
            <div class="box box-default">
                <div class="info-box">
                    <!-- Apply any bg-* class to to the icon to color it -->
                    <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Users</span>
                        <span class="info-box-number">{{ $users }}</span>
                        <a href="{{ url('admin/users') }}" class="btn btn-primary btn-flat" style="float: right">View Table</a>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
        </div>
        <div class="col-md-3">
            <div class="box box-default">
                <div class="info-box">
                    <!-- Apply any bg-* class to to the icon to color it -->
                    <span class="info-box-icon bg-yellow"><i class="fa fa-book"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Policy</span>
                        <span class="info-box-number">{{ $policy }}</span>
                        <a href="{{ url('admin/policy') }}" class="btn btn-primary btn-flat" style="float: right">View Table</a>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
        </div>
        <div class="col-md-3">
            <div class="box box-default">
                <div class="info-box">
                    <!-- Apply any bg-* class to to the icon to color it -->
                    <span class="info-box-icon bg-yellow"><i class="fa fa-book"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Policy Type</span>
                        <span class="info-box-number">{{ $policytype }}</span>
                        <a href="{{ url('admin/policytype') }}" class="btn btn-primary btn-flat" style="float: right">View Table</a>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
        </div>
        <div class="col-md-3">
            <div class="box box-default">
                <div class="info-box">
                    <!-- Apply any bg-* class to to the icon to color it -->
                    <span class="info-box-icon bg-red"><i class="fa fa-building"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Companys</span>
                        <span class="info-box-number">{{ $company }}</span>
                        <a href="{{ url('admin/company') }}" class="btn btn-primary btn-flat" style="float: right">View Table</a>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
        </div>
    </div>
@endsection
