<?php

namespace App\PlaceToPay;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/**
 * Class PlaceToPayConnection
 * @package App\Library
 */
class PlaceToPayConnection
{
    public $response;
    public $auth;
    public $reference;

    /**
     * Generate all the authentication credentials
     * @return array
     * @throws \Exception
     */
    public function authentication(): array
    {
        if (function_exists('random_bytes')) {
            $nonce = bin2hex(random_bytes(16));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $nonce = bin2hex(openssl_random_pseudo_bytes(16));
        } else {
            $nonce = mt_rand();
        }

        $nonceBase64 = base64_encode($nonce);
        $seed = date('c');
        $secretKey = env('PLACETOPAY_SECRETKEY');
        $tranKey= base64_encode(sha1($nonce . $seed . $secretKey, true));

        return $auth = [
            'login' => env('PLACETOPAY_LOGIN'),
            'seed' => $seed,
            'nonce' => $nonceBase64,
            'tranKey' => $tranKey
        ];
    }

    /**
     * Create a POST petition for P2P webcheckout and save the response on DB
     * @param Request $request
     * @param Product $product
     * @return array|mixed
     * @throws \Exception
     */
    public function createRequest(Request $request, Product $product): array
    {
        $this->reference = uniqid();

        $this->response = Http::post(env('P2P_ENDPOINT'), [
            'auth' => $this->authentication(),
            'payment' => [
                'reference' => $this->reference,
                'description' => $product->name,
                'amount' => ['currency' => "COP", 'total' => $product->price]
            ],
            'buyer' => [
                'name' => $request['name'],
                'surname' => $request['surname'],
                'email' => $request['email'],
                'documentType' => $request['document-type'],
                'document' => $request['document-number'],
                'mobile' => $request['mobile'],
                'address' => [
                    'street' => $request['address'],
                    'city' => $request['city'],
                    'state' => $request['Province'],
                    'postalCode' => $request['postal-code'],
                ]],
            'expiration' => date('c', strtotime("+15 minutes")),
            'returnUrl' => route('purchase.index', $this->reference),
            'ipAddress' => request()->ip(),
            'userAgent' => request()->server('HTTP_USER_AGENT')
        ]);

        return $this->response->json();
    }

    /**
     * @param $requestId
     * @return array|mixed
     * @throws \Exception
     */
    public function getRequestInformation($requestId): array
    {
        $response = Http::post(env('P2P_ENDPOINT') . "$requestId", [
            'auth' => $this->authentication(),
        ]);

        return $response->json();
    }
}
