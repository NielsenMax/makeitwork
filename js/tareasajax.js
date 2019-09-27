$(document).ready(function(){
    //!PONER ID del boton para añadir
    $(document).on("click", "#" , function() {
        //! Poner Id campo Email
        email = document.getElementById("");
        //! Poner id output
        output = document.getElementById("");
        $.ajax({
            type: "POST",
            url: "../scriptsPHP/addUserTarea.php",  
            data: {
                "idTarea" : email.attr('idTarea'),
                "email": email.val()
                },
            dataType: "html",
            success: function (response) {
                output.html(response);
            },
            error: function(){
                output.html("<p> Error en el servidor</p>");
            }
        });
    });

});