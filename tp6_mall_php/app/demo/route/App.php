<?php


namespace app\admin\route;

use think\facade\Route;

Route::rule('test','index/hello','GET');

Route::rule('value','detail/index','GET')->middleware(\app\demo\middleware\Detail::class);