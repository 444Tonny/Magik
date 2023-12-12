<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class LinkController extends Controller
{
    public function conditions()
    {
        $currentOrders = Order::getCurrentOrders(session('google_id'));
        return view('client.footer.conditions', compact('currentOrders'));
    }

    public function envio()
    {
        $currentOrders = Order::getCurrentOrders(session('google_id'));
        return view('client.footer.envio', compact('currentOrders'));
    }

    public function reembolso()
    {
        $currentOrders = Order::getCurrentOrders(session('google_id'));
        return view('client.footer.reembolso', compact('currentOrders'));
    }

    public function privacidad()
    {
        $currentOrders = Order::getCurrentOrders(session('google_id'));
        return view('client.footer.privacy', compact('currentOrders'));
    }
}
