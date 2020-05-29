<?php 
/*var_dump($series);
die;*/?>

<style>
    .very-rare {
        background: #073763;
        color: #3d85c6;
    }

    .epic {
        background: #4c1130;
        color: #a64d79;
    }

    .legendary {
        background: #7f6000;
        color: #f1c232;
    }

    .common {
        background: #666666;
        color: #cccccc;
    }

    .rare {
        background: #274e13;
        color: #6aa84f;
    }

    .empyrean {
        background: #8e7cc3;
        color: #d9d2e9;
    }

    .true-divinity {
        background: #8910af;
        color: #e57aff;
    }

    .void-tier {
        background: #000000;
        color: #434343;
    }

    .god {
        background: #f3f3f3;
        color: #b4a7d6;
    }

    .serieLogo {
        max-width: 380px;
        max-height: 100px;
    }

    .col-xs-1-10,
    .col-sm-1-10 {
        position: relative;
        min-height: 1px;
    }

    .col-xs-1-10 {
        width: 10%;
        float: left;
    }

    @media (min-width: 768px) {
        .col-sm-1-10 {
            width: 10%;
            float: left;
        }
    }

    @media (min-width: 992px) {
        .col-md-1-10 {
            width: 10%;
            float: left;
        }
    }

    @media (min-width: 1200px) {
        .col-lg-1-10 {
            width: 10%;
            float: left;
        }
    }
</style>

<div class="container" style="margin-top: 58px;padding-left: 50px;">

    <?php foreach ($series as $serie) { ?>
        <div class="row">
            <div class="col-12">
                <div style="margin-top: 10px;margin-bottom: 10px;">
                    <div class="row" style="text-align: center;line-height: 100px;">
                        <div class="col-4">
                            <a href="<?php echo base_url() . 'series/create/' . $serie->id ?>" style="color: black;"><b><?php echo $serie->name ?></b></a>
                        </div>
                        <div class="col-4">
                            <img class="serieLogo" src="<?php echo getSerieImage($serie->id) ?>" alt="Serie Logo">
                        </div>
                        <div class="col-4">
                            <a href="<?php echo base_url() . 'series/create/' . $serie->id ?>" style="color: black;"><b><?php echo $serie->name ?></b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
                if (!isset($searchText) || $type == 'serie') {
                    $this->load->model('personaModel');
                    $personas = $this->personaModel->get_by_serie($serie->id);
                }
                foreach ($personas as $persona) {
                    if ($persona->series_id == $serie->id) {
                        $origin_series_name = $this->serieModel->get($persona->origin_series_id)->name;

                        ?>
                    <div class="col-sm-1-10" style="padding: 0 !important;">
                        <div class="<?php echo PersonaModel::getRarity($persona->rarity) ?>" style="border: 1px solid;border-radius: 10px;text-align: center;width: 102px;margin-top: 10px;font-size: 10pt;">
                            <a href="<?php echo base_url() . 'persona/wiki/' . str_replace("'", '-', str_replace(' ', '_', $persona->name)) . '/' . str_replace("'", '-', str_replace(' ', '_', $origin_series_name))  ?>">
                                <div style="padding: 10px 10px 0;">
                                    <img class="persona-img" src="<?php echo getPersonaImage($persona->id) ?>" alt="Card image cap" style="border: 1px solid white;">
                                </div>

                            </a>
                            <div>
                                <?php echo str_replace("-", "'", $persona->name); ?>
                            </div>
                            <div>
                                <?php echo PersonaModel::$rarityType[$persona->rarity]; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    <?php } ?>
</div>