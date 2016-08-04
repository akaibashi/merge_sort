 <?php

$arr = array(19,5,3,4,2,1,10,12);
//$arr = array(3,1,5,11,12,3,9);

var_dump($arr);

mrgRec($arr, 0, count($arr));

function mrgRec(&$arr, $left, $right){

	if($right - $left <= 1){
		return;
	}


	$center = intval($left + ($right - $left) / 2);
/*
	if($left >= $right){
		return;
	}
*/

	// 左側
	mrgRec($arr, $left, $center);
	// 右側
	mrgRec($arr, $center, $right); 

	$l_idx = $left;
	$r_idx = $center;
	$tmp = array();

	// マージ
	while($l_idx < $center && $r_idx < $right){
		if($arr[$l_idx] <= $arr[$r_idx]){
			$tmp[] = $arr[$l_idx];
			$l_idx++;
		}else{
			$tmp[] = $arr[$r_idx];
			$r_idx++;
		}
	}

	// 左側のあまりを追加
	while($l_idx < $center){
		$tmp[] = $arr[$l_idx];
		$l_idx++;
	}

	// 右側のあまりを追加
	while($r_idx < $right){
		$tmp[] = $arr[$r_idx];
		$r_idx++;
	}

	// 配列の入れ替え
	$tmp_idx = 0;
	for($i = $left; $i < $right; $i++){
		$arr[$i] = $tmp[$tmp_idx];
		$tmp_idx++;
	}

}


var_dump($arr);
