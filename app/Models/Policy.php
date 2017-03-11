<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Policy extends Model
{
    use CrudTrait;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/

    protected $table = 'policy';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['policytype_id','company_id','user_id','agent_id','field1','field2','field3','field4','field5','field6','field7','field8'];
    // protected $hidden = [];
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
    public function policytype(){
		return $this->belongsToMany('App\Models\Policytype');
	}
    public function companys(){
		return $this->belongsToMany('App\Models\Company');
	}
	public function users(){
		return $this->belongsToMany('App\Models\Users');
	}
	public function agents(){
		return $this->belongsToMany('App\Models\Agents');
	}
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
