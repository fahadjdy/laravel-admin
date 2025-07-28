<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Admin\AdminModel;


class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Get admin ID from session
        $adminId = session()->get('admin_id');

        // Check if admin_id exists in the database
        $isAdminExists = AdminModel::where('id', $adminId)->exists();

        if (!$adminId || !$isAdminExists) {
            return redirect()->to('admin/login')->with('error', 'You must be logged in to access this page.');
        }

        return $next($request);
    }
}
