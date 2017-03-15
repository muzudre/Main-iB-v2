<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PolicyRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
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
            'policytype_id' => 'required|min:1|max:255',
            'company_id' => 'required|min:1|max:255',
            'user_id' => 'required|min:1|max:255',
            'agent_id' => 'required|min:1|max:255',
            'field1' => 'required|min:5|max:255',

            'field2' => 'required|min:5|max:255',
            'field3' => 'required|min:5|max:255',
            'field4' => 'required|min:5|max:255',
            'field5' => 'required|min:5|max:255',
            'field6' => 'required|min:5|max:255',
            'field7' => 'required|min:5|max:255',
            'field8' => 'required|min:5|max:255',
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
