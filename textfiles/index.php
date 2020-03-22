<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Turning the Hymns into JSON</title>

</head>
<body>
  
		<?php
		
		$hymn = Array();
		
		$tylerArray = [];
		
		for($i = 1; $i < 600; $i++){
			$tylerArray[] = 'elh'.str_pad($i, 3, '0', STR_PAD_LEFT).'.txt';
		}
		
		$files = Array('elh001.txt', 'elh002.txt', 'elh003a.txt', 'elh004.txt', 'elh005.txt', 'elh006.txt', 'elh007.txt', 'elh008.txt', 'elh009.txt', 'elh010.txt', 'elh011.txt', 'elh012.txt', 'elh013.txt', 'elh014.txt', 'elh015.txt', 'elh016.txt', 'elh017.txt', 'elh018.txt', 'elh019.txt', 'elh020.txt', 'elh021.txt', 'elh022.txt', 'elh023.txt', 'elh024.txt', 'elh025.txt', 'elh026.txt', 'elh027.txt', 'elh028.txt', 'elh029.txt', 'elh030.txt', 'elh031.txt', 'elh032.txt', 'elh033.txt', 'elh034.txt', 'elh035.txt', 'elh036.txt', 'elh037.txt', 'elh038.txt', 'elh039.txt', 'elh040.txt', 'elh041.txt', 'elh042.txt', 'elh043.txt', 'elh044.txt', 'elh045.txt', 'elh046.txt', 'elh047.txt', 'elh048.txt', 'elh049.txt', 'elh050.txt', 'elh051.txt', 'elh052.txt', 'elh053.txt', 'elh054.txt', 'elh055.txt', 'elh056.txt', 'elh057.txt', 'elh058.txt', 'elh059.txt', 'elh060.txt', 'elh061.txt', 'elh062.txt', 'elh063.txt', 'elh064.txt', 'elh065.txt', 'elh066.txt', 'elh067.txt', 'elh068.txt', 'elh069.txt', 'elh070.txt', 'elh071.txt', 'elh072.txt', 'elh073.txt', 'elh074.txt', 'elh075.txt', 'elh076.txt', 'elh077.txt', 'elh078.txt', 'elh079.txt', 'elh080.txt', 'elh081.txt', 'elh082.txt', 'elh083.txt', 'elh084.txt', 'elh085.txt', 'elh086.txt', 'elh087.txt', 'elh088.txt', 'elh089.txt', 'elh090.txt', 'elh091.txt', 'elh092.txt', 'elh093.txt', 'elh094.txt', 'elh095.txt', 'elh096.txt', 'elh097.txt', 'elh098.txt', 'elh099.txt', 'elh100.txt', 'elh101.txt', 'elh102.txt', 'elh103.txt', 'elh104.txt', 'elh105.txt', 'elh106.txt', 'elh107.txt', 'elh108.txt', 'elh109.txt', 'elh110.txt', 'elh111.txt', 'elh112a.txt', 'elh113.txt', 'elh114.txt', 'elh115.txt', 'elh116.txt', 'elh117.txt', 'elh118.txt', 'elh119.txt', 'elh120.txt', 'elh121.txt', 'elh122.txt', 'elh123.txt', 'elh124.txt', 'elh125.txt', 'elh126.txt', 'elh127.txt', 'elh128.txt', 'elh129.txt', 'elh130.txt', 'elh131.txt', 'elh132.txt', 'elh133.txt', 'elh134.txt', 'elh135.txt', 'elh136.txt', 'elh137.txt', 'elh138.txt', 'elh139.txt', 'elh140.txt', 'elh141.txt', 'elh142.txt', 'elh143.txt', 'elh144.txt', 'elh145.txt', 'elh146.txt', 'elh147.txt', 'elh148.txt', 'elh149.txt', 'elh150.txt', 'elh151.txt', 'elh152.txt', 'elh153.txt', 'elh154.txt', 'elh155.txt', 'elh156.txt', 'elh157.txt', 'elh158.txt', 'elh159.txt', 'elh160.txt', 'elh161.txt', 'elh162.txt', 'elh163.txt', 'elh164.txt', 'elh165.txt', 'elh166.txt', 'elh167.txt', 'elh168.txt', 'elh169.txt', 'elh170.txt', 'elh171.txt', 'elh172.txt', 'elh173.txt', 'elh174.txt', 'elh175.txt', 'elh176.txt', 'elh177.txt', 'elh178.txt', 'elh179.txt', 'elh180.txt', 'elh181.txt', 'elh182.txt', 'elh183.txt', 'elh184.txt', 'elh185.txt', 'elh186.txt', 'elh187.txt', 'elh188.txt', 'elh189.txt', 'elh190.txt', 'elh191.txt', 'elh192.txt', 'elh193.txt', 'elh194.txt', 'elh195.txt', 'elh196.txt', 'elh197.txt', 'elh198.txt', 'elh199.txt', 'elh200.txt', 'elh201.txt', 'elh202.txt', 'elh203.txt', 'elh204.txt', 'elh205.txt', 'elh206.txt', 'elh207.txt', 'elh208.txt', 'elh209.txt', 'elh210.txt', 'elh211.txt', 'elh212.txt', 'elh213.txt', 'elh214.txt', 'elh215.txt', 'elh216.txt', 'elh217.txt', 'elh218.txt', 'elh219.txt', 'elh220.txt', 'elh221.txt', 'elh222.txt', 'elh223.txt', 'elh224.txt', 'elh225.txt', 'elh226.txt', 'elh227.txt', 'elh228.txt', 'elh229.txt', 'elh230.txt', 'elh231.txt', 'elh232.txt', 'elh233.txt', 'elh234.txt', 'elh235.txt', 'elh236.txt', 'elh237.txt', 'elh238.txt', 'elh239a.txt', 'elh240.txt', 'elh241.txt', 'elh242.txt', 'elh243.txt', 'elh244.txt', 'elh245.txt', 'elh246.txt', 'elh247.txt', 'elh248.txt', 'elh249.txt', 'elh250.txt', 'elh251.txt', 'elh252.txt', 'elh253.txt', 'elh254.txt', 'elh255.txt', 'elh256.txt', 'elh257.txt', 'elh258.txt', 'elh259.txt', 'elh260.txt', 'elh261.txt', 'elh262.txt', 'elh263.txt', 'elh264.txt', 'elh265.txt', 'elh266.txt', 'elh267.txt', 'elh268.txt', 'elh269.txt', 'elh270.txt', 'elh271.txt', 'elh272.txt', 'elh273.txt', 'elh274.txt', 'elh275.txt', 'elh276.txt', 'elh277.txt', 'elh278.txt', 'elh279.txt', 'elh280.txt', 'elh281.txt', 'elh282.txt', 'elh283.txt', 'elh284.txt', 'elh285.txt', 'elh286.txt', 'elh287.txt', 'elh288.txt', 'elh289.txt', 'elh290.txt', 'elh291.txt', 'elh292.txt', 'elh293.txt', 'elh294.txt', 'elh295.txt', 'elh296.txt', 'elh297.txt', 'elh298.txt', 'elh299.txt', 'elh300.txt', 'elh301.txt', 'elh302.txt', 'elh303.txt', 'elh304.txt', 'elh305.txt', 'elh306.txt', 'elh307.txt', 'elh308.txt', 'elh309.txt', 'elh310.txt', 'elh311.txt', 'elh312.txt', 'elh313.txt', 'elh314.txt', 'elh315.txt', 'elh316.txt', 'elh317.txt', 'elh318.txt', 'elh319.txt', 'elh320.txt', 'elh321.txt', 'elh322.txt', 'elh323.txt', 'elh324.txt', 'elh325.txt', 'elh326.txt', 'elh327.txt', 'elh328.txt', 'elh329.txt', 'elh330.txt', 'elh331.txt', 'elh332.txt', 'elh333.txt', 'elh334.txt', 'elh335.txt', 'elh336.txt', 'elh337.txt', 'elh338.txt', 'elh339.txt', 'elh340.txt', 'elh341.txt', 'elh342.txt', 'elh343.txt', 'elh344.txt', 'elh345.txt', 'elh346.txt', 'elh347.txt', 'elh348.txt', 'elh349.txt', 'elh350.txt', 'elh351.txt', 'elh352.txt', 'elh353.txt', 'elh354.txt', 'elh355.txt', 'elh356.txt', 'elh357.txt', 'elh358.txt', 'elh359.txt', 'elh360.txt', 'elh361.txt', 'elh362.txt', 'elh363.txt', 'elh364.txt', 'elh365.txt', 'elh366.txt', 'elh367.txt', 'elh368.txt', 'elh369.txt', 'elh370.txt', 'elh371.txt', 'elh372.txt', 'elh373.txt', 'elh374.txt', 'elh375.txt', 'elh376.txt', 'elh377.txt', 'elh378.txt', 'elh379.txt', 'elh380.txt', 'elh381.txt', 'elh382.txt', 'elh383.txt', 'elh384.txt', 'elh385.txt', 'elh386.txt', 'elh387.txt', 'elh388.txt', 'elh389.txt', 'elh390.txt', 'elh391.txt', 'elh392.txt', 'elh393.txt', 'elh394.txt', 'elh395.txt', 'elh396.txt', 'elh397.txt', 'elh399.txt', 'elh400.txt', 'elh401.txt', 'elh402.txt', 'elh403.txt', 'elh404.txt', 'elh405.txt', 'elh406.txt', 'elh407.txt', 'elh408.txt', 'elh409.txt', 'elh410.txt', 'elh411.txt', 'elh412.txt', 'elh413.txt', 'elh414.txt', 'elh415.txt', 'elh416.txt', 'elh417.txt', 'elh418.txt', 'elh419.txt', 'elh420.txt', 'elh421.txt', 'elh422.txt', 'elh423.txt', 'elh424.txt', 'elh425.txt', 'elh426.txt', 'elh427.txt', 'elh428.txt', 'elh429.txt', 'elh430.txt', 'elh431.txt', 'elh432.txt', 'elh433.txt', 'elh434.txt', 'elh435.txt', 'elh436.txt', 'elh437.txt', 'elh438.txt', 'elh439.txt', 'elh440.txt', 'elh441.txt', 'elh442.txt', 'elh443.txt', 'elh444.txt', 'elh445.txt', 'elh446.txt', 'elh447.txt', 'elh448.txt', 'elh449.txt', 'elh450.txt', 'elh451.txt', 'elh452.txt', 'elh453.txt', 'elh454.txt', 'elh455.txt', 'elh456.txt', 'elh457.txt', 'elh458.txt', 'elh459.txt', 'elh460.txt', 'elh461.txt', 'elh462.txt', 'elh463.txt', 'elh464.txt', 'elh465.txt', 'elh466.txt', 'elh467.txt', 'elh468.txt', 'elh469.txt', 'elh470.txt', 'elh471a.txt', 'elh472.txt', 'elh473.txt', 'elh474.txt', 'elh475.txt', 'elh476.txt', 'elh477.txt', 'elh478.txt', 'elh479.txt', 'elh480.txt', 'elh481.txt', 'elh482.txt', 'elh483.txt', 'elh484.txt', 'elh485.txt', 'elh486.txt', 'elh487.txt', 'elh488.txt', 'elh489.txt', 'elh490.txt', 'elh491.txt', 'elh492.txt', 'elh493.txt', 'elh494.txt', 'elh495.txt', 'elh496.txt', 'elh497.txt', 'elh498.txt', 'elh499.txt', 'elh500.txt', 'elh501.txt', 'elh502.txt', 'elh503.txt', 'elh504.txt', 'elh505.txt', 'elh506.txt', 'elh507.txt', 'elh508.txt', 'elh509.txt', 'elh510.txt', 'elh511.txt', 'elh512.txt', 'elh513.txt', 'elh514.txt', 'elh515.txt', 'elh516.txt', 'elh517.txt', 'elh518.txt', 'elh519.txt', 'elh520.txt', 'elh521.txt', 'elh522.txt', 'elh523.txt', 'elh524.txt', 'elh525.txt', 'elh526.txt', 'elh527.txt', 'elh528.txt', 'elh529.txt', 'elh530.txt', 'elh531.txt', 'elh532.txt', 'elh533.txt', 'elh534.txt', 'elh535.txt', 'elh536.txt', 'elh537.txt', 'elh538.txt', 'elh539.txt', 'elh540.txt', 'elh541.txt', 'elh542.txt', 'elh543.txt', 'elh544.txt', 'elh545.txt', 'elh546.txt', 'elh547.txt', 'elh548.txt', 'elh549.txt', 'elh550a.txt', 'elh550b.txt', 'elh551.txt', 'elh552.txt', 'elh553.txt', 'elh554.txt', 'elh555.txt', 'elh556.txt', 'elh557.txt', 'elh558.txt', 'elh559.txt', 'elh560.txt', 'elh561.txt', 'elh562.txt', 'elh563.txt', 'elh564.txt', 'elh565.txt', 'elh566.txt', 'elh567.txt', 'elh568.txt', 'elh569.txt', 'elh570.txt', 'elh571.txt', 'elh572.txt', 'elh573.txt', 'elh574.txt', 'elh575.txt', 'elh576.txt', 'elh577.txt', 'elh578.txt', 'elh579.txt', 'elh580.txt', 'elh581.txt', 'elh582.txt', 'elh583.txt', 'elh584.txt', 'elh585.txt', 'elh586.txt', 'elh587.txt', 'elh588.txt', 'elh589.txt', 'elh590.txt', 'elh591.txt', 'elh592.txt', 'elh593.txt', 'elh594.txt', 'elh595.txt', 'elh596.txt', 'elh597.txt', 'elh598.txt', 'elh599.txt', 'elh600.txt', 'elh601.txt', 'elh602.txt');
			
		foreach($files as $file){
			
			$txt_file    = file_get_contents($file);
			$rows        = explode("\n", $txt_file);
		
			//Extract the Hymn number from line 0
			$lineZero = $rows[0];
			preg_match_all('!\d+!', $lineZero, $matches);
			$hymnNumber = $matches[0][0];
		
			//extract the hymn title from line 1
			$hymnTitle = substr($lineZero, strpos($lineZero, '-') + 2);		
			$hymn['hymns'][$hymnNumber]['title'] = $hymnTitle;

			//reset the verse numbering
			$verseNumber = 0;
		
			foreach($rows as $row => $data)
			{
				//trim the white space from beginning of line
				$data = ltrim($data);
			
				//skip the first 4 rows
				if($row > 3){
				
					//look for a closing square bracket
					$pos1 = strpos($data, ']');
				
					if($pos1 === false){
						// if this bracket does not exist, then it is either
						// A) not the first line of a verse
						// B) Nothing
						// C) The composer information
					
						$pos3 = strpos($data, 'Composers & Copyrights');
						if($pos3 === false){
							//if we're currently in a verse (ie, $verseNumber != 0) then we should add the line to the array.
							if($verseNumber > 0){
								if(!empty($data)){
								 $hymn['hymns'][$hymnNumber]['text'][$verseNumber][] = $data;
								}
							}
						} else {
							break;
						}
					
					} else {
						// if this bracket does exist, then it is either
						// A) the first line of a verse
						// B) the first line of a refrain
					
						//if this is the first line of a verse
						// A) Find the verse number
						// B) Add the line, without the verse number to the array
					
						//if this is the first line of a refrain
						// A) Add the whole line
					
						$pos2 = strpos($data, 'Refrain');
					
						if($pos2 === false){
							preg_match_all('!\d+!', $data, $matches);
							$verseNumber = implode('', $matches[0]);
							$hymn['hymns'][$hymnNumber]['text'][$verseNumber] = Array(substr($data, $pos1 + 2 ));
						} else {
							$hymn['hymns'][$hymnNumber]['text'][$verseNumber][] = substr($data, 0);
						}
					
					}
				
				}
			}
			
		}	
		

		//print_r($hymn);
		//echo json_encode($hymn);
		
		file_put_contents("hymns.json", json_encode($hymn))
		?>
		
</body>
</html>
