<?php foreach ($comments as $row): ?>
	<div style="border: 1px solid  #b1b1bd; margin-top: 5px;padding-left: 5px;">
	    <span class="icon-user"></span>
	    <span style="color: blue;"><?=h($row->user->username)?></span>	</br>
		<span style="margin-left: 65px;"><?=h($row->content) ?></span>
	</div>
<?php endforeach; ?>