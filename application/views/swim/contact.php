<style>
    #map{
        height :500px;
        width : 100%;

    }
</style>





<!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Class Locations

      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Contact</li>
      </ol>

      <!-- Content Row -->
      <div class="row">
        <!-- Map Column -->
        <div class="col-lg-8 mb-4">
          <!-- Embedded Google Map -->


            <div class="container-fluid" id = map>


                <div id="map"></div>
                <script>
                    function initMap(){
                        // Map options
                        var options = {
                            zoom:13,
                            center:{lat : 6.894070, lng: 79.902481}
                        }

                        // New map
                        var map = new google.maps.Map(document.getElementById('map'), options);




                        // Array of markers
                        var markers = [
                            {
                                coords:{lat : 7.290572, lng: 80.633728},
                                content:'<h2>Kandy</h2>'
                            },
                            {
                                coords:{lat : 6.927079, lng: 79.861244},
                                content:'<h2>Colombo MA</h2>'
                            },
                            {
                                coords:{lat : 6.894070, lng: 79.902481}
                            }
                        ];

                        // Loop through markers
                        for(var i = 0;i < markers.length;i++){
                            // Add marker
                            addMarker(markers[i]);
                        }

                        // Add Marker Function
                        function addMarker(props){
                            var marker = new google.maps.Marker({
                                position:props.coords,
                                map:map,
                                //icon:props.iconImage
                            });

                            // Check for customicon
                            if(props.iconImage){
                                // Set icon image
                                marker.setIcon(props.iconImage);
                            }

                            // Check content
                            if(props.content){
                                var infoWindow = new google.maps.InfoWindow({
                                    content:props.content
                                });

                                marker.addListener('click', function(){
                                    infoWindow.open(map, marker);
                                });
                            }
                        }
                    }
                </script>
                <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZqgB95gjNr18bqMG7TFjFTLuJr6OMRAY&callback=initMap">

                </script>

            </div>

        </div>
        <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4">
          <h3>Contact Details</h3>
          <p>
            3481 Melrose Place
            <br>Beverly Hills, CA 90210
            <br>
          </p>
          <p>
            <abbr title="Phone">P</abbr>: (123) 456-7890
          </p>
          <p>
            <abbr title="Email">E</abbr>:
            <a href="mailto:name@example.com">name@example.com
            </a>
          </p>
          <p>
            <abbr title="Hours">H</abbr>: Monday - Friday: 9:00 AM to 5:00 PM
          </p>
        </div>
      </div>
      <!-- /.row -->

      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
        xzc ,c

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

