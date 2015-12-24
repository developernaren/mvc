<?php

namespace App\Controllers;

use App\Models\Enquiry;
use Framework\DBConnection;
use Framework\Views\View;

class Controller{

    function index() {

        $enquiry = new Enquiry();
        $enquiries =  $enquiry->getAll();
        return View::render( 'contact/index.php', [ 'enquiries' => $enquiries  ]);

    }

    function edit( $id ) {

        echo $id;
    }
}