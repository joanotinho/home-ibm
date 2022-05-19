/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/admin/mobile/scripts/dragDrop.js":
/*!*******************************************************!*\
  !*** ./resources/js/admin/mobile/scripts/dragDrop.js ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "dragDrop": () => (/* binding */ dragDrop)
/* harmony export */ });
var dragDrop = function dragDrop() {
  // get our elements
  var slides = document.querySelectorAll('.draggable-field');
  slides.forEach(function (slide, index) {
    var slider = slide.closest('.draggable-container');
    var background = slider.querySelector('.draggable-background'); // set up our state

    var isDragging = false,
        startPos = 0,
        currentTranslate = 0,
        animationID = 0; // add our event listeners

    var sildeItem = slide.querySelector('.draggable-item'); // disable default image drag

    sildeItem.addEventListener('dragstart', function (e) {
      return e.preventDefault();
    }); // touch events

    slide.addEventListener('touchstart', function (event) {
      startPos = getPositionX(event);
      isDragging = true;
      animationID = requestAnimationFrame(animation);
      slide.classList.add('grabbing');
    });
    slide.addEventListener('touchend', function () {
      cancelAnimationFrame(animationID);
      isDragging = false; // if moved enough negative then snap to next slide if there is one

      if (currentTranslate < -100) {
        console.log("has eliminado el elemento");
        slide.classList.add('slide');
        currentTranslate = -1000;
        setTimeout(function () {
          background.classList.remove('green');
          background.classList.remove('red');
          slide.classList.remove('slide');
          slider.remove();
        }, 150);
      } // if moved enough positive then snap to previous slide if there is one


      if (currentTranslate > 100) {
        console.log("has entrado en modo edición");
        currentTranslate = 1000;
        slide.classList.add('slide');
        setTimeout(function () {
          background.classList.remove('green');
          background.classList.remove('red');
          slide.classList.remove('slide');
          slider.remove();
        }, 150);
      } else if (currentTranslate > -100 && currentTranslate < 100) {
        currentTranslate = 0;
      }

      slide.classList.remove('grabbing');
    });
    slide.addEventListener('touchmove', function (event) {
      if (isDragging) {
        var currentPosition = getPositionX(event);
        currentTranslate = currentPosition - startPos;

        if (currentTranslate > 1) {
          background.classList.add('green');
          background.classList.remove('red');
        } else if (currentTranslate < 0) {
          background.classList.remove('green');
          background.classList.add('red');
        }
      }
    }); // make responsive to viewport changes
    // window.addEventListener('resize', setPositionByIndex)
    // prevent menu popup on long press

    window.oncontextmenu = function (event) {
      event.preventDefault();
      event.stopPropagation();
      return false;
    };

    function getPositionX(event) {
      return event.type.includes('mouse') ? event.pageX : event.touches[0].clientX;
    }

    function animation() {
      setSliderPosition();
      if (isDragging) requestAnimationFrame(animation);
    }

    function setSliderPosition() {
      slide.style.transform = "translateX(".concat(currentTranslate, "px)");
    }
  });
};

/***/ }),

/***/ "./resources/js/admin/mobile/scripts/filter.js":
/*!*****************************************************!*\
  !*** ./resources/js/admin/mobile/scripts/filter.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "filter": () => (/* binding */ filter)
/* harmony export */ });
var filter = function filter() {
  var filterContainer = document.querySelector('.filters-container');
  var filterIcons = document.querySelector('.filter-icons');
  var shownIcon = document.querySelector('.shown-icon');
  var hiddenIcon = document.querySelector('.hidden-icon');
  hiddenIcon.addEventListener('click', function () {
    filterIcons.classList.add('active');
    filterContainer.classList.add('active');
  });
  shownIcon.addEventListener('click', function () {
    filterIcons.classList.remove('active');
    filterContainer.classList.remove('active');
  });
};

/***/ }),

/***/ "./resources/js/admin/mobile/scripts/menuButton.js":
/*!*********************************************************!*\
  !*** ./resources/js/admin/mobile/scripts/menuButton.js ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "menuButton": () => (/* binding */ menuButton)
/* harmony export */ });
function menuButton() {
  var hamburger = document.querySelector(".hamburger");
  var menu = document.querySelector(".menu");
  hamburger.addEventListener('click', function () {
    hamburger.classList.toggle("active");
    menu.classList.toggle("active");
  });
}

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!*************************************************!*\
  !*** ./resources/js/admin/mobile/app-mobile.js ***!
  \*************************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _scripts_menuButton_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./scripts/menuButton.js */ "./resources/js/admin/mobile/scripts/menuButton.js");
/* harmony import */ var _scripts_filter_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./scripts/filter.js */ "./resources/js/admin/mobile/scripts/filter.js");
/* harmony import */ var _scripts_dragDrop_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./scripts/dragDrop.js */ "./resources/js/admin/mobile/scripts/dragDrop.js");



(0,_scripts_menuButton_js__WEBPACK_IMPORTED_MODULE_0__.menuButton)();
(0,_scripts_filter_js__WEBPACK_IMPORTED_MODULE_1__.filter)();
(0,_scripts_dragDrop_js__WEBPACK_IMPORTED_MODULE_2__.dragDrop)();
})();

/******/ })()
;