<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Authassignment;

$this->title = 'ผู้ใช้งาน';
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('../edit_bug_kartik');
?>

<div class="assignment-index">
    <?= $this->render('../_header_index',[
        'searchModel' => $searchModel,
        'controller' => 'assignment',
        'text_add' => ''
    ]) ?>
    <?php
        $showData = [
            ['attribute' => 'name'],
            ['attribute' => 'username'],
            ['attribute' => 'email'],
            [
                'label' => 'สิทธิ์ผู้ใช้งาน',
                'format' => 'raw',
                'value' => function($data){
                    
                    $auth = Authassignment::find()->where(['user_id' => $data->username])->one();
                    
                    $global = '';
                    $user = '';

                    if($auth['item_name'] == 'user'){
                        $user = 'selected';
                    }else{
                        $global = 'selected';
                    }

                    if($auth['item_name'] == 'admin'){
                        $text = "ADMIN";
                    }else{
                        $text = "<select id='sltAss' name='sltAss' class='slt-ass' data-username='".$data->username."'>
                                    <option value='user' ".$user.">USER</option>
                                    <option value='global' ".$global.">GLOBAL</option>
                                </select>";
                    }

                    return $text;
                }
            ],
        ];
    ?>
    <?= $this->render('../_gridview',[
        'dataProvider' => $dataProvider,
        'controller' => 'assignment',
        'showData' => $showData,
        'redata' => 'username',
        'prefix' => '',
        'controller_thai' => 'ผู้ใช้งาน',
    ]) ?>
</div>


<script>
    $(document).ready(function () {
        $('.slt-ass').change(function (e) {
            var username = $(this).data("username");
            var item_name = $(this).val();

            $.ajax({
                url: '<?=url::to(["assignment/update"]); ?>',
                type: 'POST',
                data: {username: username, item_name: item_name},
            })
            .done(function(res) {
                if(res == "success"){
                    $.toast({
                        heading: 'เปลี่ยนสิทธิ์ผู้ใช้งานเรียบร้อย',
                        text: '',
                        position: 'top-right',
                        loaderBg:'#ff6849',
                        icon: 'success',
                        hideAfter: 2000, 
                        stack: 6
                    });
                }else{
                    console.log('wrong');
                }
            })
            .fail(function() {
                console.log("error");
            });
        });
    });
</script>