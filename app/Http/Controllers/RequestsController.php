<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequestsRequest;
use App\Http\Requests\UpdateRequestsRequest;
use App\Repositories\RequestsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class RequestsController extends AppBaseController
{
    /** @var  RequestsRepository */
    private $requestsRepository;

    public function __construct(RequestsRepository $requestsRepo)
    {
        $this->requestsRepository = $requestsRepo;
    }

    /**
     * Display a listing of the Requests.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $requests = $this->requestsRepository->all();

        return view('requests.index')
            ->with('requests', $requests);
    }

    /**
     * Show the form for creating a new Requests.
     *
     * @return Response
     */
    public function create()
    {
        return view('requests.create');
    }

    /**
     * Store a newly created Requests in storage.
     *
     * @param CreateRequestsRequest $request
     *
     * @return Response
     */
    public function store(CreateRequestsRequest $request)
    {
        $input = $request->all();

        $requests = $this->requestsRepository->create($input);

        Flash::success('Requests saved successfully.');

        return redirect(route('requests.index'));
    }

    /**
     * Display the specified Requests.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $requests = $this->requestsRepository->find($id);

        if (empty($requests)) {
            Flash::error('Requests not found');

            return redirect(route('requests.index'));
        }

        return view('requests.show')->with('requests', $requests);
    }

    /**
     * Show the form for editing the specified Requests.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $requests = $this->requestsRepository->find($id);

        if (empty($requests)) {
            Flash::error('Requests not found');

            return redirect(route('requests.index'));
        }

        return view('requests.edit')->with('requests', $requests);
    }

    /**
     * Update the specified Requests in storage.
     *
     * @param int $id
     * @param UpdateRequestsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRequestsRequest $request)
    {
        $requests = $this->requestsRepository->find($id);

        if (empty($requests)) {
            Flash::error('Requests not found');

            return redirect(route('requests.index'));
        }

        $requests = $this->requestsRepository->update($request->all(), $id);

        Flash::success('Requests updated successfully.');

        return redirect(route('requests.index'));
    }

    /**
     * Remove the specified Requests from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $requests = $this->requestsRepository->find($id);

        if (empty($requests)) {
            Flash::error('Requests not found');

            return redirect(route('requests.index'));
        }

        $this->requestsRepository->delete($id);

        Flash::success('Requests deleted successfully.');

        return redirect(route('requests.index'));
    }
}
