<style>

.table-cell {
	border-radius: 25px;
	background: #000;
	color: #fff;
}

/* The snackbar - position it at the bottom and in the middle of the screen */
#snackbar {
  visibility: hidden; /* Hidden by default. Visible on click */
  min-width: 250px; /* Set a default minimum width */
  margin-left: -125px; /* Divide value of min-width by 2 */
  background-color: #333; /* Black background color */
  color: #fff; /* White text color */
  text-align: center; /* Centered text */
  border-radius: 2px; /* Rounded borders */
  padding: 16px; /* Padding */
  position: fixed; /* Sit on top of the screen */
  z-index: 1; /* Add a z-index if needed */
  left: 50%; /* Center the snackbar */
  bottom: 30px; /* 30px from the bottom */
}

/* Show the snackbar when clicking on a button (class added with JavaScript) */
#snackbar.show {
  visibility: visible; /* Show the snackbar */
  /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
  However, delay the fade out process for 2.5 seconds */
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

/* Animations to fade the snackbar in and out */
@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
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
		?>

<div class="container table-responsive py-5"> 
<table class="table table-bordered table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Snippet</th>
      <th scope="col">Code</th>
      <th scope="col">Place</th>
    </tr>
  </thead>
  <tbody>
  <?php

  foreach( $snippet_data_array as $innerarray ) {
			echo '<tr>';
			if( is_array( $innerarray ) ) {
				foreach ( $innerarray as $nestedinnerarray ) {
					if( is_array( $nestedinnerarray ) ) {
						$i = 0;
						foreach( $nestedinnerarray as $data ) {
							if( $i == 1 ) {
							echo '<td class="table-cell-data"><span class="snippet-span"><pre>'. esc_attr( $data ) . '</pre></span><span class="snippet-span"><button class="table-cell">copy</button></span></td>';
							} else {
								echo '<td><pre>'. esc_attr( $data ) . '</pre></td>';
							}
							$i++;
						}
					}
				}
			} else {
				echo '<td>'. esc_attr( $data ) . '</td>';
			}
			echo '</tr>';
		}

  ?>
  </tbody>
</table>
<div id="snackbar">Snippet copied..</div>
</div>

