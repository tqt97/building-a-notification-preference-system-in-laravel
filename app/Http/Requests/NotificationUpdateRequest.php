<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'notifications' => ['array'],
            'notifications.*.*' => ['exists:notification_channels,type'],
            'keys.*' => ['exists:notifications,id'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'keys' => array_keys($this->notifications ?? []),
        ]);
    }
}
