<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\Amo\SetTokenAction;
use App\Action\Amo\AutoUserAction;
use App\Action\Deal\CreatedDealAction;

class AmoController extends Controller
{


    public function index(Request $request): void
    {
        $apiClient = AutoUserAction::auto($request->all());
        $accessToken = SetTokenAction::execute($apiClient);
        $meta = CreatedDealAction::execute($apiClient);
        dd($meta);
    }

    public function token(): void
    {
    }
}
