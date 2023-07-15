<?php  
use yii\helpers\Url;
?>

<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">

        <div class="navbar-header">
            <a class="navbar-brand" href="<?=url::to(['news/index']); ?>">
                <b>
                    <!-- Dark Logo icon -->
                    <img src="<?=$directoryAsset;?>/img/logo-tgde-mini.png" alt="TGDE LOGO" class="dark-logo" />
                    <!-- Light Logo icon -->
                    <img src="<?=$directoryAsset;?>/img/logo-tgde-mini.png" alt="TGDE LOGO" class="light-logo" />
                </b>
                <span>
                    <!-- dark Logo text -->
                    <img src="<?=$directoryAsset;?>/img/logo-text.png" alt="TGDE Website" class="dark-logo" />
                    <!-- Light Logo text -->    
                    <img src="<?=$directoryAsset;?>/img/logo-text.png" class="light-logo" alt="TGDE Website" />
                </span> 
             </a>
        </div>

        <div class="navbar-collapse">
            <!-- TOGGLE MENU -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
            </ul>
            
            <ul class="navbar-nav my-lg-0">
                <!-- EMAIL -->
                <li class="nav-item dropdown">
                    <a class="nav-link waves-effect waves-dark" href="" aria-haspopup="true" aria-expanded="false"> 
                        <i class="ti-email"></i>
                        <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </a>
                </li>
                
                <!-- LOGOUT -->
                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="hidden-md-down">
                        <?php echo Yii::$app->user->identity->name; ?> &nbsp;
                        <i class="fa fa-angle-down"></i></span> </a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        <a href="<?=url::to(['site/logout']); ?>" data-method="post" class="dropdown-item">
                            <i class="fa fa-power-off"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>

