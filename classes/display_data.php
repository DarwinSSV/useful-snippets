<style>
#snippet-data {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  text-align: center;
}

#snippet-data td, #snippet-data th {
  border: 1px solid #ddd;
  padding: 8px;
}

#snippet-data td {
	max-width:30px;
	overflow: auto;
}

#snippet-data tr:nth-child(even){background-color: #f2f2f2;}

#snippet-data tr:hover {background-color: #ddd;}

#snippet-data th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
  text-align: center;
}

.useful-snippet-container {
	padding: 50px;
}
</style>
<?php

include 'phpexcel-master/Classes/PHPExcel/IOFactory.php';

		$data_file = 'C:\Users\Darwin\Local Sites\practise\app\public\wp-content\plugins\useful-snippets\data\snip.xlsx';

		try {
			$dataFileType = PHPExcel_IOFactory::identify( $data_file );
			$objReader = PHPExcel_IOFactory::createReader( $dataFileType );
			$objPHPExcel = $objReader->load( $data_file );
		} catch(Exception $e) {
			die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
		}

		$sheet = $objPHPExcel->getSheet( 0 );
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();

		$snippet_data_array = array();

		$i = 0;

		for( $row = 2; $row <= $highestRow; $row++ ) {
						
			$snippet_data_array[$i] = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row );
			$i++;
		}

		echo '<table id="snippet-data">';
		echo '<tr class="snippet-data-title"> <th>Snippet</th> <th>Code</th> <th>Place</th> </tr>';

		foreach( $snippet_data_array as $innerarray ) {
			echo '<tr>';
			if( is_array( $innerarray ) ) {
				foreach ( $innerarray as $nestedinnerarray ) {
					if( is_array( $nestedinnerarray ) ) {
						foreach( $nestedinnerarray as $data ) {
							echo '<td><pre>'. $data . '</pre></td>';
						}
					}
				}
			} else {
				echo '<td>'. $data . '</td>';
			}
			echo '<tr>';
		}

		echo '</table>';


