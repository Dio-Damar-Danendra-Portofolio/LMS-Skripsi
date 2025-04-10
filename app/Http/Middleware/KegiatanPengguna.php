<?php
  
  namespace App\Http\Middleware;
    
  use Closure;
  use Illuminate\Http\Request;
  use Auth;
  use Cache;
  use App\Models\User;
    
  class KegiatanPengguna
  {
      /**
       * Handle an incoming request.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  \Closure  $next
       * @return mixed
       */
      public function handle(Request $request, Closure $next)
      {
          if (Auth::check()) {
              Cache::put('user-is-online-' . Auth::user()->id, true);
    
              /* last seen */
              User::where('id', Auth::user()->id)->update(['last_seen' => now()]);
          }
    
          return $next($request);
      }
  }
