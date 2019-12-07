<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Requests
 * @package App\Models
 * @version December 7, 2019, 10:52 am UTC
 *
 * @property string type
 * @property string discription
 * @property string day
 * @property boolean status
 */
class Requests extends Model
{
    use SoftDeletes;

    public $table = 'requests';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'type',
        'discription',
        'day',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'string',
        'discription' => 'string',
        'day' => 'date',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type' => 'required',
        'discription' => 'required',
        'day' => 'required'
    ];

    
}
