<?php
header( 'Access-Control-Allow-Origin: *' ) ;
header( 'Server: Centos' ) ;
header( 'X-Build: 15.6' ) ;
?><!DOCTYPE html><html>
<head>
<title>Server</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
th , tr {
	text-align: center;
}
</style>
</head>
<body>

<div id="datos"></div>
</body>
<script>
function actualiza()
{
	url = "/api" ;
	params = {} ;
	$.post( url , params , function( data ) {
		obj = jQuery.parseJSON( data ) ; 
	/*	html = "" ;
		html += "<h3>PADRE</h3>";
		html += "INICIO: <strong>" + obj.timestamp + "</strong><br/>";
		html += "ID: " + obj.Padre.ID + "<br/>";
		console.log( "PADRE" ) ;
		console.log( obj.Padre.Transform ) ;
		html += "Transform: <br/><ul><li> X:" + obj.Padre.Transform.X + "</li>";
		html += "<li>Y:" + obj.Padre.Transform.Y + "</li>";
		html += "<li>Z:" + obj.Padre.Transform.Z + "</li></ul>";
		html += "<h3>HIJOS</h3>";
		html += "<ul>";
		$.each( obj.Hijos , function( index, value ) {
		console.log( "HIJO " + value.ID ) ;
		console.log( value.Transform ) ;
			html += "<li><h4>" + value.ID + "</h4>";
			html += "Transform: <br/><ul><li> X:" + value.Transform.X + "</li>";
			html += "<li>Y:" + value.Transform.Y + "</li>";
			html += "<li>Z:" + value.Transform.Z + "</li></ul>";
			html += "Movil: " + value.Movil + "<br/>";
			html += "Animacion: " + value.Animacion + "<br/>";
			
		});
		html += "</ul>";
	*/	
		console.log( obj.Padre.Transform ) ;
		html = "<table width=\"100%\" border=\"1\">";
		html += "<tr>";
		html += "<th width=\"25%\"></th>" ;
		html += "<th width=\"25%\">X</th>" ;
		html += "<th width=\"25%\">Y</th>" ;
		html += "<th width=\"25%\">Z</th>" ;
		html += "</tr>" ;
		html += "<tr>";
		html += "<td width=\"25%\">PADRE</td>" ;
		html += "<td width=\"25%\">" + ( Math.round( obj.Padre.Transform.X.toString().replace(",",".") * 1000 ) / 1000 ) + "</td>" ;
		html += "<td width=\"25%\">" + ( Math.round( obj.Padre.Transform.Y.toString().replace(",",".") * 1000 ) / 1000 ) + "</td>" ;
		html += "<td width=\"25%\">" + ( Math.round( obj.Padre.Transform.Z.toString().replace(",",".") * 1000 ) / 1000 ) + "</td>" ;
		html += "</tr>" ;
		$.each( obj.Hijos , function( index, value ) {
		console.log( "HIJO " + value.ID ) ;
		console.log( value.Transform ) ;
		console.log( value.Transform.X ) ;
		html += "</tr>" ;
		html += "<tr>";
		html += "<td width=\"25%\">HIJO " + value.ID + "</td>" ;
		html += "<td width=\"25%\">" + ( Math.round( value.Transform.X.toString().replace(",",".") * 1000 ) / 1000 ) + "</td>" ;
		html += "<td width=\"25%\">" + ( Math.round( value.Transform.Y.toString().replace(",",".") * 1000 ) / 1000 ) + "</td>" ;
		html += "<td width=\"25%\">" + ( Math.round( value.Transform.Z.toString().replace(",",".") * 1000 ) / 1000 ) + "</td>" ;
		html += "</tr>" ;
		});
		html += "</table>" ;
		$( "#datos" ).html( html ) ;
	});
}
window.setInterval(function(){
	actualiza() ;
}, 1500);
</script>
</html>