<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
     protected $fillable = [
        'ad_title', 'ad_description', 'ad_banner_file','ad_date','ad_month','ad_year','created_at','updated_at','payment_amount','ad_duration_day','ad_duration_sec','file_name',
    ];
    
}
