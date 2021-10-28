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
            'storeName' => 'required',
            'storeCategory' => 'required',
            'storePostal1' => 'required | digits:3',
            'storePostal2' => 'required | digits:4',
            'storePrefecture' => 'required',
            'storeCity' => 'required',
            'storeTown' => 'required',
            'storeAddressRemark' => 'max: 1000',
            'storePeriod1' => 'required',
            'storePeriod2' => 'required',
            'storeOpeningHours' => 'required',
            'storeClosingTime' => 'required',
            'storeRemark' => 'max: 1000',
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
            'storeName' => '店舗名',
            'storeCategory' => 'ジャンル',
            'storePostal1' => '郵便番号',
            'storePostal2' => '郵便番号',
            'storePrefecture' => '都道府県',
            'storeCity' => '市区町村',
            'storeTown' => '地名・番地',
            'storePeriod1' => '出店期間',
            'storePeriod2' => '出店期間',
            'storeOpeningHours' => '開店時間',
            'storeClosingTime' => '閉店時間',
            'storeRemark' => '備考',
            'storeAddressRemark' => '備考',
        ];
    }
}
