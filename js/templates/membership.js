function setup_membership() {

  if( $('#membership').length > 0 ) {



    // setup map

    membership_map = L.map('membership-map', {minZoom:2}).setView([0, 0], 1);


    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        // attribution: ''
    }).addTo(membership_map);


    // setup membership space

    $('#membership .section_list > section').hide()

    var next_section = $('#membership .section_list > section').eq(0)
    next_section.show()
    .addClass('visible')
    .siblings().hide().removeClass('visible')

    load_membership_map( next_section );

    var section_title = $('#membership>header h2')
    var section_title_text = section_title.html()

    $('#membership .section-menu li a').unbind('click').click(function(e){

      // e.preventDefault()

      var index = $(this).parent().index()
      next_section = $('#membership .section_list > section').eq(index)
      next_section.show()
      .addClass('visible')
      .siblings().hide().removeClass('visible')

      if( index < 3) {

        load_membership_map( next_section )

        $('#membership-map').animate({
          opacity: 1
        })
      } else {
        $('#membership-map').animate({
          opacity: 0
        })
      }



      var subsection_title = next_section.children('h3')

      subsection_title.hide()
      var subsection_title_text = subsection_title.html()



      if(section_title.length<2) {

        var clone = section_title.clone()

        clone.insertAfter( section_title ).addClass('hidden')


      }



      var new_title = section_title_text + ": " + subsection_title_text

      section_title.not('.hidden').html( new_title )

      $(this).parent()
      .addClass('active')
      .siblings().removeClass('active')

      e.preventDefault()
      // return false

    })



  }

}




function load_membership_map( next_section ){

  markersDictionary = {}

  if( typeof(markerLayer) != "undefined" ) {
    membership_map.removeLayer(markerLayer)
  }

  markerLayer = L.markerClusterGroup({
    maxClusterRadius: 30
  });


  next_section.find('article').each(function(){

    var lng = $(this).data('longitude')
    var lat = $(this).data('latitude')
    var post_id = $(this).data('id')
    var title = $(this).find('.title').html()


    PostMarker = L.Marker.extend({
      post_id: post_id
    });

    var marker = new PostMarker([lat,lng], { post_id: post_id })//.addTo(membership_map)
    .bindPopup( title )

    markerLayer.addLayer( marker );

    markersDictionary[post_id] = marker



    marker.on('click', function(e) {

      console.log("clicked marker!");
      // var clicked_post_id =  e.sourceTarget.options.post_id
      //
      // var post = $('.post-map .post_list article[data-id='+clicked_post_id+']')
      //
      // post.get(0).scrollIntoView({
      //   behavior: "smooth",
      //   block: "start"
      // })
      //
      // post.addClass('active').siblings().removeClass('active')


    })

  })

  membership_map.addLayer(markerLayer)
  membership_map.fitBounds(markerLayer.getBounds(), { padding: [50,50] });

}
