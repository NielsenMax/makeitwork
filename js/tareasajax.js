$(document).ready(function(){
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

            },
            error: function(){
                $(output).html("<p> Error en el servidor</p>");
            }
        });
    });
    
    // $(document).on("click", "#añadirpart" , function() {
    //     email = document.getElementById("namepart");
    //     console.log($(email).attr('idtarea'))
      
    //     output = document.getElementById("rAñadirPart");
    //     $.ajax({
    //         type: "POST",
    //         url: "../scriptsPHP/deleteUserTarea.php",  
    //         data: {
    //             "idTarea" : $(email).attr('idtarea'),
                
    //             "email": $(email).val()
    //             },
    //         dataType: "html",
    //         success: function (response) {
    //             $(output).html(response);
    //         },
    //         error: function(){
    //             $(output).html("<p> Error en el servidor</p>");
    //         }
    //     });
    // });
});