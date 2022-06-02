<?php

include_once('model/messages.php');

$id = $_GET['id'] ?? '';
$isNormId = preg_match('/^[1-9]\d*$/', $id);

$message = $isNormId ? messagesOne($id) : null;
$hasMessage = $message !== null;

?>
<div class="content">
	<?php if($hasMessage): ?>
		<div class="article">
			<h1><?=$message['name']?></h1>
			<div><?=$message['text']?></div>
		</div>
	<?php else: ?>
		<div class="e404">
			<h1>Страница не найдена!</h1>
		</div>
	<?php endif; ?>
</div>
<hr>
<a href="index.php">Move to main page</a>