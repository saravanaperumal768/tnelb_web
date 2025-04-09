<?php

namespace App\Http\Controllers;

use App\Models\Mst_documents;
use App\Models\Mst_education;
use App\Models\Mst_experience;
use App\Models\Mst_Form_s_w;
use App\Models\mst_workflow;
use App\Models\Payment;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }



    public function store(Request $request)
    {
        $action = $request->input('form_action');
        $loginId = $request->login_id_store;

        // Generate New Application ID
        $lastApplication = Mst_Form_s_w::latest('id')->value('application_id');
        if ($lastApplication) {
            $lastNumber = (int) substr($lastApplication, -7);
            $newApplicationId =$request->form_name. $request->license_name . date('y') . str_pad($lastNumber + 1, 7, '0', STR_PAD_LEFT);
        } else {
            $newApplicationId =$request->form_name. $request->license_name . date('y') . '1111111';
        }

        // Store Form Data
        $form = Mst_Form_s_w::create([
            'login_id' => $loginId,
            'applicant_name' => $request->Applicant_Name,
            'fathers_name' => $request->Fathers_Name,
            'applicants_address' => $request->applicants_address,
            'd_o_b' => $request->d_o_b,
            'age' => $request->age,
            'previously_number' => $request->previously_number ?? 0,
            'previously_date' => $request->previously_date ?? 0,
            'application_id' => $newApplicationId,
            'wireman_details' => $request->wireman_details,
            'form_name' => $request->form_name,
            'form_id' => $request->form_id,
            'license_name' => $request->license_name,
            'status' => 'P',
            // 'license_number'=>'',
            
            'payment_status' => ($action === 'draft') ? 'draft' : 'payment',
        ]);

        // Process Educational Qualifications
        if ($request->has('educational_level')) {
            foreach ($request->educational_level as $key => $level) {
                $edu_serial = Mst_education::latest('id')->value('edu_serial');
                $newedu = $edu_serial ? 'edu_' . ((int) substr($edu_serial, 4) + 1) : 'edu_1';

                Mst_education::create([
                    'login_id' => $loginId,
                    'educational_level' => $level,
                    'institute_name' => $request->institute_name[$key],
                    'year_of_passing' => $request->year_of_passing[$key],
                    'percentage' => $request->percentage[$key],
                    'application_id' => $newApplicationId,
                    'edu_serial' => $newedu,
                ]);

                if ($request->hasFile("education_document") && isset($request->file("education_document")[$key])) {
                    $file = $request->file("education_document")[$key];
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $filePath = $file->storeAs('education', $filename, 'public');

                    Mst_documents::create([
                        'login_id' => $loginId,
                        'education_serial' => $newedu,
                        'experience_serial' => null,
                        'education_doc' => $filePath,
                        'experience_doc' => null,
                        'upload_photo' => null,
                        'upload_sign' => null,
                        'application_id' => $newApplicationId,
                    ]);
                }
            }
        }

        // Process Work Experience
        if ($request->has('work_level')) {
            foreach ($request->work_level as $key => $company) {
                if (empty($company) || empty($request->experience[$key]) || empty($request->Designation[$key])) {
                    continue;
                }

                $exp_serial = Mst_experience::latest('id')->value('exp_serial');
                $newexp = $exp_serial ? 'exp_' . ((int) substr($exp_serial, 4) + 1) : 'exp_1';

                Mst_experience::create([
                    'login_id' => $loginId,
                    'company_name' => $company,
                    'experience' => $request->experience[$key],
                    'designation' => $request->Designation[$key],
                    'application_id' => $newApplicationId,
                    'exp_serial' => $newexp,
                ]);

                if ($request->hasFile("work_document") && isset($request->file("work_document")[$key])) {
                    $file = $request->file("work_document")[$key];
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $filePath = $file->storeAs('work_experience', $filename, 'public');

                    Mst_documents::create([
                        'login_id' => $loginId,
                        'education_serial' => null,
                        'experience_serial' => $newexp,
                        'education_doc' => null,
                        'experience_doc' => $filePath,
                        'upload_photo' => null,
                        'upload_sign' => null,
                        'application_id' => $newApplicationId,
                    ]);
                }
            }
        }


        if ($request->hasFile('upload_photo')) {
            $file = $request->file('upload_photo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('attached_documents', $filename, 'public');

            Mst_documents::create([
                'login_id' => $loginId,
                'education_serial' => null,
                'experience_serial' => null,
                'education_doc' => null,
                'experience_doc' => null,
                'upload_photo' => $filePath,
                'upload_sign' => null,
                'application_id' => $newApplicationId,
            ]);
        }


        if ($request->hasFile('upload_sign')) {
            $file = $request->file('upload_sign');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('attached_documents', $filename, 'public');

            Mst_documents::create([
                'login_id' => $loginId,
                'education_serial' => null,
                'experience_serial' => null,
                'education_doc' => null,
                'experience_doc' => null,
                'upload_photo' => null,
                'upload_sign' => $filePath,
                'application_id' => $newApplicationId,
                'dummy' => '0',
            ]);
        }

        // Process Payment
        if ($action === 'payment') {
            $transactionId = 'TXN' . rand(100000, 999999);

            Payment::create([
                'login_id' => $loginId,
                'application_id' => $newApplicationId,
                'transaction_id' => $transactionId,
                'payment_status' => 'success',
                'amount' => $request->amount,
                'form_name' => $form->form_name,
                'license_name' => $form->license_name,
            ]);

            mst_workflow::create([
                'login_id' => $loginId,
                'application_id' => $newApplicationId,
                'transaction_id' => $transactionId,
                'payment_status' => 'success',
                'formname_appliedfor' => $form->form_name,
                'license_name' => $form->license_name,
            ]);

            

            return response()->json([
                'message' => 'Payment Processed!',
                'login_id' => $newApplicationId
            ]);
        }

        return response()->json([
            'message' => 'Form saved successfully!',
            'login_id' => $newApplicationId
        ]);
    }
}
