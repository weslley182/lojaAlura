<?php
session_start();

function mostrarAlerta($psTipo){
	if(isset($_SESSION["$psTipo"])){
?>
		<p class="alert-<?= $psTipo ?>"> <?= $_SESSION[$psTipo] ?> </p>
<?php
		unset($_SESSION[$psTipo]);

	}
}
?>		