<?php

namespace App\Http\Controllers;

use App\DataTables\ClientsDataTable;
use App\Http\Requests\CreateClientsRequest;
use App\Http\Requests\UpdateClientsRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ClientsRepository;
use Illuminate\Http\Request;
use Flash;

class ClientsController extends AppBaseController
{
    /** @var ClientsRepository $clientsRepository*/
    private $clientsRepository;

    public function __construct(ClientsRepository $clientsRepo)
    {
        $this->clientsRepository = $clientsRepo;
    }

    /**
     * Display a listing of the Clients.
     */
    public function index(ClientsDataTable $clientsDataTable)
    {
    return $clientsDataTable->render('clients.index');
    }


    /**
     * Show the form for creating a new Clients.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created Clients in storage.
     */
    public function store(CreateClientsRequest $request)
    {
        $input = $request->all();

        $clients = $this->clientsRepository->create($input);

        Flash::success('Clients saved successfully.');

        return redirect(route('clients.index'));
    }

    /**
     * Display the specified Clients.
     */
    public function show($id)
    {
        $clients = $this->clientsRepository->find($id);

        if (empty($clients)) {
            Flash::error('Clients not found');

            return redirect(route('clients.index'));
        }

        return view('clients.show')->with('clients', $clients);
    }

    /**
     * Show the form for editing the specified Clients.
     */
    public function edit($id)
    {
        $clients = $this->clientsRepository->find($id);

        if (empty($clients)) {
            Flash::error('Clients not found');

            return redirect(route('clients.index'));
        }

        return view('clients.edit')->with('clients', $clients);
    }

    /**
     * Update the specified Clients in storage.
     */
    public function update($id, UpdateClientsRequest $request)
    {
        $clients = $this->clientsRepository->find($id);

        if (empty($clients)) {
            Flash::error('Clients not found');

            return redirect(route('clients.index'));
        }

        $clients = $this->clientsRepository->update($request->all(), $id);

        Flash::success('Clients updated successfully.');

        return redirect(route('clients.index'));
    }

    /**
     * Remove the specified Clients from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $clients = $this->clientsRepository->find($id);

        if (empty($clients)) {
            Flash::error('Clients not found');

            return redirect(route('clients.index'));
        }

        $this->clientsRepository->delete($id);

        Flash::success('Clients deleted successfully.');

        return redirect(route('clients.index'));
    }
}
