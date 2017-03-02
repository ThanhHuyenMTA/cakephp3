 <?= $this->Html->css('bootstrap.css'); ?>
<style>
    input, textarea, .uneditable-input {
	    margin-left: 0;
	    width: 900px;
	    min-height:45px;
	    padding-left:25px;
	}
	.sumb{
	    margin-left:850px;
	    color:blue;
	    font-weight: bold;
	}
	
</style>
<h1><?= h($viewAr->name) ?></h1>
<div><?= h($viewAr ->content) ?></div>
<div><?= h($viewAr ->posted) ?></div>
<div><?= h($viewAr ->views) ?></div>
<span class="icon-user"> </span>
<div class="btn-toolbar">
  <div class="btn-group">
     <span style="font-size:24px;" class=" icon-thumbs-up"></span>
     <span style="margin-left:20px;" class="icon-thumbs-down"></span>
  </div>
</div>
<div>
  <?=  $this->Element('../comments/addcomment'); ?>    
</div>