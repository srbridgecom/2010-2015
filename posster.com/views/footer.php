<?php defined('SYSPATH') or die('No direct script access.');?>
<hr>

<footer>
<div class="row">
<?foreach ( widgets::get('footer') as $widget):?>
<div class="col-md-3">
    <?=$widget->render()?>
</div>
<?endforeach?>
</div>

<div class="center-block">
	<p>
	<?if (Theme::get('premium')!=1):?>
      About, Terms, &copy;
	    <a href="http://www.posster.com" title="List it, Find it, Get it">Posster.com</a>
	    <?=date('Y')?><br />
      Open Source Matters, this site is powered by & credit is owed to: <a href="http://open-classifieds.com/" title="Open-Classifieds.com" target="_blank">Open-Classifieds.com</a>
      <?=date('Y')?>
	<?else:?>
	    <?=core::config('general.site_name')?> <?=date('Y')?><br />
	<?endif?>


	<?if(Core::config('appearance.theme_mobile')!=''):?>
	- <a href="<?=Route::url('default')?>?theme=<?=Core::config('appearance.theme_mobile')?>"><?=__('Mobile Version')?></a>
	<?endif?>
	</p>
</div>
</footer>
