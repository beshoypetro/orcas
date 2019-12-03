<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class monthlyOutcome
 * @package App\Models
 * @version December 2, 2019, 10:58 am UTC
 *
 * @property integer month
 * @property integer year
 * @property integer hours
 */
class monthlyOutcome extends Model
{

    public $table = 'monthly_outcomes';




    public $fillable = [
        'month',
        'year',
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
        'month' => 'integer',
        'year' => 'integer',
        'hours' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
