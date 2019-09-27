$(document).ready(function(){
    $(document).on("click", "#añadirpart" , function() {
        email = document.getElementById("namepart");
        console.log($(email).attr('idtarea'))
      
        output = document.getElementById("rAñadirPart");
        $.ajax({
            type: "POST",
            url: "../scriptsPHP/addUserTarea.php",  
            data: {
                "idTarea" : $(email).attr('idtarea'),
                
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

});