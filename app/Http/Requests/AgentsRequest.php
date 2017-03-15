<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AgentsRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
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
            'post_id' => 'required|min:1|max:255',
            'username' => 'required|min:5|max:255',
            'agent_name' => 'required|min:5|max:255',
            'rating_average' => 'required|min:1|max:255',
            'agency_name' => 'required|min:5|max:255',
            'featured_level' => 'required|min:5|max:255',
            'images' => 'required|min:5|max:255',
            'agencyagent_contact_email' => 'required|min:5|max:255',
            'state' => 'required|min:5|max:255',
            'phone_number' => 'required|min:5|max:255',
            'business_street_adress' => 'required|min:5|max:255',
            'areacity' => 'required|min:5|max:255',
            'continent' => 'required|min:5|max:255',
            'postcode' => 'required|min:5|max:255',
            'website' => 'required|min:1|max:255',
            'language' => 'required|min:5|max:255',
            'description' => 'required|min:5|max:255',
            'short_description' => 'required|min:5|max:255',
            'insurance_type' => 'required|min:5|max:255',
            'insurance_companies' => 'required|min:5|max:255',
            'do_you_agree' => 'required|min:1|max:255'
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
