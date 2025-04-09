<?php

namespace App\Http\Controllers;

use App\Models\mst_workflow;
use App\Models\Payment;
use App\Models\ProprietorformA;
use App\Models\TnelbApplicantStaffDetail;
use App\Models\TnelbAppliicantContractorLicense;
// use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class FormAController extends Controller
{
    public function store(Request $request)
    {
        $isDraft = $request->input('form_action') === 'draft';

        // ✅ Validation Rules
        $rules = [
            'applicant_name' => 'required|string|max:255',
            'business_address' => 'required|string|max:500',
            'authorised_name_designation' => 'required',
            'authorised_name' => 'nullable|string|max:255',
            'authorised_designation' => 'nullable|string|max:255',
            'previous_contractor_license' => 'required|string|max:10',
            'previous_application_number' => 'nullable|string|max:50',
            'bank_address' => 'required|string|max:500',
            'bank_validity' => 'required|date',
            'bank_amount' => 'required|numeric|min:1',
            'criminal_offence' => ['required', 'string', Rule::in(['yes', 'no'])],
            'consent_letter_enclose' => ['required', 'string', Rule::in(['yes', 'no'])],
            'cc_holders_enclosed' => ['required', 'string', Rule::in(['yes', 'no'])],
            'purchase_bill_enclose' => ['required', 'string', Rule::in(['yes', 'no'])],
            'test_reports_enclose' => ['required', 'string', Rule::in(['yes', 'no'])],
            'specimen_signature_enclose' => ['required', 'string', Rule::in(['yes', 'no'])],
            'separate_sheet' => ['required', 'string', Rule::in(['yes', 'no'])], 
            'form_name' => 'required|string|max:255',
            'license_name' => 'required|string|max:255',
            'declaration1' => 'required|string|max:255',
            'declaration2' => 'required|string|max:255',

            // ✅ Proprietor Validation Rules

            // 'proprietor_name' => 'required|string|max:255',
            // 'proprietor_address' => 'nullable|string|max:500',
            // 'age' => 'nullable|integer|min:18|max:100',
            // 'qualification' => 'nullable|string|max:255',
            // 'fathers_name' => 'nullable|string|max:255',
            // 'present_business' => 'nullable|string|max:500',

            // 'competency_certificate_holding' => ['required', Rule::in(['Y', 'N'])],
            // 'competency_certificate_number' => 'nullable|string|max:50',
            // 'competency_certificate_validity' => 'nullable|date',

            // 'presently_employed' => ['required', Rule::in(['Y', 'N'])],
            // 'presently_employed_name' => 'nullable|string|max:255',
            // 'presently_employed_address' => 'nullable|string|max:500',

            // 'previous_experience' => ['required', Rule::in(['Y', 'N'])],
            // 'previous_experience_name' => 'nullable|string|max:255',
            // 'previous_experience_address' => 'nullable|string|max:500',
            // 'previous_experience_lnumber' => 'nullable|string|max:50',
        ];

        // $rules += [
        //     'proprietor_name' => ['required', 'array', 'min:1'],  
        //     // 'proprietor_name.*' => ['required', 'string', 'max:255'],
    
        //     'proprietor_address' => ['required', 'array', 'min:1'],  
        //     'proprietor_address.*' => ['required', 'string', 'max:500'],
    
        //     'age' => ['required', 'array', 'min:1'],
        //     'age.*' => ['required', 'integer', 'min:18', 'max:100'],  
    
        //     'qualification' => ['required', 'array', 'min:1'],
        //     'qualification.*' => ['required', 'string', 'max:255'],  
    
        //     'fathers_name' => ['required', 'array', 'min:1'],
        //     'fathers_name.*' => ['required', 'string', 'max:255'],
    
        //     'present_business' => ['nullable', 'array'],
        //     'present_business.*' => ['nullable', 'string', 'max:255'],
    
        //     'competency_certificate_holding' => ['required', 'array'],
        //     'competency_certificate_holding.*' => ['required', 'in:yes,no'],  
    
        //     'competency_certificate_number' => ['nullable', 'array'],
        //     'competency_certificate_number.*' => ['nullable', 'string', 'max:255'],
    
        //     'competency_certificate_validity' => ['nullable', 'array'],
        //     'competency_certificate_validity.*' => ['nullable', 'date'],
    
        //     'presently_employed' => ['required', 'array'],
        //     'presently_employed.*' => ['required', 'in:yes,no'],  
    
        //     'presently_employed_name' => ['nullable', 'array'],
        //     'presently_employed_name.*' => ['nullable', 'string', 'max:255'],
    
        //     'presently_employed_address' => ['nullable', 'array'],
        //     'presently_employed_address.*' => ['nullable', 'string', 'max:500'],
    
        //     'previous_experience' => ['required', 'array'],
        //     'previous_experience.*' => ['required', 'in:yes,no'],
    
        //     'previous_experience_name' => ['nullable', 'array'],
        //     'previous_experience_name.*' => ['nullable', 'string', 'max:255'],
    
        //     'previous_experience_address' => ['nullable', 'array'],
        //     'previous_experience_address.*' => ['nullable', 'string', 'max:500'],
    
        //     'previous_experience_lnumber' => ['nullable', 'array'],
        //     'previous_experience_lnumber.*' => ['nullable', 'string', 'max:100'],
        // ];
        // $rules += [
        //     'staff_name' => 'required|string|max:255',
        //     'staff_qualification' => 'nullable|string|max:255',
        //     'cc_number' => 'nullable|string|max:50',
        //     'cc_validity' => 'nullable|date',
        // ];    

        // ✅ Relax validation for Draft
        if ($isDraft) {
            foreach ($rules as $key => $rule) {
                $rules[$key] = str_replace('required', 'nullable', $rule);
            }
        }

        // ✅ Validate Data
        $validatedData = $request->validate($rules);

        // ✅ Generate Application ID
        $lastApplication = TnelbAppliicantContractorLicense::latest('id')->value('application_id');
        $nextNumber = $lastApplication ? ((int) substr($lastApplication, -7)) + 1 : 1111111;
        $newApplicationId = $request->form_name . $request->license_name . date('y') . str_pad($nextNumber, 7, '0', STR_PAD_LEFT);

        // ✅ Save Main Form Data
        $form = TnelbAppliicantContractorLicense::create([
            'login_id' => $request->login_id_store,
            'application_id' => $newApplicationId,
            'application_status' => 'P',
            'license_number' => '',
            'payment_status' => $isDraft ? 'draft' : 'paid',
            'name_of_authorised_to_sign' => !empty($request->name_of_authorised_to_sign)
                ? json_encode($request->name_of_authorised_to_sign)
                : null,

            'enclosure' => '1',
            'previous_contractor_license' => $request->previous_contractor_license,
            'criminal_offence' => $request->criminal_offence,
            'consent_letter_enclose' => $request->consent_letter_enclose,
            'cc_holders_enclosed' => $request->cc_holders_enclosed,
            'purchase_bill_enclose' => $request->purchase_bill_enclose,
            'test_reports_enclose' => $request->test_reports_enclose,
            'specimen_signature_enclose' => $request->specimen_signature_enclose,


            'separate_sheet' => $request->separate_sheet,

        ] + $validatedData);
        
        if ($request->has('staff_name')) {
            foreach ($request->staff_name as $index => $staffName) {
                TnelbApplicantStaffDetail::create([
                    'login_id' => $request->login_id_store,
                    'application_id' => $newApplicationId,
                    'staff_name' => $staffName,
                    'staff_qualification' => $request->staff_qualification[$index] ?? null,
                    'cc_number' => $request->cc_number[$index] ?? null,
                    'cc_validity' => $request->cc_validity[$index] ?? null,
                ]);
            }
        }
        


        if ($request->has('proprietor_name')) {
           
            foreach ($request->proprietor_name as $index => $proprietor_name) {

                $competencyHolding = $request->competency_certificate_holding[$index] ?? 'no';
                // dd($request->all());
                // die;
                $list =ProprietorformA::create([
                    'login_id' => $request->login_id_store,
                    'application_id' => $newApplicationId,
                    'proprietor_name' => $proprietor_name,

                    //         'proprietor_address' => '123 Test Street',
                    // 'age' => 35,
                    // 'qualification' => 'B.Tech',
                    // 'fathers_name' => 'John Doe',
                    // 'present_business' => 'Electrical Works',

                    // 'competency_certificate_holding' => 'yes',
                    // 'competency_certificate_number' => 'CC123456',
                    // 'competency_certificate_validity' => '2026-12-31',

                    // 'presently_employed' => 'no',
                    // 'presently_employed_name' => null,
                    // 'presently_employed_address' => null,

                    // 'previous_experience' => 'yes',
                    // 'previous_experience_name' => 'XYZ Pvt Ltd',
                    // 'previous_experience_address' => '456 Business Park',
                    // 'previous_experience_lnumber' => 'LN789012',

                    'proprietor_address' => $request->proprietor_address[$index] ?? null,
                    'age' => $request->age[$index] ?? null,
                    'qualification' => $request->qualification[$index] ?? null,
                    'fathers_name' => $request->fathers_name[$index] ?? 'Not Provided',
                    'present_business' => $request->present_business[$index] ?? null,

                    'competency_certificate_holding' => $competencyHolding,
                    'competency_certificate_number' => ($competencyHolding === 'yes')
                        ? ($request->competency_certificate_number[$index] ?? null)
                        : null,
                    'competency_certificate_validity' => ($competencyHolding === 'yes')
                        ? ($request->competency_certificate_validity[$index] ?? null)
                        : null,

                    'presently_employed' => $request->presently_employed[$index] ?? 'no',
                    'presently_employed_name' => ($request->presently_employed[$index] === 'yes')
                        ? ($request->presently_employed_name[$index] ?? null)
                        : null,
                    'presently_employed_address' => ($request->presently_employed[$index] === 'yes')
                        ? ($request->presently_employed_address[$index] ?? null)
                        : null,

                    'previous_experience' => $request->previous_experience[$index] ?? 'no',
                    'previous_experience_name' => ($request->previous_experience[$index] === 'yes')
                        ? ($request->previous_experience_name[$index] ?? null)
                        : null,
                    'previous_experience_address' => ($request->previous_experience[$index] === 'yes')
                        ? ($request->previous_experience_address[$index] ?? null)
                        : null,
                    'previous_experience_lnumber' => ($request->previous_experience[$index] === 'yes')
                        ? ($request->previous_experience_lnumber[$index] ?? null)
                        : null,



                    // 'competency_certificate_holding' => $request->competency_certificate_holding[$index] ?? 'no',
                    // 'competency_certificate_number' => $request->competency_certificate_number[$index] ?? null,
                    // 'competency_certificate_validity' => $request->competency_certificate_validity[$index] ?? null,
                    // 'competency_certificate_number' => 
                    //     ($request->competency_certificate_holding[$index] === 'yes') ? 
                    //     ($request->competency_certificate_number[$index] ?? null) : null,
                    // 'competency_certificate_validity' => 
                    //     ($request->competency_certificate_holding[$index] === 'yes') ? 
                    //     ($request->competency_certificate_validity[$index] ?? null) : null,
                    // 'competency_certificate_holding' => 'yes',
                    // 'competency_certificate_number' => 'CC123456',
                    // 'competency_certificate_validity' => '2026-12-31',

                    // 'presently_employed' => 'no',
                    // 'presently_employed_name' => null,
                    // 'presently_employed_address' => null,

                    // 'previous_experience' => 'yes',
                    // 'previous_experience_name' => 'XYZ Pvt Ltd',
                    // 'previous_experience_address' => '456 Business Park',
                    // 'previous_experience_lnumber' => 'LN789012',
                    // 'competency_certificate_number' => ($request->competency_certificate_holding[$index] === 'yes')
                    //     ? ($request->competency_certificate_number[$index] ?? null)
                    //     : null,
                    // 'competency_certificate_validity' => ($request->competency_certificate_holding[$index] === 'yes')
                    //     ? ($request->competency_certificate_validity[$index] ?? null)
                    //     : null,

                    // 'presently_employed' => $request->presently_employed[$index] ?? 'no',
                    // 'presently_employed_name' => ($request->presently_employed[$index] === 'yes')
                    //     ? ($request->presently_employed_name[$index] ?? null)
                    //     : null,
                    // 'presently_employed_address' => ($request->presently_employed[$index] === 'yes')
                    //     ? ($request->presently_employed_address[$index] ?? null)
                    //     : null,

                    // 'previous_experience' => $request->previous_experience[$index] ?? 'no',
                    // 'previous_experience_name' => ($request->previous_experience[$index] === 'yes')
                    //     ? ($request->previous_experience_name[$index] ?? null)
                    //     : null,
                    // 'previous_experience_address' => ($request->previous_experience[$index] === 'yes')
                    //     ? ($request->previous_experience_address[$index] ?? null)
                    //     : null,
                    // 'previous_experience_lnumber' => ($request->previous_experience[$index] === 'yes')
                    //     ? ($request->previous_experience_lnumber[$index] ?? null)
                    //     : null,
                ]);
            }
            // var_dump($list);
            // die;
        }



        if (!$isDraft) {
            $transactionId = 'TXN' . rand(100000, 999999);

            Payment::create([
                'login_id' => $request->login_id_store,
                'application_id' => $newApplicationId,
                'transaction_id' => $transactionId,
                'payment_status' => 'success',
                'amount' => $request->amount,
                'form_name' => $form->form_name,
                'license_name' => $form->license_name,
            ]);

            mst_workflow::create([
                'login_id' => $request->login_id_store,
                'application_id' => $newApplicationId,
                'transaction_id' => $transactionId,
                'payment_status' => 'success',
                'formname_appliedfor' => $form->form_name,
                'license_name' => $form->license_name,
            ]);

            return response()->json([
                'message' => 'Payment Processed!',
                'login_id' => $newApplicationId,
                'transaction_id' => $transactionId,
            ]);
        }

        // ✅ Return Draft Response
        return response()->json([
            'message' => 'Form saved as draft',
            'login_id' => $newApplicationId,
        ], 200);
    }
}
