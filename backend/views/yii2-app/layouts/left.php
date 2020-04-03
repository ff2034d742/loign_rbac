<?php
use common\models\ValueHelpers;
use backend\assets\AppAsset;
use yidas\yii\fontawesome\FontawesomeAsset;
AppAsset::register($this);
FontAwesomeAsset::register($this);
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <?php $is_admin = ValueHelpers::getRoleValue('Admin');
        if (!Yii::$app->user->isGuest && Yii::$app->user->identity->role_id >= $is_admin) {
        ?>
        
        <?= dmstr\widgets\Menu::widget(
            [
                
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    
                    ['label' => 'Menu Principal', 'options' => ['class' => 'header']],
                    
                    [
                        'label' => 'Control de Accesos',
                        'icon' => 'laptop',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Usuarios', 'icon' => 'users', 'url' => ['user/index']],
                            ['label' => 'Perfiles', 'icon' => 'child', 'url' => ['profile/index']],
                            ['label' => 'Roles', 'icon' => 'image', 'url' => ['role/index']],
                            ['label' => 'Tipo-Usuarios', 'icon' => 'cog', 'url' => ['user-type/index']],
                            ['label' => 'Estado', 'icon' => 'eye', 'url' => ['status/index']],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>
        <?php
            }
                    else{
                            //mas comandos
                    }
         ?>           
    </section>

</aside>
