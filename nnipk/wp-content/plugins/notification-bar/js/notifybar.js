(function(e){e.fn.notifybar=function(t){var n={staytime:"6000"};var t=e.extend(n,t);return this.each(function(){function i(){clearTimeout(r)}function s(){objPush.css("height",41).show();r=setTimeout(function(){obj.slideUp("fast");objDwn.slideDown();u()},n.staytime)}function o(){var e=1;objPush.css("height",e+40);objPush.slideDown("fast")}function u(){objPush.css("height","");objPush.slideUp("fast")}var n=t;obj=e(this);objDwn=e(obj.find(".nbar_downArr").attr("href"));objPush=e(".notifybar_push");var r;s();obj.find("a.notifybar_close").click(function(){i();obj.slideUp("fast");objDwn.slideDown();u()});objDwn.click(function(){e(this).hide();i();obj.slideDown("fast");o()});if(jQuery("#notifybar").find("a.nb_fromthis").length==0||!jQuery("#notifybar").find("a.nb_fromthis:visible").length){jQuery("#notifybar,#nbar_downArr,.notifybar_push").remove()}})}})(jQuery)