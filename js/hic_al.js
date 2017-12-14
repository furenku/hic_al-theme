$(document).ready(function(){

   image_frames()

   // vcenter($('[vcenter]'))
   vcenter($('#secondary_menu-container nav ul li'))
   vcenter($('#primary_menu-container nav > ul > li'))
   vcenter($('#home-cover .presentation'))
   vcenter($('[vcenter]'))
   // vcenter($('#form-container'))


   // adjustCollapseView();
   // $(window).on("resize", function(){
   //     adjustCollapseView();
   // });


   $('.archive .content-list').isotope({
     itemSelector: '.archive-item',
     percentPosition: true,
      // masonry: {
      //   // use element for option
      //   columnWidth: '.article-item'
      // }
   })



   console.log("HIC AL theme ready")

})

function image_frames() {

   $('[image-frame]').each(function(){

      // if( ! $(this).find('img').hasClass('b-lazy') ) {
      //
         if( typeof $(this).attr('contain') !== typeof undefined && $(this).attr('contain') !== false) {

            if( typeof $(this).attr('left') !== typeof undefined && $(this).attr('left') !== false) {

               $(this).imgLiquid({
                  fill: false,
                  horizontalAlign: 'left'
               })

            } else {
               $(this).imgLiquid({
                  fill: false
               })
            }

         } else {

            $(this).imgLiquid()

         }

      //
      // }

   })

}


function vcenter(contenedores){

   contenedores.each(function(){

      contenedor = $(this)

      hijos = contenedor.children()

      // vamos a eliminar el marginTop del primer hijo
      hijos.first().css({
         marginTop: 0
      })
      // vamos a eliminar el marginBottom del ultimo hijo
      hijos.last().css({
         marginBottom: 0
      })

      alturaHijos = 0


      // recorrer cada uno de sus hijos para obtener su altura
      hijos.each(function(){

         hijo = $(this)

         // sumar la altura de cada hijo a la altura total
         alturaHijos += hijo.outerHeight(true)

      })

      diferencia = contenedor.height() - alturaHijos

      distanciaParaCentrar = diferencia / 2

      contenedor.css({
         paddingTop: distanciaParaCentrar
      })

   })
}







function adjustCollapseView(){
    var desktopView = $(document).width();
    if(desktopView >= "768"){
        $("#accordion-1 a[data-toggle]").attr("data-toggle","");
        $("#accordion-1 .collapse").addClass("in").css("height","auto")
    }else{
        $("#accordion-1 a[data-toggle]").attr("data-toggle","collapse");
        $("#accordion-1 .collapse").removeClass("in").css("height","0")
        $("#accordion-1 .collapse:first").addClass("in").css("height","auto")
    }
}
