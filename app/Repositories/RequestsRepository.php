<?php

namespace App\Repositories;

use App\Models\Requests;
use App\Repositories\BaseRepository;

/**
 * Class RequestsRepository
 * @package App\Repositories
 * @version December 7, 2019, 10:52 am UTC
*/

class RequestsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'discription',
        'day',
        'status'
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
        return Requests::class;
    }
}
