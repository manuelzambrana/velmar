<?php  
//conexion bbdd
require_once "../core/Database.php" ;
$db = Database::getInstancia() ;
//url de nuestra api de marvel
	$url="http://gateway.marvel.com/v1/public/characters/1011336/comics?ts=1&apikey=d31f526281e4d4c2973202a30e255e50&hash=6f0d93de5d4aed9491ef22b1d418798a";
	$comics =  json_decode(file_get_contents($url)) ;
	// insertamos comics a nuestra bbdd
	$query= "INSERT INTO productos (nomPro, Descripcion, imagen )
		     		VALUES (:nomPro, :Descripcion, :imagen ) " ;
	$sqlp = $db->prepare($query) ;
	var_dump($sqlp);
	foreach ($comics->data->results as $item):
		//los vamos recorriendo con un foreach
	
		$sqlp->bindValue(":nomPro",   $item->title,  PDO::PARAM_STR) ;
		$sqlp->bindValue(":Descripcion",   $item->description,  PDO::PARAM_STR) ;
		$sqlp->bindValue(":imagen",   $item->thumbnail->path."/portrait_incredible.jpg",  PDO::PARAM_STR) ;
	
		//ejecutamos consulta
		$sqlp->execute() ;
	
	
	endforeach ;
?>