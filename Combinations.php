<?php

$arr = array("A", "B", "C"); // Array Values

function getUniqueCombinations($array)
{
	$num = count($array);
	$total = pow(2, $num);
	for ($i = 1; $i < $total; $i++) {
		$arr_result = [];
		for ($j = 0; $j < $num; $j++) {
			if (pow(2, $j) & $i) {
				$arr_result[$j] = $array[$j];
			}
		}
		yield $arr_result;
	}
}

$result = array_filter(
	iterator_to_array(getUniqueCombinations($arr)),
	function ($res) {
		return count($res) == 2;
	}
);

$final_result = array_values($result);

echo "<pre>";
print_r($final_result);
