
  $(document).ready(function(){

    //jQuery Hide/Show
        // Desaparecer y Aparecer
        $("#fadeHideButton").click(function(){
            $("#tablaDiv2").hide();
        });
        $("#fadeShowButton").click(function(){
            $("#tablaDiv2").show();
        });
    
        // Desaparecer y Aparecer con un Boton 
        $("#toggleButton").click(function(){
            $("#tablaDiv").toggle();
        });

    //jQuery fade

        //fadeIn
        $("#fadeInButton").click(function(){
            $("#cardDiv").fadeIn(1000);
        });
        //fadeOut
        $("#fadeOutButton").click(function(){
            $("#cardDiv").fadeOut(1000);
        });

        //fadeToggle
        $("fadeToggleButton").click(function(){
            $("#tablaDiv").fadeToggle(1000);
        });

        //fadeTo
        $("#fadeToButton").click(function(){
        // Obtén la opacidad actual del cuadrado
        var OpacidadActual = $("#tablaDiv").css('opacity');

        // Cambia la opacidad al 0.5 (50%) si es 1 (100%), o al 1 (100%) si es diferente de 1
        var targetOpacidad = (OpacidadActual === '1') ? '0.5' : '1';

        // Utiliza fadeTo() para animar el cambio de opacidad del cuadrado
        $("#tablaDiv").fadeTo("slow", targetOpacidad);
        });

    //jQuery Slide 
        
        //Slide Up
        $("#slideUpButton").click(function(){
            // Utiliza slideDown para mostrar el elemento con un efecto de deslizamiento hacia abajo
            $("#slideDiv").slideUp("slow");
        });
        //Slide Down
        $("#slideDownButton").click(function(){
            // Utiliza slideDown para mostrar el elemento con un efecto de deslizamiento hacia abajo
            $("#slideDiv").slideDown("slow");
        });
        
        $("#slideToggleButton").click(function(){
            // Utiliza slideDown para mostrar el elemento con un efecto de deslizamiento hacia abajo
            $("#slideToggleDiv").slideToggle("slow");
        });




    



  });
