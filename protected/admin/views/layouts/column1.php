<?php $this->beginContent('/layouts/main'); ?>
<div id="mask">

    <div id="main" class="main-cont">
    	
    	<?php if(isset($this->breadcrumbs)):?>

            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
            	'homeLink' => CHtml::link('Home', array('site/index')),
                'links'=> $this->breadcrumbs, // 调用视图里定义的breadcrumbs
            )); ?><!-- breadcrumbs -->
			
        <?php endif; ?>

        <div class="container">
			<div id="page-cont">
				<?php echo $content; ?>
			</div><!-- content -->
		</div>

    </div>
</div>
<?php $this->endContent(); ?>