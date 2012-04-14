<?php 

class INotify 
{
	public static function run()
	{
		$files0 = $_POST['files'];
		$files = array();
		// ignore non existing files, maybe sanitize paths
		foreach($files0 as $file) 
		{			
			if (file_exists($file))
			{
				$files[] = $file;
			}
		}
			
		$filesstr = implode(" ", $files);		
		$out = exec('inotifywait -q -e modify '. $filesstr);
		// check file for syntax error
		foreach($files as $file) 
		{
			$out = shell_exec('php -l ' .$file . ' 2>&1');
			if (strpos($out, 'No syntax errors') === FALSE)
			{
				echo $out;
				return;
			}	
		}
		echo "CHANGED";
	}	
}

$i = new INotify();
$i->run();

?>