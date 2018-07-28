<?php 

// Limpiar input de caracteres especiales y comillas. Los reemplaza pero no  los elimina
function escapeCharacters($string){
	return htmlspecialchars(trim($string), ENT_COMPAT | ENT_QUOTES);
}
 