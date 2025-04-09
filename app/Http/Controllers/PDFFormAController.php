<?php

namespace App\Http\Controllers;

use App\Models\ProprietorformA;
use App\Models\TnelbApplicantStaffDetail;
use App\Models\TnelbAppliicantContractorLicense;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class PDFFormAController extends Controller
{
    public function generateaPDF($newApplicationId)
    {

        // return $newApplicationId;
        // exit;
        // Fetch form details
        $form = TnelbAppliicantContractorLicense::where('application_id', $newApplicationId)->first();
        $education = TnelbApplicantStaffDetail::where('application_id', $newApplicationId)->get();
        $proprietor = ProprietorformA::where('application_id', $newApplicationId)->get();
        // $documents = Mst_documents::where('application_id', $newApplicationId)->first();
        // $payment = DB::table('payments')->where('application_id', $newApplicationId)->first();

        if (!$form) {
            return redirect()->back()->with('error', 'No records found!');
        }

        // Initialize mPDF
        // $mpdf = new Mpdf();
        $mpdf = new Mpdf(['default_font_size' => 10]);
        $mpdf->SetFont('helvetica', '', 10);
        $mpdf->WriteHTML('<style> 
            body { line-height: 0.8; } 
            p, td, th { line-height: 2.0; padding: 2px; }
             td, th { line-height: 2.0; padding: 2px; }
             th{font-size:13px;}
             h3, h4, p {
            margin: 2px 0; /* Reduces top & bottom margin */
            line-height: 1.5; /* Adjusts spacing between lines */
        }
            .tbl_center tr td{
            text-align:center;
            }
            .mt-2{

            margin-top:10px;
    }
        </style>', \Mpdf\HTMLParserMode::HEADER_CSS);


        $mpdf->SetTitle('TNELB Application License Form ' . $form->form_name);

        // Application Title
        $html = '
        <h3 style="text-align: center;">GOVERNMENT OF TAMILNADU</h3>
        <h4 style="text-align: center;">THE ELECTRICAL LICENSING BOARD</h4>
        <p style="text-align: center;">Thiru.Vi.Ka.Indl.Estate, Guindy, Chennai – 600032.</p>
        <h4 style="text-align: center;">Form "' . $form->form_name . '"</h4>
        <p style="text-align: center;">Application for Electrical Contractor/s Licence-Grade "' . $form->license_name . '"</p>

         <p style="text-align: center;"><strong>Application No : ' . $newApplicationId . '</strong></p>
        ';

        // Applicant Details
        $html .= '
        <table width="100%"  style="border-collapse: collapse;">
            <tr>
                <td ></td>
                <td ></td>
                <td >
    ';





        $html .= '
                </td>
            </tr>
            <tr>
                
                <td><strong>1.Name of the applicant:</strong> ' . $form->applicant_name . '</td>
            </tr>
            <tr>
                
                <td><strong>2.Business address:</strong> ' . $form->business_address . '</td>
            </tr>
         
        </table>';

        $html .= '<h4 class="mt-2">3. Proprietor Details</h4>
    <table border="1" width="100%" cellspacing="0" cellpadding="5" class="text-center tbl_center" >
        <tr>
            <th >Name and Address</th>
            <th>Age and Qualifications</th>
            <th>Father/s Husband/s Name</th>
            <th>Present business of the applicant</th>
            
            <th>Competency Certificate and Validity</th>
            <th>Presently Employed and Address</th>
            
        </tr>';

        if ($proprietor->isNotEmpty()) {
            foreach ($proprietor as $pro) {
                $html .= '<tr>
                    <td>' . $pro->proprietor_name . ', ' . $pro->proprietor_address . '</td>
                    <td>' . $pro->age . ' ' . $pro->qualification . '</td>
                    <td>' . $pro->fathers_name . '</td>
                    <td>' . $pro->present_business . '</td>
                    <td>' . $pro->competency_certificate_number . '-' . $pro->competency_certificate_validity . '</td>
                    <td>' . $pro->presently_employed . '- ' . $pro->presently_employed_address . '</td>
                </tr>';
            }
        } else {
            $html .= '<tr><td colspan="6" class="text-center">No proprietor records found</td></tr>';
        }

        $html .= '</table>'; // ✅ Close Proprietor Table Properly


        $html .= '
        <h4 class="mt-2">4. Name and designation of authorised signatory (if any, in the case of a limited company):</h4>
            <table  width="50%" cellspacing="0" cellpadding="3" class="">
               

                 <tr>
                   <td></td>
                    <td>Name:</td>
                    <td>' . $form->authorised_name . '</td>
                </tr>

                   <tr>
                   <td></td>
                    <td>Designation:</td>
                    <td>' . $form->authorised_designation . '</td>
                </tr>
            </table>';

        $html .= '
            <h4 class="mt-2">5. Whether any application for
                    Contractor/s licence was made
                    previously? If so, details thereof.</h4>
                <table  width="50%" cellspacing="0" cellpadding="3" class="">
                   
    
                     <tr>
                       <td></td>
                        <td>Previous License Number:</td>
                        <td>' . $form->previous_application_number . '</td>
                    </tr>
    
                    
                </table>';


        $html .= '<h4 class="mt-2">6. Staff Details</h4>
        <table border="1" width="100%" cellspacing="0" cellpadding="5" class="text-center tbl_center" >
            <tr>
                <th>Staff Qualification</th>
                <th>Competency Certificate Number</th>
                <th>Competency Certificate Validity</th>
                
            </tr>';

        foreach ($education as $edu) {
            $html .= '<tr >
                <td class="text-center">' . $edu->staff_qualification . '</td>
                <td class="text-center">' . $edu->cc_number . '</td>
                <td class="text-center">' . $edu->cc_validity . '</td>
                
            </tr>';
        }
        $html .= '</table>';



        $html .= '
        <h4 class="mt-2">7. Bank Solvency Certificate details</h4>
            <table  width="50%" cellspacing="0" cellpadding="3" class="">
               

                 <tr>
                   <td></td>
                    <td>Name of the Bank and Address:</td>
                    <td>' . $form->bank_address . '</td>
                </tr>

                  <tr>
                   <td></td>
                    <td>Validity Period:</td>
                    <td>' . $form->bank_validity . '</td>
                </tr>

                  <tr>
                   <td></td>
                    <td>Amount Rs:</td>
                    <td>' . $form->bank_amount . '</td>
                </tr>

                
            </table> <br><br>';


        $html .= '
           
                <table  width="80%" cellspacing="0" cellpadding="3" class="">
                   
    
                     <tr>
                       <td><strong> 8. Has the applicant or any of his/her
                staff referred to under item 6, been at
                any time convicted in any court of law
                or punished by any other authority for
                criminal offences </strong></td>
                        
                        <td>' . strtoupper($form->criminal_offence) . '</td>
                    </tr>
    
                     
    
                    
                </table> ';



                $html .= '
           
                <table  width="80%" cellspacing="0" cellpadding="3" class="">
                   
    
                     <tr>
                       <td><strong>9. (i). Whether consent letter, of the competency certificate holder are enclosed. (including for self)</strong></td>
                        
                        <td>' . strtoupper($form->consent_letter_enclose) . '</td>
                    </tr>
    
                       <tr>
                       <td><strong>(ii). Whether original booklet of competency certificate holders are enclosed? (including for self)</strong></td>
                        
                        <td>' . strtoupper($form->cc_holders_enclosed) . '</td>
                    </tr>
                     
    
                    
                </table> ';

                $html .= '
           
                <table  width="80%" cellspacing="0" cellpadding="3" class="">
                   
    
                     <tr>
                       <td><strong>10. (i). Whether purchase bill for all the
                                        instruments are enclosed in
                                        Original.</strong></td>
                        
                        <td>' . strtoupper($form->purchase_bill_enclose) . '</td>
                    </tr>
    
                       <tr>
                       <td><strong>(ii). Whether the test reports for
                                    instruments and deeds for possess
                                    of the instruments are enclosed in
                                    original?</strong></td>
                        
                        <td>' . strtoupper($form->test_reports_enclose) . '</td>
                    </tr>
                     
    
                    
                </table> ';

                




                


        $html .= '           
                    <table  width="80%" cellspacing="0" cellpadding="3" class="">
                    
        
                        <tr>
                        <td><strong> 11 (i). Whether specimen signature of
                            the Proprietor or of the authorised
                            signatory (in case of limited
                            company in triplicate is enclosed) </strong></td>
                            
                            <td>' . strtoupper($form->specimen_signature_enclose) . '</td>
                        </tr>
        
                        
        
                        
                    </table> ';


                    $name_of_authorised_to_sign = $form->name_of_authorised_to_sign;

                    // Check if it's a valid JSON before decoding
                    if (is_string($name_of_authorised_to_sign) && $decoded = json_decode($name_of_authorised_to_sign, true)) {
                        $name_of_authorised_to_sign = $decoded;
                    } else {
                        // Convert a comma-separated string into an array
                        $name_of_authorised_to_sign = explode(',', $name_of_authorised_to_sign);
                    }
                    
                    $html .= '<table  width="100%" cellspacing="0" cellpadding="3">
                        <tr>
                            <td><strong>(ii). The name of the person(s) whom the applicant has authorized to sign, if any, on his/their behalf in case of Proprietor or Partnership concern</strong></td>
                        </tr>';
                    
                    // Ensure we have an array before looping
                    if (is_array($name_of_authorised_to_sign) && !empty($name_of_authorised_to_sign)) {
                        foreach ($name_of_authorised_to_sign as $sign) {
                            // Handle both JSON objects and simple strings
                            $signName = is_array($sign) ? strtoupper($sign['name'] ?? '') : strtoupper(trim($sign));
                    
                            $html .= '<tr>
                                <td>' . $signName . '</td>
                            </tr>';
                        }
                    } else {
                        $html .= '<tr><td>-</td></tr>';
                    }
                    
                    $html .= '</table>';
                    
        

                    $html .= '
           
                    <table  width="80%" cellspacing="0" cellpadding="3" class="">
                       
        
                         <tr>
                           <td><strong> (iii). Whether the applicant enclosed
                                the specimen signature of the
                                above person/ persons in triplicate
                                in a separate sheet of paper </strong></td>
                            
                            <td>' . strtoupper($form->separate_sheet) . '</td>
                        </tr>
        
                         
        
                        
                    </table> ';






        // Declaration
        $html .= '
        <p class="mt-2">I/We hereby declare that the particulars stated above are correct to the best of my/our
            knowledge and belief.</p>
        <p class="mt-2">I/We hereby declare that I/We have in my/our possession a latest copy of the Indian
            Electricity Rules,
            1956 and that I/We fully understand the terms and conditions under which an Electrical
            Contractor/s licence is granted, breach of which will render the licence liable for cancellation.</p>
        <br>
        <br>
        <br>
     
        <br>
        <p><strong>Place:</strong> Chennai</p>
        <p><strong>Date:</strong> ' . date('d-m-Y') . '</p>
      
        
        <p style="text-align: right;"><strong>Signature of the Candidate</strong></p>';



        // Write HTML to PDF
        $mpdf->WriteHTML($html);

        // Output PDF
        return response($mpdf->Output('Application_Details_Form_A'.$newApplicationId.'.pdf', 'I'))
            ->header('Content-Type', 'application/pdf');
    }
}
