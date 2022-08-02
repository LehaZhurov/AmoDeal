<?php

namespace App\Action\Amo;

use AmoCRM\Client\AmoCRMApiClient;

class AutoUserAction
{

    public static function auto(array $data): AmoCRMApiClient
    {
        $clientId = "934f1b58-3fb2-4ac3-b4cb-df2880dc7edb";
        $clientSecret = "pfHi5me5wUjx0zZ1Y695hkjXh7P1PGyZjnPew3zmDHCELMzjZvOnOlfjFI3z9zbj";
        $apiClient = new AmoCRMApiClient($clientId, $clientSecret, 'https://b32c-178-218-24-209.ngrok.io');
        if (isset($data['referer'])) {
            $apiClient->setAccountBaseDomain($data['referer']);
        }
        if (!isset($data['referer'])) {
            $state = bin2hex(random_bytes(16));
            $_SESSION['oauth2state'] = $state;
            $authorizationUrl = $apiClient->getOAuthClient()->getAuthorizeUrl([
                'state' => $state,
                'mode' => 'post_message',
            ]);
            header('Location: ' . $authorizationUrl);
            die;
        }
        return $apiClient;
    }
}
