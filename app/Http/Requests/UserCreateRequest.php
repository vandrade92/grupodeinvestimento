<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
        $this->sanitize();
        return [
          'cpf'   => 'required',
          'name'  => 'required',
          'phone' => 'required',
          'email' => 'required|unique:users,email',
        ];
            //

    }

    public function sanitize()
    {
        $input = $this->all();

        $input['cpf'] = preg_replace("/[^a-zA-Z0-9]+/", "", $input['cpf']);
        $input['phone'] = preg_replace("/[^a-zA-Z0-9]+/", "", $input['phone']);
        $birth = explode('/', $input['birth']);
        $input['birth'] = $birth[2] . "-" . $birth[1] . "-" . $birth[0];

        $this->replace($input);
    }


}
