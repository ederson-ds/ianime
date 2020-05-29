<?php

class Char_model extends CI_Model {

    public $personaname;
    public $age;
    public $series_id;
    public $gender;
    public $species;
    public $rarity;
    public $origin_series_id;
    public $description;

    const GENDER_MALE = 1, GENDER_FEMALE = 2;
    const SPECIES_HUMAN = 1, SPECIES_MONSTER = 2, SPECIES_FAUN = 3;
    const RARITY_VERY_RARE = 0, RARITY_EPIC = 1, RARITY_LEGENDARY = 2, RARITY_COMMON = 3,
            RARITY_RARE = 4,
            RARITY_EMPYREAN = 5,
            RARITY_TRUE_DIVINITY = 6,
            RARITY_VOID_TIER = 7,
            RARITY_GOD = 8;

    public static $genderType = [
        self::GENDER_MALE => 'Male',
        self::GENDER_FEMALE => 'Female',
    ];
    public static $speciesType = [
        self::SPECIES_HUMAN => 'Human',
        self::SPECIES_MONSTER => 'Monster',
        self::SPECIES_FAUN => 'Faun',
    ];
    public static $rarityType = [
        self::RARITY_VERY_RARE => 'Very Rare',
        self::RARITY_EPIC => 'Epic',
        self::RARITY_LEGENDARY => 'Legendary',
        self::RARITY_COMMON => 'Common',
        self::RARITY_RARE => 'Rare',
        self::RARITY_EMPYREAN => 'Empyrean',
        self::RARITY_TRUE_DIVINITY => 'True Divinity',
        self::RARITY_VOID_TIER => 'Void Tier',
        self::RARITY_GOD => 'God',
    ];

    public function get($id, $origin_series) {
        $id = str_replace('_', ' ', strtolower($id));
        if (!$id) {
            return $this->createEmptyObject();
        }

        $origin_series = str_replace('_', ' ', $origin_series);

        $query = $this->db->query(
                "SELECT persona.id as id, persona.name as personaname, age, series_id, gender, species, rarity, origin_series_id, description, series.name as seriesname
        FROM persona
        JOIN series ON series.id = persona.origin_series_id
        WHERE persona.name = '$id' AND
        series.name = '$origin_series'"
        );
        return $query->row();
    }

    public function get_all($pesquisar = null) {
        /*
        if ($pesquisar) {
            $this->db->select('*');
            $this->db->from('persona');
            $this->db->like("name", $pesquisar);
            $query = $this->db->get();
        } else {
            $query = $this->db->get('persona');
        }

        return $query->result();*/
    }

    public function get_by_serie($series_id) {
        $this->db->select('*');
        $this->db->from('persona');
        $this->db->where('series_id', $series_id);
        $query = $this->db->get();

        return $query->result();
    }

    public function insert($id) {
        $this->name = str_replace("'", '-', $this->input->post('name'));
        $this->age = $this->input->post('age');
        $this->series_id = $this->input->post('series_id');
        $this->gender = $this->input->post('gender');
        $this->species = $this->input->post('species');
        $this->rarity = $this->input->post('rarity');

        $this->load->model('SerieModel');
        $series = $this->serieModel->get($this->input->post('origin_series_id'));
        $this->origin_series_id = $series->id;

        if ($id) {
            $this->update($id);
            $this->upload($id);
            return;
        }

        $data = array(
            'name' => $this->name,
            'age' => $this->age,
            'series_id' => $this->series_id,
            'gender' => $this->gender,
            'species' => $this->species,
            'rarity' => $this->rarity,
            'origin_series_id' => $this->origin_series_id,
        );

        $this->db->insert('persona', $data);
        $this->upload($this->db->insert_id());
    }

    public function insert_description($id) {
        $this->description = $this->input->post('description');
        $this->db->set('description', $this->description);
        $this->db->where('id', $id);
        $this->db->update('persona');
    }

    public function upload($filename) {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $config['file_name'] = $filename;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        $this->upload->do_upload('image');
    }

    public function update($id) {
        $data = array(
            'name' => $this->name,
            'age' => $this->age,
            'series_id' => $this->series_id,
            'gender' => $this->gender,
            'species' => $this->species,
            'rarity' => $this->rarity,
            'origin_series_id' => $this->origin_series_id,
        );

        $this->db->update('persona', $data, array('id' => $id));
    }

    public function delete($id) {
        $this->db->delete('persona', array('id' => $id));
    }

    public static function getRarity($rarity) {
        if ($rarity == self::RARITY_VERY_RARE) {
            return 'very-rare';
        } else if ($rarity == self::RARITY_EPIC) {
            return 'epic';
        } else if ($rarity == self::RARITY_LEGENDARY) {
            return 'legendary';
        } else if ($rarity == self::RARITY_COMMON) {
            return 'common';
        } else if ($rarity == self::RARITY_RARE) {
            return 'rare';
        } else if ($rarity == self::RARITY_EMPYREAN) {
            return 'empyrean';
        } else if ($rarity == self::RARITY_TRUE_DIVINITY) {
            return 'true-divinity';
        } else if ($rarity == self::RARITY_VOID_TIER) {
            return 'void-tier';
        } else if ($rarity == self::RARITY_GOD) {
            return 'god';
        }
        return '';
    }

}
