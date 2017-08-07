<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class storeNewsLetterSubscribers extends Request
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
            'email' => 'required',
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
            'reportType.required' => 'The report type must be indicated',
            'reportDate.required' => 'Please specify the date of the publication',
            'reportDate.date' => "Invalid format used for report date",
            'reportDate.before:tomorrow' => 'You cannot upload a report into the future. Are you a time traveller?',
            'reportFile.file' => 'The file must be uploaded',

            'ticker_id.required' => 'The company name is required',
        ];
    }

        
}
