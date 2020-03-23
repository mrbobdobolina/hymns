/**
 * Prints a log message to the console only if it meets the logging threshold.
 *
 * @param {int} $level Level of severety of the message. (See below for values).
 * @param {int} $msg   The message to print to the console.
 */
const LOG_ABOUT = 0;
const LOG_FATAL = 1;
const LOG_ERROR = 2;
const LOG_WARN = 3;
const LOG_INFO = 4;
const LOG_DEBUG_LOW = 5;
const LOG_DEBUG_MED = 6;
const LOG_DEBUG_HIGH = 7;
function log($level, $msg){
	if($level <= LOG_WARN){ // Set the logging level here

		switch($level){
			case LOG_ABOUT:	     $lvl_txt = 'ABOUT'; break;
			case LOG_FATAL:      $lvl_txt = 'FATAL'; break;
			case LOG_ERROR:      $lvl_txt = 'ERROR'; break;
			case LOG_WARN:       $lvl_txt = 'WARN';  break;
			case LOG_INFO:       $lvl_txt = 'INFO';  break;
			case LOG_DEBUG_LOW:  $lvl_txt = 'DEBUG'; break;
			case LOG_DEBUG_MED:	 $lvl_txt = 'DEBUG'; break;
			case LOG_DEBUG_HIGH: $lvl_txt = 'DEBUG'; break;
		}

		console.log('HymnViewer v0.8 [' + $lvl_txt + ']: ' + $msg)

		return $msg;
	}
	return '';
}

/**
 * Initializes HymnViewer.
 *
 * Runs on page load.
 */
log(LOG_ABOUT, 'Hymn Verse Display Thingy 7000');
log(LOG_ABOUT, 'by Chill Phil Wels and TV\'s Tyler Voigt');
$(function(){
	getHymnsJSON('hymns.json');

	$defaultFontSize = parseInt($('#hymntext').css('font-size'));
});

/**
 * Binds the arrow keys to change the verse.
 *
 * Also has an easter egg that's been obfuscated. Can you figure it out?
 */
var $secret = [66, 69, 83, 84];
var $secret_pos = 0;
$(document).keydown(function(e) {

	log(LOG_DEBUG_HIGH, '$(document).keydown() Keycode:' + e.which);

	// Tie the arrow keys to the verse number
	switch (e.which) {
		case 37: // Left
			log(LOG_DEBUG_MED, '$(document).keydown() Key Press: Left');
			changeVerseNoBy(-1);
			e.preventDefault();
			break;
		case 38: // Up
			log(LOG_DEBUG_MED, '$(document).keydown() Key Press: Up');
			changeVerseNoBy(-1);
			e.preventDefault();
			break;
		case 39: // Right
			log(LOG_DEBUG_MED, '$(document).keydown() Key Press: Down');
			changeVerseNoBy(1);
			e.preventDefault();
			break;
		case 40: // Down
			log(LOG_DEBUG_MED, '$(document).keydown() Key Press: Down');
			changeVerseNoBy(1);
			e.preventDefault();
			break;
	}

	// Easter Egg
	eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('6(e.9==$5[$2]){$2++;6($2>=$5.c){d(f,\'a 7 b! a 7 b k! j!\');i(h*4+g+3)}}8{6(e.9==$5[0]){$2=1}8{$2=0}}',21,21,'||secret_pos|||secret|if|IS|else|which|HE|RISEN|length|log||LOG_WARN|10|75|changeHymnNoTo|ALLELUIA|INDEED'.split('|'),0,{}))
});

/**
 * Grabs and parses the hymns JSON file.
 *
 * @param {string} $url The address of the JSON file.
 */
var $hymns;
function getHymnsJSON($url){
	log(LOG_DEBUG_MED, 'Function Called: getHymnsJSON(' + $url + ')');

	$.ajax({
		url: $url,
		dataType: "json",
		mimeType: "application/json",
		success: function($json){
			if('hymns' in $json){
				$hymns = $json['hymns'];
				refreshScreen();
			}
			else {
				log(LOG_FATAL, 'JSON file contains errors.');
			}
		},
		error: function($jqXHR, $status, $error){
			log(LOG_FATAL, 'Could not retreive Hymn JSON file. Reason: ' + $jqXHR['status'] + ' ' + $error);
		}
	});
}


/**
 * Check if a hymn number is a valid hymn.
 *
 * @param {int} $hymn_no The hymn number to check.
 *
 * @return {bool} Hymn number validity.
 */
function isValidHymnNo($hymn_no){
	log(LOG_DEBUG_MED, 'Function Called: isValidHymnNo(' + $hymn_no + ')');

	// Check if it is a number
	if(!isNaN($hymn_no)){
		// Check if it exists in the JSON file
		if($hymn_no.toString() in $hymns){
			return true;
		}
		else {
			log(LOG_DEBUG_LOW, 'Hymn No "' + $hymn_no + '" is not in the JSON file.');
		}
	}
	else {
		log(LOG_DEBUG_LOW, 'Hymn No "' + $hymn_no + '" is not a number.');
	}
	return false;
}

/**
 * Check if a verse number is a valid verse.
 *
 * @param {int} $hymn_no	The hymn number of the verse.
 * @param {int} $verse_no The verse number to check.
 *
 * @return {bool} Verse number validity.
 */
function isValidHymnVerseNo($hymn_no, $verse_no){
	log(LOG_DEBUG_MED, 'Function Called: isValidHymnVerseNo(' + $hymn_no + ', ' + $verse_no + ')');

	// Make sure it's a valid hymn
	if(isValidHymnNo($hymn_no)){
		// Make sure the verse is a number
		if(!isNaN($verse_no)){
			// Check for the verse number in the JSON file.
			if($verse_no.toString() in $hymns[$hymn_no.toString()]['text']){
				return true;
			}
			else {
				log(LOG_DEBUG_LOW, 'Verse No "' + $verse_no + '" to Hymn No "' + $hymn_no + '" is not in the JSON file.');
			}
		}
		else {
			log(LOG_DEBUG_LOW, 'Verse No "' + $verse_no + '" is not a number.');
		}
	}
	return false;
}

/**
 * Gets the currently selected hymn number.
 *
 * @return {int} Current hymn number. 0 on error.
 */
function getHymnNo(){
	log(LOG_DEBUG_MED, 'Function Called: getHymnNo()');

	var $hymn_no = parseInt($('#number').val());

	if(isValidHymnNo($hymn_no)){
		return $hymn_no;
	}
	else {
		return 0;
	}
}

/**
 * Gets the currently selected verse number.
 *
 * @return {int} Current verse number. 0 on error.
 */
function getVerseNo(){
	log(LOG_DEBUG_MED, 'Function Called: getVerseNo()');

	var $hymn_no = parseInt($('#number').val());
	var $verse_no = parseInt($('#verse').val());

	if(isValidHymnVerseNo($hymn_no, $verse_no)){
		return $verse_no;
	}
	else {
		return 0;
	}
}

/**
 * Changes the selected hymn number to the specified one.
 *
 * Also resets the hymn verse back to the 1.
 *
 * @param {int} $hymn_no The desired hymn number.
 *
 * @return {int} The new hymn number
 */
function changeHymnNoTo($hymn_no){
	log(LOG_DEBUG_MED, 'Function Called: changeHymnNoTo(' + $hymn_no + ')');


	// Only change if it's a valid hymn
	if(isValidHymnNo($hymn_no)){
		// Is the hymn number changing?
		if($hymn_no != getHymnNo()){
			// Set the new hymn
			$('#number').val($hymn_no);

			// Verse back to 1
			changeVerseNoTo(1);

			// Set the new text
			refreshScreen();

			return $hymn_no;
		}
		else {
			return getHymnNo();
		}
	}
	return 0;
}

/**
 * Changes the selected verse number to the specified one.
 *
 * @param {int} $verse_no The desired hymn number.
 *
 * @return {int} The new hymn number
 */
function changeVerseNoTo($verse_no){
	log(LOG_DEBUG_MED, 'Function Called: changeVerseNoTo(' + $verse_no + ')');


	// Only change if it's a valid verse
	if(isValidHymnVerseNo(getHymnNo(), $verse_no)){
		// Is the verse number changing?
		if($verse_no != getVerseNo()){
			// Set the new verse
			$('#verse').val($verse_no);

			// Set the new text
			refreshScreen();

			return $verse_no;
		}
		else {
			return getHymnNo();
		}
	}
	return 0;
}

/**
 * Changes the currently selected hymn number by the number specified.
 *
 * @param {int} $x The number to add to the currently hymn number.
 *
 * @return {int} The New hymn number.
 */
function changeHymnNoBy($x){
	log(LOG_DEBUG_MED, 'Function Called: changeHymnNoBy(' + $x + ')');

	return changeHymnNoTo(getHymnNo() + $x);
}

/**
 * Changes the currently selected hymn verse by the number specified.
 *
 * @param {int}	$x The number to add to the currently hymn number
 *
 * @return {int} The new verse number.
 */
function changeVerseNoBy($x){
	log(LOG_DEBUG_MED, 'Function Called: changeVerseNoBy(' + $x + ')');

	return changeVerseNoTo(getVerseNo() + $x);
}

/**
 * Grabs the selected verse from the hymn JSON file and formats it.
 *
 * @param {int} $hymn_no	The hymn number.
 * @param {int} $verse_no The verse number.
 *
 * @return {string} An HMTL string containing the selected verse.
 */
function generateVerseHTML($hymn_no, $verse_no){
	log(LOG_DEBUG_MED, 'Function Called: generateVerseHTML(' + $hymn_no + ', ' + $verse_no + ')');


	$html = '';

	// Check if the verse exists
	if(isValidHymnVerseNo($hymn_no, $verse_no)){
		// Check if Hymn is in the public domain
		// NOTE: The original hymn text files used * to block out characters in
		// texts that were still under copyright. This checks for two consecutive
		// asterisks to prevent false positives, then blocks the entire verse out
		// with a more helpful message.
		if(!$hymns[$hymn_no]['text'][$verse_no].toString().includes('**')){
			// Loop through each line, and add any necessary formatting
			$.each($hymns[$hymn_no]['text'][$verse_no], function($key, $value){
				$html += $value + '<br>';
			})
		}
		else {
			$html = 'Hymn is copyrighted :(';
		}
	}
	else {
		$html = 'Hymn does not exist :(';
		log(LOG_ERROR, 'Hymn "' + $hymn_no + '" does not exist in the JSON file.');
	}
	return $html;
}

/**
 * Gets the size of the hymbox text and shrinks it to fit if necessary.
 */
function resize_text(){
	log(LOG_DEBUG_MED, 'Function Called: resize_text()');


	// Set the font size back to what we found in the CSS file on load.
	// This script will never make the text larger than this size.
	$('#hymntext').css('font-size', ($defaultFontSize) + 'px')

	// Get the area that we're allowed and the area we're requesting.
	$area_allowed = $('#hymntext').eq(0).parent()[0].getBoundingClientRect();
	$area_requested = $('#hymntext')[0].getBoundingClientRect();

	log(LOG_DEBUG_HIGH, 'resize_text() Allowed area: ' + $area_allowed['width'] + ' x ' + $area_allowed['height']);
	log(LOG_DEBUG_HIGH, 'resize_text() Allowed requested: ' + $area_requested['width'] + ' x ' + $area_requested['height']);

	// Check if the text is too tall
	if($area_requested['height'] > $area_allowed['height']){
		// Too tall. What percentage do we have to shrink it in order to fit?
		$mult_h = $area_allowed['height'] / $area_requested['height'];
	}
	else { // It fits, and sits!
		$mult_h = 1;
	}

	// Check if the text is too wide
	if($area_requested['width'] > $area_allowed['width']){
		// Too wide. What percentage do we have to shrink it in order to fit?
		$mult_w = $area_allowed['width'] / $area_requested['width'];
	}
	else { // It fits, and sits!
		$mult_w = 1;
	}

	// Set the new font size based on the smaller percentage we found above.
	$('#hymntext').css('font-size', ($defaultFontSize * Math.min($mult_h, $mult_w)) + 'px');

	log(LOG_DEBUG_HIGH, 'resize_text() Height Multiplier: ' + $mult_h);
	log(LOG_DEBUG_HIGH, 'resize_text() Width Multiplier: ' + $mult_w);
	log(LOG_DEBUG_LOW, 'resize_text() Final Multiplier: ' + Math.min($mult_h, $mult_w));
	log(LOG_DEBUG_HIGH, 'resize_text() Default Font Size: ' + $defaultFontSize + ' px');
	log(LOG_DEBUG_HIGH, 'resize_text() Resized Font Size: ' + ($defaultFontSize * Math.min($mult_h, $mult_w)) + ' px');
}

/**
 * Main function for screen updates. Gets the HTML for the current verse and
 * Adjusts the size of the text if necessary.
 */
function refreshScreen(){
	log(LOG_DEBUG_MED, 'Function Called: refreshScreen()');

	$("#hymntext").html(generateVerseHTML(getHymnNo(), getVerseNo()));
	resize_text()
}

/**
 * Takes the hymn canvas full screen.
 */
function goFullScreen(){
	log(LOG_DEBUG_MED, 'Function Called: goFullScreen()');
	log(LOG_INFO, 'Entering fullscreen.');

	var canvas = $('.hymncontainer')[0];
	if(canvas.requestFullscreen){
		canvas.requestFullscreen();
	}
	else if(canvas.webkitRequestFullScreen){
		canvas.webkitRequestFullScreen();
	}
}
