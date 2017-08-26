$(document).ready(function(){


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


console.log("HIC AL theme ready")

})
