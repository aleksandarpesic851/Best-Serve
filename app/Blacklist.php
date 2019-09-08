<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blacklist extends Model
{
    protected $fillable = [
        'avatar', 'full_name', 'business', 'birthday', 'nationality', 'national_id_card_no',
        'social_security_no', 'country_residence', 'zip_code', 'surname', 'firstname', 'othername', 'maidenname', 'city_birth', 'country_birth', 'height'
        , 'color_eye', 'color_hair', 'visible_peculiarity', 'marital_status', 'profession', 'city_residence', 'surburb', 'postal_address', 'telephone_no'
        , 'email', 'phone_no', 'created_by', 'content'
    ];
}