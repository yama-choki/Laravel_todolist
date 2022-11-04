<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StoreTaskRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        // $data = $this->all();

        // return self::getRules($data['status']);
        return [
            'title' => ['required', 'string', 'max:20'],
            'remarks' => ['nullable', 'string', 'max:50'],
        ];
    }

    // public function withValidator(Validator $validator)
    // {
    //     $validator->sometimes('text', 'required | string | max:20', function ($input) {
    //         return $input->status === null;
    //     });
    //     $validator->sometimes('remarks', 'nullable | string | max:50', function ($input) {
    //         return $input->status === null;
    //     });
    // }

    // public static function getRules($status)
    // {
    //     // 共通的なバリデーション
    //     $rules = [
    //         'title' => ['string', 'max:20'],
    //         'remarks' => ['nullable', 'string', 'max:50'],
    //     ];

    //     if (!$status) {
    //         // data_Aがtrueだった時のみdata_Bを必須に
    //         $rules['title'] = 'required';
    //     }

    //     return $rules;
    // }
}
