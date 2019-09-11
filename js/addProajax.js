$(document).ready(function(){
    $("#añadirproy").click(function (){
        if($("#nombrep").val()){
            console.log($("#nombrep").val());
            $.ajax({    
                type: "POST",
                data: {
                    "idEmp"         : $("#idEmp").val(),
                    "name"          : $("#nombrep").val(),
                    "descripcion"   : $("#descr").val()
                },
                url: "../scriptsPHP/addProyectos.php",             
                dataType: "html",   //expect html to be returned                
                success: function(response){                    
                    $("#rpAñadir").html(response); 
                    
                },
                error: function() {
                    $("#rpAñadir").html("<p>Error!</p>"); 
                }
        });
        }else{
            $("#rpAñadir").html("<p>El nombre es requerido</p>"); 
        }
    });
});