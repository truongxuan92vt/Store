/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
__webpack_require__(2);
module.exports = __webpack_require__(3);


/***/ }),
/* 1 */
/***/ (function(module, exports) {



/***/ }),
/* 2 */
/***/ (function(module, exports) {

throw new Error("Module build failed: ModuleBuildError: Module build failed: Error: Node Sass does not yet support your current environment: Windows 64-bit with Unsupported runtime (72)\nFor more information on which environments are supported please see:\nhttps://github.com/sass/node-sass/releases/tag/v4.9.2\n    at module.exports (F:\\Code\\php\\tx_store\\store\\node_modules\\node-sass\\lib\\binding.js:13:13)\n    at Object.<anonymous> (F:\\Code\\php\\tx_store\\store\\node_modules\\node-sass\\lib\\index.js:14:35)\n    at Module._compile (internal/modules/cjs/loader.js:955:30)\n    at Object.Module._extensions..js (internal/modules/cjs/loader.js:991:10)\n    at Module.load (internal/modules/cjs/loader.js:811:32)\n    at Function.Module._load (internal/modules/cjs/loader.js:723:14)\n    at Module.require (internal/modules/cjs/loader.js:848:19)\n    at require (internal/modules/cjs/helpers.js:74:18)\n    at Object.<anonymous> (F:\\Code\\php\\tx_store\\store\\node_modules\\sass-loader\\lib\\loader.js:3:14)\n    at Module._compile (internal/modules/cjs/loader.js:955:30)\n    at Object.Module._extensions..js (internal/modules/cjs/loader.js:991:10)\n    at Module.load (internal/modules/cjs/loader.js:811:32)\n    at Function.Module._load (internal/modules/cjs/loader.js:723:14)\n    at Module.require (internal/modules/cjs/loader.js:848:19)\n    at require (internal/modules/cjs/helpers.js:74:18)\n    at loadLoader (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\loadLoader.js:13:17)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:169:2)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:165:10)\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:173:18\n    at loadLoader (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\loadLoader.js:36:3)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:169:2)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:165:10)\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:173:18\n    at loadLoader (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\loadLoader.js:36:3)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:169:2)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:165:10)\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:173:18\n    at loadLoader (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\loadLoader.js:36:3)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:169:2)\n    at runLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:362:2)\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\webpack\\lib\\NormalModule.js:195:19\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:364:11\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:170:18\n    at loadLoader (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\loadLoader.js:27:11)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:169:2)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:165:10)\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:173:18\n    at loadLoader (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\loadLoader.js:36:3)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:169:2)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:165:10)\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:173:18\n    at loadLoader (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\loadLoader.js:36:3)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:169:2)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:165:10)\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:173:18\n    at loadLoader (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\loadLoader.js:36:3)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:169:2)\n    at runLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:362:2)\n    at NormalModule.doBuild (F:\\Code\\php\\tx_store\\store\\node_modules\\webpack\\lib\\NormalModule.js:182:3)\n    at NormalModule.build (F:\\Code\\php\\tx_store\\store\\node_modules\\webpack\\lib\\NormalModule.js:275:15)\n    at Compilation.buildModule (F:\\Code\\php\\tx_store\\store\\node_modules\\webpack\\lib\\Compilation.js:157:10)\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\webpack\\lib\\Compilation.js:460:10\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\webpack\\lib\\NormalModuleFactory.js:243:5\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\webpack\\lib\\NormalModuleFactory.js:94:13\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\tapable\\lib\\Tapable.js:268:11\n    at NormalModuleFactory.<anonymous> (F:\\Code\\php\\tx_store\\store\\node_modules\\webpack\\lib\\CompatibilityPlugin.js:52:5)\n    at NormalModuleFactory.applyPluginsAsyncWaterfall (F:\\Code\\php\\tx_store\\store\\node_modules\\tapable\\lib\\Tapable.js:272:13)\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\webpack\\lib\\NormalModuleFactory.js:69:10\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\webpack\\lib\\NormalModuleFactory.js:196:7\n    at processTicksAndRejections (internal/process/task_queues.js:76:11)");

/***/ }),
/* 3 */
/***/ (function(module, exports) {

throw new Error("Module build failed: ModuleBuildError: Module build failed: Error: Node Sass does not yet support your current environment: Windows 64-bit with Unsupported runtime (72)\nFor more information on which environments are supported please see:\nhttps://github.com/sass/node-sass/releases/tag/v4.9.2\n    at module.exports (F:\\Code\\php\\tx_store\\store\\node_modules\\node-sass\\lib\\binding.js:13:13)\n    at Object.<anonymous> (F:\\Code\\php\\tx_store\\store\\node_modules\\node-sass\\lib\\index.js:14:35)\n    at Module._compile (internal/modules/cjs/loader.js:955:30)\n    at Object.Module._extensions..js (internal/modules/cjs/loader.js:991:10)\n    at Module.load (internal/modules/cjs/loader.js:811:32)\n    at Function.Module._load (internal/modules/cjs/loader.js:723:14)\n    at Module.require (internal/modules/cjs/loader.js:848:19)\n    at require (internal/modules/cjs/helpers.js:74:18)\n    at Object.<anonymous> (F:\\Code\\php\\tx_store\\store\\node_modules\\sass-loader\\lib\\loader.js:3:14)\n    at Module._compile (internal/modules/cjs/loader.js:955:30)\n    at Object.Module._extensions..js (internal/modules/cjs/loader.js:991:10)\n    at Module.load (internal/modules/cjs/loader.js:811:32)\n    at Function.Module._load (internal/modules/cjs/loader.js:723:14)\n    at Module.require (internal/modules/cjs/loader.js:848:19)\n    at require (internal/modules/cjs/helpers.js:74:18)\n    at loadLoader (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\loadLoader.js:13:17)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:169:2)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:165:10)\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:173:18\n    at loadLoader (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\loadLoader.js:36:3)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:169:2)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:165:10)\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:173:18\n    at loadLoader (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\loadLoader.js:36:3)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:169:2)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:165:10)\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:173:18\n    at loadLoader (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\loadLoader.js:36:3)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:169:2)\n    at runLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:362:2)\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\webpack\\lib\\NormalModule.js:195:19\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:364:11\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:170:18\n    at loadLoader (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\loadLoader.js:27:11)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:169:2)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:165:10)\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:173:18\n    at loadLoader (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\loadLoader.js:36:3)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:169:2)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:165:10)\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:173:18\n    at loadLoader (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\loadLoader.js:36:3)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:169:2)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:165:10)\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:173:18\n    at loadLoader (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\loadLoader.js:36:3)\n    at iteratePitchingLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:169:2)\n    at runLoaders (F:\\Code\\php\\tx_store\\store\\node_modules\\loader-runner\\lib\\LoaderRunner.js:362:2)\n    at NormalModule.doBuild (F:\\Code\\php\\tx_store\\store\\node_modules\\webpack\\lib\\NormalModule.js:182:3)\n    at NormalModule.build (F:\\Code\\php\\tx_store\\store\\node_modules\\webpack\\lib\\NormalModule.js:275:15)\n    at Compilation.buildModule (F:\\Code\\php\\tx_store\\store\\node_modules\\webpack\\lib\\Compilation.js:157:10)\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\webpack\\lib\\Compilation.js:460:10\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\webpack\\lib\\NormalModuleFactory.js:243:5\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\webpack\\lib\\NormalModuleFactory.js:94:13\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\tapable\\lib\\Tapable.js:268:11\n    at NormalModuleFactory.<anonymous> (F:\\Code\\php\\tx_store\\store\\node_modules\\webpack\\lib\\CompatibilityPlugin.js:52:5)\n    at NormalModuleFactory.applyPluginsAsyncWaterfall (F:\\Code\\php\\tx_store\\store\\node_modules\\tapable\\lib\\Tapable.js:272:13)\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\webpack\\lib\\NormalModuleFactory.js:69:10\n    at F:\\Code\\php\\tx_store\\store\\node_modules\\webpack\\lib\\NormalModuleFactory.js:196:7\n    at processTicksAndRejections (internal/process/task_queues.js:76:11)");

/***/ })
/******/ ]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgMjdhMGQ0YmFlNDAzZWQ1NGExMDQiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IjtBQUFBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOzs7QUFHQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxhQUFLO0FBQ0w7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxtQ0FBMkIsMEJBQTBCLEVBQUU7QUFDdkQseUNBQWlDLGVBQWU7QUFDaEQ7QUFDQTtBQUNBOztBQUVBO0FBQ0EsOERBQXNELCtEQUErRDs7QUFFckg7QUFDQTs7QUFFQTtBQUNBIiwiZmlsZSI6IlxcYXNzZXRzXFx3ZWJzXFxhcHAuanMiLCJzb3VyY2VzQ29udGVudCI6WyIgXHQvLyBUaGUgbW9kdWxlIGNhY2hlXG4gXHR2YXIgaW5zdGFsbGVkTW9kdWxlcyA9IHt9O1xuXG4gXHQvLyBUaGUgcmVxdWlyZSBmdW5jdGlvblxuIFx0ZnVuY3Rpb24gX193ZWJwYWNrX3JlcXVpcmVfXyhtb2R1bGVJZCkge1xuXG4gXHRcdC8vIENoZWNrIGlmIG1vZHVsZSBpcyBpbiBjYWNoZVxuIFx0XHRpZihpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSkge1xuIFx0XHRcdHJldHVybiBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXS5leHBvcnRzO1xuIFx0XHR9XG4gXHRcdC8vIENyZWF0ZSBhIG5ldyBtb2R1bGUgKGFuZCBwdXQgaXQgaW50byB0aGUgY2FjaGUpXG4gXHRcdHZhciBtb2R1bGUgPSBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSA9IHtcbiBcdFx0XHRpOiBtb2R1bGVJZCxcbiBcdFx0XHRsOiBmYWxzZSxcbiBcdFx0XHRleHBvcnRzOiB7fVxuIFx0XHR9O1xuXG4gXHRcdC8vIEV4ZWN1dGUgdGhlIG1vZHVsZSBmdW5jdGlvblxuIFx0XHRtb2R1bGVzW21vZHVsZUlkXS5jYWxsKG1vZHVsZS5leHBvcnRzLCBtb2R1bGUsIG1vZHVsZS5leHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKTtcblxuIFx0XHQvLyBGbGFnIHRoZSBtb2R1bGUgYXMgbG9hZGVkXG4gXHRcdG1vZHVsZS5sID0gdHJ1ZTtcblxuIFx0XHQvLyBSZXR1cm4gdGhlIGV4cG9ydHMgb2YgdGhlIG1vZHVsZVxuIFx0XHRyZXR1cm4gbW9kdWxlLmV4cG9ydHM7XG4gXHR9XG5cblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGVzIG9iamVjdCAoX193ZWJwYWNrX21vZHVsZXNfXylcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubSA9IG1vZHVsZXM7XG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlIGNhY2hlXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmMgPSBpbnN0YWxsZWRNb2R1bGVzO1xuXG4gXHQvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9uIGZvciBoYXJtb255IGV4cG9ydHNcbiBcdF9fd2VicGFja19yZXF1aXJlX18uZCA9IGZ1bmN0aW9uKGV4cG9ydHMsIG5hbWUsIGdldHRlcikge1xuIFx0XHRpZighX193ZWJwYWNrX3JlcXVpcmVfXy5vKGV4cG9ydHMsIG5hbWUpKSB7XG4gXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIG5hbWUsIHtcbiBcdFx0XHRcdGNvbmZpZ3VyYWJsZTogZmFsc2UsXG4gXHRcdFx0XHRlbnVtZXJhYmxlOiB0cnVlLFxuIFx0XHRcdFx0Z2V0OiBnZXR0ZXJcbiBcdFx0XHR9KTtcbiBcdFx0fVxuIFx0fTtcblxuIFx0Ly8gZ2V0RGVmYXVsdEV4cG9ydCBmdW5jdGlvbiBmb3IgY29tcGF0aWJpbGl0eSB3aXRoIG5vbi1oYXJtb255IG1vZHVsZXNcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubiA9IGZ1bmN0aW9uKG1vZHVsZSkge1xuIFx0XHR2YXIgZ2V0dGVyID0gbW9kdWxlICYmIG1vZHVsZS5fX2VzTW9kdWxlID9cbiBcdFx0XHRmdW5jdGlvbiBnZXREZWZhdWx0KCkgeyByZXR1cm4gbW9kdWxlWydkZWZhdWx0J107IH0gOlxuIFx0XHRcdGZ1bmN0aW9uIGdldE1vZHVsZUV4cG9ydHMoKSB7IHJldHVybiBtb2R1bGU7IH07XG4gXHRcdF9fd2VicGFja19yZXF1aXJlX18uZChnZXR0ZXIsICdhJywgZ2V0dGVyKTtcbiBcdFx0cmV0dXJuIGdldHRlcjtcbiBcdH07XG5cbiBcdC8vIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbFxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5vID0gZnVuY3Rpb24ob2JqZWN0LCBwcm9wZXJ0eSkgeyByZXR1cm4gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iamVjdCwgcHJvcGVydHkpOyB9O1xuXG4gXHQvLyBfX3dlYnBhY2tfcHVibGljX3BhdGhfX1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5wID0gXCJcIjtcblxuIFx0Ly8gTG9hZCBlbnRyeSBtb2R1bGUgYW5kIHJldHVybiBleHBvcnRzXG4gXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhfX3dlYnBhY2tfcmVxdWlyZV9fLnMgPSAwKTtcblxuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyB3ZWJwYWNrL2Jvb3RzdHJhcCAyN2EwZDRiYWU0MDNlZDU0YTEwNCJdLCJzb3VyY2VSb290IjoiIn0=