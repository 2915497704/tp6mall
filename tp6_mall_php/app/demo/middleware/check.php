<?php


namespace app\demo\middleware;


use think\Response;

class check
{
    public function handle($request,\Closure $next)
    {
        $request->type = 'demo-singwe';
        return $next($request);
    }
    public function end(Response $request)
    {

    }
}