<!-- /*
* JQ Squarebox
*
* Copyright 2012 Ryan J. Bridglal
*
*
* Free to use under the GNU GPL v3
* http://www.gnu.org/copyleft/gpl.html
*
* Find it on GIT
* https://github.com/ryanjbcom/WebSite_JQSquareBox_demo.ryanjb.com-jqsquarebox
* Thi is pretty self explanatory, just read the code
*/ -->


jQuery(document).ready(function() {

jQuery('#submenu ul.sfmenu').superfish({
   delay:       500,
   animation:   { opacity:'show',height:'show'},
   dropShadows: true
});



jQuery('.squarebanner ul li:nth-child(even)').addClass('rbanner');


jQuery('.flexslider').flexslider({
   controlNav: false,
   directionNav: true
});


jQuery(".fancybox").fancybox({
   helpers: {
      title : {
      type : 'float'
      }
   }
});



 jQuery(".article-box").hover(function(){
   jQuery(this).find(".post-hover").fadeIn();
 }
 ,function(){
      jQuery(this).find(".post-hover").fadeOut();
 }
);


});
