<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'employee_id' => 'required|string|unique:employees,employee_id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|in:male,female,other',
            'marital_status' => 'nullable|in:single,married,divorced,widowed,separated',
            'nationality' => 'nullable|string|max:100',
            'religion' => 'nullable|string|max:100',
            'blood_group' => 'nullable|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'rf_id' => 'nullable|string|unique:employees,rf_id',
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'spouse_name' => 'nullable|string|max:255',
            'phone' => 'required|string|max:20',
            'emergency_contact' => 'nullable|string|max:20',
            'email' => 'required|email|unique:employees,email',
            'present_address' => 'required|string|max:500',
            'permanent_address' => 'nullable|string|max:500',
            'mailing_address' => 'nullable|string|max:500',
            'postal_code' => 'nullable|string|max:20',
            'nid_name' => 'nullable|string|max:255',
            'joining_date' => 'required|date|after_or_equal:date_of_birth',
            'designation' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'status' => 'required|in:active,inactive,resigned,terminated,probation',
        ];
    }

    public function messages(): array
    {
        return [
            'employee_id.required' => 'Employee ID is required.',
            'employee_id.unique' => 'This employee ID already exists.',
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'date_of_birth.before' => 'Date of birth must be before today.',
            'gender.in' => 'Gender must be one of: male, female, or other.',
            'blood_group.in' => 'Invalid blood group.',
            'rf_id.unique' => 'RF ID must be unique.',
            'email.required' => 'Email is required.',
            'email.email' => 'Provide a valid email address.',
            'email.unique' => 'This email is already used.',
            'joining_date.after_or_equal' => 'Joining date must be after or equal to date of birth.',
            'status.in' => 'Status must be one of: active, inactive, resigned, terminated, or probation.',
        ];
    }
    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        //dd($validator->errors()->all());
    }
}
