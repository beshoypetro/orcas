<?php

namespace App\Repositories;

use App\Models\monthlyOutcome;
use App\Repositories\BaseRepository;

/**
 * Class monthlyOutcomeRepository
 * @package App\Repositories
 * @version December 2, 2019, 10:58 am UTC
*/

class monthlyOutcomeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'month',
        'year',
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
        return monthlyOutcome::class;
    }
}
