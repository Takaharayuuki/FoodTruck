<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStoreRequest extends FormRequest
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
        return [
            'name' => 'required',
            'category' => 'required',
            'postalcode1' => 'required | digits:3',
            'postalcode2' => 'required | digits:4',
            'prefecture' => 'required',
            'city' => 'required',
            'town' => 'required',
            'addressRemark' => 'max: 1000',
            'period1' => 'required',
            'period2' => 'required',
            'opening_hours' => 'required',
            'closing_time' => 'required',
            'remark' => 'max: 1000',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attributeは必須です。',
            'email' => ':attributeはメールアドレス形式である必要があります。',
            'integer' => ':attributeは整数形式である必要があります。',
            'age.between' => ':attribute は :min 歳から :max 歳の間である必要があります。',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '店舗名',
            'category' => 'ジャンル',
            'postalcode1' => '郵便番号',
            'postalcode2' => '郵便番号',
            'prefecture' => '都道府県',
            'city' => '市区町村',
            'town' => '地名・番地',
            'period1' => '出店期間',
            'period2' => '出店期間',
            'opening_hours' => '開店時間',
            'closing_time' => '閉店時間',
            'remark' => '備考',
            'addressRemark' => '備考',
        ];
    }
}
