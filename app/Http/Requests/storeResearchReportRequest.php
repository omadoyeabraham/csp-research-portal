<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class storeResearchReportRequest extends Request
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
            'ticker_id' => 'required',
            'report_name' => 'required',
            //'file' => 'required|mimes:xlsx,xls,pdf,docx,doc,pptx|max:10240|min:1',
            'preview' => 'required',
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
