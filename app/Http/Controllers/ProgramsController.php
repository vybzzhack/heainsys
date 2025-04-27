<?php

namespace App\Http\Controllers;

use App\DataTables\ProgramsDataTable;
use App\Http\Requests\CreateProgramsRequest;
use App\Http\Requests\UpdateProgramsRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ProgramsRepository;
use Illuminate\Http\Request;
use Flash;

class ProgramsController extends AppBaseController
{
    /** @var ProgramsRepository $programsRepository*/
    private $programsRepository;

    public function __construct(ProgramsRepository $programsRepo)
    {
        $this->programsRepository = $programsRepo;
    }

    /**
     * Display a listing of the Programs.
     */
    public function index(ProgramsDataTable $programsDataTable)
    {
    return $programsDataTable->render('programs.index');
    }


    /**
     * Show the form for creating a new Programs.
     */
    public function create()
    {
        return view('programs.create');
    }

    /**
     * Store a newly created Programs in storage.
     */
    public function store(CreateProgramsRequest $request)
    {
        $input = $request->all();

        $programs = $this->programsRepository->create($input);

        Flash::success('Programs saved successfully.');

        return redirect(route('programs.index'));
    }

    /**
     * Display the specified Programs.
     */
    public function show($id)
    {
        $programs = $this->programsRepository->find($id);

        if (empty($programs)) {
            Flash::error('Programs not found');

            return redirect(route('programs.index'));
        }

        return view('programs.show')->with('programs', $programs);
    }

    /**
     * Show the form for editing the specified Programs.
     */
    public function edit($id)
    {
        $programs = $this->programsRepository->find($id);

        if (empty($programs)) {
            Flash::error('Programs not found');

            return redirect(route('programs.index'));
        }

        return view('programs.edit')->with('programs', $programs);
    }

    /**
     * Update the specified Programs in storage.
     */
    public function update($id, UpdateProgramsRequest $request)
    {
        $programs = $this->programsRepository->find($id);

        if (empty($programs)) {
            Flash::error('Programs not found');

            return redirect(route('programs.index'));
        }

        $programs = $this->programsRepository->update($request->all(), $id);

        Flash::success('Programs updated successfully.');

        return redirect(route('programs.index'));
    }

    /**
     * Remove the specified Programs from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $programs = $this->programsRepository->find($id);

        if (empty($programs)) {
            Flash::error('Programs not found');

            return redirect(route('programs.index'));
        }

        $this->programsRepository->delete($id);

        Flash::success('Programs deleted successfully.');

        return redirect(route('programs.index'));
    }
}
