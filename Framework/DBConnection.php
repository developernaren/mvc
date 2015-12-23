<?php

namespace Framework;



use App\Models\Enquiry;

class DBConnection {

    protected $db;
    protected $table;

    function __construct() {
        $this->db = new \mysqli('localhost', 'root', '', 'enquiry');

    }

    function getAll() {

        $result = $this->db->query( "SELECT * FROM " . $this->table );


        $enquiryArr = [];

        while($obj = $result->fetch_object()){

            $enquiry = new Enquiry();
            $enquiry->setId( $obj->id );
            $enquiry->setName( $obj->name );
            $enquiry->setEmail( $obj->email );
            $enquiry->setMessage( $obj->message );
            $enquiryArr[] = $enquiry;

        }

        return $enquiryArr;

    }

    function getQuery() {
        return $this->db->trace;
    }

}