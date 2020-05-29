<div class="container">
    <div class="row" style="margin-top: 100px;">
        <div class="col-5 offset-md-3">
            <form action="<?php echo base_url() ?>series/create/<?php echo $series->id; ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="form-group">
                    <label>Serie name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $series->name; ?>">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control-file">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-2">
                            <a href="<?php echo base_url() . 'persona' ?>" class="btn btn-secondary">Back</a>
                        </div>
                        <?php if (isset($id)) { ?>
                            <div class="col-2">
                                <a href="<?php echo base_url() . 'series/delete/' . $series->id ?>" class="btn btn-danger">Delete</a>
                            </div>
                        <?php } ?>
                        <div class="col-8">
                            <input type="submit" class="btn btn-primary form-control" value="Send">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>