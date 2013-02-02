<?php 
class Application_Form_Contact extends Zend_Form  
{  
  
    public function init()  
    {  
        /* Form Elements & Other Definitions Here ... */   
        $this->setName('contacto');     
           
        //creamos input text para escribir nombre     
        $nombre = new Zend_Form_Element_Text('nombre');    
        //Cambiamos la etiqueta del elemento nombre  
        $nombre->setLabel('* Su Nombre:')->  
        //Para establecer que el elemenento no puede quedar vacio  
        setRequired(true)->    
        //StripTags elimina las etiquetas HTML  
        addFilter('StripTags')->  
        //StringTrim quita todos los caracteres de espacio en blanco iniciales y finales  
        addFilter('StringTrim')->    
        //Establecemos el tama�o del campo de texto  
        setAttrib('size',50)->  
        //Establecemos el n�mero de caracteres m�ximo del campo de texto  
        addValidator('stringLength', false, array(0, 300))->  
        //Cambiamos el mensaje de error para cuando el elemento del formulario se envia vacio  
        addValidator('NotEmpty',true,array('messages' => array(  
        Zend_Validate_NotEmpty::IS_EMPTY=>'Introducir su nombre es obligatorio.')));   
   
        //creamos input text para escribir email    
        $email = new Zend_Form_Element_Text('email');    
        $email->setLabel('* Su Email:')->  
        setAttrib('size',50)->  
        setRequired(true)->  
        addFilter('StripTags')->  
        addFilter('StringTrim')->  
        addValidator('stringLength', false, array(0, 320))->  
        addValidator('NotEmpty',true,array('messages' => array(  
        Zend_Validate_NotEmpty::IS_EMPTY=>'Introducir su email es obligatorio.')))->  
        //Cambiamos los mensajes de error para el elemento email  
        addValidator('EmailAddress',true,array('messages' => array(  
        Zend_Validate_EmailAddress::INVALID            => "El tipo especificado no es v�lido, el valor debe ser una cadena de texto",  
        Zend_Validate_EmailAddress::INVALID_FORMAT     => "'%value%' no es una direcci�n de correo electr�nico v�lida en el formato local-part@hostname",  
        Zend_Validate_EmailAddress::INVALID_HOSTNAME   => "'%hostname%' no es un nombre de host v�lido para la direcci�n de correo electr�nico '%value%'",  
        Zend_Validate_EmailAddress::INVALID_MX_RECORD  => "'%hostname%' no parece tener un registro MX v�lido para la direcci�n de correo electr�nico '%value%'",  
        Zend_Validate_EmailAddress::INVALID_SEGMENT    => "'%hostname%' no esta en un segmento de red ruteable. La direcci�n de correo electr�nico '%value%' no se debe poder resolver desde una red p�blica.",  
        Zend_Validate_EmailAddress::DOT_ATOM           => "'%localPart%' no es igual al formato dot-atom",  
        Zend_Validate_EmailAddress::QUOTED_STRING      => "'%localPart%' no es igual al formato quoted-string",  
        Zend_Validate_EmailAddress::INVALID_LOCAL_PART => "'%localPart%' no es una parte local v�lida para la direcci�n de correo electr�nico '%value%'",  
        Zend_Validate_EmailAddress::LENGTH_EXCEEDED    => "'%value%' excede la longitud permitida",)));
          
        //creamos input text para escribir la empresa   
        $empresa = new Zend_Form_Element_Text('empresa');    
        $empresa->setLabel('Nombre de organismo:')->  
        setRequired(false)->  
        addValidator('stringLength', false, array(0, 200))->  
        setAttrib('size',50)->  
        addFilter('StripTags')->addFilter('StringTrim');   
          
        //creamos input text para escribir website   
        $website = new Zend_Form_Element_Text('website');    
        $website->setLabel('Sitio Web:')->setRequired(false)->  
        addValidator('stringLength', false, array(0, 320))->  
        setAttrib('size',50)->                  
        addFilter('StripTags')->addFilter('StringTrim');  
          
        //creamos input text para escribir el mensaje  
        $mensaje = new Zend_Form_Element_Textarea('mensaje');    
        $mensaje->setLabel('* Mensaje:')->setRequired(true)->  
        //especificamos el tama�o del textarea  
        setAttrib('cols', '53')->setAttrib('rows', '4')->  
        addFilter('StripTags')->addFilter('StringTrim')->  
        addValidator('stringLength', false, array(0, 500))->  
        addValidator('NotEmpty',true,array('messages' => array(  
        Zend_Validate_NotEmpty::IS_EMPTY=>'Introducir el mensaje es obligatorio.')));  
            
        //boton para enviar formulario    
        $submit = new Zend_Form_Element_Submit('submit');    
        $submit->setAttrib('idcontacto', 'submitbutton');    
    
        //agrego los objetos creados al formulario    
        $this->addElements(array($nombre,    
        $email, $empresa, $website, $mensaje, $submit));   
    }  
  
}  