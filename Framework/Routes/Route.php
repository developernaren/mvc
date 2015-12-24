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


        $retArr = $this->parseClassAndMethod();

        list( $class, $method ) = $retArr;
        $newClass =  new $class();

        if ( !empty( $retArr[2] ) ) {
            return $newClass->$method( $retArr[2] );
        }

        return $newClass->$method();



    }


    private function parseClassAndMethod() {

        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['QUERY_STRING'];
        $routesArr = self::$routes[ strtolower( $method )  ];
        if ( !empty( $routesArr[$uri] )) {
            return explode('@', $routesArr[$uri] );
        }

        $uriArr = explode('/', $uri );
        $buildUriStr = '';
        $param = '';

        foreach( $uriArr as $u ) {

            if ( !empty( $u ) ) {

                if ( is_numeric( $u ) ) {
                    $buildUriStr .= "/{num}";
                    $param = $u;
                } else {
                    $buildUriStr .=  "/". $u;
                }

            }
        }

        $retArr = explode('@', $routesArr[$buildUriStr] );
        $retArr[] = $param;
        return $retArr;




    }



}