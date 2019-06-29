
Skip to content
Pull requests
Issues
Marketplace
Explore
@ryanjbcom

1
0

    0

ryanjbcom/Website_posster.com
Code
Issues 0
Pull requests 0
Projects 0
Wiki
Security
Insights
Settings
Website_posster.com/views/pages/ad/new.php
Ryan Bridglal Update new.php 2cb5b66 on Feb 9, 2015
214 lines (194 sloc) 9.14 KB
<?php defined('SYSPATH') or die('No direct script access.');?>
	<div class="page-header">
		<h1><?=__('Create Listing')?></h1>
	</div>
	<div class=" well">
		<?= FORM::open(Route::url('post_new',array('controller'=>'new','action'=>'index')), array('class'=>'form-horizontal post_new', 'enctype'=>'multipart/form-data'))?>
			<fieldset>

				<div class="form-group">

					<div class="col-md-4">
						<?= FORM::label('title', __('Title'), array('class'=>'control-label', 'for'=>'title'))?>
						<?= FORM::input('title', Request::current()->post('title'), array('placeholder' => __('Title'), 'class' => 'form-control', 'id' => 'title', 'required'))?>
					</div>
				</div>
				<!-- category select -->
				<div class="category_edit <?=($id_category==NULL)?'hide':''?>">
					<?if($id_category == NULL):?>
						<label for="category"><?=__('Selected Category does not exists, please select another one!')?></label>
					<?else:?>
						<label for="category"><?=__('Selected Category')?>: <label for="category" class="selected-category"><?=Core::get('category')?></label></label>
					<?endif?>
					<br>
					<a class=" btn btn-default"><?=__('Select another category')?></a>
				</div>
				<div class="category_chained <?=($id_category!=NULL)?'hide':''?>">
					<label for="category"><span class="pull-left"><?=__('Category')?></span>
						<span class="label label-warning category-price ml-10"></span>
						<input class="invisible pull-left" id="category-selected" name="category" value="<?=$id_category?>" style="height: 0; padding:0; width:0;" required></input>
					</label>

					<div class="form-group">
						<?foreach ($order_parent_deep as $level => $categ):?>
							<div class="col-md-4">
							<select id="level-<?=$level?>" data-level="<?=$level?>"
									class="disable-chosen category_chained_select <?=(core::config('advertisement.parent_category') AND $level == 0)?'is_parent':NULL?> form-control <?=($level != 0)?'hide':NULL?>">
								<option value=""></option>
								<?foreach ($categ as $c):?>
									<?if($c['id']>1):?>
									<option  data-price="<?=($c['price']>0)?$c['price']:NULL?>" value="<?=$c['id']?>" class="<?=$c['id_category_parent']?>"><?=$c['name']?></option>
									<?endif?>
								<?endforeach?>
							</select>
							</div>
						<?endforeach?>

						<div class="clearfix"></div>
						<div class="col-md-4">
							<label for="category"><?=__('Selected Category')?>: <label for="category" class="selected-category"></label></label>
						</div>
					</div>
				</div>

				<?if(count($locations) > 1 AND $form_show['location'] != FALSE):?>
                    <label for="location"><span class="pull-left"><?=__('Location')?></span>
						<span class="label label-warning ml-10"></span>
						<input class="invisible pull-left" id="location-selected" name="location" style="height: 0; padding:0; width:0;" required></input>
					</label>

					<div class="form-group">
						<?foreach ($loc_parent_deep as $level => $locat):?>
							<div class="col-md-4">
							<select id="level-loc-<?=$level?>" data-level="<?=$level?>"
									class="disable-chosen location_chained_select form-control <?=($level != 0)?'hide':NULL?>">
								<option value=""></option>
								<?foreach ($locat as $l):?>
									<?if($l['id']>1):?>
									<option value="<?=$l['id']?>" class="<?=$l['id_location_parent']?>"><?=$l['name']?></option>
									<?endif?>
								<?endforeach?>
							</select>
							</div>
						<?endforeach?>

						<div class="clearfix"></div>
						<div class="col-md-4">
							<label for="location"><?=__('Selected location')?>: <label for="location" class="selected-location"></label></label>
						</div>
					</div>
				<?endif?>

				<div class="form-group">

					<div class="col-md-9">
						<?= FORM::label('description', __('Description'), array('class'=>'control-label', 'for'=>'description', 'spellcheck'=>TRUE))?>
						<?= FORM::textarea('description', Request::current()->post('description'), array('class'=>'form-control', 'name'=>'description', 'id'=>'description' ,  'rows'=>10, 'required'))?>
					</div>
				</div>
				<div class="form-group">
				<label class="control-label col-xs-1"><?=__('Images')?></label>
<div class="col-md-12">

					<?for ($i=0; $i < core::config("advertisement.num_images") ; $i++):?>
						<div class="fileinput fileinput-new" data-provides="fileinput">
						  	<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
							<div>
						    <span class="btn btn-default btn-file">
						    	<span class="fileinput-new"><?=__('Select')?></span>
						    	<span class="fileinput-exists"><?=__('Edit')?></span>
						    	<input type="file" name="<?='image'.$i?>" id="<?='fileInput'.$i?>">
						    </span>
						    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput"><?=__('Delete')?></a>
						  </div>
						</div>
					<?endfor?>
					</div>
				</div>
				<?if($form_show['phone'] != FALSE):?>
				<div class="form-group">

					<div class="col-md-4">
						<?= FORM::label('phone', __('Phone'), array('class'=>'control-label', 'for'=>'phone'))?>
						<?= FORM::input('phone', Request::current()->post('phone'), array('class'=>'form-control', 'id'=>'phone', 'placeholder'=>__('Phone')))?>
					</div>
				</div>
				<?endif?>
				<?if($form_show['address'] != FALSE):?>
				<div class="form-group">

					<div class="col-md-4">
						<?= FORM::label('address', __('Address'), array('class'=>'control-label', 'for'=>'address'))?>
						<?= FORM::input('address', Request::current()->post('address'), array('class'=>'form-control', 'id'=>'address', 'placeholder'=>__('Address')))?>
					</div>
				</div>
					<?if(core::config('advertisement.map_pub_new')):?>
						<div class="popin-map-container">
							<div class="map-inner" id="map"
								data-lat="<?=core::config('advertisement.center_lat')?>"
								data-lon="<?=core::config('advertisement.center_lon')?>"
								data-zoom="<?=core::config('advertisement.map_zoom')?>"
								style="height:200px;max-width:400px">
							</div>
						</div>
					<?endif?>
				<?endif?>
				<?if($form_show['price'] != FALSE):?>
				<div class="form-group">

					<div class="col-md-4">
						<?= FORM::label('price', __('Price'), array('class'=>'control-label', 'for'=>'price'))?>
						<div class="input-prepend">
						<?= FORM::input('price', Request::current()->post('price'), array('placeholder' => i18n::money_format(1), 'class' => 'form-control', 'id' => 'price', 'type'=>'text'))?>
						</div>
					</div>
				</div>
				<?endif?>
				<?if(core::config('payment.stock')):?>
				<div class="form-group">

					<div class="col-md-4">
						<?= FORM::label('stock', __('In Stock'), array('class'=>'control-label', 'for'=>'stock'))?>
						<div class="input-prepend">
						<?= FORM::input('stock', Request::current()->post('stock'), array('placeholder' => '10', 'class' => 'form-control', 'id' => 'stock', 'type'=>'text'))?>
						</div>
					</div>
				</div>
				<?endif?>
				<?if($form_show['website'] != FALSE):?>
				<div class="form-group">

					<div class="col-md-4">
						<?= FORM::label('website', __('Website'), array('class'=>'control-label', 'for'=>'website'))?>
						<?= FORM::input('website', Request::current()->post('website'), array('placeholder' => core::config("general.base_url"), 'class' => 'form-control', 'id' => 'website'))?>
					</div>
				</div>
				<?endif?>
				<?if (!Auth::instance()->get_user()):?>
				<div class="form-group">

					<div class="col-md-4">
						<?= FORM::label('name', __('Name'), array('class'=>'control-label', 'for'=>'name'))?>
						<?= FORM::input('name', Request::current()->post('name'), array('class'=>'form-control', 'id'=>'name', 'required', 'placeholder'=>__('Name')))?>
					</div>
				</div>
				<div class="form-group">

					<div class="col-md-4">
						<?= FORM::label('email', __('Email'), array('class'=>'control-label', 'for'=>'email'))?>
						<?= FORM::input('email', Request::current()->post('email'), array('class'=>'form-control', 'id'=>'email', 'type'=>'email' ,'required','placeholder'=>__('Email')))?>
					</div>
				</div>
				<?endif?>

				<?if(core::config('advertisement.tos') != ''):?>
				<div class="form-group">
					<div class="col-md-4">
                        <label class="checkbox">
                          	<input type="checkbox" required name="tos" id="tos"/>
							<a target="_blank" href="<?=Route::url('page', array('seotitle'=>core::config('advertisement.tos')))?>"> <?=__('Terms of service')?></a>
						</label>
					</div>
				</div>
				<?endif?>
				<?if ($form_show['captcha'] != FALSE):?>
				<div class="form-group">
					<div class="col-md-4">
						Captcha*:<br />
						<?= captcha::image_tag('publish_new');?><br />
						<?= FORM::input('captcha', "", array('class' => 'form-control', 'id' => 'captcha', 'required'))?>
					</div>
				</div>
				<?endif?>
				<div class="form-actions">
					<?= FORM::button('submit', __('Publish new'), array('type'=>'submit', 'class'=>'btn btn-primary', 'action'=>Route::url('post_new',array('controller'=>'new','action'=>'index'))))?>
					<?if (!Auth::instance()->get_user()):?>
					<p class="help-block"><?=__('User account will be created')?></p>
					<?endif?>
				</div>
			</fieldset>
		<?= FORM::close()?>

	</div>
	<!--/well-->

    © 2019 GitHub, Inc.
    Terms
    Privacy
    Security
    Status
    Help

    Contact GitHub
    Pricing
    API
    Training
    Blog
    About

