<script type="text/javascript">
	var example = 'line-basic', 
	theme = 'default';

	(function($){ // encapsulate jQuery
		
	var outputs = [], i;
	<?php
		foreach ($results->response->docs as $doc) {
			$first = true;	
			// Print all configurated facets, but the field of result, not the facet of all results
			foreach ($cfg['facets'] as $field => $facet_config) {			
				if ($field != 'text' and $field !='author_s') {
					if ( isset( $doc->$field ) ) {
					?>
						outputs.push( "<?php echo $doc->$field; ?>");
					<?php
						}
					}		
				}

			  } // foreach doc
	?>
	var curYear = new Date().getFullYear();
	var diff = curYear - 1998;
	
	var values = Array.apply(null, new Array(diff)).map(Number.prototype.valueOf,0);
	for(i=0; i<outputs.length; i++){
		var year = parseInt(outputs[i].split('-')[0]);		
		values[year-1999]++;
	}
	
	var years = [];
	
	for(i=0; i<=diff; i++)
		years[i]=1999+i;
		
		$(function () {
		$('#container').highcharts({
			title: {
				text: 'Speeches per year',
				x: -20 //center
			},
			xAxis: {
				categories: years
			},
			yAxis: {
				title: {
					text: 'Counts'
				},
				plotLines: [{
					value: 0,
					width: 1,
					color: '#808080'
				}],
				min : 0,
				minTickInterval: 1
			},
			series: [{
				showInLegend: false,
				name: "Count",
				data: values
			}]
		});
	});
	})(jQuery);
	
</script>
		
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
