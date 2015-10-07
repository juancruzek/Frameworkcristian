class errors{
	protected $id;  
   function __construct($id) {  
     try {  
       if ($this->validId($id))  
         $this->id = $id;  
       else  
         throw new Exception('Identificiador no es un entero');  
     } catch (Exception $e) {  
       echo $e->getMessage();
       print_r($e->getTrace());  
       //exit();  
     }  
   }  
   private function validId($id) {  
     if (!is_int($id))  
       return false;  
     return true;  
   }  
 }  
 $p = new Prueba('prueba');  
 