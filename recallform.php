<div id="login">
    <form action="index.php" method="post">
		<center>
		<table>
			<tr>
				<td><center><?php echo $lang['character_name']; ?></center></td>
			</tr>
			<tr>
				<td><center><input type="text" name="custom" value="<?php echo $charname?>" style="width: 135px"></center></td>
			</tr>
			<tr>
				<td><center><input type="submit" name="submit" value="<?php echo $lang['character_button']; ?>"></center></td>
			</tr>
			<tr>
				<td><center><a href="?lang=en"><img src="images/flag/en.png"></a> <a href="?lang=es"><img src="images/flag/es.png"></a> <a href="?lang=nl"><img src="images/flag/nl.png"></a></center></td>
			</tr>
		</table>
		</center>
	</form>
</div>
<br>
