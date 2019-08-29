$(document).ready(function(){
    $("#").click(function (){
        if($("#NAMEEEEE").val()){
            $.ajax({    
                type: "POST",
                data: {
                    "idEmp"         : $("#idEmp").val(),
                    "name"          : $("#NAMEEEE").val(),
                    "descripcion"   : $("#DESCRIP").val()
                },
                url: "scriptsPHP/addProyectos.php",             
                dataType: "html",   //expect html to be returned                
                success: function(response){                    
                    $("#RESPUESTA").html(response); 
                    
                },
                error: function() {
                    console.log("No se ha podido obtener el nombre de la Empresa");
                }
        });
        }else{
            $("#RESPUESTA").html("<p>El nombre es requerido</p>"); 
        }
    });
});