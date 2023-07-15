<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');

// sweetalert
$this->registerJsFile($directoryAsset.'/js/dialogs.js');
$this->registerJsFile($directoryAsset.'/js/sweetalert.min.js');

// Footable CSS
$this->registerCssFile($directoryAsset.'/assets/node_modules/footable/css/footable.core.css');
$this->registerCssFile($directoryAsset.'/assets/node_modules/bootstrap-select/bootstrap-select.min.css');
$this->registerJsFile($directoryAsset.'/assets/node_modules/footable/js/footable.all.min.js');
?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">รายการ<?= Html::encode($this->title) ?></h4>
        <?php Pjax::begin(['id' => 'table']) ?>
            <?php  
                if($controller != 'assignment'){
                    $template = '{update} {delete}';

                    if($controller == 'about'){
                        $template = '{update}';
                    }
                    
                    array_push($showData,[
                        'header' => 'จัดการ',
                        'headerOptions' => [
                            'class' => 'text-center',
                            'data-sort-ignore' => 'true',
                        ],
                        'contentOptions' => [
                            'class' => 'text-center'
                        ],
                        'class' => 'yii\grid\ActionColumn',
                        'template' => $template,
                        'buttons' => [
                            'update' => function ($url, $model) use ($controller, $id){
                                return Html::a('<i class="fa fa-edit"></i>', [$controller.'/update','id' => $model->$id], [
                                    'title' => 'Update',
                                    'style' => 'font-size:1.5em;margin-right:0.3em;',
                                    'data-pjax' => '0'
                                ]);
                            },
                            'delete' => function ($url, $model) use ($controller, $prefix, $id){
                                return Html::a('<i class="fa fa-trash"></i>', 'javascript:void(0);', [
                                    'title' => 'Delete',
                                    'style' => 'font-size:1.5em;',
                                    'class' => 'sweet-button',
                                    'data-type' => 'delete',
                                    'data-url' => url::to([$controller.'/delete','id' => $model->$id], true)
                                ]);
                            },
                        ]
                    ]);
                }
            ?>
            <?= GridView::widget([
                'id' => 'griditems',
                'dataProvider' => $dataProvider,
                'tableOptions' => [
                    'class' => 'table toggle-circle table-hover',
                    // 'data-page-size' => '7',
                ],
                'layout' =>  "{items}\n{pager}",
                'options'=>['class'=>'card-body table-responsive'],
                'filterModel' => null,
                'columns' => $showData,
                'pager' => [
                    'linkOptions' => [
                        'style' => 'margin:0.2em;',
                        'class' => 'page-link',
                    ],
                    'linkContainerOptions' => [
                        'class' => 'page-item',
                    ],
                    'options' => [
                        'style' => 'float:right;',
                        'class' => 'pagination',
                    ],
                    'prevPageLabel' => 'Previous',
                    'nextPageLabel' => 'Next',
                ]
            ]); ?>

            <script type="text/javascript">
                jQuery(function($){
                    $('#tablegrid').footable();
                    switcher();
                });
            </script>
        <?php Pjax::end() ?>
    </div>
</div>

<script>
    function switcher(){
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });

        $('.chk-publish').change(function(event) {
            if (this.checked) {
                var value = 1;
            }else{
                var value = 0;
            }
            var type = 'publish';
            var id = $(this).data('id');
            $.ajax({
                url: '<?= Url::to(["index"]);?>',
                type: 'POST',
                data: {checkbox:true, type:type, id:id, value: value},
            })
            .done(function() {
                // if(value){
                //     var bg = 'bg-green';
                //     var text = 'Publish On';
                // }else{
                //     var bg = 'bg-red';
                //     var text = 'Publish Off';
                // }
                // showNotification(bg, text,'bottom', 'right', '', '');
            });
            return false;
        });
    }
</script>