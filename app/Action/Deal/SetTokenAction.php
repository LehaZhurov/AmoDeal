<?php
namespace App\Action\Deal;
use AmoCRM\Client\AmoCRMApiClient;
use League\OAuth2\Client\Token\AccessTokenInterface;

class SetTokenAction{
        
    public static function execute(AmoCRMApiClient $apiClient) : AccessTokenInterface
    {
        $accessToken = $apiClient->getOAuthClient()->getAccessTokenByCode($_GET['code']);
            if (!$accessToken->hasExpired()) {
                $apiClient->setAccessToken($accessToken)
                    ->onAccessTokenRefresh(
                        function (AccessTokenInterface $accessToken, string $baseDomain) {
                            saveToken(
                                [
                                    'accessToken' => $accessToken->getToken(),
                                    'refreshToken' => $accessToken->getRefreshToken(),
                                    'expires' => $accessToken->getExpires(),
                                    'baseDomain' => $baseDomain,
                                ]
                            );
                        }
                    );
            }
        return $accessToken;
    }    
        
}