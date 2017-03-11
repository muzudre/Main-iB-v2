<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Agents extends Model
{
    use CrudTrait;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

      protected $table = 'agents';
      protected $primaryKey = 'post_id';
    // public $timestamps = false;
      //protected $guarded = ['id'];
      protected $fillable = ['agent_name'];
      // protected $fillable = ['agent_name','agency_name','rating_average','language',
      //                        'short_description','description','phone_number','agencyagent_contact_email',
      //                         'business_street_adress','state','areacity','postcode','insurance_type','insurance_companies',
      //                           'submition_email','do_you_agree','website','continent','images','username','featured_level'];
     //protected $hidden = ['updated_at'];
    // protected $dates = [];

    /*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/

    /*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/

    /*
	|--------------------------------------------------------------------------
	| SCOPES
	|--------------------------------------------------------------------------
	*/

    /*
	|--------------------------------------------------------------------------
	| ACCESORS
	|--------------------------------------------------------------------------
	*/

    /*
	|--------------------------------------------------------------------------
	| MUTATORS
	|--------------------------------------------------------------------------
	*/
}
