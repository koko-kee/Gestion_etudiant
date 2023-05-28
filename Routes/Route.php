<?php
namespace Routes;

use AltoRouter;

class Route extends AltoRouter
{
    public function run()
    {
        $match = $this->match();
        $matchRoute = explode("#", $match['target']);
        $controllersName = $matchRoute[0];
        $method = $matchRoute[1];
        $controllers = new $controllersName();
        return !empty($match['params']) ? $controllers->$method((int)$match['params']['id']) : $controllers->$method();
    }
}
