$('.slider').slider({
    min: 0,
    max: 100,
    step: 10,
    value: 20,
    create: function (event, ui) {
        $(this).find('.ui-slider-handle').addClass('tt').attr('title', ($(this).slider('value') + '%'));
    },
    slide: function (event, ui) {
        $(this).find('.ui-state-active.ui-state-active').attr('title', (ui.value + '%'));
    }
});
$('.slider-range').slider({
    range: true,
    min: 0,
    max: 100,
    values: [20, 80],
    step: 10,
    create: function (event, ui) {
        $(this).find('.ui-slider-handle').addClass('tt').each(function () {
            var percent = $(this).parents('.slider-range').slider('values', ($(this).index() - 1)) + '%';
            $(this).attr('title', percent);
        });
    },
    slide: function (event, ui) {
        $(this).find('.ui-slider-handle.ui-state-active').attr('title', (ui.value + '%'));
    }
});