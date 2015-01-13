
if (!window['console']) {
    (function() {
      var names = ["log", "debug", "info", "warn", "error", "assert", "dir", "dirxml",
      "group", "groupEnd", "time", "timeEnd", "count", "trace", "profile", "profileEnd"];
      window.console = {};
      for (var i = 0; i < names.length; ++i) {
        window.console[names[i]] = function() {};
      }
    }());
  }

var Flash = new(function() {

    // private vars
    var _self = this;
    var _mode = null;

    var VIEW_CONSUMER = 'viewConsumer';
    var VIEW_CLUSTER = 'viewCluster';
    var VIEW_ENVIRONMENT = 'viewEnvironment';
    var VIEW_FINANCIAL = 'viewFinancial';
    var VIEW_INFRASTRUCTURE = 'viewInfrastructure';
    var VIEW_REGULATIONS = 'viewRegulations';

    // public vars
    this.name = "Flash";

// ================================================================
// ====== PUBLIC METHODS
// ================================================================

    /**
     * init
     *
     * Flash calls this once it is ready to be viewed. After it loads XML,
     * image maps, and starts going.
     *
     * @return void
     */
    this.init = function init() {
        $('#flashVideoOuter').stop().animate({
            opacity: 1
        }, 500);
    };

    /**
     * trace
     *
     * Flash can call this for easy debugging
     *
     * @param string $value
     * @return void
     */
    this.trace = function trace($value) {
        //console.log($value);
    };


// ================================================================
// ====== FLASH METHODS
// ================================================================

    /**
     * onMoreClick
     *
     * Flash method for when someone clicks the "More" button in the
     * Tooltip of the Flash file.
     *
     * @param string $country_code (US, DE, etc)
     * @return void
     */
    this.onMoreClick = function onMoreClick($country_code) {
        //var url = window.location.toString().split('?');
        window.location = '/country/?' + $country_code.toLowerCase();
    };

    /**
     * onCountryNameClick
     *
     * Flash method for when someone clicks a name in Component View.
     *
     * @param string $country_code (US, DE, etc)
     * @return void
     */
    this.onCountryNameClick = function onCountryNameClick($country_code) {
        //var url = window.location.toString().split('?');
        window.location = '/country/?' + $country_code.toLowerCase();
    };


// ================================================================
// ====== PRIVATE METHODS
// ================================================================

    function _getFlash($name) {
         if (navigator.appName.indexOf("Microsoft") != -1) {
             return window[$name];
         } else {
             return document[$name];
         }
     };

     /**
      * setOverallMode
      *
      * Change view to work with Overall mode.
      */
    this.setOverallMode = function setOverallMode() {
        if (_mode == null) {
            return false;
        }

        // unset mode
        _mode = null;

        // hide all copy
        $('#Flash .text-block').stop().fadeOut();
     };

     /**
      * setComponentMode
      *
      * Change view to work with Overall mode.
      *
      * @param string $mode
      */
    this.setComponentMode = function setComponentMode($mode) {

        // don't go in same tab
        if (_mode == $mode) {
            return false;
        }

        // set mode
        _mode = $mode;

        // show copy
        $('#Flash .text-block').hide();
        $('#' + $mode.split('view').join('txt')).css('opacity', 0).stop().css('display', 'block').animate({
            opacity: 1.0
        }, 1000);
     };


    return this;
})();


// Ready
$(document).ready(function() {
    // Flash.attachEvents();
});
