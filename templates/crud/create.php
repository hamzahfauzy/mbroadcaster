<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold"><?= __('Create New '._ucwords($table))?></h2>
                        <h5 class="text-white op-7 mb-2"><?= __('Manage '._ucwords($table).' Data')?></h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="<?=routeTo('crud/index',['table'=>$table])?>" class="btn btn-warning btn-round"><?= __('Back') ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <?php 
                                foreach(config('fields')[$table] as $key => $field): 
                                    $label = $field;
                                    $type  = "text";
                                    $attr  = ['class'=>"form-control","required"=>""];
                                    $class = "form-control";
                                    if(is_array($field))
                                    {
                                        $field_data = $field;
                                        $field = $key;
                                        $label = $field_data['label'];
                                        if(isset($field_data['type']))
                                        $type  = $field_data['type'];

                                        $attr  = $field_data['attr'] ?? $attr;
                                    }
                                    $label = _ucwords($label);
                                    $attr["placeholder"] = $label;
                                ?>
                                <div class="form-group">
                                    <label for=""><?=$label?></label>
                                    <?= Form::input($type, $table."[".$field."]", $attr) ?>
                                </div>
                                <?php endforeach ?>
                                <?php if($table == 'messages'): ?>
                                <div class="form-group">
                                    <label for=""><?= __('Attachments') ?></label>
                                    <input type="file" name="files[]" class="form-control" multiple>
                                </div>
                                <?php endif ?>
                                <div class="form-group">
                                    <?php if($table == 'messages'): ?>
                                        <button class="btn btn-primary"><?= __('Send') ?></button>
                                    <?php else: ?>
                                        <button class="btn btn-primary"><?= __('Submit') ?></button>
                                    <?php endif ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php load_templates('layouts/bottom') ?>