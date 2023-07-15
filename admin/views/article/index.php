<?php
use yii\helpers\Html;

$this->title = 'บทความ';
$this->params['breadcrumbs'][] = $this->title;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');
$this->registerCssFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.css');
$this->registerJsFile($directoryAsset.'/assets/node_modules/switchery/dist/switchery.min.js');
?>

<div class="article-index">
    <?= $this->render('../_header_index',[
        'searchModel' => $searchModel,
        'controller' => 'article',
        'text_add' => 'เพิ่ม'
    ]) ?>

    <?php
        $showData = [
            ['attribute' => 'a_title'],
            [
                'attribute' => 'a_type_id',
                'value' => function($data){
                    return $data->articleType->a_type_name;
                }
            ],

        ];

        if($searchModel->a_type_id == 3){
            array_push($showData, [
                'attribute' => 'a_type_sub_id',
                'value' => function($data){
                    return "freedom";
                }
            ]);
        }

        array_push($showData, [
            'attribute' => 'views',
            'headerOptions' => [
                'class' => 'text-center'
            ],
            'contentOptions' => [
                'class' => 'text-center'
            ],
        ],
        [
            'attribute' => 'publish',
            'format' => 'raw',
            'headerOptions' => [
                'class' => 'text-center'
            ],
            'contentOptions' => [
                'class' => 'text-center'
            ],
            'value' => function($data){
                return Html::checkBox('publish',$data->publish,[
                    'data-color' => '#009efb',
                    'class' => 'js-switch chk-publish',
                    'data-size' => 'small',
                    'data-id' => $data->a_id,
                ]);
            }
        ]);
    ?>

    <?= $this->render('../_gridview',[
        'dataProvider' => $dataProvider,
        'controller' => 'article',
        'showData' => $showData,
        'id' => 'a_id',
        'prefix' => 'a',
    ]) ?>
</div>