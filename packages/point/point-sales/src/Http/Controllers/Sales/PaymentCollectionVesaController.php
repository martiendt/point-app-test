<?php

namespace Point\PointSales\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Point\PointSales\Models\Sales\PaymentCollection;

class PaymentCollectionVesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approval()
    {
        access_is_allowed('read.point.sales.payment.collection');

        $view = view('app.index');
        $view->array_vesa = PaymentCollection::getVesaApproval();
        return $view;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        access_is_allowed('create.point.sales.payment.collection');

        $view = view('app.index');
        $view->array_vesa = PaymentCollection::getVesaCreate();
        return $view;
    }

    public function rejected()
    {
        access_is_allowed('update.point.sales.payment.collection');

        $view = view('app.index');
        $view->array_vesa = PaymentCollection::getVesaReject();
        return $view;
    }
}
