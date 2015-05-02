<html>
<head>
<title><?php echo t('Search');
if ($query) print ' '.htmlspecialchars($query);?></title>

<script src="js/vendor/modernizr.js"></script>
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/foundation.css">

<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script src="js/foundation/foundation.topbar.js"></script>

<script type="text/javascript" src="jquery/jquery.autocomplete.js"></script>
<script type="text/javascript" src="autocomplete.js"></script>

<!--addedd-->
<script src="/lib/jquery-1.7.2.js" type="text/javascript"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>

<link rel="STYLESHEET" href="css/style.css" type="text/css" />
</head>
<body>
<?php 

if ( file_exists("templates/custom/view.index.topbar.php") ) {
	include "templates/custom/view.index.topbar.php";
} else {
	include "templates/view.index.topbar.php";
}
?>

<div class="row">  

	<div id="searchform-wrapper" class="small-12 medium-8 large-9 columns">
		<?php
		/*
		 * SearchForm
		*/
		?>

	
		<form id="searchform" accept-charset="utf-8" method="get">

		<div class="small-12 medium-2 large-2 columns">
			<img id="logo" src="images/search.png" alt="<?php echo t('Search'); ?>">
		</div>
	
		<div id="search-field" class="small-12 medium-8 large-8 columns">
			<input id="q" name="q" type="text" value="<?php echo htmlspecialchars($query, ENT_QUOTES, 'utf-8'); ?>" />
		</div>
		
		<div id="search-button" class="small-12 medium-2 large-2 columns">
					
			<input id="submit" type="submit" class="button postfix" value="<?php echo t("Search"); ?>" onclick="waiting_on()" />
		</div>
	
		</form>		

			
	</div>


</div>


<div class="row">

<div id="main" class="small-12 medium-8 large-9 columns">
	
	<?php 
	
	// if no results, show message
	if ($total == 0) {
		?>
	<div id="noresults" class="panel">


		<?php
		if ($error) {
			print '<p>Error: </p><p>' . $error . '</p>';
		} else {
			// Todo: Vorschlag: (in allen Bereichen, Ähnliches)
			print t('No results');
		}
		?>
	</div>

	<?php
	} // total == 0
	else { // there are results documents
		
		if ($error) {
			print '<p>Error:</p><p>' . $error . '</p>';
		}
		// print the results with selected view template
		if ($view == 'list') {
			
			//include 'templates/select_sort.php';
			
			//include 'templates/pagination.php';						
			include 'templates/view.list.php';
			//include 'templates/pagination.php';


		}


	} // if total <> 0: there were documents
	?>

	</div><?php // main ?>

	
	
</div>
	
	<?php // Wait indicator - will be activated on click = next search (which can take a while and additional clicks would make it worse) ?>
	<div id="wait">
		<img src="images/ajax-loader.gif">
		<p><?php echo t('wait'); ?></p>
	</div>

	<script type="text/javascript">

	/*
	* init foundation responsive framework
	*/
    $(document).foundation();

    </script>
    

	<script type="text/javascript">
	
  /*
   * display wait-indicator
   */
  function waiting_on() {
    document.getElementById('wait').style.visibility = "visible";
    return true;
  }
</script>

</body>
</html>
