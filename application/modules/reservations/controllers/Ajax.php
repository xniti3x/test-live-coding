<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * InvoicePlane
 *
 * @author		InvoicePlane Developers & Contributors
 * @copyright	Copyright (c) 2012 - 2018 InvoicePlane.com
 * @license		https://invoiceplane.com/license.txt
 * @link		https://invoiceplane.com
 */

/**
 * Class Ajax
 */
class Ajax extends Admin_Controller
{
    public $ajax_controller = true;

    public function modal_show_reservations(){

        $this->layout->load_view('reservations/modal_show_reservations');

    }

    public function backend_reservations(){
        $this->load->model("mdl_reservations");
    foreach($this->mdl_reservations->getAll() as $res){
        $res->bgcolor="green";
        $result[]=$res;
    }
        header('Content-Type: application/json');
        echo json_encode($result);

    }

    public function new_view(){
    $this->load->view("reservations/new");
    }
    public function new(){
        $this->load->model("mdl_reservations");
        $data=array(
            "name"=>$this->input->post("name"),
            "start"=>$this->input->post("start"),
            "end" => $this->input->post("end"),
            "room_id" => $this->input->post("room_id")
        );
        //$res=$this->mdl_reservations->save($data);
         header('Content-Type: application/json');
        echo json_encode($data);
    }
}
