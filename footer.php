<section id="footer">
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
        	<?php
			            wp_nav_menu( array(
			                'menu'              => 'footer',
			                'theme_location'    => 'footer',
			                'depth'             => 2,
			                'container'         => 'ul',
			                'container_class'   => 'footer-links',
			        		'container_id'      => '',
			                'menu_class'        => 'footer-links',
			                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			                'walker'            => new wp_bootstrap_navwalker())
			            );
			        ?>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
          <div class="panel panel-default">
            <div class="panel-heading">Main Office</div>
            <div class="panel-body">
              <p>1300 Hickory Street (P.O. Box 727)</p>
              <p>Pewaukee, Wisconsin 53072-0727</p>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
          <div class="panel panel-default">
            <div class="panel-heading">Phone Number</div>
            <div class="panel-body">
              <p>Phone: <a href="tel:+12625473331">(262) 547-3331</a></p>
              <p>Toll Free: <a href="tel:+18005580507">(800) 558-0507</a></p>
              <p>Fax: <a href="tel:+12626913463">(262) 691-3463</a></p>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
          <div class="panel panel-default email">
            <div class="panel-heading">Email Address</div>
            <div class="panel-body">
              <p><a href="mailto:sales@centuryfence.com">sales@centuryfence.com</a></p>
              <br>
              <a href="<?php get_site_url(); ?>/contact-us#conlocations" class="link">View All Locations</a>
            </div>
          </div>
        </div>
      </div><!-- row -->
      <div class="row">
        <div class="last">
          <div class="col-md-2 col-lg-1">
            <?php jms_display_social_link(); ?>
          </div><!-- /column -->
          <div class="col-md-4 col-lg-5">
            <div id="copyright">
              <p class="legal-info">
                <span>Copyright 2015</span>
                <span>Century Fence</span>
                <span>All Rights Reserved</span>
              </p>
            </div><!-- /column -->
          </div><!-- /copyright -->
          <div class="col-md-2 col-lg-2 col-md-offset-2 col-lg-offset-3">
            <div id="lanex">
              <a href="http://www.lanex.com" target="_blank">
                <img src="<?php get_site_url(); ?>/wp-content/themes/centuryfence/images/lanexlogo.png" alt="Site Design by Lanex Tools for e-Business" />
              </a>
            </div>
          </div>
        </div>
      </div><!-- /row -->
    </div><!-- /container -->
  </footer>
</section>
<?php wp_footer(); ?>

  <script type="text/javascript">
    jQuery(function() {
    	if (jQuery(window).width()>=768){
        if (getCookie('modalShow') != "1"){
          setCookie("modalShow", "1", 1);
          jQuery("#myModal").modal();
        }
        function setCookie(strName, strValue, expireDays){
          var d = new Date();
          d.setTime(d.getTime() + (expireDays * 604800000));
          var expires = "expires=" + d.toGMTString();
          document.cookie = strName + "=" + strValue + "; " + expires + "; path=/";
        }
        function getCookie(strName) {
          var name = strName + "=";
          var ca = document.cookie.split(';');
          for (var i = 0; i < ca.length; i++) {
            var c = ca[i].trim();
            if (c.indexOf(name) ==0) return c.substring(name.length, c.length);
          }
          return "";
        }

     }
    });
      setTimeout(function(){
        jQuery('#myModal').modal('hide');
      }, 5000);
    jQuery(function() {
      // Inner Page Sidebar Links Animation
      jQuery('.sidebar-link ul a').waypoint(function(down){
        jQuery(this).addClass('animation');
        jQuery(this).addClass('fadeInLeft');
      }, { offset: '100%' });
      // Inner Page Blog Animation
      jQuery('.post-content .entry').waypoint(function(down){
        jQuery(this).addClass('animation');
        jQuery(this).addClass('fadeIn');
      }, { offset: '80%' });
    })
  </script>

  <script type="text/javascript">
  jQuery(function(){
	var f = jQuery('div').find('.testimonial');
	function recursive(i) {
    f.removeClass('showslide');
    f.eq(i).addClass('showslide');
    	setTimeout(function () {
        	recursive(++i % f.length);
    	}, 12000);
	}
	recursive(0);
});

jQuery(function($) {
  var owl = jQuery("#vendorOwl");
  owl.owlCarousel({
      itemsCustom : [
        [0, 4],
        [450, 4],
        [600, 4],
        [700, 4],
        [1000, 4],
        [1200, 4],
        [1400, 4],
        [1600, 4]
      ],
      navigation : false,
      pagination : false,
      autoPlay : true,
      slideSpeed : 1500
  });
});

var sync1 = jQuery(".sync1");
var sync2 = jQuery(".sync2");

sync1.owlCarousel({ singleItem : true, slideSpeed : 1000, navigation: true, pagination:false, afterAction : syncPosition, responsiveRefreshRate : 200 });

sync2.owlCarousel({ items : 15, itemsDesktop : [1199,10], itemsDesktopSmall : [979,10], itemsTablet : [768,8], itemsMobile       : [479,4], pagination:false, responsiveRefreshRate : 100, afterInit : function(el){ el.find(".owl-item").eq(0).addClass("synced"); }});

function syncPosition(el){ var current = this.currentItem;
  jQuery(".sync2")
    .find(".owl-item")
    .removeClass("synced")
    .eq(current)
    .addClass("synced")
  if(jQuery(".sync2").data("owlCarousel") !== undefined){
    center(current)
  }
}

jQuery(".sync2").on("click", ".owl-item", function(e){
  e.preventDefault();
  var number = jQuery(this).data("owlItem");
  sync1.trigger("owl.goTo",number);
});

function center(number){
  var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
  var num = number;
  var found = false;
  for(var i in sync2visible){
    if(num === sync2visible[i]){
      var found = true;
    }
  }

  if(found===false){
    if(num>sync2visible[sync2visible.length-1]){
      sync2.trigger("owl.goTo", num - sync2visible.length+2)
    }else{
      if(num - 1 === -1){
        num = 0;
      }
      sync2.trigger("owl.goTo", num);
    }
  } else if(num === sync2visible[sync2visible.length-1]){
    sync2.trigger("owl.goTo", sync2visible[1])
  } else if(num === sync2visible[0]){
    sync2.trigger("owl.goTo", num-1)
  }

}
  </script>

  <script type="text/javascript">
    jQuery('.modal').on('show', function(e) {
      var modal = jQuery(this);
      modal.css('margin-top', (modal.outerHeight() / 2) * -1)
           .css('margin-left', (modal.outerWidth() / 2) * -1);
      return this;
    });
    jQuery('.navbar-toggle').on('click', function(e) {
      jQuery('.nav').toggleClass("show");
    });
  </script>



  </body>



</html>
