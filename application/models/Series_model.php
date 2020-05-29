<?php

class Series_model extends CI_Model {

    public $name;

    public function get($id) {
        $series = R::load('preseries', $id);
        return $series;
        /* if (!$id) {
          return $this->createEmptyObject();
          }
          $query = $this->db->query("SELECT * FROM series WHERE id = $id");
          return $query->row(); */
    }

    public function get_all_limit($pesquisar = null, $n_page = 1) {
        if ($pesquisar) {
            $this->db->select('*');
            $this->db->from('series');
            $this->db->like("name", $pesquisar, 'before');
            $this->db->order_by("name", "ASC");
            $query = $this->db->get();
        } else {
            $offset = $n_page * 10 - 10;
            $this->db->order_by("name");
            $this->db->limit(10, $offset);
            $query = $this->db->get('series');
        }

        return $query->result();
    }

    public function get_all() {
        return R::find('preseries');
        /*$this->db->order_by("name");
        $query = $this->db->get('series');
        return $query->result();*/
    }

    public function get_num_series() {
        $this->db->select('count(1) as qnt');
        $this->db->from('series');
        $query = $this->db->get();

        return $query->row();
    }

    public function insert($id) {
        $this->name = $this->input->post('name');
        if ($id) {
            $this->update($id);
            $this->upload($id);
            return;
        }
        $preseries = R::dispense('preseries');
        $preseries->name = $this->name;
        $id = R::store($preseries);
        $this->upload($id);
    }

    public function update($id) {
        $preseries = R::load('preseries', $id);
        $preseries->name = $this->name;
        R::store($preseries);
    }

    public function delete($id) {
        //delete personas
        $this->db->where('series_id', $id);
        $this->db->delete('persona');

        $this->db->delete('series', array('id' => $id));
    }

    public function upload($filename) {
        $config['upload_path'] = './uploads/series/';
        $config['allowed_types'] = 'gif|jpg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $config['file_name'] = $filename;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        $this->upload->do_upload('image');
    }

    public function createEmptyObject() {
        $obj = new stdClass();
        foreach (array_keys(get_object_vars($this)) as $property) {
            $obj->$property = null;
        }
        $obj->id = null;
        return $obj;
    }

    public function get_serie_by_personas($personas) {
        $this->db->select('*');
        $this->db->from('series');
        if (isset($personas[0]->series_id)) {
            $this->db->where("id", $personas[0]->series_id);
        } else {
            $this->db->where("id", null);
        }
        foreach ($personas as $i => $persona) {
            if ($i != 0) {
                $this->db->or_where("id", $personas[$i]->series_id);
            }
        }
        $this->db->order_by("name", "ASC");
        $query = $this->db->get();

        return $query->result();
    }

}
