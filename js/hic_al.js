$(document).ready(function(){

  image_frames()

  // vcenter($('[vcenter]'))
  vcenter($('#secondary_menu-container nav ul li'))
  vcenter($('#primary_menu-container nav > ul > li'))
  vcenter($('.site-menu li'))
  vcenter($('.description-calls_to_action'))
  vcenter($('#home-cover .presentation'))
  vcenter($('#microsite-calls_to_action'))
  vcenter($('[vcenter]'))
  vcenter($('[v-center]'))
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

  site_menus()

  setup_datepickers()

  setup_microsite()

  custom_toggles()

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

    hijos.css({
      opacity:0
    }).animate({
      opacity:1
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







function setup_datepickers() {

  $('.input-daterange').datepicker({});

}



function setup_microsite() {

  setup_microsite_map()
  setup_microsite_cases()

}


function setup_microsite_cases() {

    $('#microsite-cases-list .microsite-case a').click(function(e){


      var microsite_case, microsite_cases_intro, microsite_cases_list, microsite_case_preview, close_button;

      microsite_case = $(this)
      microsite_cases_intro = $('#microsite-cases-container .content')
      microsite_cases_list = $('#microsite-cases-list')
      microsite_case_preview = $('#microsite-case-preview')
      microsite_case_preview_content = $('#microsite-case-preview .content-preview')
      close_button = $('#microsite-case-preview .close-button')

      microsite_case_preview_content.html( microsite_case.html() )

      microsite_cases_intro.hide()
      microsite_cases_list.hide()
      microsite_case_preview.show()

      close_button.click(function(){
        microsite_cases_intro.show()
        microsite_cases_list.show()
        microsite_case_preview.hide()
      })

      e.preventDefault()
      return false;

    })
}

function setup_microsite_map() {

  if( $('#microsite-cases-map').length > 0 ) {

    var map = L.map('microsite-cases-map').setView([0, 0], 1);
    var markersDictionary = {}

    var markers = L.markerClusterGroup({
      maxClusterRadius: 30
    });

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        // attribution: ''
    }).addTo(map);



    $('.location_list .location_item').each(function(){

      var lat = $(this).attr('data-latitude');
      var lng = $(this).attr('data-longitude');
      var title = $(this).find('.title').html();
      var post_id = $(this).attr('data-id');

      PostMarker = L.Marker.extend({
         post_id: post_id
      });

      var marker =  new PostMarker([lat,lng], { post_id: post_id }).addTo(map)
      .bindPopup( title )
      // .openPopup()
      markers.addLayer( marker );

      markersDictionary[post_id] = marker

      marker.on('click', function(e) {

        var clicked_post_id =  e.sourceTarget.options.post_id

        var post = $('#post_list article[data-id='+clicked_post_id+']')

        post.get(0).scrollIntoView({
          behavior: "smooth",
          block: "start"
        })
        post.addClass('active').siblings().removeClass('active')


      })

    })

    map.addLayer(markers);

    // center map on markers:

    var group = new L.featureGroup(Object.values( markersDictionary ));

    map.fitBounds(group.getBounds(), { padding: [20,20] });



    $('#post_list .location_item').click(function(){

      var markerId = $(this).attr('data-id');
      map.setView(markersDictionary[ markerId ].getLatLng())

      $(this).addClass('active')
      .siblings().removeClass('active')

      $(this).scrollIntoView({
        behavior: "smooth",
        block: "start"
      })

    })



  }




}



function custom_toggles() {


  if( $('.checkbox-hidden').length > 0 ) {
    $('.checkbox-hidden').hide()
  }

  $('.checkbox-label').click(function(){

    if( ! $(this).prev().attr('checked') == true ) {

      $(this).prev().attr('checked',true);
      $(this).addClass('checked');

    } else {

      $(this).prev().attr('checked',false);
      $(this).removeClass('checked');

    }

  })



}




function site_menus() {


  $('.site-menu li a').click(function(){

    var hash = $(this).attr('data-target')

    scrollTo( $('[data-scroll-id='+hash+']'), $('html,body') )

    return false

  })

}


function scrollTo( target, parent ) {

  // $('#main-header nav').removeClass('scroll-spy')

  var targetScroll = target.offset().top
	var parentTop  = parent.offset().top
	var headerHeight  = 0
	// var headerHeight  = $('#main-header').height()
	var currScroll = parent.scrollTop()
	var targetY = parentTop + targetScroll - headerHeight

	parent.stop().animate({
		scrollTop: targetY
	}, 1000, function(){

    // $('#main-header nav').addClass('scroll-spy')
    // $('#main-header nav li').removeClass('scrolling')

  })

}
