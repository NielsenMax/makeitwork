$(document).ready(function(){


    $.ajax({    //create an ajax request to display.php
        type: "POST",
        data: {"idEmp" : $("#idEmp").val()},
        
        url: "../scriptsPHP/proylobby.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#proymuestreo2").html(response); 
            //alert(response);
        },
        error: function() {
            console.log("No se ha podido obtener la información");
        }

   
    });
});