<?php

namespace App\Http\Controllers\Admin;
use App\Models\Agents;
use App\Models\Users;
use App\Models\Policy;
  
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\AgentsRequest as StoreRequest;
use App\Http\Requests\AgentsRequest as UpdateRequest;
use Illuminate\Support\Facades\DB;

class AgentsCrudController extends CrudController
{

    public function setUp()
    {
        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\Agents");
        $this->crud->setRoute("admin/agents");
        $this->crud->setEntityNameStrings('agents', 'agents');
        $this->crud->enableExportButtons();
        $this->crud->enableAjaxTable();
        $this->crud->setDefaultPageLength(10);
        $this->crud->addButtonFromView('line', 'agent_posts', 'agent_posts', 'beginning');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

        $this->crud->setColumns(
            [

            'post_id' => [
                            'name' => 'post_id',
                            'label' => 'Id',
                         ],
            'agent_name' => [   
                                'name' => 'agent_name',
                                'label' => 'Agent Name'
                            ],
            'agency_name' => [   
                                'name' => 'agency_name',
                                'label' => 'Agency Name'
                            ],
            'agencyagent_contact_email' => [   
                                'name' => 'agencyagent_contact_email',
                                'label' => 'Email'
                                ],
            'phone_number' => [   
                                'name' => 'phone_number',
                                'label' => 'Phone'
                                ],
            'state' => [   
                                'name' => 'state',
                                'label' => 'State'
                                ],
            'areacity' => [   
                                'name' => 'areacity',
                                'label' => 'City'
                                ],
            'postcode' => [   
                                'name' => 'postcode',
                                'label' => 'Post Code'
                                ]
                            ]
        );

        $this->crud->addField([
           'label' => 'Add Agent Name',
           'type' => 'text',
           'name' => 'agent_name',
       ]);

        $this->crud->addField([
           'label' => 'Add Agency Name',
           'type' => 'text',
           'name' => 'agency_name',
       ]);

        $this->crud->addField([
           'label' => 'Add Agent Image',
           'type' => 'url',
           'name' => 'images',
       ]);

        $this->crud->addField([
           'label' => 'Add Agent Email',
           'type' => 'email',
           'name' => 'agencyagent_contact_email',
       ]);

        $this->crud->addField([
           'label' => 'Add Agent phone',
           'type' => 'text',
           'name' => 'phone_number',
       ]);

        $this->crud->addField([
           'label' => 'Add Agent Adress',
           'type' => 'text',
           'name' => 'business_street_adress',
       ]);

        $this->crud->addField([
           'label' => 'Add Agenc State',
           'type' => 'text',
           'name' => 'state',
       ]);

        $this->crud->addField([
           'label' => 'Add Agenc City',
           'type' => 'text',
           'name' => 'areacity',
       ]);

        $this->crud->addField([
           'label' => 'Add Agent Continent',
           'type' => 'text',
           'name' => 'continent',
       ]);

        $this->crud->addField([
           'label' => 'Add Agenc Post Code',
           'type' => 'text',
           'name' => 'postcode',
       ]);

        $this->crud->addField([
           'label' => 'Add Agent Website',
           'type' => 'text',
           'name' => 'website',
       ]);

        $this->crud->addField([
           'label' => 'Add Agent Rating',
           'type' => 'number',
           'name' => 'rating_average',
       ]);

        $this->crud->addField([
           'label' => 'Add Agent Languge',
           'type' => 'text',
           'name' => 'language',
       ]);

        $this->crud->addField([
           'label' => 'Add Agent Description',
           'type' => 'textarea',
           'name' => 'escription',
       ]);

        $this->crud->addField([
           'label' => 'Add Agent Short Description',
           'type' => 'textarea',
           'name' => 'short_description',
       ]);

        $this->crud->addField([
           'label' => 'Add Agent Insurance Type',
           'type' => 'text',
           'name' => 'insurance_type',
       ]);

        $this->crud->addField([
           'label' => 'Add Agent Insurance Company',
           'type' => 'text',
           'name' => 'insurance_companies',
       ]);

        $this->crud->addField([
           'label' => 'Add Agent Do you agree',
           'type' => 'text',
           'name' => 'do_you_agree',
       ]);

        $this->crud->addField([
           'label' => 'Add Agent Username',
           'type' => 'text',
           'name' => 'username',
       ]);

        $this->crud->addField([
           'label' => 'Add Agent level',
           'type' => 'text',
           'name' => 'featured_level',
       ]);
    }


    public function show($id){
        //get the product
        $agents = Agents::find($id);

        $user = DB::table('users')->where('agent_id','=',$id)->orderBy('user_id')->get();

        dd($user);




        // show the view and pass the product to it
        return \View::make('agent.show',compact('users','agents'));
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
