jQuery(document).ready(function($) {

	$(".custom-short, .custom-normal").customSelect();
	
	$(".activatePopup").click(function()
	{
		$(".popup").hide(); 
		
		var popupURL = $(this).attr("href");
		var topOffset = $(window).scrollTop()
				
		$(popupURL).css("margin-left", -$(popupURL).width()/2);
		$(popupURL).css("margin-top", ($(window).height()-$(popupURL).height())/2 + topOffset);

		$(".layer").remove();
		$("body").append('<div class="layer" />');
		$(".layer").height($(document).height());
		
		$(".layer").click(function(){
			$(".layer").remove();
			$(".popup").hide();
			return false;
		});
		
		$(".layer").show();
		$(popupURL).show();
		
		return false;
	});
	
	$(".popup").each(function(){
		var popup = $(this);
		popup.find(".close, .cancel").click(function(){
			popup.hide();
			$(".layer").remove();
			return false;
		});
	});
	
	$('.products-slider').jcarousel({
		scroll: 3,
		initCallback: slider_init,
		itemVisibleInCallback: itemVisibleInCallback
	});
	
	$(".tabber").each(function() {

        var thisTabber = $(this);

        if (thisTabber.find(".tabs li.selected").length == 0) {
			thisTabber.find(".tabs li:first").addClass("selected");
		}

        if (thisTabber.data("type") == "non-interactive") {
            return;
        }

        $(thisTabber.find(".tabs li.selected a:first").attr("href"));

		thisTabber.find(".tabs a").click(function() {
			$(this).parent().parent().find(".selected").removeClass("selected");
			$(this).parent().addClass("selected");
			thisTabber.find(".tab").hide();
			$($(this).attr("href")).show();
			return false;
		});
	});

});

function slider_init(carousel)
{
    var i = carousel.container.find("li").length;

    for (var a = 0; a < Math.ceil(i / 3); a++) {
        carousel.container.parent().find(".controls").append('<a href="#" />');
    }

    carousel.container.parent().find(".controls a").click(function () {
        var i = carousel.container.parent().find(".controls a").index($(this));
        carousel.scroll(i * 3 + 1);
        return false;
    });
}

function itemVisibleInCallback(a, b, c, d)
{
	$(".products-slider .controls a.selected").removeClass("selected");
	$(".products-slider .controls a:eq("+(Math.ceil(c/3)-1)+")").addClass("selected");
}