<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AddSubjectRequest extends FormRequest
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
    public function rules()
    {
        return [
            'subject_name' => 'required|string|max:255',
            'academic_subject_code' => 'required|string|max:255',
            'department_id' => 'required|not_in:0',
            'category_id' => 'required|not_in:0',
            // 'professor_id' => 'required|not_in:0',
            'description' => 'required|string|max:2000',
        ];
    }
    public function messages()
    {
        return [
            'subject_name.required' => 'The subject name is required.',
            'academic_subject_code.required' => 'The academic subject code is required.',
            'department_id.required' => 'Please select a department.',
            'department_id.not_in' => 'Please select a department.',
            'category_id.required' => 'Please select a category.',
            'category_id.not_in' => 'Please select a category.',
            // 'professor_id.required' => 'Please select a professor.',
            // 'professor_id.not_in' => 'Please select a professor.',
            'description.required' => 'The description is required.',
        ];
    }



}
