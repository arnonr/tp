<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
// use yii\widgets\ActiveForm;
$this->title = 'Login';
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/theme/eliteadmin/dist');

$fieldOptions1 = [
    'options' => [
        'autofocus' => 'autofocus', 
        'required' => 'required',
        'tabindex' => '1',
    ],
    'inputTemplate' => "{input}"
];

$fieldOptions2 = [
    'options' => [
        'required' => 'required',
        'tabindex' => '2',
    ],
    'inputTemplate' => "{input}"
];
?>

<?php 
    $form = ActiveForm::begin([
        'id'                     => 'login-form',
        'enableClientValidation' => false,
        'validateOnBlur'         => false,
        'validateOnType'         => false,
        'validateOnChange'       => false,
        'options' => ['class' => 'form-horizontal form-material']
    ]);
?>
    <div class="text-center">
        <a href="javascript:void(0)" class="text-center db">
            <img src="<?=$directoryAsset; ?>/img/logo-tgde.png" alt="TGDE LOGO" style="width:70%"/>
            <br/><br/>
            <span style="font-weight: bold;">TGDE WEBSITE</span>
        </a>
    </div>

    <div class="form-group m-t-40">
        <div class="col-xs-12">
            <?= $form->field($model, 'username',$fieldOptions1)
                    ->label(false)
                    ->textInput(['placeholder' => 'ICIT Account', 'autofocus' => true]) ?>
        </div>
        
        <div class="col-xs-12">
            <?= $form->field($model, 'password',$fieldOptions2)
                    ->label(false)
                    ->passwordInput(['placeholder' => 'Password']) ?>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1" name="login-form[rememberMe]">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
                <a target="_blank" href="https://account.kmutnb.ac.th/web/recovery/index" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?
                </a> 
            </div>     
        </div>
    </div>

    <div class="form-group text-center m-t-20">
        <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase btn-rounded waves-effect waves-light" type="submit">Log In</button>
        </div>
    </div>
<?php ActiveForm::end(); ?>

