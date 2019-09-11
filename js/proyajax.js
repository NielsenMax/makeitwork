$(document).ready(function(){
    // //Hover proyectos
    // $("#displayProy").hover(function printData() { 
    //     $.ajax({    //create an ajax request to display.php
    //         type: "POST",
    //         data: {"idEmp" : $("#idEmp").val()},
    //         url: "scriptsPHP/showActiveProy.php",             
    //         dataType: "html",   //expect html to be returned                
    //         success: function(response){                    
    //             $("#activeProy").html(response); 
    //             //alert(response);
    //         },
    //         error: function() {
    //             console.log("No se ha podido obtener la información");
    //         }
    
    //      });
    // });
    //Hover de Empresas
    $("#display").hover(function printData() { 
        $.ajax({    //create an ajax request to display.php
            type: "GET",
            data: {"idOwner" : $("#idOwner").val()},
            url: "../mostrarEmpresas.php",             
            dataType: "html",   //expect html to be returned                
            success: function(response){                    
                $("#responsecontainer").html(response); 
                //alert(response);
            },
            error: function() {
                console.log("No se ha podido obtener la información");
            }
    
         });
    });
    //Mostrar el nombre de la empresa en la q estoy
    $.ajax({    
        type: "GET",
        data: {"idEmp" : $("#idEmp").val()},
        url: "../mostrarNombreEmpresa.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#empName").html(response); 
            //alert(response);
        },
        error: function() {
            console.log("No se ha podido obtener el nombre de la Empresa");
        }

    });
});