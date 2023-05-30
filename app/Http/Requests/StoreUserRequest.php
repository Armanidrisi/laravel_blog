<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
  /**
  * Determine if the user is authorized to make this request.
  */
  public function authorize(): bool
  {
    if ($this->user()->role == 0) {
      return false;
    }

    return true;
  }


/**
* Get the validation rules that apply to the request.
*
* @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
*/
public function rules() {
  return [
    'name' => ['required',
      'string',
      'max:255'],
    'email' => ['required',
      'string',
      'email',
      'max:255',
      'unique:users,email'],
    'password' => [
      'required',
      'string',
      'min:6'
    ],
    'role' => ['sometimes',
      'integer',
      'between:0,1'],
  ];
}
}