<?php
namespace App\Http\Controllers\Admin;
use App\Models\Agents;
use App\Models\Company;
use App\Models\Users;
use App\Models\Policy;
use App\Models\Policytype;
use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\UsersRequest as StoreRequest;
use App\Http\Requests\UsersRequest as UpdateRequest;
use Illuminate\Contracts\Session\Session;

class UsersCrudController extends CrudController
{
    public function setUp()
    {
        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\Users");
        $this->crud->setRoute("admin/users");
        $this->crud->setEntityNameStrings('users', 'users');
        $this->crud->enableExportButtons();
        $this->crud->enableAjaxTable();
        $this->crud->setDefaultPageLength(10);
        $this->crud->addButtonFromView('line', 'user_posts', 'user_posts', 'beginning');
        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
//        $po =  DB::table('policy')
//            ->select(DB::raw('count(*) as user_id'))
//            ->where('user_id', '=', 'user_id')
//            ->groupBy('user_id')
//            ->count();
//        dd($po);

        $this->crud->setColumns(
            [
                'id' => ['name' => 'id','label' => 'id'],
                'agent_id' => ['name' => 'agent_id','label' => 'Agent Id'],
                'phone' => ['name' => 'phone','label' => 'Phone'],
                'email' => ['name' => 'email','label' => 'Email'],
                'first_name' => ['name' => 'first_name', 'label' => 'Name']

            ]
        );




       // $this->crud->addField([
       //     'label' => 'Add Agent id',
       //     'type' => 'text',
       //     'name' => 'agent_id',
       // ]);
        $this->crud->addField([
           'label' => 'Add First Name',
           'type' => 'text',
           'name' => 'first_name',
       ]);

        $this->crud->addField([
           'label' => 'Add Last Name',
           'type' => 'text',
           'name' => 'last_name',
       ]);

       $this->crud->addField([
           'label' => 'Add Phone',
           'type' => 'text',
           'name' => 'phone',
       ]);

       $this->crud->addField([
           'label' => 'Add Email Address',
           'type' => 'email',
           'name' => 'email',
       ]);

       $this->crud->addField([
           'label' => 'Add Email Address',
           'type' => 'email',
           'name' => 'email',
       ]);


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

	// custom functions for user table
	public function show($id){

       // $countpolicy = DB::table('agents')->orderBy('post_id')->count();
        $countpolicy = DB::table('policy')
            ->select(DB::raw('count(*) as user_id'))
            ->where('user_id', '=', $id)
            ->groupBy('user_id')
            ->count();

        //get the product
        $users = Users::find($id);
        $policy = Policy::where('user_id',$id)->get();
        $agent = Users::where('id',$id)->get();
        // selecting agent which is related to a user
        $agent_user = DB::table('users')
            ->select(DB::raw('agent_id'))
            ->where('id', '=', $id)
            ->get();
        // dividing array to string by supreting '"' to get only agent id from users table
        $agent_users = explode('"',$agent_user);
        // geting an agents id in one varible
        $agent_id = $agent_users['3'];
        $agent_information = DB::table('agents')->where('post_id', '=', $agent_id)->get();
        // geting all agents infromation from array and convertin them to string making one iin for per varibal
        $agent_information_full = explode('"',$agent_information);
        // infrom agents
        $agent_name = $agent_information_full['5'];
        $agency_name = $agent_information_full['9'];
        $agent_phone = $agent_information_full['29'];
        $agent_email = $agent_information_full['33'];

       // dd($agent_information_full);

        // show the view and pass the product to it
        return \View::make('user.show',compact('users','policy','agents','agent','countpolicy',
            'agent_id','agent_information','agency_name','agent_email','agent_phone','agent_name'));
    }

// View a form policy functions related to user
    public function viewaddpolicy($id){
        $user = Users::find($id);
        $policytypes = Policytype::all();
        $companys = Company::all();
        return \View::make('user.viewaddpolicy', compact('user','policytypes','companys'));
    }

    public function deletepolicy($id)
    {
        $policy = Policy::find($id);
        $policy->delete();
        \Session::flash('message', 'Successfully Policy Deleted!');
        return redirect()->back();
    }
    public function addpolicy(){
// validate
        $rules = array(
            'company_id' => 'required',
            'user_id' => 'required',
            'agent_id' => 'required',
            'policytype_id' => 'required',
            'field1'.Input::get('policytype_id') => 'required',
            'field2'.Input::get('policytype_id') => 'required',
            'field3'.Input::get('policytype_id') => 'required',
            'field4'.Input::get('policytype_id') => 'required',
            'field5'.Input::get('policytype_id') => 'required',
            'field6'.Input::get('policytype_id') => 'required',
            'field7'.Input::get('policytype_id') => 'required',
            'field8'.Input::get('policytype_id') => 'required'
        );

        $validation = \Validator::make(Input::all(), $rules);
        // PROCESS TO LOG IN
        if ($validation->fails()) {
            return \Redirect::back()->withErrors($validation)->withInput(Input::except('password'));
        }else{
//             store products
            $policy = new Policy;
            $policy->company_id = Input::get('company_id');
            $policy->user_id = Input::get('user_id');
            $policy->agent_id = Input::get('agent_id');
            $policy->policytype_id = Input::get('policytype_id');
//            fields
            $policy->field1 = Input::get('field1'.Input::get('policytype_id'));
            $policy->field2 = Input::get('field2'.Input::get('policytype_id'));
            $policy->field3 = Input::get('field3'.Input::get('policytype_id'));
            $policy->field4 = Input::get('field4'.Input::get('policytype_id'));
            $policy->field5 = Input::get('field5'.Input::get('policytype_id'));
            $policy->field6 = Input::get('field6'.Input::get('policytype_id'));
            $policy->field7 = Input::get('field7'.Input::get('policytype_id'));
            $policy->field8 = Input::get('field8'.Input::get('policytype_id'));

            $policy->save();
            //redirect
            \Session::flash('message', 'Successfully Policy Added!');
            return \Redirect::back();
        }


    }

}
