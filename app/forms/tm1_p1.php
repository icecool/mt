<?php
$sinfho=array(
'101'=>'Синфи тайерӣ',
'102'=>'Синфи 1',
'103'=>'Синфи 2',
'104'=>'Синфи 3',
'105'=>'Синфи 4',
'106'=>'Синфи 5',
'107'=>'Синфи 6',
'108'=>'Синфи 7',
'109'=>'Синфи 8',
'110'=>'Синфи 9',
'111'=>'Синфи 10',
'112'=>'Синфи 11',
'113'=>'Синфи 12',
'114'=>'<strong>Ҳамагӣ</strong>',
	);
$result.='<form action="./?c=frm&act=save&frm=tm1_p1" method="post">
<h3>Шакли TM-1 (1)</h3><br>
<h4>I. Тақcимоти синфҳои таълимӣ ва хонандагон аз рӯи забони таълим</h4>

<table class="table table-bordered table-hover" style="width:auto;">
<thead>
<tr>
<th rowspan="3" class="text-center">№<br> сатр</th>
<th rowspan="3" class="text-center">Номгӯи синфҳо</th>
<th colspan="12" class="text-center">ЗАБОНҲОИ ТАЪЛИМӢ</th>
</tr>
<tr>
<th colspan="3" class="text-center">( забони таълим )</th>
<th colspan="3" class="text-center">( забони таълим )</th>
<th colspan="3" class="text-center">( забони таълим )</th>
<th colspan="3" class="text-center">Ҳамагӣ</th>
</tr>
<tr>

<th>Миқдори синфҳо</th>
<th>Шумораи хонандагон</th>
<th>Аз онҳо духтарон</th>

<th>Миқдори синфҳо</th>
<th>Шумораи хонандагон</th>
<th>Аз онҳо духтарон</th>

<th>Миқдори синфҳо</th>
<th>Шумораи хонандагон</th>
<th>Аз онҳо духтарон</th>

<th>Миқдори синфҳо</th>
<th>Шумораи хонандагон</th>
<th>Аз онҳо духтарон</th>

</tr>
</thead>
<tbody>
<tr style="font-weight:bold;text-align:center;">
<td>A</td><td>B</td>
<td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td>
<td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td>
</tr>
';

foreach ($sinfho as $satr => $sinf) {
	$result.='<tr><td>'.$satr.'</td><td>'.$sinf.'</td>';
	for ($i=0; $i < 12; $i++) { 
		$result.='<td></td>';
	}
	$result.='</tr>
';
}

$result.='
</tbody>
</table>

<div class="form-group row">
    <div class="col-sm-12 text-center">
        <button type="submit" class="btn btn-primary">'.\CORE::t('save','Save').'</button>
    </div>
</div>

</form>
';