var App = {

    selectProduct: function(el) {

        var category = $(el).parent().parent().parent().parent().attr("id");

        if ($(el).hasClass('selected')) {

            $(el).removeClass('selected');
            $("a[href=#" + category + "]").removeClass('selected');
            $("a[href=#" + category + "] .price").text($("a[href=#" + category + "] .price_default").text());

        } else {

            $('#' + category + ' li.selected-product').removeClass('selected');
            $(el).addClass('selected');

            $("a[href=#" + category + "]").addClass('selected');

            var productPrice = $(el).find('.price').text();
            $("a[href=#" + category + "] .price").text(productPrice);

        }
    },

    prepareForm: function(e) {
        $('.products-slider').find('li.selected').each(function(index, element) {
            $('.params').append('<input name="products[]" type="hidden" value="' + $(element).data("id") + '" />');
        });
    }
};

