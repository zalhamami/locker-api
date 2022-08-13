<?php

namespace App\Http\Middleware;

use App\Models\Lecturer;
use Closure;
use Illuminate\Http\Request;

class LecturerAuth extends TokenAuth
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $this->setModel(Lecturer::class);
        return parent::handle($request, $next);
    }
}
