<?php
namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Models\User;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $orders = $this->repository->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function edit($id, UserRepository $userRepository)
    {
        $order = $this->repository->find($id);
        $list_status = [0=>'Pendente', 1=>'A caminho', 2=>'Entregue'];
        $deliveryman = $userRepository->getDeliverymen();
        return view('admin.orders.edit', compact('order', 'list_status', 'deliveryman'));
    }

    public function update(Request $request, $id)
    {
        $all = $request->all();
        $this->repository->update($all, $id);

        return redirect()->route('admin.orders.index');
    }
}