<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold"><?=_ucwords(__($table))?></h2>
                        <h5 class="text-white op-7 mb-2"><?= __('Manage '._ucwords($table).' Data')?></h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="<?=routeTo('crud/create',['table'=>$table])?>" class="btn btn-secondary btn-round"><?=__('Create '._ucwords($table))?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if($success_msg): ?>
                            <div class="alert alert-success"><?=$success_msg?></div>
                            <?php endif ?>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body"></div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive table-hover table-sales">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th width="20px">#</th>
                                            <?php 
                                            $fields = config('fields')[$table];
                                            foreach($fields as $field): 
                                                $label = $field;
                                                if(is_array($field))
                                                {
                                                    $label = $field['label'];
                                                }
                                                $label = _ucwords($label);
                                            ?>
                                            <th><?=$label?></th>
                                            <?php endforeach ?>
                                            <th class="text-right">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($datas as $index => $data): ?>
                                        <tr>
                                            <td>
                                                <?=$index+1?>
                                            </td>
                                            <?php 
                                            foreach($fields as $key => $field): 
                                                $label = $field;
                                                if(is_array($field))
                                                {
                                                    $label = $field['label'];
                                                    $data_value = Form::getData($field['type'],$data->{$key});
                                                    $field = $key;
                                                }
                                                else
                                                {
                                                    $data_value = $data->{$field};
                                                }
                                                $label = _ucwords($label);

                                                if($field == 'content'):
                                            ?>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModalLong" onclick='loadContent(<?=json_encode($data)?>)'>
                                                    Lihat
                                                </button>
                                            </td>
                                            <?php else: ?>
                                            <td><?=$data_value?></td>
                                            <?php endif ?>
                                            <?php endforeach ?>
                                            <td>
                                                <a href="<?=routeTo('crud/edit',['table'=>$table,'id'=>$data->id])?>" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> <?= __('Edit')?></a>
                                                <a href="<?=routeTo('crud/delete',['table'=>$table,'id'=>$data->id])?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> <?= __('Delete')?></a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function loadContent(data)
    {
        document.querySelector('.modal-title').innerHTML = data.title
        document.querySelector('.modal-body').innerHTML = data.content
    }
    </script>
<?php load_templates('layouts/bottom') ?>