<?php
// translations


// English
$lang['en']['next'] = 'Next';
$lang['en']['prev'] = 'Previous';
$lang['en']['page'] = 'Page';
$lang['en']['page of'] = 'of';

$lang['en']['sort'] = 'Sort:';


$lang['en']['result'] = 'Results';
$lang['en']['result to'] = 'to';
$lang['en']['result of'] = 'of';

$lang['en']['newest_documents'] = 'Newest';
$lang['en']['newest_documents_of'] = 'of';
$lang['en']['newest_documents_of_total'] = 'indexed documents';


$lang['en']['open'] = 'Open';
$lang['en']['years'] = 'Last years';
$lang['en']['meta'] = 'Tagging &amp; annotation';

$lang['en']['meta description'] = 'Add metadata: With tagging or annotation you can add keywords or notes about the document or file so it can be found with this keywords, even if they are not written in the document';

$lang['en']['wait'] = 'Searching ...';

$lang['en']['view trend'] = 'Trend chart';

$lang['en']['file_size'] = 'Filesize';

$lang['en']['content type group'] = 'Content type group';
$lang['en']['content type'] = 'Content type';
$lang['en']['content_ocr'] = "Automatic text recognition (OCR) from image(s):";

// Field labels
$lang['en']['ocr_t'] = "OCR";
$lang['en']['title'] = "Title";
$lang['en']['author_s'] = "Author";
$lang['en']['content_type'] = "Content type";
$lang['en']['file_modified_dt'] = "File modified";
$lang['en']['last_modified'] = "Last modified";
$lang['en']['file_size_i'] = "Size (bytes)";

$lang['en']['Words'] = "Words (count of docs)";

//
// German (de)
//
$lang['de']['Search'] = 'Suche';
$lang['de']['Newest documents'] = 'Neueste Dokumente';

$lang['de']['wait'] = 'Suche ...';
$lang['de']['Help'] = 'Hilfe';
$lang['de']['next'] = 'Nächste';
$lang['de']['prev'] = 'Vorherige';
$lang['de']['page'] = 'Seite';
$lang['de']['page of'] = 'von';
$lang['de']['result'] = 'Ergebnis';
$lang['de']['result of'] = 'von';
$lang['de']['result to'] = 'bis';
$lang['de']['No results'] = 'Keine Treffer.';


$lang['de']['newest_documents'] = 'Neueste'; 
$lang['de']['newest_documents_of'] = 'der insgesamt';
$lang['de']['newest_documents_of_total'] = 'indizierten Dokumente';

$lang['de']['Selected filters'] = 'Gewählte Filter';
$lang['de']['Filter criterias'] = 'Filterkriterien, mit denen die Ergebnisse eingeschränkt werden';
$lang['de']['Remove filter'] = 'Filter aufheben';

$lang['de']['Path'] = 'Aktuelles Dateiverzeichnis';
$lang['de']['All paths'] = 'Alle Dateiverzeichnisse';
$lang['de']['Subpaths'] = 'Unterverzeichnisse';
$lang['de']['Paths'] = 'Dateiverzeichnisse';

// view labels
$lang['de']['Images'] = 'Bilder';
$lang['de']['Table'] = 'Tabelle';
$lang['de']['Word cloud'] = 'Wortwolke';
$lang['de']['Analyze'] = 'Analyse';
// Sort labels

$lang['de']['Relevance'] = 'Relevanz';
$lang['de']['Newest'] = 'Neueste';
$lang['de']['Oldest'] = 'Älteste';

// context menu
$lang['de']['open'] = 'Öffnen';
$lang['de']['Preview'] = 'Vorschau';
$lang['de']['meta'] = 'Taggen &amp; Annotieren';
$lang['de']['meta description'] = 'Metadaten hinzufügen: Bewerten, Taggen oder Annotieren bzw. Notizen anheften und damit auch über zusätzliche Informationen auffindbar machen, die so im Dokument nicht wörtlich enthalten sind';


// facet labels
$lang['de']['Author'] = 'AutorIn';
$lang['de']['content type group'] = 'Formen';
$lang['de']['content type'] = 'Dateiformate';


$lang['de']['content_ocr'] = "Automatisch erkannter Text (OCR) aus Grafikdatei(en):";

$lang['de']['file_size'] = 'Dateigrösse';

$lang['de']['Words'] = "Wörter (Dokumente)";



// imitate drupal style translate function, so we can one day use the other code as a drupal module
function t($string) {
	global $cfg;
	global $lang;


	if (isset( $lang[ $cfg['language'] ] [$string] ) ) {
		$result = $lang[ $cfg['language'] ] [$string];
	}
	elseif (isset( $lang[ 'en' ] [$string] ) ) {
		$result = $lang[ 'en' ] [$string];
	}
	else {
		$result = $string;
	}

	return $result;
}

?>