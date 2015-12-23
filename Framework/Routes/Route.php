<?php

namespace Framework\Routes;

class Route {

    public static $routes = [
        'post' => [],
        'get' => []
    ];


    public static function get( $url, $classMethodStr ) {

        if ( !isset( self::$routes['get'] ) ) {
            self::$routes['get'] = [];
        }
        self::$routes['get'][ $url ] = $classMethodStr;
    }

    public static function post( $url, $classMethodStr ) {

        if ( !isset( self::$routes['post'] ) ) {
            self::$routes['post'] = [];
        }
        self::$routes['post'][ $url ] = $classMethodStr;

    }


    function getRoutes() {
        return self::$routes;
    }


    function execute() {

        list( $class, $method ) = $this->parseClassAndMethod();
        $newClass =  new $class();
        return $newClass->$method();

    }


    private function parseClassAndMethod() {

        $method = $_SERVER['REQUEST_METHOD'];
        $uri = str_replace( '/', '', $_SERVER['PATH_INFO'] );
        $routesArr = self::$routes[ strtolower( $method )  ];
        return explode('@', $routesArr[$uri] );

    }



}