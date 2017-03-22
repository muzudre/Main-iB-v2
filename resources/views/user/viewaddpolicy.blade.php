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
        <a href="{{ url('admin/users/' .$user->id) }}"><i class="glyphicon glyphicon-arrow-left"></i> Back to all users</a>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@endsection
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            @if (Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Policy to User by id: {{ $user->id }}</h3>
                </div>
                {{ Html::ul($errors->all()) }}

                {!!  Form::open(array('url' => 'admin/users/'.$user->id.'/addpolicy/'))  !!}

                    <div class="box-body">

                        <div class="form-group">
                            {!! Form::label('agent_id', 'Agent id') !!}
                            {!! Form::text('agent_id', Input::old('agent_id'), array('class' => 'form-control')) !!}
                        </div>

                        <div class="form-group">
                            {{ Form::hidden('user_id', $user->id) }}
                        </div>

                        <div class="form-group">
                            {!! Form::label('company_id', 'Select Company') !!}
                            {{--{!! Form::select('company_id', Input::old('company_id'), array('class' => 'form-control')) !!}--}}
                            <select class="form-control" name="company_id">
                                @foreach($companys as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Select Policy</label>
                            <select class="form-control" id="policytype" name="policytype_id">

                                @foreach($policytypes as $policytype)
                                    <option name="policytype_id" value="{{ $policytype->id }}">{{ $policytype->id . '-' . $policytype->description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <script>
                            var prev = 'field100';
                            $('#policytype').change(function()
                            {
                                document.getElementById(prev).style.display = "none";
                                var selectedValue = parseInt(jQuery(this).val());
                                prev = 'field'+selectedValue;
                                document.getElementById('field'+selectedValue).style.display = "block";
                            });
                        </script>
                        @foreach($policytypes as $policytype)
                            <div id="field{{ $policytype->id }}" style="display: none">
                                <div class="form-group">
                                    <label id="field1{{ $policytype->id }}">{{ $policytype->name1 }}</label>
                                    {!! Form::text('field1'.$policytype->id , Input::old('field1'), array('class' => 'form-control')) !!}
                                </div>
                                <div class="form-group">
                                    <label id="field2{{ $policytype->id }}">{{ $policytype->name2 }}</label>
                                    {!! Form::text('field2'.$policytype->id , Input::old('field2'), array('class' => 'form-control')) !!}
                                </div>
                                <div class="form-group">
                                    <label id="field3{{ $policytype->id }}">{{ $policytype->name3 }}</label>
                                    {!! Form::text('field3'.$policytype->id , Input::old('field3'), array('class' => 'form-control')) !!}
                                </div>
                                <div class="form-group">
                                    <label id="field4{{ $policytype->id }}">{{ $policytype->name4 }}</label>
                                    {!! Form::text('field4'.$policytype->id , Input::old('field4'), array('class' => 'form-control')) !!}
                                </div>
                                <div class="form-group">
                                    <label id="field5{{ $policytype->id }}">{{ $policytype->name5 }}</label>
                                    {!! Form::text('field5'.$policytype->id , Input::old('field5'), array('class' => 'form-control')) !!}
                                </div>
                                <div class="form-group">
                                    <label id="field6{{ $policytype->id }}">{{ $policytype->name6 }}</label>
                                    {!! Form::text('field6'.$policytype->id , Input::old('field6'), array('class' => 'form-control')) !!}
                                </div>
                                <div class="form-group">
                                    <label id="field7{{ $policytype->id }}">{{ $policytype->name7 }}</label>
                                    {!! Form::text('field7'.$policytype->id , Input::old('field7'), array('class' => 'form-control')) !!}
                                </div>
                                <div class="form-group">
                                    <label id="field8{{ $policytype->id }}">{{ $policytype->name8 }}</label>
                                    {!! Form::text('field8'.$policytype->id , Input::old('field8'), array('class' => 'form-control')) !!}
                                </div>
                            </div>

                        @endforeach

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                    </div>

                {{ Form::close() }}
            </div>
            <!-- /.box -->
        </div>
    </div>





@endsection
