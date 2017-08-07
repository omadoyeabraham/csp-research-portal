<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class storeFixedIncomeRequest extends Request
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
       /* if ($this->hasFile('reportFile')) {
                dd($this->file('reportFile'));
        }*/
      
        return [
            /*
           'FI_5Y_opening_yield' => 'required',
            'FI_5Y_closing_yield' => 'required',
            'FI_5Y_change' => 'required',    
           'FI_10Y_opening_yield' => 'required',
            'FI_10Y_closing_yield' => 'required',
            'FI_10Y_change' => 'required',
           'FI_20Y_opening_yield' => 'required',
            'FI_20Y_closing_yield' => 'required',
            'FI_20Y_change' => 'required', 
           'FI_90D_opening_bid' => 'required',
            'FI_90D_closing_bid' => 'required',
            'FI_90D_change' => 'required', 
           'FI_180D_opening_bid' => 'required',
            'FI_180D_closing_bid' => 'required',
            'FI_180D_change' => 'required', 
           'FI_360D_opening_bid' => 'required',
            'FI_360D_closing_bid' => 'required',
            'FI_360D_change' => 'required'
            */
           'file' => 'required|mimes:xlsx,xls|max:10240|min:1',
        ];
        /* 
            'reportPeriod' => 'required',
            'companyName'  => 'required',
            'turnover'  => 'required',
            'pbt'  => 'required',
            'pat'  => 'required',
            'grossEarnings'  => 'required',
            'companyName' => 'required',
        */
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'report_date.required' => 'Please specify the date of the publication',
            'reportDate.before:tomorrow' => 'You cannot upload a report into the future. Are you a time traveller?',
        ];
    }

        
}
