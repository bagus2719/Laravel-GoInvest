<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Clients;
use App\Models\Products;
use App\Models\Transactions;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $clientCount = Clients::count();
        $productCount = Products::count();
        $income = Transactions::sum('jumlah');

        return view('dashboard', compact('userCount', 'clientCount', 'productCount', 'income'));
    }
}