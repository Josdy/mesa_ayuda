
	// RECUPERAR PASSWORD JS

	$(document).ready(function(){
var pass1 = $('[name=pass1]');
	var pass2 = $('[name=pass2]');
	function coincidePassword(){
	var valor1 = pass1.val();
	var valor2 = pass2.val();
	if(valor1 != valor2){
		$("#pastate").removeClass("fas fa-check-circle");
		$("#pastate").addClass("fas fa-times-circle");
		$("#pastate").css("color","#FF0004");

	}
	if(valor1.length==0 || valor1==""){
		$("#pastate").removeClass("fas fa-check-circle");
		$("#pastate").addClass("fas fa-times-circle");
	$("#pastate").css("color","#FF0004");	
	}
	if(valor1.length<6 || valor1.length>10){
		$("#pastate").removeClass("fas fa-check-circle");
		$("#pastate").addClass("fas fa-times-circle");
	$("#pastate").css("color","#FF0004");
	}
	if(valor1.length!=0 && valor1==valor2){
			$("#pastate").removeClass("fas fa-times-circle");
		$("#pastate").addClass("fas fa-check-circle");
	$("#pastate").css("color","#00A41E");
	}
	}
	//ejecuto la función al soltar la tecla
	pass2.keyup(function(){
	coincidePassword();
	})
	;



	$("#password1").keyup(function(){
	
	
	var value = $("#password1").val();
	
	var strength = value.length;
	if(strength > 0){
	$(".process").show();
	$("#bar").addClass("progress-bar-danger").html("BAJA").css("background-color","red").css("color","black").css("font-weight","bold") ;
	$("#eye").show();
	
	if(strength > 3){
	$("#bar").removeClass("progress-bar-danger").removeClass("progress-bar-success").addClass("progress-bar-warning").css("width","30%").html("DEBIL ").css("background-color","yellow") ; ;
	}if(strength > 6){
	$("#bar").css("width","60%").html("MEDIO").removeClass("progress-bar-success").addClass("progress-bar-warning").css("background-color","orange") ; ;
	}
	if(strength > 12){
	$("#bar").removeClass("progress-bar-warning").addClass("progress-bar-success").css("width","100%").html("FUERTE ").css("background-color","green").css("color","white") ;
	}
	
	}else{
	$("#bar").removeClass("progress-bar-warning").removeClass("progress-bar-success").addClass("progress-bar-danger").css("width","10%").html("BAJA ").css("background-color","red") ;
	$("#eye").hide();
	$(".process").hide();
	}
	
	});
	
	$("#eye").click(function(){
	
	if($(this).attr('data-click-state') == 1) {  
	$(this).attr('data-click-state', 0).removeClass("far fa-eye").addClass("fas fa-eye-slash");
	$("#password1").attr('type','text');
	
	} else {
	$(this).attr('data-click-state', 1).removeClass("fas fa-eye-slash").addClass("far fa-eye");
	$("#password1").attr('type','password');
	
	}
	
	
	});
	
	});

	//validar si la unidad esta registrada previo al submit

	$(document).ready(function()
{    
 $("#nombreunidad").keyup(function()
 {  
  var name = $(this).val(); 
  
  if(name.length >= 3)
  {  
     
   $.ajax({
    
    type : 'POST',
    url  : 'check_unidad.php',
    data : $(this).serialize(),
    success : function(data)
        {
              $("#result").html(data);
           }
    });
    return false;
   
  }
  else
  {
   $("#result").html('');
  }
 }
 )
 ;
 
});

		$(document).ready(function() {
$('#example').DataTable({});
});


	$(document).ready(function()
{    
 $("#nombreusuario").keyup(function()
 {  
  var name = $(this).val(); 
  
  if(name.length >= 3)
  {  
     
   $.ajax({
    
    type : 'POST',
    url  : 'check_usuario.php',
    data : $(this).serialize(),
    success : function(data)
        {
              $("#result").html(data);
           }
    });
    return false;
   
  }
  else
  {
   $("#result").html('');
  }
 }
 )
 ;
 
});








$(document).ready(function(){
 $.ajax({
    type: 'POST',
    url: 'cargar_listas.php'
  })
  .done(function(listas_rep){
    $('#unidadselect').html(listas_rep)
  })
  .fail(function(){
    alert('Hubo un errror al cargar las listas_rep')
  })

  $('#unidadselect').on('change', function(){
    var id = $('#unidadselect').val()
    $.ajax({
      type: 'POST',
      url: 'cargar_videos.php',
      data: {'id': id}
    })
    .done(function(listas_rep){
      $('#proareaselect').html(listas_rep)
    })
    .fail(function(){
      alert('Hubo un errror al cargar los vídeos')
    })
  })


});


	$(document).ready(function()
{    
 $("#dniTrabajador").keyup(function()
 {  
  var name = $(this).val(); 
  
  if(name.length >=7 )
  {  
     
   $.ajax({
    
    type : 'POST',
    url  : 'check_trabajador.php',
    data : $(this).serialize(),
    success : function(data)
        {
              $("#resultt").html(data);
           }
    });
    return false;
   
  }
  else
  {
   $("#resultt").html('');
  }
 }
 )
 ;
 
});




