<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "site_footer_logo" => "mimes:jpeg,png,jpg",
            "site_description" => "string",
            "site_keywords" => "string",
            "site_title" => "string",
            "site_favicon" => "mimes:jpeg,png,jpg",
            "site_logo" => "mimes:jpeg,png,jpg",
        ];
    }
}
