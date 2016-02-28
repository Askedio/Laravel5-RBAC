<?php

namespace Askedio\Laravel5RBAC\Http\Middleware;

use Spatie\Authorize\Middleware\Authorize as BaseAuthorize;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Authorize extends BaseAuthorize
{
    protected function handleUnauthorizedRequest($request, $ability = null, $model = null)
    {
        if ($request->ajax()) {
            return response('Unauthorized.', Response::HTTP_UNAUTHORIZED);
        }

        if (!$request->user()) {
            return redirect()->guest('login');
        }

        throw new HttpException(Response::HTTP_UNAUTHORIZED, 'This action is unauthorized.');
    }
}
