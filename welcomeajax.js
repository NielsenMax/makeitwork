$(document).ready(function(){

    $("#agregarEmpresa").on("click",
        function () {
            $(this).hide();
           $.ajax({
                
                data: {"name" : $("#nombre_empresa").val(), "idOwner" : $("#idOwner").val() },
                //Cambiar a type: POST si necesario
                type: "POST",
                dataType: 'text',
                url: 'crearEmpresa.php',
                success: function(respuesta) {
                    printData();
                },
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
   // $("#display").click(printData());
   /* function printData(){
        $.ajax({
            type:"POST",
            dataType:"json",
            url:"mostrarEmpresas.php",
            success: function(resp){
               
            
                resp.forEach(function(row) {
                    $("#output").append('<tr id="pito" style="background-color: red; font-size: 30px; border-style: solid;">');
                    $("#output").css({
                    })
                    row.forEach(function(cell) {
                        $("#pito").append(cell+" ");
                        $("#pito").css({
                            
                            "background-color":"red",
                                    "font-size":  "30px",
                                    "border-style" : "solid"
                            
                        });
                    });
                    $("#pito").append('<br>');
                  });
            
            },
            error: function(){
                console.log("F");
            }
        });
    }*/
    $("#display").click(function() { 
    $.ajax({    //create an ajax request to display.php
        type: "GET",
        url: "mostrarEmpresas.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#responsecontainer").html(response); 
            //alert(response);
        }

    });
  });
});