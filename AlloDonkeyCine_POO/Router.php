<?php

class Router
{
    public function getController(string $uri): array
    {
        //je découpe ma route
        $explodeUri = explode('/', $uri);

        //Je récupère mon controller
        $controller = $explodeUri[1] ? ucfirst($explodeUri[1]) : 'index';

        //Je récupère mon action
        $action = $explodeUri[2] ?? 'list';


        if ($controller === 'Login') {
            $action = 'login';
        }

        if ($controller === 'Register') {
            $action = 'register';
        }





        //Je récupère l'id
        $id = $explodeUri[3] ?? null;

        //Je construit le nom complet de mon controller
        $controller .= 'Controller';

        return [
            'controller' => $controller,
            'action' => $action,
            'id' => $id,
        ];
    }
}
