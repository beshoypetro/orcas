<?php

namespace App\Repositories;

use App\Models\AttendSheet;
use App\Repositories\BaseRepository;

/**
 * Class AttendSheetRepository
 * @package App\Repositories
 * @version December 2, 2019, 10:55 am UTC
*/

class AttendSheetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date',
        'chickIn',
        'checkOut',
        'hours'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AttendSheet::class;
    }
}
