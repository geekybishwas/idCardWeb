<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdCard extends Model
{
    use HasFactory;

    protected $table='card_details';

    // Make this input fillable
    protected $fillable=[
        'full_name',
        'email',
        'address',
        'dob',
        'expiry_date',
        'role',
        'photo'
    ];

    // Mutators allows us to modify an attribute value before saving it to db(it modify an attribute bfr storing in db)
    public function setFullName($value)
    {
        $this->attributes['full_name']=ucwords($value);
    }

    // Accessor allows us to modify an attribute value when it is accessed
    public function getDobAttribute($value){
        return date('d-M-Y',strtotime($value));
    }


}
