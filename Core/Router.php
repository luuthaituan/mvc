<?php
namespace Core;
class Router
{
	// tạo biến lưu route vào 1 table
    public $routeTable = [];
    // route hiện tại của trang 
    public $currentRoute = null; 
    
    // dang ki các route vào route table
    public function register($method, $route, $params = [], $middleware = [])
    {
        if(!is_array($params)){
            $params = [$params];
        }

        $method = strtolower($method);
        $this->routeTable[$method][$route] = [
            'controller' => $params[0],
            'action' => $params[1] ?? 'index',
            'middleware' => $middleware
        ];   
    }
   
    // match url hiện tại với route trong bảng route và set current route
    public function match()
    {
        // get url và method 
        $url = parse_url($_SERVER['REQUEST_URI']);
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $path = $url['path'];

        $routeScore =[];
        //match url với route trong bảng
        foreach($this->routeTable[$method] as $route=>$controller){
            $routeScore[] = $this->routeScore($path,$route);
        }
        // xếp route có trọng số cao nhất lên đầu
        usort($routeScore, function($a, $b){
            if($a['score'] === $b['score']){
                return count($a['param']) < count($b['param']);
            }
            return $a['score'] < $b['score'];
        });
        if ($routeScore[0]['score'] == 0 ) {
            http_response_code(404);
            exit();
            }

        $this->currentRoute = $this->routeTable[$method][$routeScore[0]['route']];
        $this->currentRoute['param'] = $routeScore[0]['param'];
//        echo "<pre>";
//        var_dump($this->currentRoute);
        if (count($this->currentRoute['middleware'])){
            foreach ($this->currentRoute['middleware'] as $middleware){
                $object = new $middleware;
                $object->handle($this->currentRoute, $method, $this->currentRoute['param']);
                if ($object->next == false){
                    $message = "Request khong hop le";
                    echo $message;
                    exit();
                }
            }
        }
    }


    // đánh giá trọng số cho từng route
    public function routeScore($path, $string)
    {

        $path = explode('/', $path);
        $route = explode('/',$string);
        if(count($path) != count($route)){
            return ['score'=>0,'param' =>[], 'route'=>$string];
        }

        $score = 0;
        $param =[];
        foreach($route as $i=>$section){
            //print_r($path[$i]);
            if($path[$i] == $section){
                $score += 1;
            }else{
                $p = $this->convertParam($section);
                if($p != ''){
                    $param[$p] = $path[$i];
                }
            }
        }
         $arr = ['score' => $score, 'param' =>$param, 'route'=>$string];
         return $arr;
        
    }

    // tách param ra khỏi string
    public function convertParam($section){
        $start = substr($section, 0, 1);
        $end = substr($section, -1, 1);
        if( $start == '{' && $end == '}'){
            return str_replace(['{', '}'], '',$section);
        }
        return '';
    }
    
    //
    public function getRoute()
    {
        $this->match();
        return $this->currentRoute;
    }

    // ket noi url voi route
    public function matchController()
    {
        $current = $this->getRoute();
        $convertController = "App\\Controllers\\".$current['controller']."";
        $controller = new $convertController;
        $action = $current['action'];

        call_user_func_array([$controller, $action], $current['param']);
    }
}
