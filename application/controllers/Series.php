<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Series extends CI_Controller {

    public function create($id = null) {
        $this->load->helper('url');
        $this->load->model('Series_model');
        $data['id'] = $id;
        $data['series'] = $this->Series_model->get($id);
        
        if ($this->input->post()) {
            $this->Series_model->insert($id);
            redirect('home', 'refresh');
        }
        
        $this->load->view('home/navbar');
        $this->load->view('series/seriesadd', $data);
/*
        if ($this->input->post()) {
            $this->serieModel->insert($id);
            redirect('persona', 'refresh');
        }

        $this->load->library('session');
        $data["username"] = $this->session->name;

        $this->load->view('navbar', $data);
        $this->load->view('serie/serieadd', $data);*/
    }

    public function delete($id) {
        $this->load->helper('url');
        $this->load->model('serieModel');
        $this->serieModel->delete($id);
        redirect('persona', 'refresh');
    }

}
