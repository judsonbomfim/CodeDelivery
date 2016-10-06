<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminClientsRequest;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Services\ClientServices;

class ClientsController extends Controller
{
    /**
     * @var ClientServices
     */
    private $clientServices;

    /**
     * @param ClientRepository $repository
     */
    public function __construct(ClientRepository $repository, ClientServices $clientServices)
    {
        $this->repository = $repository;
        $this->clientServices = $clientServices;
    }

    public function index()
    {
        $clients = $this->repository->paginate(10);
        return view('admin.clients.index', compact('clients'));
    }
    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(AdminClientsRequest $request)
    {
        $data = $request->all();
        $this->clientServices->create($data);
        return redirect()->route('admin.clients.index');
    }

    public function edit($id)
    {
        $client = $this->repository->find($id);
        return view('admin.clients.edit', compact('client'));
    }

    public function update(AdminClientsRequest $request, $id)
    {
        $data = $request->all();
        $this->clientServices->update($data, $id);
        return redirect()->route('admin.clients.index');
    }
}