<?php
// Show results as trend chart

?>


<?php 
// Include libs
?>

<script src="d3js/d3.min.js"></script>
<script src="nvd/nv.d3.js"></script>
<link href="nvd/nv.d3.css" rel="stylesheet">




<?php 

// Page

if ($date_label) {
	echo '<h1>' . $date_label . '</h1>';
}
	
	?>

<div id='chart'>
  <svg style='height:500px;'></svg>
</div>
