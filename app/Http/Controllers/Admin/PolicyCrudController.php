<?php

namespace App\Http\Controllers\Admin;


use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\PolicyRequest as StoreRequest;
use App\Http\Requests\PolicyRequest as UpdateRequest;
use Illuminate\Support\Facades\Input;
use App\Models\Policy;

class PolicyCrudController extends CrudController
{

    public function setUp()
    {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\Policy");
        $this->crud->setRoute("admin/policy");
        $this->crud->setEntityNameStrings('policy', 'Policys');
        $this->crud->enableExportButtons();
        $this->crud->enableAjaxTable();
        $this->crud->setDefaultPageLength(10);

        $this->crud->addFilter([ // dropdown filter
            'name' => 'policytype_id',
            'type' => 'dropdown',
            'label'=> 'Policy Types'
        ], [
            '100' => '100 - Private Car Comprehensive',
            '200' => '200 - Private Car Third Party Fire and Theft',
            '300' => '300 - Private Car Third Party',
            '600' => '400 - Life Insurance - Term Life',
            '700' => '700 - Life Insurance - Whole Life',
            '800' => '800 - Medical Insurance',
            '900' => '900 - Travel Insurance - Annual',
            '1000' => '1000 - Travel Insurance - One Time',
        ], function($value) { // if the filter is active
            $this->crud->addClause('where', 'policytype_id', $value);
        });

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/


//        $this->crud->setColumns(
//            [
//                'id','policytype_id','company_id','user_id','agent_id','field1','field2','field3','field4','field5','field6','field7','field8'
//            ]
//        );
        $this->crud->setFromDb();
//        $this->crud->addColumn([
//            'name' => 'field2',
//            'label' => 'name2',
//            'type' => 'text'
//        ]);
//
//
//        $this->crud->addField([
//            'label' => 'Companys id',
//            'type' => 'select2',
//            'name' => 'company_id',
//            'entity' => 'company_id',
//            'attribute' => 'name',
//            'model' => 'App\Models\Company'
//        ]);
//        $this->crud->addField([
//            'label' => 'Users id',
//            'type' => 'text',
//            'name' => 'user_id',
//            'entity' => 'user_id',
//            'attribute' => 'user_id',
//            'model' => 'App\Models\Users'
//        ]);
//        $this->crud->addField([
//            'label' => 'Agents id',
//            'type' => 'select2',
//            'name' => 'agent_id',
//            'entity' => 'agent_id',
//            'attribute' => 'agent_name',
//            'model' => 'App\Models\Agents'
//        ]);
//        $this->crud->addField([
//            'label' => 'PolicyType id',
//            'type' => 'select2',
//            'name' => 'policytype_id',
//            'entity' => 'policytype_id',
//            'attribute' => 'description',
//            'model' => 'App\Models\Policytype'
//        ]);
//
//            $this->crud->addField([
//                'label' => 'field1',
//                'type' => 'text',
//                'name' => 'field1',
//            ]);
//            $this->crud->addField([
//                'label' => 'Field2',
//                'type' => 'text',
//                'name' => 'field2',
//            ]);
//            $this->crud->addField([
//                'label' => 'Field3',
//                'type' => 'text',
//                'name' => 'field3',
//            ]);
//            $this->crud->addField([
//                'label' => 'Field4',
//                'type' => 'text',
//                'name' => 'field4',
//            ]);
//            $this->crud->addField([
//                'label' => 'Field5',
//                'type' => 'text',
//                'name' => 'field5',
//            ]);
//            $this->crud->addField([
//                'label' => 'Field6',
//                'type' => 'text',
//                'name' => 'field6',
//            ]);
//            $this->crud->addField([
//                'label' => 'Field7',
//                'type' => 'text',
//                'name' => 'field7',
//            ]);
//            $this->crud->addField([
//                'label' => 'Field8',
//                'type' => 'text',
//                'name' => 'field8',
//            ]);

    }

    public function addpolicy(){


// validate
        $rules = array(
            'company_id' => 'required',
            'user_id' => 'required',
            'agent_id' => 'required',
            'policytype_id' => 'required',
            'field1' => 'required',
            'field2' => 'required',
            'field3' => 'required',
            'field4' => 'required',
            'field5' => 'required',
            'field6' => 'required',
            'field7' => 'required',
            'field8' => 'required'
        );

        $validation = \Validator::make(Input::all(), $rules);
        // PROCESS TO LOG IN
        if ($validation->fails()) {
            return \Redirect::to('policy/create')->withErrors($validation)->withInput(Input::except('password'));
        }else{
            // store products
            $policy = new Policy;
            $policy->company_id = Input::get('company_id');
            $policy->user_id = Input::get('user_id');
            $policy->agent_id = Input::get('agent_id');
            $policy->policytype_id = Input::get('policytype_id');
            $policy->field1 = Input::get('field1');
            $policy->field2 = Input::get('field2');
            $policy->field3 = Input::get('field3');
            $policy->field4 = Input::get('field4');
            $policy->field5 = Input::get('field5');
            $policy->field6 = Input::get('field6');
            $policy->field7 = Input::get('field7');
            $policy->field8 = Input::get('field8');

            $policy->save();
            //redirect
            Session::flash('message', 'Successfully created policy');
            return Redirect::to('policy');
        }

    }

	public function store(StoreRequest $request)
	{
		// your additional operations before save here
        $redirect_location = parent::storeCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
	}

	public function update(UpdateRequest $request)
	{
		// your additional operations before save here
        $redirect_location = parent::updateCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
	}

}
