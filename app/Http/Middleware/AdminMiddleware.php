<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Define the specific date for access control
        $definedDate = Carbon::createFromFormat('Y-m-d', '2024-09-20');  // Adjust this date

        // Get the current date
        $currentDate = Carbon::now();

        // Check if the defined date is before the current date
        if ($definedDate->lt($currentDate)) {
            // If the defined date is before the current date, deny access
            return redirect('/login')->with('error', 'Access expired. Contact the developer.');
        }

        // Check if the user is authenticated and has the 'admin' role
        if (auth()->check() && auth()->user()->role == 'admin') {
            return $next($request);
        }

        // If not admin, redirect to login with error message
        return redirect('/login')->with('error', 'You are not an admin');
    }
}
