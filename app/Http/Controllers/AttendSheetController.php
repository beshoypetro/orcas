<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAttendSheetRequest;
use App\Http\Requests\UpdateAttendSheetRequest;
use App\Repositories\AttendSheetRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AttendSheetController extends AppBaseController
{
    /** @var  AttendSheetRepository */
    private $attendSheetRepository;

    public function __construct(AttendSheetRepository $attendSheetRepo)
    {
        $this->attendSheetRepository = $attendSheetRepo;
    }

    /**
     * Display a listing of the AttendSheet.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $attendSheets = $this->attendSheetRepository->all();

        return view('attend_sheets.index')
            ->with('attendSheets', $attendSheets);
    }

    /**
     * Show the form for creating a new AttendSheet.
     *
     * @return Response
     */
    public function create()
    {
        return view('attend_sheets.create');
    }

    /**
     * Store a newly created AttendSheet in storage.
     *
     * @param CreateAttendSheetRequest $request
     *
     * @return Response
     */
    public function store(CreateAttendSheetRequest $request)
    {
        $input = $request->all();

        $attendSheet = $this->attendSheetRepository->create($input);

        Flash::success('Attend Sheet saved successfully.');

        return redirect(route('attendSheets.index'));
    }

    /**
     * Display the specified AttendSheet.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $attendSheet = $this->attendSheetRepository->find($id);

        if (empty($attendSheet)) {
            Flash::error('Attend Sheet not found');

            return redirect(route('attendSheets.index'));
        }

        return view('attend_sheets.show')->with('attendSheet', $attendSheet);
    }

    /**
     * Show the form for editing the specified AttendSheet.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $attendSheet = $this->attendSheetRepository->find($id);

        if (empty($attendSheet)) {
            Flash::error('Attend Sheet not found');

            return redirect(route('attendSheets.index'));
        }

        return view('attend_sheets.edit')->with('attendSheet', $attendSheet);
    }

    /**
     * Update the specified AttendSheet in storage.
     *
     * @param int $id
     * @param UpdateAttendSheetRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAttendSheetRequest $request)
    {
        $attendSheet = $this->attendSheetRepository->find($id);

        if (empty($attendSheet)) {
            Flash::error('Attend Sheet not found');

            return redirect(route('attendSheets.index'));
        }

        $attendSheet = $this->attendSheetRepository->update($request->all(), $id);

        Flash::success('Attend Sheet updated successfully.');

        return redirect(route('attendSheets.index'));
    }

    /**
     * Remove the specified AttendSheet from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $attendSheet = $this->attendSheetRepository->find($id);

        if (empty($attendSheet)) {
            Flash::error('Attend Sheet not found');

            return redirect(route('attendSheets.index'));
        }

        $this->attendSheetRepository->delete($id);

        Flash::success('Attend Sheet deleted successfully.');

        return redirect(route('attendSheets.index'));
    }
}
