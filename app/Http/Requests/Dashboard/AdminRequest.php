<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'admin_id' => 'required|unique:admins',
            'password' => 'required|string|min:8',
            'Gender' => 'required|in:Male,Female',
            'rank' => 'required|string|in:Admin,User',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address is already registered.',
            'admin_id.required' => 'The admin ID field is required.',
            'admin_id.unique' => 'The admin ID is already in use.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters long.',
            'Gender.required' => 'Please select your gender.',
            'Gender.in' => 'Please select your gender.',
            'rank.required' => 'Please select a rank.',
            'rank.in' => 'Invalid rank selection.',
        ];
    }
}
