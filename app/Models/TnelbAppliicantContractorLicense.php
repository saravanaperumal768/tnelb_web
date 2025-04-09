<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TnelbAppliicantContractorLicense extends Model
{
    use HasFactory;

    protected $table = 'tnelb_applicant_formA'; // Table name

    protected $fillable = [
        'login_id',
        'application_id',
        'form_name',
        'license_name',
        'application_status',
        'license_number',
        'payment_status',
        'applicant_name',
        'business_address',
        'address_proprietor',
        'age',
        'qualification',
        'fathers_name',
        'present_business',
        'competency_certificate_holding',
        'competency_certificate_number',
        'competency_certificate_validity',
        'presently_employed',
        'presently_employed_name',
        'presently_employed_address',
        'previous_experience',
        'previous_experience_name',
        'previous_experience_address',
        'previous_experience_lnumber',
        'authorised_name_designation',
        'authorised_name',
        'authorised_designation',
        'previous_contractor_license',
        'previous_application_number',
        'bank_address',
        'bank_validity',
        'bank_amount',
        'criminal_offence',
        'consent_letter_enclose',
        'cc_holders_enclosed',
        'purchase_bill_enclose',
        'test_reports_enclose',
        'specimen_signature_enclose',
        'name_of_authorised_to_sign',
        'separate_sheet',
        'declaration1',
        'declaration2',
        'enclosure'
    ];
}
