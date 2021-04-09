<?php
include '../config/koneksi.php';
$fileName = "Balance_sheet-(" . date('dmY') . ").xls";
$tglT = $_POST['dateT'];
$tglF = $_POST['dateF'];
header("Content-Disposition: attachment; filename=$fileName");
header("Content-Type: application/vnd.ms-excel");
$begin = new DateTime($tglF);
$end = new DateTime($tglT);
$end = $end->modify('+1 day');

$interval = new DateInterval('P1D');
$daterange = new DatePeriod($begin, $interval, $end);
foreach ($daterange as $date) {
	$colspans[] = $date;
	$cols = count($colspans);
}
?>
<table border="0px">
	<tr border="0px">
		<th style="text-align: center;">BALANCE SHEET</th>
	</tr>

</table>

<table border="1px">
	<tr>
		<th rowspan="2">Item Name</th>
		<th rowspan="2">Status</th>
		<th colspan="<?php echo $cols; ?>" style="text-align: center;">Tanggal</th>
	</tr>
	<tr>

		<?php
		foreach ($daterange as $date) {

			$tangs = $date->format("Y-m-d");


			// if(mysqli_num_rows($sql)>1){	}
		?>


			<th><?php echo $date->format("d"); ?></th>

		<?php

		}
		$result = mysqli_query($koneksi, "SELECT 
		t1.itm_cd,
		item.item_nm,
		'Balance' Stock,
		(cur_stock+incoming_qty)-request_qty QTY
		FROM 	
		(SELECT MAX(grgi_no) grgi_no, itm_cd FROM grgi_history GROUP BY itm_cd) t1,
		grgi_history grgi
		,item
		WHERE
		t1.grgi_no=grgi.grgi_no
		AND t1.itm_cd=item.item_cd
		UNION ALL
		SELECT 
		itm_cd,
		item.item_nm,
		'GR' Stock,
		SUM(incoming_qty) QTY
		FROM grgi_history,
		item
		WHERE grgi_history.itm_cd=item.item_cd
		GROUP BY
		itm_cd,
		item.item_nm
		UNION ALL
		SELECT 
		itm_cd,
		item.item_nm,
		'GI' Stock,
		SUM(request_qty) QTY
		FROM grgi_history,
		item
		WHERE grgi_history.itm_cd=item.item_cd
		GROUP BY
		itm_cd,
		item.item_nm
		ORDER BY 
		ITM_CD,STOCK");

		?>
	</tr>

	<?php while ($r = mysqli_fetch_array($result)) {
		echo "<tr><td>" . $r['item_nm'] . "</td>
	<td>" . $r['Stock'] . "</td>";

		$stock = $r['Stock'];
		$itm = $r['itm_cd'];
		$begin = new DateTime($tglF);
		$end = new DateTime($tglT);
		$end = $end->modify('+1 day');
		$interval = new DateInterval('P1D');
		$daterange = new DatePeriod($begin, $interval, $end);
		foreach ($daterange as $date) {
			$tangs = $date->format("Y-m-d");

			$qty = mysqli_query($koneksi, "SELECT * FROM
			(SELECT 
			t1.itm_cd,
			item.item_nm,
			'Balance' Stock,
			(cur_stock+incoming_qty)-request_qty QTY
			FROM 	
			(SELECT MAX(grgi_no) grgi_no, itm_cd FROM grgi_history GROUP BY itm_cd) t1,
			grgi_history grgi
			,item
			WHERE
			t1.grgi_no=grgi.grgi_no
			AND t1.itm_cd=item.item_cd
			AND DATE='$tangs'
			UNION ALL
			SELECT 
			itm_cd,
			item.item_nm,
			'GR' Stock,
			SUM(incoming_qty) QTY
			FROM grgi_history,
			item
			WHERE grgi_history.itm_cd=item.item_cd
			AND DATE='$tangs'
			GROUP BY
			itm_cd,
			item.item_nm
			UNION ALL
			SELECT 
			itm_cd,
			item.item_nm,
			'GI' Stock,
			SUM(request_qty) QTY
			FROM grgi_history,
			item
			WHERE grgi_history.itm_cd=item.item_cd
			AND DATE='$tangs'
			GROUP BY
			itm_cd,
			item.item_nm
			ORDER BY 
			ITM_CD,STOCK)t1
			WHERE 
			t1.itm_cd='$itm'
			AND t1.Stock='$stock'
			UNION ALL
			SELECT 
			'' item_cd,
			'' item_nm,
			'' Stock,
			'0' QTY
			FROM DUAL
			WHERE NOT EXISTS(
			SELECT * FROM
			(SELECT 
			t1.itm_cd,
			item.item_nm,
			'Balance' Stock,
			(cur_stock+incoming_qty)-request_qty QTY
			FROM 	
			(SELECT MAX(grgi_no) grgi_no, itm_cd FROM grgi_history GROUP BY itm_cd) t1,
			grgi_history grgi
			,item
			WHERE
			t1.grgi_no=grgi.grgi_no
			AND t1.itm_cd=item.item_cd
			AND DATE='$tangs'
			UNION ALL
			SELECT 
			itm_cd,
			item.item_nm,
			'GR' Stock,
			SUM(incoming_qty) QTY
			FROM grgi_history,
			item
			WHERE grgi_history.itm_cd=item.item_cd
			AND DATE='$tangs'
			GROUP BY
			itm_cd,
			item.item_nm
			UNION ALL
			SELECT 
			itm_cd,
			item.item_nm,
			'GI' Stock,
			SUM(request_qty) QTY
			FROM grgi_history,
			item
			WHERE grgi_history.itm_cd=item.item_cd
			AND DATE='$tangs'
			GROUP BY
			itm_cd,
			item.item_nm
			ORDER BY 
			ITM_CD,STOCK)t1
			WHERE 
			t1.itm_cd='$itm'
			AND t1.Stock='$stock'
			)
			");
			while ($datas = mysqli_fetch_array($qty)) {
				echo "<td>" . $datas['QTY'] . "</th>";
			}
		}
	} ?>

</table>