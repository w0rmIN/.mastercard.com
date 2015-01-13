
var Application = new(function() {

    // private vars
    var _self = this;

    // public vars
    this.name = "Application";

// ================================================================
// ====== PUBLIC METHODS
// ================================================================

    this.attachEvents = function attachEvents() {
        //$('#btnFlashNavGlobal').click(_onGlobalClick);
        //$('#btnFlashNavPolar').click(_onPolarClick);
    };

    this.flashInit = function flashInit() {

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

    function _onGlobalClick() {
        $('#flashVideo').get(0)._onGlobalClick();

        return false;
    };

    function _onPolarClick() {
        $('#flashVideo').get(0)._onPolarClick();

        return false;
    };

    return this;
})();


// Ready
$(document).ready(function() {
    Application.attachEvents();
});
