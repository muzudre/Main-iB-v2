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
        <a href="{{ url('admin/users/' . $users->id ) }}"><i class="glyphicon glyphicon-arrow-left"></i> Back to all agents</a>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@endsection 
@section('content')


        <h1>Edit {{ $policy->name }}</h1>

        <!-- if there are creation errors, they will show here -->
        {{ Html::ul($errors->all()) }}

        {{ Form::model($policy, array('route' => array('policy.update', $policy->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {!! Form::label('company_id', 'Company id') !!}
            {!! Form::text('company_id', Input::old('company_id'), array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('user_id', 'User id') !!}
            {!! Form::text('user_id', Input::old('user_id'), array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('agent_id', 'Agent id') !!}
            {!! Form::text('agent_id', Input::old('agent_id'), array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('policytype_id', 'Policy type id') !!}
            {!! Form::text('policytype_id', Input::old('policytype_id'), array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('field1', 'field1') !!}
            {!! Form::text('field1', Input::old('field1'), array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('field2', 'field2') !!}
            {!! Form::text('field2', Input::old('field2'), array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('field3', 'field3') !!}
            {!! Form::text('field3', Input::old('field3'), array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('field4', 'field4') !!}
            {!! Form::text('field4', Input::old('field4'), array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('field5', 'field5') !!}
            {!! Form::text('field5', Input::old('field5'), array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('field6', 'field6') !!}
            {!! Form::text('field6', Input::old('field6'), array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('field7', 'field7') !!}
            {!! Form::text('field7', Input::old('field7'), array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('field8', 'field8') !!}
            {!! Form::text('field8', Input::old('field8'), array('class' => 'form-control')) !!}
        </div>
        {{ Form::submit('Edit the product!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}


@endsection
