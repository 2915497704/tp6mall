<?php


namespace app\demo\middleware;



use think\Response;

class detail
{
    public function handle($request,\Closure $next)
    {
        $request->type = 'demo';
        return $next($request);
    }
    public function end(Response $request)
    {

    }
}