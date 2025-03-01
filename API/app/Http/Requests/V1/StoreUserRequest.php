<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'avatar_path' => 'required|string',
            'password' => 'required|string',
            'role_id' => 'required|integer|exists:roles,id',
        ];
    }

    /**
     * Tùy chỉnh thông báo lỗi.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Tên là bắt buộc.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã tồn tại.',
            'avatar_path.required' => 'Ảnh đại diện là bắt buộc.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'role_id.required' => 'Vai trò là bắt buộc.',
            'role_id.integer' => 'Vai trò phải là số nguyên.',
            'role_id.exists' => 'Vai trò không tồn tại.',
        ];
    }

    public function prepareForValidation()
    {
        $this->replace([
            'name' => $this->username,
            'email' => $this->email,
            'avatar_path' => $this->avatarPath,
            'password' => bcrypt($this->hashedPassword),
            'role_id' => $this->roleId
        ]);
    }
}
