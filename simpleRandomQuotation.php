<?php
/*
Plugin Name: Simple Random Quotation
Plugin URI: 
Description: This plugin displays a random quotation upon page load pulled from a simple .csv file.
Version: 0.2
Author: Andrew Muschamp McKay
Author URI: http://www.muschamp.ca
License: GPLv2
*/


function randomQuotationAdmin() 
{   
	$settings = get_option("randomQuotation"); 
	
	// update options 
	if (isset($_POST['updateSettings'])) 
	{ 
		$settings['quotationFilePath'] = strip_tags(stripslashes($_POST['quotationFilePath'])); 
		 
		update_option("randomQuotation",$settings); 
	} 
	
	echo '<p> 
	<label for="quotationFilePath">Quotation File Path: 
	<input id="quotationFilePath" name="quotationFilePath" type="text" class="widefat" value="'.$settings['quotationFilePath'].'" /></label></p>'; 
	echo '<input type="hidden" id="updateSettings" name="updateSettings" value="1" />'; 
}	  


function getQuotationFromFile($fileName) 
{
	// This is based off of code from muskLib.php and mCollection.php
		
	$quotations = array();
	$file = fopen($fileName, 'r');
	
	while (($result = fgetcsv($file)) !== false)
	{
		$quotations[] = $result;
	}
	
	fclose($file);
	
	$randomIndex = rand(0, (count($quotations) - 1));
	
	return $quotations[$randomIndex];
}


function randomQuotation() 
{
	$settings = get_option("randomQuotation"); 
	
	$quotationFilePath = $settings['quotationFilePath'];

	$quotation = getQuotationFromFile($quotationFilePath); 
	print('<h4 id="quoationSource">' . $quotation[0] . ':</h4>');
	print('<blockquote id="randomQuotation">' . $quotation[1] . '</blockquote>');
}

function initializeRandomQuotation()
{
	register_sidebar_widget('Simple Random Quotation', 'randomQuotation');  
	register_widget_control('Simple Random Quotation', 'randomQuotationAdmin');
}

// Now we make it a widget you can choose
add_action("plugins_loaded", "initializeRandomQuotation");
?>