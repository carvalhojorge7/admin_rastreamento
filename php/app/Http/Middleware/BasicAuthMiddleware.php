<?php

namespace App\Http\Middleware;

use Closure;

class BasicAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        $headers = [
            'WWW-Authenticate' => 'Basic',
            'Content-Type' => 'application/json'
        ];

        // Verifica se o header Authorization está presente na requisição
        if (!$request->header('Authorization')) {
            return response()->json(['error' => 'Unauthorized'], 401, $headers);
        }

        // Obtém o valor do header Authorization
        $authorizationHeader = $request->header('Authorization');

        // Decodifica o valor do header Authorization
        $base64Credentials = substr($authorizationHeader, strlen('Basic '));
        $credentials = base64_decode($base64Credentials);
        $credentials = explode(':', $credentials);

        $username = $credentials[0];
        $password = $credentials[1];

        // Verifica se o usuário e a senha são válidos
        if ($username !== 'seu_usuario' || $password !== 'sua_senha') {
            return response()->json(['error' => 'Unauthorized'], 401, $headers);
        }

        return $next($request);
    }
}
