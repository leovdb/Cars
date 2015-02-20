<?php
$mysqli = new mysqli("localhost", "dkltdnet_leo", "daglish", "dkltdnet_driven");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}



$res = $mysqli->query("SELECT * FROM dkltdnet_driven.testamonials");


while ($row = $res->fetch_assoc()) {

    echo '<table class="quote-table" width="750" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td valign="middle" width="100%">
					<p class="quote large-font quote-background">"'.$row['testamonial'].'" - '.$row['customer_desc_generic'].'</p>
				</td>
				<td valign="middle" id="testamonial-img-cell"><img src="../img/testamonials/'.$row['testamonial_id'].'.gif" id="testamonial-img"/></td>
				
			</tr>
			</table>';
}

?>