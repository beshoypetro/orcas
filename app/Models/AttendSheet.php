<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class AttendSheet
 * @package App\Models
 * @version December 2, 2019, 10:55 am UTC
 *
 * @property string date
 * @property string chickIn
 * @property string checkOut
 * @property integer hours
 */
class AttendSheet extends Model
{

    public $table = 'attend_sheets';




    public $fillable = [
        'date',
        'checkIn',
        'checkOut',
        'hours',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'hours' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
