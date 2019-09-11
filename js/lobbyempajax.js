$(document).ready(function(){


    $.ajax({    //create an ajax request to display.php
        type: "GET",
        data: {"idOwner" : $("#idOwner").val()},
        url: "../scriptsPHP/mostarlobby.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#empresamuestreo2").html(response); 
            //alert(response);
        },
        error: function() {
            console.log("No se ha podido obtener la información");
        }

   
    });
});