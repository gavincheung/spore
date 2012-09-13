<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title><?php echo CHtml::encode(Yii::t('UI', 'Control Center')); ?></title>
        
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
    </head>
    <body>

        <?php $this->widget('bootstrap.widgets.BootNavbar', array(
            'fixed'=>'top', // 顶部固定
            'brand'=>CHtml::encode(Yii::t('UI', Yii::app()->name)),
            'brandUrl'=>'#',
            'collapse'=>false, // requires bootstrap-responsive.css
            'items'=>array(
                array(
                    'class'=>'bootstrap.widgets.BootMenu',
                    'encodeLabel'=>false,
                    'htmlOptions'=>array(
                        'id'=>'main-nav',
                    ),
                    'items'=>array(
                        array('label'=>'<i class="icon-list-alt icon-white"></i> '.Yii::t('UI', 'Content Management'), 'url'=>'#', 'active'=>true),
                        array('label'=>'<i class="icon-wrench icon-white"></i> '.Yii::t('UI', 'Site Settings'), 'url'=>'#'),
                        array('label'=>'<i class="icon-user icon-white"></i> '.Yii::t('UI', 'User Management'), 'url'=>'#'),
                        array('label'=>'<i class="icon-cog icon-white"></i> '. Yii::t('UI', 'My account').'('.Yii::app()->user->username.')', 'url'=>'#'),
                    ),
                ),
                array(
                    'class'=>'bootstrap.widgets.BootMenu',
                    'encodeLabel'=>false,
                    'htmlOptions'=>array('class'=>'pull-right'),
                    'items'=>array(
                        array('label'=>'<i class="icon-off icon-white"></i> '.Yii::t('UI', 'Logout'), 'url'=>array('site/logout')),
                    ),
                ),
            ),
        )); ?>

        <div id="aside" class="frame-aside">
            <div id="nav" class="nav-aside">
                <?php $this->widget('zii.widgets.CMenu',array(
                    'encodeLabel'=>false,
                    'activateParents'=>true,
                    'items'=>array(
                        array('label'=>Yii::t('UI', 'Dashboard'), 'url'=>array('/site/dashboard'), 'itemOptions'=>array('class'=>'active'), 'linkOptions'=>array('target'=>'mask')),
                        array('label'=>Yii::t('UI', 'Home'), 'url'=>array('/home'), 'linkOptions'=>array('target'=>'mask')),
                        array('label'=>Yii::t('UI', 'Posts'), 'url'=>array('/post'), 'linkOptions'=>array('target'=>'mask')),
                        array('label'=>Yii::t('UI', 'Products'), 'url'=>array('/post'), 'linkOptions'=>array('target'=>'mask')),
                        array('label'=>Yii::t('UI', 'Categories'), 'url'=>array('/category'), 'linkOptions'=>array('target'=>'mask')),
                    ),
                )); ?>
                <?php $this->widget('zii.widgets.CMenu',array(
                    'encodeLabel'=>false,
                    'activateParents'=>true,
                    'htmlOptions'=>array('class'=>'hidden'),
                    'items'=>array(
                        array('label'=>Yii::t('UI', 'Frontend'), 'url'=>array('/post'), 'linkOptions'=>array('target'=>'mask')),
                        array('label'=>Yii::t('UI', 'Backend'), 'url'=>array('/site/dashboard'), 'linkOptions'=>array('target'=>'mask')),
                    ),
                )); ?>
                <?php $this->widget('zii.widgets.CMenu',array(
                    'encodeLabel'=>false,
                    'activateParents'=>true,
                    'htmlOptions'=>array('class'=>'hidden'),
                    'items'=>array(
                        array('label'=>Yii::t('UI', 'Users'), 'url'=>array('/user'), 'linkOptions'=>array('target'=>'mask')),
                        array('label'=>Yii::t('UI', 'Srbac'), 'url'=>array('/srbac/authitem/manage'), 'linkOptions'=>array('target'=>'mask')),
                    ),
                )); ?>
                <?php $this->widget('zii.widgets.CMenu',array(
                    'encodeLabel'=>false,
                    'activateParents'=>true,
                    'htmlOptions'=>array('class'=>'hidden'),
                    'items'=>array(
                        array('label'=>Yii::t('UI', 'Reset Password'), 'url'=>array('user/resetPassword'), 'linkOptions'=>array('target'=>'mask')),
                    ),
                )); ?>
            </div>
            <!-- /nav -->
        </div>

        <div id="contents" class="frame-contents">
            <iframe src="http://baidu.com" frameborder="0" width="100%" id="mask" name="mask" scrolling="yes"></iframe>
        </div>
            
        <?php
            $cs = Yii::app()->clientScript;
            $cs->registerScript('navToggle', "
                $(function(){
                    // 一级菜单项的点击事件绑定
                    $('#main-nav li > a').click(function(e){
                        index = $('#main-nav li').index($(this).parent());
                        $(this).parent().addClass('active').siblings().removeClass('active');

                        // 显示相应的二级菜单
                        var currSubNav = $('#nav ul').filter(':eq(' + index + ')');
                        currSubNav.removeClass('hidden')
                            .siblings().addClass('hidden');

                        // 触发目标二级菜单第一项的点击事件
                        currSubNav.find('li:first a').trigger('click');

                        e.preventDefault();
                    });

                    // 二级菜单项的点击事件绑定
                    $('#nav li a').click(function(e){
                        $(this).parent().addClass('active').siblings().removeClass('active');
                        $('#mask').attr('src', $(this).attr('href'));
                        e.preventDefault();
                    });
                });
            ", CClientScript::POS_END);
        ?>
    </body>
</html>         
