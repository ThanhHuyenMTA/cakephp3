	<?php foreach ($menus as $totl): ?>
	    <li><?= $this->Html->link($totl->name, ['action' => '../Articles/articlesinmenu',$totl->id]) ?><?li>
	<?php endforeach; ?>