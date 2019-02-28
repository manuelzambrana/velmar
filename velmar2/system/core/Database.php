<?php
//creamo
	class Database {

		private $dbHost = "localhost" ;
		private $dbUser = "root" ;
		private $dbPass = "" ;
		private $dbName = "velmar_comics" ;

		//
		private static $res ;

		//
		private static $instancia = null ;	// Instancia del objeto Database

		//
		private static $db ;				// Conexión con el motor

		//
		// Hacemos el constructor privado para evitar que puedan crearse otras
		// instancias del objeto.
		private function __construct()  
		{
			$this->conectar() ;
		}
		
		//
		// El destructor se encargará de cerrar la conexión con el gestor
		// de bases de datos. Además, serializará el objeto y lo guardará
		// en una variable de sesión, si ésta existe.
	

		//
		// Haciendo privado el método __clone evitamos que se pueda clonar 
		// el objeto y, por tanto, obtener diferentes instancias del mismo.
		private function __clone() { }

		// 
		// Este método se llamará tras deserializar el objeto, momento en
		// el que será necesario reestablecer la conexión con el gestor
		// de bases de datos.
		public function __wakeup() 
		{
			$this->conectar() ;
		}

		//
		// Crea, si aún no se ha hecho, y devuelve una instancia de la
		// clase DATABASE.
		public static function getInstancia() 
		{
			if (is_null(self::$instancia)):
				self::$instancia = new Database() ;
			endif ;
			
			return self::$instancia ;
		}

	
		public function prepare($insert) { 
        return self::$db->prepare($insert); 
    } 

		//
		// Establecemos la conexión con el motor de bases de datos, 
		// seteamos la base de datos con la que queremos trabajar y
		// definimos el tipo de codificación que emplearemos.
		private function conectar() 
		{
			// Conectamos con el gestor de bases de datos
			 try {
	// Conectamos con el motor de bases de datos
		self::$db  = new PDO("mysql:host=localhost; dbname=velmar_comics; charset=utf8", "root", "", 
					   [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"])  ;
 	} catch (PDOException $error) {
 		echo $error->getMessage() ;
 	}
			
			
        }
        function fetch($query, $params=[]) {
            try {
                $stmt = self::$db->prepare($query);
                $stmt->execute($params);
                return $stmt->fetch();
            }catch (PDOException $e){
                throw new Exception($e->getMessage());
            }
           

	}
	function fetchAll($query, $params=[]) {
		try {
			$stmt = self::$db->prepare($query);
			$stmt->execute($params);
			return $stmt->fetchAll();
		}catch (PDOException $e){
			throw new Exception($e->getMessage());
		}
	   

}

	

    }