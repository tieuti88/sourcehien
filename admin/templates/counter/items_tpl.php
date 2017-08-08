<h3>Danh Sách Số Lượt Truy Cập</h3>

<table class="blue_table">
	<tr>
		<th style="width:50%;">Ngày</th>
		<th style="width:50%;">Số lượt</th>
	</tr>
	<?php for($i=0, $count=count($yesrec); $i<$count; $i++){?>
	<tr>
		<td style="width:50%;"><?=$yesrec[$i]['date']?></td>
        <td style="width:50%;"><?=$yesrec[$i]['soluot']?></td>
	</tr>
	<?php	}?>
</table>
<div class="paging"><?=$paging['paging']?></div>