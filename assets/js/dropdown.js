

	 
	
$(document).ready(() => {
  
  //Set left or right positions of each mega menu (depending on right space available it has to "grow")
  adjustMegaMenuPositions();
  
  $(window).resize(function() {
      adjustMegaMenuPositions();
  });

  function adjustMegaMenuPositions() {
    console.clear();
    
    var $lastMenuItem = $('#top-nav-links').find('.item').last();
    var maxLeftPos = $lastMenuItem.offset().left + $lastMenuItem.innerWidth();
    var navBarRightPos = $('body').width() - maxLeftPos;
    
    //If the megamenu goes over the edge, we move it back to the left
    $('.item.parent').each(function() {

      var $this = $(this);
      var $megaMenu = $this.find('.mega-menu');
      var availableWidth = maxLeftPos - $this.offset().left;
      //set display on mega menu to get the true width; remove style attribute after.
      var megaMenuWidth = $megaMenu.css({display:"flex", visibility: "hidden"}).outerWidth();
      $megaMenu.removeAttr('style');
   
      if (megaMenuWidth > availableWidth){
        $megaMenu.css({right: navBarRightPos});
      }else {
        $this.css({"border-left": "1px solid #ddd"});
        $megaMenu.offset({left: $this.offset().left});
      }

    });
  }

});
  
(function ( $ ) {
	var elActive = '';
    $.fn.selectCF = function( options ) {
 
        // option
        var settings = $.extend({
            color: "#FFF", // color
            backgroundColor: "salmon", // background
			change: function( ){ }, // event change
        }, options );

		var settings1 = $.extend({
            color: "#000", // color
            backgroundColor: "white", // background
			change: function( ){ }, // event change
        }, options );

        return this.each(function(){
			
			var selectParent = $(this);
				list = [],
				html = '';
				
			//parameter CSS
			var width = $(selectParent).width();
			
			$(selectParent).hide();
			if( $(selectParent).children('option').length == 0 ){ return; }
			$(selectParent).children('option').each(function(){
				if( $(this).is(':selected') ){ s = 1; title = $(this).text(); }else{ s = 0; }
				list.push({ 
					value: $(this).attr('value'),
					text: $(this).text(),
					selected: s,
				})
			})
			
			// style
			var style = " background: "+settings.backgroundColor+"; color: "+settings.color+" ";
			var style1 = " background: "+settings1.backgroundColor+"; color: "+settings1.color+" ";
			
			html += "<ul class='selectCF'>";
			html += 	"<li>";
			html += 		"<span class='titleCF' style='"+style1+"; width:200px '>"+title+"</span>";
			html += 		"<span class='arrowCF glyphicon glyphicon-chevron-down' style='"+style+"'></span>";
			html += 		"<span class='searchCF' style='"+style+"; width:"+width+"px'><input style='color:"+settings.color+"' /></span>";
			html += 		"<ul>";
			$.each(list, function(k, v){ s = (v.selected == 1)? "selected":"";
			html += 			"<li value="+v.value+" class='"+s+"'>"+v.text+"</li>";})		
			html += 		"</ul>";
			html += 	"</li>";
			html += "</ul>";
			$(selectParent).after(html);
			var customSelect = $(this).next('ul.selectCF'); // add Html
			var seachEl = $(this).next('ul.selectCF').children('li').children('.searchCF');
			var seachElOption = $(this).next('ul.selectCF').children('li').children('ul').children('li');
			var seachElInput = $(this).next('ul.selectCF').children('li').children('.searchCF').children('input');
			
			// handle active select
			$(customSelect).unbind('click').bind('click',function(e){
				e.stopPropagation();
				if($(this).hasClass('onCF')){ 
					elActive = ''; 
					$(this).removeClass('onCF');
					$(this).removeClass('searchActive'); $(seachElInput).val(''); 
					$(seachElOption).show();
				}else{
					if(elActive != ''){ 
						$(elActive).removeClass('onCF'); 
						$(elActive).removeClass('searchActive'); $(seachElInput).val('');
						$(seachElOption).show();
					}
					elActive = $(this);
					$(this).addClass('onCF');
					$(seachEl).children('input').focus();
				}
			})
			
			// handle choose option
			var optionSelect = $(customSelect).children('li').children('ul').children('li');
			$(optionSelect).bind('click', function(e){
				var value = $(this).attr('value');
				if( $(this).hasClass('selected') ){
					//
				}else{
					$(optionSelect).removeClass('selected');
					$(this).addClass('selected');
					$(customSelect).children('li').children('.titleCF').html($(this).html());
					$(selectParent).val(value);
					settings.change.call(selectParent); // call event change
				}
			})
				
			// handle search 
			$(seachEl).children('input').bind('keyup', function(e){
				var value = $(this).val();
				if( value ){
					$(customSelect).addClass('searchActive');
					$(seachElOption).each(function(){
						if( $(this).text().search(new RegExp(value, "i")) < 0 ) {
							// not item
							$(this).fadeOut();
						}else{
							// have item
							$(this).fadeIn();
						}
					})
				}else{
					$(customSelect).removeClass('searchActive');
					$(seachElOption).fadeIn();
				}
			})
			
		});
    };
	$(document).click(function(){
		if(elActive != ''){
			$(elActive).removeClass('onCF');
			$(elActive).removeClass('searchActive');
		}
	})
}( jQuery ));

$(function(){
  var event_change = $('#event-change');
  $( ".select" ).selectCF({
    change: function(){
      var value = $(this).val();
      var text = $(this).children('option:selected').html();
      console.log(value+' : '+text);
      event_change.html(value+' : '+text);
    }
  });
})