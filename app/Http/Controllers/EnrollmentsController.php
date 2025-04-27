<?php

namespace App\Http\Controllers;

use App\DataTables\EnrollmentsDataTable;
use App\Http\Requests\CreateEnrollmentsRequest;
use App\Http\Requests\UpdateEnrollmentsRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\EnrollmentsRepository;
use Illuminate\Http\Request;
use App\Models\Programs;
use App\Models\Clients;
use App\Models\Enrollments;
use Flash;

class EnrollmentsController extends AppBaseController
{
    /** @var EnrollmentsRepository $enrollmentsRepository*/
    private $enrollmentsRepository;

    public function __construct(EnrollmentsRepository $enrollmentsRepo)
    {
        $this->enrollmentsRepository = $enrollmentsRepo;
    }

    /**
     * Display a listing of the Enrollments.
     */
    public function index(EnrollmentsDataTable $enrollmentsDataTable)
    {
    return $enrollmentsDataTable->render('enrollments.index');
    }


    /**
     * Show the form for creating a new Enrollments.
     */
    public function create()
    {
        // return view('enrollments.create');
        // Fetch clients as id => name pairs
            $clients = Clients::all()->pluck('full_name', 'id');
            
            // Fetch programs as id => name pairs
            $programs = Programs::all()->pluck('name', 'id');
            
            return view('enrollments.create', compact('clients','programs'));
    }

    /**
     * Store a newly created Enrollments in storage.
     */
    public function store(CreateEnrollmentsRequest $request)
    {
        $input = $request->all();

        $enrollments = $this->enrollmentsRepository->create($input);

        Flash::success('Enrollments saved successfully.');

        return redirect(route('enrollments.index'));
    }

    /**
     * Display the specified Enrollments.
     */

     public function show($id)
     {
         // Eager load the client and program relationships
         $enrollment = Enrollments::with(['client', 'program'])->findOrFail($id);
         
         return view('enrollments.show', compact('enrollment'));
     }
    // public function show($id)
    // {
    //     $enrollments = $this->enrollmentsRepository->find($id);

    //     if (empty($enrollments)) {
    //         Flash::error('Enrollments not found');

    //         return redirect(route('enrollments.index'));
    //     }

    //     return view('enrollments.show')->with('enrollments', $enrollments);
    // }

    /**
     * Show the form for editing the specified Enrollments.
     */
    public function edit($id)
    {
        $enrollments = $this->enrollmentsRepository->find($id);

        if (empty($enrollments)) {
            Flash::error('Enrollments not found');

            return redirect(route('enrollments.index'));
        }

        return view('enrollments.edit')->with('enrollments', $enrollments);
    }

    /**
     * Update the specified Enrollments in storage.
     */
    public function update($id, UpdateEnrollmentsRequest $request)
    {
        $enrollments = $this->enrollmentsRepository->find($id);

        if (empty($enrollments)) {
            Flash::error('Enrollments not found');

            return redirect(route('enrollments.index'));
        }

        $enrollments = $this->enrollmentsRepository->update($request->all(), $id);

        Flash::success('Enrollments updated successfully.');

        return redirect(route('enrollments.index'));
    }

    /**
     * Remove the specified Enrollments from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $enrollments = $this->enrollmentsRepository->find($id);

        if (empty($enrollments)) {
            Flash::error('Enrollments not found');

            return redirect(route('enrollments.index'));
        }

        $this->enrollmentsRepository->delete($id);

        Flash::success('Enrollments deleted successfully.');

        return redirect(route('enrollments.index'));
    }
}
