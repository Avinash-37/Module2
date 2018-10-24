			<?php
			include 'dbconfig.php';

				$email="avinashk.meshram@gmail.com";

				$res=mysqli_query($conn,"SELECT * FROM `todotable` WHERE uploadedBy='avinashk.meshram@gmail.com'");
echo $email; 
				$cout== $res->num_rows;
				echo $cout;
					if(4 > 0 )
					{
						
						for($i=0;$i<=4;$i++)
						{
						$r=mysqli_fetch_array($res);
						echo $r[0];
						echo $r[1];
						}
					}	
				?>
