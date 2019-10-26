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
        data: {"idProy" : $("#idProy").val()},
        url: "../scriptsPHP/mostrarNombreProy.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#proyName").html(response); 
            //alert(response);
        },
        error: function() {
            console.log("No se ha podido obtener el nombre del proyecto");
        }

    });
    $("#añadirTarea").click(function (){
        if($("#nameTarea").val()){
            console.log($("#deadline").val());
            $.ajax({    
                type: "POST",
                data: {
                    "idProy"         : $("#idProy").val(),
                    "name"          : $("#nameTarea").val(),
                    "descripcion"   : $("#descripcionTarea").val()
                },
                url: "../scriptsPHP/addTareas.php",             
                dataType: "html",   //expect html to be returned                
                success: function(response){                    
                    $("#rAñadirTarea").html(response); 
                    listaTareas();
                    
                },
                error: function() {
                    $("#rAñadirTarea").html("<p>Error!</p>"); 
                }
        });
        }else{
            $("#rAñadirTarea").html("<p>El nombre es requerido</p>"); 
        }
    });
    listaTareas();
    $(document).on("click", ".estado" , function() {
        let idTarea = $(this).attr('idTarea');
        $.ajax({
            type: "POST",
            url: "../scriptsPHP/cambiarEstadoTarea.php",  
            data: {
                "idTarea" : idTarea
                },
            dataType: "html",
            success: function (response) {
                console.log(response);
                listaTareas();
            },
            error: function(){
                console.log("<p> Error en el servidor</p>");
            }
        });
    });
    $(document).on("click", ".borrarPart" , function() {
        let idTarea = $(this).attr('idtarea');
        let idUser = $(this).attr('iduser');
        $.ajax({
            type: "POST",
            url: "../scriptsPHP/deleteUserTarea.php",  
            data: {
                "idTarea" : idTarea,
                "idUser": idUser
                },
            dataType: "html",
            success: function (response) {
                console.log(response);
                listaTareas();

            },
            error: function(){
                console.log("<p> Error en el servidor</p>");
            }
        });
    });
     $(document).on("click", ".cañadirpart" , function() {
        let idTarea = $(this).attr('idTarea');
        email = document.getElementById("namepart"+idTarea);      
        output = document.getElementById("rAñadirPart"+idTarea);
        $.ajax({
            type: "POST",
            url: "../scriptsPHP/addUserTarea.php",  
            data: {
                "idTarea" : idTarea,
                "email": $(email).val()
                },
            dataType: "html",
            success: function (response) {
                $(output).html(response);
                listaTareas();
            },
            error: function(){
                $(output).html("<p> Error en el servidor</p>");
            }
        });
    });

    $(document).on("click", ".borrarT" , function() {
        let idTarea = $(this).attr('idTarea');
        $.ajax({
            type: "POST",
            url: "../scriptsPHP/deleteTarea.php",  
            data: {
                "idTarea" : idTarea
                },
            dataType: "html",
            success: function (response) {
                console.log(response);
                listaTareas();
            },
            error: function(){
                console.log(response);
            }
        });
    });
        
    function listaTareas(){
    $.ajax({    //create an ajax request to display.php
        type: "POST",
        data: {"idProy" : $("#idProy").val()},
        url: "../scriptsPHP/mostrarTareas.php",             
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#tareasmuestreo").html(response); 
            //alert(response);
        },
        error: function() {
            console.log("No se ha podido obtener la información");
        }
    });
    }
    $(document).on("click", "#desc" , function() {
        var idm = $(this).attr('xd');
        console.log(idm);
        var aux = "modal"+idm;
        console.log(aux);
      
        cell=document.getElementById(aux);
        cell.style.display="block";
    });
    $(document).on("click", "#close" , function() {
        var idm = $(this).attr('xd');
        console.log(idm);
        var aux = "modal"+idm;
        console.log(aux);
      
        cell=document.getElementById(aux);
        cell.style.display="none";
    });
    $(document).on("click", "#part" , function() {
        var idm = $(this).attr('xd');
        console.log(idm);
        var aux = "modalpart"+idm;
        console.log(aux);
      
        cell=document.getElementById(aux);
        cell.style.display="block";
    });
    $(document).on("click", "#closep" , function() {
        var idm = $(this).attr('xd');
        console.log(idm);
        var aux = "modalpart"+idm;
        console.log(aux);
      
        cell=document.getElementById(aux);
        cell.style.display="none";
                   
         $("#añadirp2").show();
        $("#añadirpartd").hide();
        
        
    });
});