<script type="text/javascript" src="js/reloadonchange.js"></script>
<?php
 $deps = array();
 $deps[] = $_SERVER['SCRIPT_FILENAME'];

 // optional, but recommended inclued PECL extension 
 if (function_exists('inclued_get_data'))
 {
	$data = inclued_get_data();
	//var_dump($data['includes']);
	foreach($data['includes'] as $item)
	{
		$deps[] = $item['opened_path'];
		
	}
	
 }
 // add additional deps, like css files etc

?>	
<script>
$(document).ready(function()
{
	$().reloadOnChange('lib/inotify.php', <?php echo json_encode($deps);?>);
});
</script>


 



