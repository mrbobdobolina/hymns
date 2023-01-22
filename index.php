<!DOCTYPE html>
<html lang="en">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

	<title>Hymn Viewer v2.0</title>

	<!-- Bootstrap core CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">

	<!-- HymnViewer core CSS -->
	<link href="assets/css/hymn_viewer.css" rel="stylesheet">
	<link href="assets/fonts/CMGSans.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/spectrum.min.css" >


	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/jquery.fittext.js"></script>
	<script src="assets/js/hymn_viewer.js"></script>
	<script src="assets/js/spectrum.min.js"></script>


</head>
<body onResize="refreshScreen();">
	<!-- START Controls -->
	<div class="container pt-4">
		<div class="form-group row text-center">
			<div class="col">
				<select class="form-control" default="tester" onChange="changeHymnNoTo(this.value);">
					<option value="1">Hymns</option>
					<option value="901">Lord's Prayer</option>
					<option value="902">Apostle's Creed</option>
					<option value="903">Nicene Creed</option>
					<option value="904">Confession of Sin</option>
				 <option value="905">Kyrie Eleison</option>
					<option value="906">Gloria</option>
					<option value="907">Angus Dei</option>
					<option value="908">Sanctus</option>
					<option value="909">Create in Me</option>
						<option value="910">Nunc Dimittis</option>
						<option value="911">Venite Exultemus</option>
						<option value="912">Te Deum Laudamus</option>
				</select>
			</div>

			<div class="col-3 input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">Hymn #</span>
				</div>
				<button style="flex:0.25;" class="btn btn-outline-danger form-control" onClick="changeHymnNoBy(-1)">-</button>
				<input id="number" name="number" class="form-control" value="1" oninput="refreshScreen();changeVerseNoTo(1);" onkeydown="refreshScreen();changeVerseNoTo(1);">
				<button style="flex:0.25;" class="btn btn-outline-success form-control" onClick="changeHymnNoBy(1)">+</button>
			</div>

			<div class="col-3 input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">Verse #</span>
				</div>
				<button style="flex:0.25;" class="btn btn-outline-danger form-control" onClick="changeVerseNoBy(-1);">-</button>
				<input id="verse" name="verse" type="number" class="form-control" value="1" oninput="refreshScreen();" onkeydown="refreshScreen();">
				<button style="flex:0.25;" class="btn btn-outline-success form-control" onClick="changeVerseNoBy(1);">+</button>
			</div>

			<div class="col-2 control win-docked">
		 		<button type="button" class="btn btn-primary form-control" onClick="goFullScreen();">Go Fullscreen</button>
			</div>

				<div class="col">
					<select id="image_back" class="form-control" default="tester" >
						<option value="">None</option>
						<?php
						foreach(glob("images/".'*') as $filename){
							echo '<option value="images/'.basename($filename).'">'.basename($filename).'</option>';
					}
					 ?>
					</select>
				</div>

			<div class="col-4 control win-popout" style="display:none;">
				<button type="button" class="btn btn-secondary form-control" onClick="popOut();">Close Pop Out</button>
			</div>

			<div class="col-4 input-group">
				<div class="input-group">
					<span class="input-group-text">Background Color</span>
				</div>
			<input class="form-control" onchange="updateBgColor(this.value)" id="bgcolor" value="295ba0" />
			</div>

			<div class="col-4 input-group">
				<div class="input-group">
					<span class="input-group-text">Text Color</span>
				</div>
			<input class="form-control" onchange="updateTxColor(this.value)" id="txcolor" value="eeeeee" />
			</div>

				<div class="col-4 input-group">
			  <div class="form-check">
			    <input type="checkbox" class="form-check-input" id="showInfo" onChange="if(isPoppedOut()){$popOutWin.$('#showInfo').attr('checked', this.checked); $popOutWin.refreshScreen(); refreshScreen();}" checked>
			    <label class="form-check-label" for="exampleCheck1">Show Hymn Information</label>
			  </div>
			</div>





<script>
	$('#bgcolor').spectrum({
  type: "text",
  hideAfterPaletteSelect: "true",
  showInput: "true",
  showAlpha: "false",
  showButtons: "false",
  allowEmpty: "false"
	});
	$('#txcolor').spectrum({
  type: "text",
  hideAfterPaletteSelect: "true",
  showInput: "true",
  showAlpha: "false",
  showButtons: "false",
  allowEmpty: "false"
	});

	$('#image_back').change(function() {
		$('#the_back_image').attr('src', $('#image_back').val());
	});
</script>

		</div>
		<!-- END Controls -->

		<div class="hymncontainer bootstrapcontainer align-middle" id="hymncontainer">
			<img id="the_back_image" src="" />
			<div class="infobox" id="infobox"></div>
			<div class="d-flex" id="hymnbox">
				<div class="align-self-center" id="hymntext"></div>
			</div>

		</div>

	</div>




</body>
</html>
