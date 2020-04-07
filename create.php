<?php

require "connect.php";

//$sql = "INSERT INTO `backendChallange`.`list` (`id`, `name`) VALUES ('3', 'ernie')";

?>

<form action="createprocess.php" method="post">
	<div class="form-group">
		<label for="">name: </label>
		<input type="text" name="name" value="" id="name" class="form-control" required>
	</div>
	<button type="submit" name="button" class="btn btn-primary">Submit</button>
</form>