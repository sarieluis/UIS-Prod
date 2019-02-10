<footer class="footer">
  <div class="container">
    <div class="footer-top">
      <a href="#" onclick="openLink('https://www.uiscanada.com/?utm_campaign=')" class="footer-top-logo footer-top-item">
        <img src="<?php echo get_stylesheet_directory_uri() ?>/inmanage/lp-pages/families/assets/images/logo-white.png" alt="">
      </a>
      <div class="footer-top-item">
        <span>68 Water Street, Office 406,</span>
        <span>Gastown, Vancouver,</span>
        <span>BC V6B 1A4, Canada</span>
      </div>
      <div class="footer-top-item">
        <span><a href="tel:+16479511500">+1-604-262-3728</a></span>
        <span><a href="mailto:Support@uiscanada.com">Support@uiscanada.com</a></span>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="copyright-top">All rights reserved to U.M.C Ltd. Eichhornstraße 3, 10785 Berlin, Germany</div>
      <div class="copyright-bottom">Copyright &copy; 2017</div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>

<script type="text/javascript">
    function setCookie(name, value, days){
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        var expires = "; expires=" + date.toGMTString();
        document.cookie = name + "=" + value + expires;
    }
    function getParam(p){
        var match = RegExp('[?&]' + p + '=([^&]*)').exec(window.location.search);
        return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
    }
    var gclid = getParam('gclid');
    if(gclid){
        var gclsrc = getParam('gclsrc');
        if(!gclsrc || gclsrc.indexOf('aw') !== -1){
            setCookie('gclid', gclid, 90);
        }
    }
</script>

</body>
</html>