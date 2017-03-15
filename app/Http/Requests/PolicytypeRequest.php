<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PolicytypeRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'policy_type_id' => 'required|min:1|max:255',
            'description' => 'required|min:5|max:255',
            'name1' => 'required|min:5|max:255',
            'name2' => 'required|min:5|max:255',
            'name3' => 'required|min:5|max:255',
            'name4' => 'required|min:5|max:255',
            'name5' => 'required|min:5|max:255',
            'name6' => 'required|min:5|max:255',
            'name7' => 'required|min:5|max:255',
            'name8' => 'required|min:5|max:255'

        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
