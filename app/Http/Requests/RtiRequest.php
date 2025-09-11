<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RtiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "full_name" => "required|regex:/^[A-Za-z\s.]+$/|max:40",
            "gardian_type" => "required|in:Father,Husband",
            "gardian_name" => "required|regex:/^[A-Za-z\s.]+$/|max:40",
            "identity" => "required|regex:/^[A-Za-z0-9]+$/|max:19",
            "subject" => "required|regex:/^[A-Za-z\s]+$/|max:250",
            "period_from" => "required|date",
            "period_to" => "required|date|after_or_equal:period_from",
            "description" => "required|string|max:1000",
            "application_fee_challan" => "required|regex:/^[A-Za-z0-9]+$/|max:18",
            "is_info_given" => "required|boolean",
            "info_by_authority" => "required|boolean",
            "application_fee" => "required|boolean",
            "is_bpl" => "required|boolean",
            "address1" => "required|regex:/^[A-Za-z\s,-:]+$/|max:20",
            "address2" => "nullable|regex:/^[A-Za-z\s,-:]+$/|max:20",
            "pincode" => "required|digits:6",
            "city" => "required|regex:/^[A-Za-z\s-]+$/|max:15",
            "state" => "required|regex:/^[A-Za-z\s-]+$/|max:15",
            "place" => "required|regex:/^[A-Za-z\s]+$/|max:40",
            "date" => "required|date",
        ];
    }
}
