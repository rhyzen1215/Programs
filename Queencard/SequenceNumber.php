				<?php
				include 'Connect.php';
			
				$sql="SELECT * FROM SequenceID";
				$rs=odbc_exec($conn,$sql);
				$x=0;
				while (odbc_fetch_row($rs))
				{
					if ($x < odbc_result($rs,"sequenceno"))
						{
						$x=odbc_result($rs,"sequenceno");
						}
				}			
				$x=$x+1;
				$x = "000".$x;
				echo '<input type="text" size="10" readonly="readonly" name="SQnum" value='.$x.'';
				odbc_close($conn);
				?>