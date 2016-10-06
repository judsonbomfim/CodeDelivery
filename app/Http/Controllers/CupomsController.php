<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminCupomsRequest;
use CodeDelivery\Repositories\CupomRepository;

class CupomsController extends Controller
{
    /**
     * @param CategoryRepository $repository
     */
    public function __construct(CupomRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $cupoms = $this->repository->paginate(10);
        return view('admin.cupoms.index', compact('cupoms'));
    }
    public function create()
    {
        return view('admin.cupoms.create');
    }

    public function store(AdminCupomsRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);
        return redirect()->route('admin.cupoms.index');
    }

    public function edit($id)
    {
        $category = $this->repository->find($id);
        return view('admin.cupoms.edit', compact('cupoms'));
    }

    public function update(AdminCupomsRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);
        return redirect()->route('admin.cupoms.index');
    }
}