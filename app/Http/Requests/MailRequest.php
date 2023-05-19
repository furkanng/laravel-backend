<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends FormRequest
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
            "mailer_encryption" => "string",
            "mailer_host" => "string",
            "mailer_password" => "string",
            "mailer_username" => "string",
            "mailer_port" => "string",
            "mailer_from_name" => "string",
            "mailer_from_address" => "string",
            "mailer_driver" => "string",
        ];
    }
}
