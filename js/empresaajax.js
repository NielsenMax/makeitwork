$(document).ready(function(){
    //Hover proyectos
    $("#displayProy").hover(function printData() { 
        $.ajax({    //create an ajax request to display.php
            type: "POST",
            data: {"idEmp" : $("#idEmp").val()},
            url: "../scriptsPHP/showActiveProy.php",             
            dataType: "html",   //expect html to be returned                
            success: function(response){                    
                $("#activeProy").html(response); 
                //alert(response);
            },
            error: function() {
                console.log("No se ha podido obtener la información");
            }
    
         });
    });
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
    //Añadir usuarios a empresas
    $("#añadir").click(function (){
        $.ajax({    
            type: "POST",
            data: {
                "email" : $("#emailUser").val(),
                "idEmp" : $("#idEmp").val()
            },
            url: "../addUser2Emp.php",             
            dataType: "html",   //expect html to be returned                
            success: function(response){                    
                $("#rAñadir").html(response); 
                printeo();
                
            },
            error: function() {
                console.log("No se ha podido obtener el nombre de la Empresa");
                
            }
        });
    });
    $('#usern').click(function (){
        window.location = "welcome.php";
    });
    //Mostrar los usuarios
    $("#mostrar").click(function() { 
        $.ajax({    //create an ajax request to display.php
            type: "GET",
            data: {"idEmp" : $("#idEmp").val()},
            url: "../mostrarUsuarios.php",             
            dataType: "html",   //expect html to be returned                
            success: function(response){                    
                $("#responsecontainer2").html(response); 
                //alert(response);
            }
    
        });
      });
     function printeo() { 
        $.ajax({    //create an ajax request to display.php
            type: "GET",
            data: {"idEmp" : $("#idEmp").val()},
            url: "../mostrarUsuarios.php",             
            dataType: "html",   //expect html to be returned                
            success: function(response){                    
                $("#responsecontainer2").html(response); 
                //alert(response);
            }
    
        });
      };
    printeo();
});