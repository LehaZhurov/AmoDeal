<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\Amo\SetTokenAction;
use App\Action\Amo\AutoUserAction;
use App\Action\Deal\CreatedDealAction;
use App\Models\Deal;
class AmoController extends Controller
{


    public function index(Request $request): void
    {
        $apiClient = AutoUserAction::auto($request->all());
        SetTokenAction::execute($apiClient);
        CreatedDealAction::execute($apiClient);
        dd(Deal::query()->get());
        
    }

    public function token(): void
    {
    }
}
