// Copyright ©2010 Atanas Barotov, barotov.com
// 
// LICENSE
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
// 
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
// 
// You should have received a copy of the GNU General Public License
// along with this program.  If not, see <http://www.gnu.org/licenses/>.
// 
// VERSION: 1.0.3



(function($)
{
	$.fn.customSelect = function(settings)
	{	  
		var config = $.extend(
		{
			focusedClass:			"focused",
			hoveredClass:			"hovered",
			selectedClass:			"current",
			disabledClass:			"disabled"
		}, settings);
		
		function generateCustomSelectHTML(htmlSelect)
		{
			var customSelect = $('<span class="custom-select ' + (htmlSelect.attr("class")?htmlSelect.attr("class"):"") + '" />');
			var customSelectInner = '<span class="custom-select-inner">';
			customSelectInner += '<a href="#" class="custom-select-current">' + htmlSelect.find(":selected").text() + '</a>';
			customSelectInner += '<ul>';
			var htmlSelectCurrentElementNumber = htmlSelect.find("option").index(htmlSelect.find("option:selected"));
			htmlSelect.children().each(function(i)
			{
				if (i == htmlSelectCurrentElementNumber)
					customSelectInner += '<li class="' + config.selectedClass + '">' + $(this).text() + '</li>';
				else
					customSelectInner += '<li>' + $(this).text() + '</li>';
			});
			customSelectInner += '</ul>';
			customSelectInner += '</span>';
			
			customSelect.append(customSelectInner);
			
			return customSelect;
		}
		
		function activeSelectDropdown(customSelect)
		{
			// Hides all opened dropdowns
			$(".custom-select").each(function()
			{
				$(this).css({'position': ''});
				$(this).find("ul").hide();
			});
			
			var currentSelectDropdown = customSelect.find("ul").show();
			customSelect.css({'position': 'relative'});
			
			//Scrolls to the current element of the select
			currentSelectDropdown.scrollTop(0);
			var scrollingOffset = currentSelectDropdown.find("li." + config.selectedClass).offset().top - currentSelectDropdown.offset().top;
			currentSelectDropdown.scrollTop(scrollingOffset - 50);
		}
		
		function deactivateSelectDropdown(customSelect)
		{
			customSelect.find("ul").hide();
			customSelect.css({'position': ''});
		}
		
		function test()
		{
			console.log("testing");
		}
		
		//Hides the dropdowns on click somewhere on the webpage
		$(document).click(function(event)
		{
			$(".custom-select ul").each(function()
			{
				$(this).hide();
				$(this).css({'position': ''});
			});
		});
		
		// Keyboard events
		$(document).keydown(function(e)
		{
			// Performs the action for the opened dropdown
			$(".custom-select ul." + config.focusedClass).each(function()
			{
				var customSelectDropdown = $(this);
				var customSelect = $(this).parent().parent();
				var htmlSelect = customSelect.next();

				switch(e.which)
				{
					case 37: case 38:	// Up arrow
						customSelectDropdown.find("li." + config.selectedClass).each(function()
						{
							var previousElement = $(this).prev();

							if (previousElement.length > 0)
							{
								previousElement.addClass(config.selectedClass);
								$(this).removeClass(config.selectedClass);

								if ($(this).is(":visible"))
								{
									var scrollingOffset = $(this).offset().top - customSelectDropdown.offset().top;
									var scrollingOffsetTotal = (scrollingOffset - customSelectDropdown.height() < -$(this).height()*2)?scrollingOffset - customSelectDropdown.height() + $(this).height()*4:0;
									$(this).parent().scrollTop(scrollingOffsetTotal + $(this).parent().scrollTop());
								}

								customSelect.find(".custom-select-current").html(customSelectDropdown.find("li." + config.selectedClass).html());

								// alter the changes to the HTML select
								htmlSelect.find("option:eq(" + customSelectDropdown.find("li").index(customSelectDropdown.find("li." + config.selectedClass)) + ")").attr("selected", "selected");
							}
						});
						e.preventDefault();
						break;
					case 39: case 40:	// Down arrow
						customSelectDropdown.find("li." + config.selectedClass).each(function()
						{
							var nextElement = $(this).next();

							if (nextElement.length > 0)
							{
								nextElement.addClass(config.selectedClass);
								$(this).removeClass(config.selectedClass);

								if ($(this).is(":visible"))
								{
									var scrollingOffset = nextElement.offset().top - customSelectDropdown.offset().top;
									var scrollingOffsetTotal = (scrollingOffset - customSelectDropdown.height() > -$(this).height()*4)?scrollingOffset - customSelectDropdown.height() + $(this).height()*4:0;
									$(this).parent().scrollTop(scrollingOffsetTotal + $(this).parent().scrollTop());
								}
								customSelect.find(".custom-select-current").html(customSelectDropdown.find("li." + config.selectedClass).html());

								// alter the changes to the HTML select
								customSelect.next().find("option:eq(" + customSelectDropdown.find("li").index(customSelectDropdown.find("li." + config.selectedClass)) + ")").attr("selected", "selected");
							}
						});
						e.preventDefault();
						break;
					case 13:	// Enter
						customSelect.find(".custom-select-current").html(customSelectDropdown.find("li." + config.selectedClass).html());
						customSelect.next().find("option:eq(" + customSelectDropdown.find("li").index(customSelectDropdown.find("li." + config.selectedClass)) + ")").attr("selected", "selected");
						customSelectDropdown.toggle();
						e.preventDefault();
						customSelect.parent().next().trigger('change');

						if ($(this).is(":visible"))
						{
							// Scrolls to the current element
							$(this).scrollTop(0);
							var scrollingOffset = $(this).find("li." + config.selectedClass).offset().top - $(this).offset().top;
							$(this).scrollTop(scrollingOffset - 50);
						}

						return false;
						break;
					case 27:	// Escape
						customSelectDropdown.find("li." + config.hoveredClass).removeClass(config.hoveredClass);
						customSelectDropdown.hide();
						break;
					case 9: // Tab
						customSelectDropdown.find("li." + config.hoveredClass).removeClass(config.hoveredClass);
						customSelectDropdown.hide();
						break;
				}
			});
		});
		
		return this.each(function()
		{
			// Hides the original HTML select
			var htmlSelect = $(this).hide();
			
			// Generates the new custom select HTML styles
			var customSelect = generateCustomSelectHTML(htmlSelect);
			
			// Inserts the custom select HTML styles just before the original HTML select element
			htmlSelect.before(customSelect);
			
			if (htmlSelect.is(":disabled"))
			{
				customSelect.addClass("disabled");
				customSelect.find("a.custom-select-current").removeAttr("href");
			}
			
			// Toggles dropdown on click
			customSelect.click(function(event)
			{
				if (event.target.nodeName == "UL") return false;
				
				var thisCustomSelect = $(this).not(".disabled");
				var thisCustomSelectDropdown = $(this).not(".disabled").find("ul");
				
				// Shows/hides the dropdown depending on whether it's already visible or not
				if (thisCustomSelectDropdown.is(':visible'))
					deactivateSelectDropdown(thisCustomSelect);
				else
					activeSelectDropdown(thisCustomSelect);
				
				return false;
			});
			
			// Adds focusedClass to the active element
			customSelect.find(".custom-select-current")
				.blur(function()
				{
					customSelect.find("ul").removeClass(config.focusedClass);
				})
				.focus(function()
				{                
					customSelect.find("ul").addClass(config.focusedClass);
					customSelect.css({'position': ''});
				});
			
			// Dropdown elements hovers
			customSelect.find("ul li").hover(
				function()
				{
					$(this).parent().find(config.hoveredClass).each(function(){ $(this).removeClass(config.hoveredClass); });
					$(this).addClass(config.hoveredClass);
				},
				function()
				{
					$(this).removeClass(config.hoveredClass);
				}
			);
			
			// Dropdown element select
			customSelect.find("ul li").each(function(i)
			{
				$(this).click(function(event)
				{

					event.preventDefault();
					customSelect.find(".custom-select-current").html($(this).html());
					customSelect.find("ul li").each(function()
					{
						$(this).removeClass(config.selectedClass);
					});
					$(this).addClass(config.selectedClass);
					
					// Applies the change to the HTML select as well
					htmlSelect.find("option:eq(" + i + ")").attr("selected", "selected");
					// Triggers the change event for the HTML select in case there are some events attached to it
					htmlSelect.trigger('change');
				});
			});

            // Dropdown element select
            customSelect.find("ul li").each(function(i)
            {
                $(this).keypress(function(event)
                {
                 alert('ok');
                    event.preventDefault();
                    customSelect.find(".custom-select-current").html($(this).html());
                    customSelect.find("ul li").each(function()
                    {
                        $(this).removeClass(config.selectedClass);
                    });
                    $(this).addClass(config.selectedClass);

                    // Applies the change to the HTML select as well
                    htmlSelect.find("option:eq(" + i + ")").attr("selected", "selected");
                    // Triggers the change event for the HTML select in case there are some events attached to it
                    htmlSelect.trigger('change');
                });
            });
		});
	};
	
	$.fn.appendCustomSelectOption = function(newTitle, newValue)
	{
		$(this).each(function()
		{
			if ($(this).get(0).tagName == "SPAN")
			{
				var customSelect = $(this);
				var htmlSelect = $(this).next();
				
				if (customSelect.get(0).tagName == "SPAN" && htmlSelect.get(0).tagName == "SELECT")
				{
					htmlSelect.append('<option value="'+newValue+'">'+newTitle+'</option>');
					
					customSelect.remove();
					htmlSelect.customSelect();
				}
			}
		});
	};
	
	$.fn.updateCustomSelectOption = function(currentTitle, newTitle, newValue)
	{
		$(this).each(function()
		{
			var customSelect = $(this);
			var htmlSelect = $(this).next();
			
			if (customSelect.get(0).tagName == "SPAN" && htmlSelect.get(0).tagName == "SELECT")
			{
				htmlSelect.find("option").each(function()
				{
					if ($(this).text() == currentTitle)
					{
						$(this).text(newTitle);
						if (newValue) $(this).val(newValue);
					}
				});
				
				customSelect.remove();
				htmlSelect.customSelect();
			}
		});
	};
	
	$.fn.setSelectedCustomSelectOption = function(option)
	{
		option = parseInt(option);
		
		$(this).each(function()
		{
			var customSelect = $(this);
			var htmlSelect = $(this).next();

			customSelect.remove();
			
			htmlSelect.find("option:eq("+option+")").attr("selected", "selected");
			htmlSelect.customSelect();
		});
	};
})(jQuery);