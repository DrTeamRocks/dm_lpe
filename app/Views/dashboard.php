<?php
$sites = $data['sites'];
?>

<div class="modal fade" id="addSite" tabindex="-1" role="dialog" aria-labelledby="addSiteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form data-toggle="validator" role="form" method="post">
            <input type="hidden" name="mode" value="add"/>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo $data['lng']->get('add_site'); ?></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="url" placeholder="Domain URL" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="alias" placeholder="Domain Alias"/>
                    </div>
                </div>
                <div class="modal-footer bg-blue">
                    <button class="btn btn-secondary pull-left" name="submit"
                            type="submit"><?php echo $data['lng']->get('submit'); ?></button>
                    <button class="btn btn-secondary pull-right" type="button"
                            data-dismiss="modal"><?php echo $data['lng']->get('close'); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row padding-top-30px">

    <div class="col-sm-4">
        <a class="card bg-blue-2 dark" href="<?php echo DIR ?>/dashboard" style="text-decoration: none;">
            <div class="card-block text-white text-center">
                <i class="fa fa-globe"></i><br/>
                Sites
            </div>
        </a>
    </div>

    <?php if ($data['userinfo']->is_admin) { ?>
        <div class="col-sm-4">
            <a class="card bg-blue-3 dark" href="<?php echo DIR ?>system/users" style="text-decoration: none;">
                <div class="card-block text-white text-center">
                    <i class="fa fa-users"></i><br/>
                    Accounts
                </div>
            </a>
        </div>
    <?php } ?>


</div>

<div class="row padding-top-30px">

    <?php
    $i = 0;
    while ($i < count($sites)) {
        ?>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-block">
                    <a target="_blank" class="card-subtitle mb-2" href="http://<?php echo $sites[$i]->url; ?>">
                        <?php echo $sites[$i]->url; ?>
                    </a>
                    <br/>
                    <a target="_blank" class="card-subtitle mb-2" href="http://<?php echo $sites[$i]->alias; ?>">
                        <?php echo $sites[$i]->alias; ?>
                    </a>
                </div>
                <div class="card-footer text-muted text-right">
                    <a href="<?php echo DIR . 'site/variables/' . $sites[$i]->id ?>" class="btn btn-secondary">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>
                    <?php if ($data['userinfo']->is_editor) { ?>
                        <a href="<?php echo DIR . 'site/html/' . $sites[$i]->id ?>" class="btn btn-secondary">
                            <i class="fa fa-code"></i>
                        </a>
                        <a href="<?php echo DIR . 'site/settings/' . $sites[$i]->id ?>"
                           class="btn btn-secondary">
                            <i class="fa fa-cogs"></i>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
        $i++;
    }
    ?>

</div>
