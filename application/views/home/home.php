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
            asdasd
        </div>
    <?php } ?>
</div>