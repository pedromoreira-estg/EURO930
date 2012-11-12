<?php
    // base de dados
    
    $a = array();
	$a[] = 2;
	$a[] = 5;
	

	
	
?>

<html>
	<script>
		var jsarray = <?php echo json_encode($a);?>;
		alert(jsarray[1]);
	</script>
</html>