<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AmoCRM\Client\AmoCRMApiClient;
use League\OAuth2\Client\Token\AccessTokenInterface;
use App\Action\Deal\SetTokenAction;

class AmoController extends Controller
{


    public function index(Request $request): void
    {
        $clientId = "934f1b58-3fb2-4ac3-b4cb-df2880dc7edb";
        $clientSecret = "pfHi5me5wUjx0zZ1Y695hkjXh7P1PGyZjnPew3zmDHCELMzjZvOnOlfjFI3z9zbj";
        $apiClient = new AmoCRMApiClient($clientId, $clientSecret, 'https://0b1c-178-218-24-209.ngrok.io');
        if (isset($_GET['referer'])) {
            $apiClient->setAccountBaseDomain($_GET['referer']);
        }
        if (!isset($_GET['code'])) {
            $state = bin2hex(random_bytes(16));
            $_SESSION['oauth2state'] = $state;
            $authorizationUrl = $apiClient->getOAuthClient()->getAuthorizeUrl([
                'state' => $state,
                'mode' => 'post_message',
            ]);
            header('Location: ' . $authorizationUrl);
            die;
        }
        $accessToken = SetTokenAction::execute($apiClient);
        dd($apiClient->leads()->get());
    }

    public function token(): void
    {
        
    }
}
