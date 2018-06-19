/**
 * @Author: Die Coding <www.diecoding.com>
 * @Date:   16 February 2018
 * @Email:  diecoding@gmail.com
 * @Last modified by:   Die Coding <www.diecoding.com>
 * @Last modified time: 16 June 2018
 * @License: MIT
 * @Copyright: 2018
 */


(function($){

  /* ---------------------------------------------------------------------------
  * Bootstrap
  * --------------------------------------------------------------------------- */

  $('[data-toggle="tooltip"]').tooltip();
  $('[data-toggle="popover"]').popover();

  /* ---------------------------------------------------------------------------
  * Scroll | niceScroll
  * --------------------------------------------------------------------------- */

  $("body").niceScroll();


  /* ---------------------------------------------------------------------------
  * IE Fixes
  * --------------------------------------------------------------------------- */

  function checkIE(){
    // IE 9
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");
    if( msie > 0 && parseInt(ua.substring(msie + 5, ua.indexOf(".", msie))) == 9 ){
      $("body").addClass("ie");
    }
  }
  checkIE();

})(jQuery);
