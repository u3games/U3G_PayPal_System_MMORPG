<div id="login">
    <form action="index.php" method="post">
		<center>
		<table>
			<tr>
				<td><center><?php echo $lang['character_name']; ?></center></td>
			</tr>
			<tr>
				<td><center><input type="text" name="custom" value="<?php echo $charname?>" maxlength="35" style="width: 135px"></center></td>
			</tr>
			</table>
				<p>
				<?php
					echo $lang['select_option'];
				?>
				<br>
				<select name="donation_select">
				  <option value=""></option>
					<?php 
						if ($coins_enabled == true)
							{
								?>
								<option value="Coins"><?php echo $lang['message_6'];?></option>
								<?php
							}
						if ($karma_enabled == true)
							{
								?>
								<option value="Karma"><?php echo $lang['message_8']; echo ' '; echo $lang['message_9'];?></option>
								<?php 
							}
						if ($pkpoints_enabled == true)
							{
								?>
								<option value="Pkpoints"><?php echo $lang['message_8']; echo ' '; echo $lang['message_11'];?></option>
								<?php 
							}
					?>
				</select>
				</p>
			<table>
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
