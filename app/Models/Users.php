<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Users extends Model
{
    use CrudTrait;
     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/
    protected $table = 'users';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['first_name','last_name'];
    // protected $hidden = [];
    // protected $dates = [];
    /*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/
    public function getSlugWithLink() {
        return '<a href="'.url($this->slug).'" target="_blank">'.$this->slug.'</a>';
    }
    /*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/
    public function policys(){
        return $this->belongsToMany('App\Models\Policy');
    }
    public function policytype(){
        return $this->belongsToMany('App\Models\Policytype');
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
