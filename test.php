<?php
$count = 1;
foreach($posts as $row)
{

echo '
<tr>
<td>'.$count++.'</td>
<td>'.$row->Title.'</td>
<td>'.$row->First.'  '.$row->Last.'</td>
<td>
<input type="checkbox" name="email" class="single_select" data-ct="'.$row->First.'" data-email="'.$row->First.'" data-name="'.$row->Last.'" />
</td>
<td><button type="button" name="email_button" class="btn btn-info btn-xs email_button" id="'.$count.'" data-email="'.$row->First.'" data-ct="'.$row->Last.'" data-name="'.$row->First.'" data-action="single">Send Single</button></td>
</tr>
';
}
?>
