$(document).ready(function(){

    $("#agregarEmpresa").on("click",
        function () {
           $.ajax({
                
                data: {"name" : $("#nombre_empresa").val(), "idOwner" : $("#idOwner").val() },
                type: "POST",
                dataType: 'text',
                url: '../crearEmpresa.php',
                error: function() {
                    alert("No se ha podido obtener la información");
                }
            }).fail( function( jqXHR, textStatus, errorThrown ) {
                console.log( textStatus );
            });
            $.post(
                '../crearEmpresa.php',
                {"name" : $(".nombre_empresa").val()},
                function (data, status, xhr) {
                    alert('Request status: ' + status);
                    alert(data);
                }
            );
        }
    );
    $("#foo2").on('click',printData());
    function printData(){
       $.ajax({    //create an ajax request to display.php
        type: "GET",
        data: {"idOwner" : $("#idOwner").val() },
        url: "../mostrarTodasTusEmpresas.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#empresasCreadas").html(response); 
            //alert(response);
        }

            });
    }
  
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
    $("#deleteEmpresa").click(function (){
        
        if($("#empresaBorrar").val()){
            $.ajax({    
                type: "POST",
                data: {
                    "idOwner"   : $("#idOwner").val(),
                    "emp"       : $("#empresaBorrar").val()
                },
                url: "../scriptsPHP/deleteEmpresa.php",             
                dataType: "html",   //expect html to be returned                
                success: function(response){                    
                    $("#rDelete").html(response); 
                    
                },
                error: function() {
                    $("#rDelete").html("<p>Error!</p>"); 
                }
        });
        }else{
            $("#rDelete").html("<p>El nombre es requerido</p>"); 
        }
    });
});