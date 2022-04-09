<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Edit <?=_ucwords($table)?> : <?=$data->nama??''?></h2>
                        <h5 class="text-white op-7 mb-2">Manage <?=_ucwords($table)?> Data</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="<?=routeTo('crud/index',['table'=>$table])?>" class="btn btn-warning btn-round">Back</a>
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
                                    if($type == 'datetime-local' && $data->{$field} != NULL) $data->{$field} = date('Y-m-d\TH:i', strtotime($data->{$field}));
                                    $attr["value"] = $data->{$field};
                                ?>
                                <div class="form-group">
                                    <label for=""><?=$label?></label>
                                    <?= Form::input($type, $table."[".$field."]", $attr) ?>
                                </div>
                                <?php endforeach ?>
                                <?php if($table == 'messages'): ?>
                                <div class="form-group">
                                    <label for="">Attachments</label>
                                    <input type="file" name="files[]" class="form-control" multiple>

                                    <ul>
                                    <?php foreach($data->attachments as $attachment): ?>
                                        <li><a href="<?=routeTo($attachment->file_url)?>"><?= $attachment->filename ?></a> - <a href="<?= routeTo('crud/delete',['table'=>'message_attachments','id'=>$attachment->id]) ?>"><i class="fas fa-trash"></i></a></li>
                                    <?php endforeach ?>
                                    </ul>
                                </div>
                                <?php endif ?>
                                <div class="form-group">
                                    <?php if($table == 'messages'): ?>
                                        <button class="btn btn-primary" name="send">Submit and Send</button>
                                        <button class="btn btn-primary" name="submit">Submit</button>
                                    <?php else: ?>
                                        <button class="btn btn-primary">Submit</button>
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