<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if ($user) {
               $role = $user->role; // Assuming 'role' is the column name in your users table

               // Check if the user is a member and trying to access admin routes
                if ($role === 'member' && $request->is('admin/*')) {
                   return redirect('/home'); // Redirect to home or any other page
                }

               // Check if the user is an admin and trying to access member routes
                if ($role === 'admin' && $request->is('member/*')) {
                   return redirect('/admin'); // Redirect to admin dashboard or any other page
                }
            }

            return $next($request);
    }
}
