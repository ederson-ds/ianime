<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index($data = null) {
        $this->load->helper('url');
        $this->load->model('Char_model');
        $this->load->model('Series_model');
        
        $data['series'] = $this->Series_model->get_all();
        var_dump($data['series']);
        /*
        $searchText = $data["searchText"];
        if ($searchText) {
            if ($data["type"] == 'serie') {
                $data['series'] = $this->Series_model->get_all_limit($searchText);
            } else if ($data["type"] == 'character') {
                $data['personas'] = $this->Char_model->get_all($searchText);
                $data['series'] = $this->Series_model->get_serie_by_personas($data['personas']);
            }
        } else {
            $data['personas'] = $this->Char_model->get_all();
            $data['series'] = $this->Series_model->get_all_limit();
        }*/
        //$data['num_series'] = $this->Series_model->get_num_series();

        $this->load->library('session');
        $data["username"] = $this->session->name;

        $this->load->view('home/navbar');
        $this->load->view('home/home', $data);
    }

}
