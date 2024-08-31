<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
class LogRequestResponse
{
    public function handle($request, Closure $next)
    {
        // Log de entrada
        $this->logRequest($request);

        // Procesa la solicitud
        $response = $next($request);

        // Log de salida si está habilitado
        if (config('app.log_output')) {
            $this->logResponse($response);
        }

        return $response;
    }

    protected function logRequest($request)
    {
        $ip = $request->ip();
        $logData = [
            'IP' => $ip,
            'Method' => $request->method(),
            'URL' => $request->fullUrl(),
            'Payload' => $request->all(),
        ];

        Log::channel('request')->info('Incoming Request', $logData);
    }

    protected function logResponse($response)
    {
        $logData = [
            'Status' => $response->status(),
            'Content' => $response->getContent(),
        ];

        Log::channel('response')->info('Outgoing Response', $logData);
    }
}
