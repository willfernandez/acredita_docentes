<?php 
	class conexion
	{
		private $server;
		private $user;
		private $clave;
		private $db;
		private $sgbd;
		
		public $conex;
		
		function __construct()
		{
			$this->server="localhost";
			$this->user="root";
			$this->clave="";
			$this->db="acredita_docente";
                        /*
            $this->server="ujcmacreditacion.com";
			$this->user="acredita_egresa";
			$this->clave="shadow1@";
			$this->db="acredita_bienestar";*/
		}
		
		public function conectarMySQL()
		{
			$this->conex=new mysqli($this->server,$this->user,$this->clave,$this->db);
		}
		
		public function conectarOracle()
		{
			
		}
		
		public function cerrar()
		{
			$this->conex->close();
		}
	}
?>