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
                                

            'featured_level' => [   
                                'name' => 'featured_level',
                                'label' => 'Featured level'
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
           'label' => 'Agent ID',
           'type' => 'text',
           'name' => 'post_id',
       ]);

        $this->crud->addField([
           'label' => 'Agent Username',
           'type' => 'text',
           'name' => 'username',
       ]);

        $this->crud->addField([
           'label' => 'Agent Name',
           'type' => 'text',
           'name' => 'agent_name',
       ]);

        $this->crud->addField([
           'label' => 'Agency Name',
           'type' => 'text',
           'name' => 'agency_name',
       ]);

        $this->crud->addField([
           'label' => 'Rating',
           'type' => 'text',
           'name' => 'rating_average',
       ]);

        $this->crud->addField([
           'label' => 'Featured Level',
           'type' => 'text',
           'name' => 'featured_level',
       ]);

        $this->crud->addField([
           'label' => 'Image',
           'type' => 'url',
           'name' => 'images',
       ]);

        $this->crud->addField([
           'label' => 'Email',
           'type' => 'email',
           'name' => 'agencyagent_contact_email',
       ]);

        $this->crud->addField([
           'label' => 'phone',
           'type' => 'text',
           'name' => 'phone_number',
       ]);

        $this->crud->addField([
           'label' => 'Adress',
           'type' => 'text',
           'name' => 'business_street_adress',
       ]);

        $this->crud->addField([
           'label' => 'State',
           'type' => 'text',
           'name' => 'state',
       ]);

        $this->crud->addField([
           'label' => 'City',
           'type' => 'text',
           'name' => 'areacity',
       ]);

        $this->crud->addField([
           'label' => 'Continent',
           'type' => 'text',
           'name' => 'continent',
       ]);

        $this->crud->addField([
           'label' => 'Post Code',
           'type' => 'text',
           'name' => 'postcode',
       ]);

        $this->crud->addField([
           'label' => 'Website',
           'type' => 'text',
           'name' => 'website',
       ]);

        $this->crud->addField([
           'label' => 'Rating',
           'type' => 'number',
           'name' => 'rating_average',
               // optional
          // 'prefix' => 'users',
          // 'suffix' => 'prefix'
       ]);

        $this->crud->addField([
           'label' => 'Languge',
           'type' => 'text',
           'name' => 'language',
       ]);

        $this->crud->addField([
           'label' => 'Description',
           'type' => 'textarea',
           'name' => 'description',
       ]);

        $this->crud->addField([
           'label' => 'Short Description',
           'type' => 'textarea',
           'name' => 'short_description',
       ]);

        $this->crud->addField([
           'label' => 'Insurance Type',
           'type' => 'text',
           'name' => 'insurance_type',
       ]);

        $this->crud->addField([
           'label' => 'Insurance Company',
           'type' => 'text',
           'name' => 'insurance_companies',
       ]);

        $this->crud->addField([
          'name'    => 'do_you_agree', // the name of the db column
          'label'   => 'Do you agree', // the input label
          'type'    => 'radio',
          'options' => [ // the key will be stored in the db, the value will be shown as label; 
                              0 => "No. Do not use my information.",
                              1 => "Yes. I agree."
                          ],
          // optional
          //'inline'      => false, // show the radios all on the same line?
       ]);

        
    }


    public function show($id){
        //get the product
        $agents = Agents::find($id);
        $user = DB::table('users')->where('agent_id','=',$id)->orderBy('id')->get();

        // show the view and pass the product to it
        return \View::make('agent.show',compact('user','agents'));
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
