<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\PolicytypeRequest as StoreRequest;
use App\Http\Requests\PolicytypeRequest as UpdateRequest;

class PolicytypeCrudController extends CrudController
{

    public function setUp()
    {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\Policytype");
        $this->crud->setRoute("admin/policytype");
        $this->crud->setEntityNameStrings('policytype', 'policytypes');
        $this->crud->enableExportButtons();
        $this->crud->enableAjaxTable();
        $this->crud->setDefaultPageLength(10);

        $this->crud->filters();
        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

        $this->crud->setFromDb();


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
