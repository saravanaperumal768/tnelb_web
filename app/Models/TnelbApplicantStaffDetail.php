<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TnelbApplicantStaffDetail extends Model
{
    use HasFactory;
    protected $table = 'tnelb_applicant_formA_staffdetails';

    protected $fillable = [
        'login_id',
        'application_id',
        'staff_name',
        'staff_qualification',
        'cc_number',
        'cc_validity',
    ];
}
