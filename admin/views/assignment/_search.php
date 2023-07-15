<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\User;
use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;

    // Array
    $data = User::find()->asArray()->all();

    $username = ArrayHelper::getColumn($data, 'username');
    $username = array_unique($username);


    $name = ArrayHelper::getColumn($data, 'name');
    $name = array_unique($name);
    // End Array
?>

<?php 
    $form = ActiveForm::begin([
        'id' => 'form-search',
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]);
?>
        <div class="row">
            <div class="col-md-12">
                <?php
                    echo $form->field($model, 'username')->widget(TypeaheadBasic::classname(), [
                        'data' => $username,
                        'pluginOptions' => ['highlight' => true],
                        'options' => ['data-placeholder' => 'Filter as you type ...', 'autocomplete' => 'off'],
                    ]);
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?php
                    echo $form->field($model, 'name')->widget(TypeaheadBasic::classname(), [
                        'data' => $name,
                        'pluginOptions' => ['highlight' => true],
                        'options' => ['data-placeholder' => 'Filter as you type ...', 'autocomplete' => 'off'],
                    ]);
                ?>
            </div>
        </div>

    <div class="form-group">
        <?= Html::submitButton('SEARCH', ['class' => 'btn btn-warning','onclick' => "return search()"]) ?>
    </div>
<?php ActiveForm::end(); ?>

    

    