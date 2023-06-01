<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\SaleRepositoryInterface;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    private $salesRepository;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(SaleRepositoryInterface $salesRepository)
    {
        $this->salesRepository = $salesRepository;
    }

    /**
     * Purchase
     * 
     * @param Request $request
     * 
     * @return Response
     */
    public function purchase(Request $request)
    {
        $user = $request->user();

        $sale = $this->salesRepository->create($user->id);

        return $this->sendApiResponse(201, 'Purchased successfully', $sale);
    }
}
