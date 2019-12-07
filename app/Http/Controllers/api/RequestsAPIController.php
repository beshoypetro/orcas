<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRequestsAPIRequest;
use App\Http\Requests\API\UpdateRequestsAPIRequest;
use App\Models\Requests;
use App\Repositories\RequestsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class RequestsController
 * @package App\Http\Controllers\API
 */

class RequestsAPIController extends AppBaseController
{
    /** @var  RequestsRepository */
    private $requestsRepository;

    public function __construct(RequestsRepository $requestsRepo)
    {
        $this->requestsRepository = $requestsRepo;
    }

    /**
     * Display a listing of the Requests.
     * GET|HEAD /requests
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $requests = $this->requestsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($requests->toArray(), 'Requests retrieved successfully');
    }

    /**
     * Store a newly created Requests in storage.
     * POST /requests
     *
     * @param CreateRequestsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRequestsAPIRequest $request)
    {
        $input = $request->all();

        $requests = $this->requestsRepository->create($input);

        return $this->sendResponse($requests->toArray(), 'Requests saved successfully');
    }

    /**
     * Display the specified Requests.
     * GET|HEAD /requests/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Requests $requests */
        $requests = $this->requestsRepository->find($id);

        if (empty($requests)) {
            return $this->sendError('Requests not found');
        }

        return $this->sendResponse($requests->toArray(), 'Requests retrieved successfully');
    }

    /**
     * Update the specified Requests in storage.
     * PUT/PATCH /requests/{id}
     *
     * @param int $id
     * @param UpdateRequestsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRequestsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Requests $requests */
        $requests = $this->requestsRepository->find($id);

        if (empty($requests)) {
            return $this->sendError('Requests not found');
        }

        $requests = $this->requestsRepository->update($input, $id);

        return $this->sendResponse($requests->toArray(), 'Requests updated successfully');
    }

    /**
     * Remove the specified Requests from storage.
     * DELETE /requests/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Requests $requests */
        $requests = $this->requestsRepository->find($id);

        if (empty($requests)) {
            return $this->sendError('Requests not found');
        }

        $requests->delete();

        return $this->sendSuccess('Requests deleted successfully');
    }
}
