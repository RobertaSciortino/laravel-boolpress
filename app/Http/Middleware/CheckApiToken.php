<?php

namespace App\Http\Middleware;

use Closure;

class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $auth_token = $request->header('authorization');
      //verifico se e' presente un token di autorizzazione
      if(empty($auth_token)){
        return response()->json([
          'success' => false,
          'error' => 'API Token mancante'
        ]);
      }
      //estraggo il token
      $api_token = substr($auth_token, 7);

      //verifico se l'api token e' corretto
      $user = User::where('api_token', $api_token)->first();
      if (!$user) {
        return response()->json([
          'success' => false,
          'error' => 'API Token mancante'
        ]);
      }
        return $next($request);
    }
}
