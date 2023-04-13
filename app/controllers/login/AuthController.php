<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthController
{
    private $secretKey = 'secret';

    public function login()
    {
        // Validasi username dan password
        // ...
        $userId = 'admin';

        // Jika validasi berhasil, buat token JWT
        $payload = [
            'sub' => $userId,
            'iat' => time(),
            'exp' => time() + 60 * 60 * 24 // Token berlaku selama 1 hari
        ];
        $jwt = JWT::encode($payload, $this->secretKey, 'HS256');

        // Kirim token JWT sebagai respons
        header('Content-Type: application/json');
        echo json_encode(['token' => $jwt]);
    }
}