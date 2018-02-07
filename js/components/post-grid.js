$(document).ready(function(){

  var maxH = 0

  $('.post_grid article').each(function(){

    var h = parseInt($(this).height())

    if ( h > maxH ) {
      maxH = h
    }

  })


  $('.post_grid article').height(maxH)

})
