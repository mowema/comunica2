// *******************************************************************************************
//	Conjunto de funciones para controlar las validaciones de
//	la aplicaci�n.



// Menu desplegablo en administrador	
$(document).ready(function(){ // Script del Navegador
	$("ul.subnavegador").hide();	
	$("ul.subnavegador2").hide();
	$("a.desplegable").toggle(
		function(){ 
			$(this).parent().find("ul.subnavegador").slideDown('fast'); 
			
		},
		function() { 
			$(this).parent().find("ul.subnavegador").slideUp('fast'); 
		}				
	);	
	
	$("a.desplegable2").toggle(
			function(){ 
				$(this).parent().find("ul.subnavegador2").slideDown('fast'); 
				
			},
			function() { 
				$(this).parent().find("ul.subnavegador2").slideUp('fast'); 
			}				
		);
	
});


//Inputs solo umericos
function justNumbers(e) {
var keynum = window.event ? window.event.keyCode : e.which;
if ( keynum == 8 ) return true;
return /\d/.test(String.fromCharCode(keynum));
}

// Validador de formularios

$(document).ready(function () {
    var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
   
    $(".botonusr").click(function (){
        $(".error").remove();
        
        if( $(".usrape").val().trim().trim() == ""){
            $(".usrape").focus().after("<span class='error'>Ingrese su apellido</span>");
            return false;
       
        }else  if( $(".usrnom").val().trim().trim() == ""){
            $(".usrnom").focus().after("<span class='error'>Ingrese su nombre</span>");
            return false;
            
        }else  if( $(".usrdni").val().trim().trim() == "" ){
            $(".usrdni").focus().after("<span class='error'>Ingrese su dni</span>");
            return false;
            
        }else  if( $(".usralias").val().trim().trim() == "" ){
            $(".usralias").focus().after("<span class='error'>Ingrese su alias</span>");
            return false;
        
        }else  if( $(".rol").val().trim().trim() == "" ){
            $(".rol").focus().after("<span class='error'>Ingrese su rol</span>");
            return false;
        
        }else  if( $(".organismo").val().trim().trim() == "" ){
            $(".organismo").focus().after("<span class='error'>Ingrese su organismo</span>");
            return false;
            
        }else if( $(".usremail").val().trim().trim() == "" || !emailreg.test($(".usremail").val().trim()) ){
            $(".usremail").focus().after("<span class='error'>Ingrese un email correcto</span>");
            return false;   
                
        }});
        
    $(".botonorg").click(function (){
        $(".error").remove();
		    if( $(".orgnum").val().trim().trim() == "" ){
		        $(".orgnum").focus().after("<span class='error'>Ingrese numero de organismo</span>");
		        return false; 
		        
		    }else  if( $(".orgnom").val().trim().trim() == "" ){
		        $(".orgnom").focus().after("<span class='error'>Ingrese el nombre del organismo</span>");
		        return false;
		    }});
    
    $(".botonrol").click(function (){
        $(".error").remove();
		   if( $(".rolnom").val().trim().trim() == "" ){
		        $(".rolnom").focus().after("<span class='error'>Ingrese el nombre del rol</span>");
		        return false;
            }});
    
    $(".botonlic").click(function (){
        $(".error").remove();
		    if( $(".licnom").val().trim().trim() == "" ){
		        $(".licnom").focus().after("<span class='error'>Ingrese el nombre de la licencia</span>");
		        return false;
		    
		    }else  if( $(".licalias").val().trim().trim() == "" ){
		        $(".licalias").focus().after("<span class='error'>Ingrese el alias de la licecnia</span>");
		        return false;
		        
		    }else  if( $(".licdet").val().trim().trim() == "" ){
		        $(".licdet").focus().after("<span class='error'>Ingrese el detalle de la licencia</span>");
		        return false;
            }});
    
    $(".botonsis").click(function (){
        $(".error").remove();
		    if( $(".sisnom").val().trim().trim() == "" ){
		        $(".sisnom").focus().after("<span class='error'>Ingrese el nombre del sistema</span>");
		        return false;
		    
		    }else  if( $(".sisdet").val().trim().trim() == ""  ){
		        $(".sisdet").focus().after("<span class='error'>Ingrese el detalle del sistema</span>");
		        return false;
		    
            }});
    
    $(".botonapi").click(function (){
        $(".error").remove();
		    if( $(".apinom").val().trim().trim() == "" ){
		        $(".apinom").focus().after("<span class='error'>Ingrese el nombre de la aplicacion</span>");
		        return false;
		    
		    }else  if( $(".apidet").val().trim().trim() == "" ){
		        $(".apidet").focus().after("<span class='error'>Ingrese el detalle de la aplicacion</span>");
		        return false;
		    }else  if( $(".apiorg").val().trim().trim() == "" ){
		        $(".apiorg").focus().after("<span class='error'>Ingrese el organismo</span>");
		        return false;
		    
            }});
    
    $(".botonnav").click(function (){
        $(".error").remove();
		    if( $(".navnom").val().trim().trim() == "" ){
		        $(".navnom").focus().after("<span class='error'>Ingrese el nombre del navegador</span>");
		        return false;
		    
		    }else  if( $(".navdet").val().trim().trim() == "" ){
		        $(".navdet").focus().after("<span class='error'>Ingrese el detalle del navegador</span>");
		        return false;
		    
            }});
    
    $(".botontema").click(function (){
        $(".error").remove();
		    if( $(".temanom").val().trim().trim() == "" ){
		        $(".temanom").focus().after("<span class='error'>Ingrese el nombre del tema</span>");
		        return false;
		    
		    }else  if( $(".temadet").val().trim().trim() == "" ){
		        $(".temadet").focus().after("<span class='error'>Ingrese el detalle del tema</span>");
		        return false;
		    
            }});
    
    $(".botonbase").click(function (){
        $(".error").remove();
		    if( $(".basenom").val().trim().trim() == "" ){
		        $(".basenom").focus().after("<span class='error'>Ingrese el nombre de la base de datos</span>");
		        return false;
		    
		    }else  if( $(".basedet").val().trim().trim() == "" ){
		        $(".basedet").focus().after("<span class='error'>Ingrese el detalle de la base de datos</span>");
		        return false;
		    
            }});
     
    $(".botonitem").click(function (){
        $(".error").remove();
	        if( $(".temaitem").val().trim().trim() == "" ){
		        $(".temaitem").focus().after("<span class='error'>Seleccione un tema</span>");
	        return false;
    		}else if( $(".itemnom").val().trim() == "" ){
		        $(".itemnom").focus().after("<span class='error'>Ingrese el nombre del item</span>");
		        return false;
		    
		    }else  if( $(".itemdet").val().trim() == "" ){
		    	
		    	$(".itemdet").focus().after("<span class='error'>Ingrese el detalle del item</span>");
		        return false;
		    
            }});
    
    $(".botonaporg").click(function (){
        $(".error").remove();
		    if( $(".aporgnum").val().trim() == "" ){
		        $(".aporgnum").focus().after("<span class='error'>Ingrese el numero del Organismo</span>");
		        return false;
		    
		    }else  if( $(".aporgnom").val().trim() == ""  ){
		        $(".aporgnom").focus().after("<span class='error'>Ingrese el nombre del Organismo</span>");
		        return false;
		    
            }});
    
    $(".botongap").click(function (){
        $(".error").remove();
		    if( $(".gapnomgrupo").val().trim() == "" ){
		        $(".gapnomgrupo").focus().after("<span class='error'>Seleccione un grupo</span>");
		        return false;
		    }else  if( $(".gapapi").val().trim() == "" ){
		        $(".gapapi").focus().after("<span class='error'>Seleccione una aplicacion</span>");
		        return false;
            }});
    
    $(".botongev").click(function (){
        $(".error").remove();
		    if( $(".gevnom").val().trim() == "" ){
		        $(".gevnom").focus().after("<span class='error'>Ingrese el nombre del grupo</span>");
		        return false;
		    
		    }else  if( $(".gevobs").val().trim() == "" ){
		        $(".gevobs").focus().after("<span class='error'>Ingrese observacion</span>");
		        return false;
		        
		    }else  if( $(".gevorg").val().trim() == "" ){
			    $(".gevorg").focus().after("<span class='error'>seleccione un organismo</span>");
			    return false;
		    
            }});
    
    $(".usrape, .usrnom, .usrdni, .usralias, .orgnum, .orgnom, .rolnom, .licnom, .licalias, .licdet, .sisnom, .sisdet, .apidet, .apinom," +
    		".apinom, .apidet, .navnom, .navdet, .temanom, .temadet, .basenom, .basedet, .itemnom, .itemdet, .aporgnum, .gapid, .aporgnom, " +
    		".gevnom, .gevobs, .gevorg, .rol, .organismo, .usremail").keyup(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });
    
    $(".email").keyup(function(){
        if( $(this).val().trim() != "" && emailreg.test($(this).val())){
            $(".error").fadeOut();
            return false;
        }
    });
});




/*
function onValidateMail(setObj1, setObj2) {
	object = document.getElementById(setObj1);
	objErr = document.getElementById(setObj2);
	objOk = document.getElementById('btnAceptar');
	valueForm = object.value;
	var patron = new RegExp(/^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})$/);
	if(valueForm.search(patron)==0) {
		//Mail correcto
		object.style.color="#000000";
		objErr.style.color="#000000";
		objErr.innerHTML="";
		objOk.disabled=false;		
	} else {
		//Mail incorrecto
		object.style.color="#FF0000";
		objErr.style.color="#FF0000";
		objErr.innerHTML=" Error";
		objOk.disabled=true;		
		//object.select(); // Trabar ventana
	}
}

function onValidateNumeros(setObj1, setObj2) {
	object = document.getElementById(setObj1);
	objErr = document.getElementById(setObj2);
	objOk = document.getElementById('btnAceptar');
	valueForm = object.value;
	var patron = new RegExp(/^([0-9])*$/);
	if(valueForm.search(patron)==0) {
		//Mail correcto
		object.style.color="#000000";
		objErr.style.color="#000000";
		objErr.innerHTML="";
		objOk.disabled=false;
	} else {
		//Mail incorrecto
		object.style.color="#FF0000";
		objErr.style.color="#FF0000";
		objErr.innerHTML=" Error";
		objOk.disabled=true;
		object.select(); // Trabar ventana
	}
}

function onValidateFechas(setObj1, setObj2) {
	object = document.getElementById(setObj1);
	objErr = document.getElementById(setObj2);
	objOk = document.getElementById('btnAceptar');
	valueForm = object.value;
	var patron = new RegExp(/^\d{1,2}\/\d{1,2}\/\d{4}$/);
	if(valueForm.search(patron)==0) {
		//Mail correcto
		object.style.color="#000000";
		objErr.style.color="#000000";
		objErr.innerHTML="";
		objOk.disabled=false;		
	} else {
		//Mail incorrecto
		object.style.color="#FF0000";
		objErr.style.color="#FF0000";
		objErr.innerHTML=" Error";
		objOk.disabled=true;		
		//object.select(); // Trabar ventana
	}	
}
*/