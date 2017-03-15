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
        // all form and colums auto generated
        $this->crud->setFromDb();

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
