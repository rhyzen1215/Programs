
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="_styles_ie.css" rel="stylesheet" type="text/css"/>

</head>

<body oncontextmenu="return false;">

			<ol class="tree">
            		<li>
                	<label for="folder"><strong>Policy Guidelines</strong></label><input type="checkbox" id="folder" />
                		<ol>
							<?Php
								$x = 1;
								$y = 8;
								while ($x <= $y){
									echo '<li class="file" id="aFile"><a href="Policy.php?pagenum='.$x.'" target="iframe2" onclick="disableclick(e)" >Page No. '.$x.'</a></li>';
									$x = $x  + 1;
									}
							
							?>
                 		</ol>
                 	</li>
					  
             </ol>
             
</body>
</html>
