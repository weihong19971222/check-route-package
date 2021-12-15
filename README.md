laravel 8.x

Api回傳格式
#app/http/controllers/Controller.php
use Weihong\CheckRoute\ApiResponse;
use ...,ApiResponse;

------------------------------------------------------

Middleware取得路由名稱
#app/http/Kernel.php
protected $middleware = [
    .......,
    \Weihong\CheckRoute\Midd\CheckRouteName::class
]
取得
$request->get('route-name');

------------------------------------------------------