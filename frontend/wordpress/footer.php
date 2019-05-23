<footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3 class="footer-heading mb-4 text-white">About</h3>
            <p>The Country Hotel Vatnsholt is a gorgeous newly renovated guesthouse, set in 230 acres of farm land.</p>
            <p><a href="#About_us" class="btn btn-primary pill text-white px-4">Read More</a></p>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">
                <h3 class="footer-heading mb-4 text-white">Quick Menu</h3>
                  <ul class="list-unstyled">
                    <li><a href="#Our_Rooms">Rooms</a></li>
                    <li><a href="#About_us">About</a></li>
                    <li><a href="#Location">Location</a></li>
                    <li><a href="events.html">Events</a></li>
                    <li><a href="#Contact_Us">Contact</a></li>
                    <li><a href="#booknow">Book Now</a></li>
                  </ul>
              </div>
              <div class="col-md-6">
                <h3 class="footer-heading mb-4 text-white">Ministries</h3>
                  <ul class="list-unstyled">
                    <li><a href="#">Children</a></li>
                    <li><a href="#">Women</a></li>
                    <li><a href="#">Bible Study</a></li>
                    <li><a href="#">Church</a></li>
                    <li><a href="#">Missionaries</a></li>
                  </ul>
              </div>
            </div>
          </div>

          
          <div class="col-md-2">
            <div class="col-md-12"><h3 class="footer-heading mb-4 text-white">Social Icons</h3></div>
              <div class="col-md-12">
                <p style="text-align: center;">
                  <a href="#" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
                  <a href="#" class="p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="p-2"><span class="icon-instagram"></span></a>
                </p>
              </div>
          </div>
        </div>
      </div>



    </footer>
  </div>

  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.3.1.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/popper.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.stellar.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.countdown.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/aos.js"></script>

  
  <script src="<?php echo get_template_directory_uri(); ?>/js/mediaelement-and-player.min.js"></script>

  <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
    

  <script>
      document.addEventListener('DOMContentLoaded', function() {
                var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

                for (var i = 0; i < total; i++) {
                    new MediaElementPlayer(mediaElements[i], {
                        pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                        shimScriptAccess: 'always',
                        success: function () {
                            var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                            for (var j = 0; j < targetTotal; j++) {
                                target[j].style.visibility = 'visible';
                            }
                  }
                });
                }
            });
    </script>
    <script>
      // Initialize and add the map
      function initMap() {
        // The location of Uluru
        var uluru = {lat: -25.344, lng: 131.036};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 4, center: uluru});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});
      }
      </script>
      <!--Load the API from the specified URL
      * The async attribute allows the browser to render the page while the API loads
      * The key parameter will contain your own API key (which is not needed for this tutorial)
      * The callback parameter executes the initMap() function
      -->
      <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
      </script>
    <?php wp_footer();?>
  </body>
</html>