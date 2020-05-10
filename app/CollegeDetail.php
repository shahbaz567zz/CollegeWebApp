<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegeDetail extends Model
{
    public $table = "collegedetail";
    protected $fillable = [
        'name',
        'college_code',
        'college_description',
        'eligibility_10_perc',
        'eligibility_12_perc',
        'eligibility_age',
        'admission_mode',
        'college_rank',
        'address',
        'seats',
        'fee_first_year',
        'fee_four_years',
        'hostel_fees',
        'govt_private',
        'pic_url',
        'placement',
    ];
}
