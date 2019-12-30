<?php

class Link {
	var $uri = 0;
	var $link = 0;
	var $ip = 0;

    function read(){
        global $db;

        $link = $db->get_row("SELECT * FROM links WHERE uri='$this->uri' LIMIT 1");

        if ($link){
        
                $this->link = urldecode($link->url);
                return true;
            }
    return false;
    }

    function store() {
        global $db;
    
        /*URI*/
        if ($this->uri) //uri por dada por el usuario
        	$this->uri = $this->add_number($this->uri); //comprobamos si debemos añadir numero o no
        else
        	$this->uri = $this->random_uri(); //uri aleatoria
			
        /*IP*/
        $ip = $this->ip;
		
        /*LINK*/
        $link = urlencode($this->link);

        if ($db->query("INSERT INTO links VALUES ('".$this->uri."', '$link', '$ip')"))
                return true;

        return false;
    }
    function random_uri() {
	
		$generado = 0;
	  
		while ($this->uri_exists($generado)) {
			 $generado = md5(rand().time());
			 $generado = substr($generado, 0, 6); // 5 caracteres maximo	  
		}
	
		return $generado;
	}

    function uri_exists ($uri) { /*EXISTE LA URI? */
		global $db;
	
		if (!$uri) return true;

		$uri = $db->get_row("SELECT * FROM links WHERE uri='$uri'");
	
		if ($uri) return true;
		else return false;

    }

	function add_number($uri) {
		$tempuri = $uri;
		
		if ($this->uri_exists($tempuri)) {
		$cont = 1;
		
		
		 while($this->uri_exists($tempuri)) {
			 $tempuri = $uri.$cont;
			 $cont++;
		 }
		 
		 }
		 return $tempuri;
		
	}

}

