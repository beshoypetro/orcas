<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatemonthlyOutcomeRequest;
use App\Http\Requests\UpdatemonthlyOutcomeRequest;
use App\Repositories\monthlyOutcomeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class monthlyOutcomeController extends AppBaseController
{
    /** @var  monthlyOutcomeRepository */
    private $monthlyOutcomeRepository;

    public function __construct(monthlyOutcomeRepository $monthlyOutcomeRepo)
    {
        $this->monthlyOutcomeRepository = $monthlyOutcomeRepo;
    }

    /**
     * Display a listing of the monthlyOutcome.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $monthlyOutcomes = $this->monthlyOutcomeRepository->all();

        return view('monthly_outcomes.index')
            ->with('monthlyOutcomes', $monthlyOutcomes);
    }

    /**
     * Show the form for creating a new monthlyOutcome.
     *
     * @return Response
     */
    public function create()
    {
        return view('monthly_outcomes.create');
    }

    /**
     * Store a newly created monthlyOutcome in storage.
     *
     * @param CreatemonthlyOutcomeRequest $request
     *
     * @return Response
     */
    public function store(CreatemonthlyOutcomeRequest $request)
    {
        $input = $request->all();

        $monthlyOutcome = $this->monthlyOutcomeRepository->create($input);

        Flash::success('Monthly Outcome saved successfully.');

        return redirect(route('monthlyOutcomes.index'));
    }

    /**
     * Display the specified monthlyOutcome.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $monthlyOutcome = $this->monthlyOutcomeRepository->find($id);

        if (empty($monthlyOutcome)) {
            Flash::error('Monthly Outcome not found');

            return redirect(route('monthlyOutcomes.index'));
        }

        return view('monthly_outcomes.show')->with('monthlyOutcome', $monthlyOutcome);
    }

    /**
     * Show the form for editing the specified monthlyOutcome.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $monthlyOutcome = $this->monthlyOutcomeRepository->find($id);

        if (empty($monthlyOutcome)) {
            Flash::error('Monthly Outcome not found');

            return redirect(route('monthlyOutcomes.index'));
        }

        return view('monthly_outcomes.edit')->with('monthlyOutcome', $monthlyOutcome);
    }

    /**
     * Update the specified monthlyOutcome in storage.
     *
     * @param int $id
     * @param UpdatemonthlyOutcomeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemonthlyOutcomeRequest $request)
    {
        $monthlyOutcome = $this->monthlyOutcomeRepository->find($id);

        if (empty($monthlyOutcome)) {
            Flash::error('Monthly Outcome not found');

            return redirect(route('monthlyOutcomes.index'));
        }

        $monthlyOutcome = $this->monthlyOutcomeRepository->update($request->all(), $id);

        Flash::success('Monthly Outcome updated successfully.');

        return redirect(route('monthlyOutcomes.index'));
    }

    /**
     * Remove the specified monthlyOutcome from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $monthlyOutcome = $this->monthlyOutcomeRepository->find($id);

        if (empty($monthlyOutcome)) {
            Flash::error('Monthly Outcome not found');

            return redirect(route('monthlyOutcomes.index'));
        }

        $this->monthlyOutcomeRepository->delete($id);

        Flash::success('Monthly Outcome deleted successfully.');

        return redirect(route('monthlyOutcomes.index'));
    }
}
