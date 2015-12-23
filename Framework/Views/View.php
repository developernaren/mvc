<?php

namespace Framework\Views;

class View {


    public static function render( $viewFile, $data ) {

        foreach( $data as $k => $d ) {
            $$k = $d;
        }
        include( rootPath() . "/App/Views/" . $viewFile );


    }

    private  function prepareVariable( $data ) {





    }






}