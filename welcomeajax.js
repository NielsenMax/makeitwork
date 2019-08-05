$(document).ready(function(){

    $("#agregarEmpresa").on("click",
        function () {
           $.ajax({
                
                data: {"name" : $("#nombre_empresa").val(), "idOwner" : $("#idOwner").val() },
                type: "POST",
                dataType: 'text',
                url: 'crearEmpresa.php',
                error: function() {
                    alert("No se ha podido obtener la información");
                }
            }).fail( function( jqXHR, textStatus, errorThrown ) {
                console.log( textStatus );
            });
            /*$.post(
                '../crearEmpresa.php',
                {"name" : $(".nombre_empresa").val()},
                function (data, status, xhr) {
                    alert('Request status: ' + status);
                    alert(data);
                }
            );*/
        }
    );
    /*$("#display").on('click',printData());
    function printData(){
       $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "mostrarEmpresas.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#responsecontainer").html(response); 
            //alert(response);
        }

            });
    }*/
  
    $("#display").click(function printData() { 
    $.ajax({    //create an ajax request to display.php
        type: "GET",
        data: {"idOwner" : $("#idOwner").val()},
        url: "mostrarEmpresas.php",             
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
  
    $(document).on('click', '.addU', function(){
        var idEmp = jQuery(this).attr("id");
        var idInp = "#email"+idEmp; 
        console.log($(idInp).val());
        $.ajax({    //create an ajax request to display.php
            type: "POST",
            data: {"idEmpresa" : idEmp, "email" : $(idInp).val() },
            url: "addUser2Emp.php",             
            dataType: "html",   //expect html to be returned                
            success: function(response){                    
                $("#respAddU").html(response); 
                //alert(response);
            },
            error: function() {
                console.log("No se ha podido obtener la información");
            }
    
         });
    });
  
});