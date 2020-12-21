$(function () {
    $('ul#nav .collapse').parents('li').find('ul').hide();
    $('ul#nav .collapse').toggle(function () {
        $(this).parents('li').find('ul').stop(true, true).slideDown('fast');
        return false;
    }, function () {
        $(this).parents('li').find('ul').stop(true, true).slideUp('fast');
        return false;
    });
    $('input.date_picker').date_input();
    $('input.color_picker').miniColors();
    $('.wysiwyg').wysiwyg({
        css: 'css/wysiwyg.css',
        brIE: false
    });
    $('a.modal').fancybox({
        'overlayOpacity': 0.7,
        'overlayColor': '#000',
        'padding': 0
    });
    $('.check_all').click(function () {
        $(this).parents('form').find('input:checkbox').attr('checked', $(this).is(':checked'));
    });
    $('.stats_charts table.stats').each(function () {
        if ($(this).attr('rel')) {
            var statsType = $(this).attr('rel');
        } else {
            var statsType = 'line';
        }
        var chart_width = ($(this).parent('div').width()) - 60;
        if (statsType == 'line' || statsType == 'pie') {
            $(this).hide().visualize({
                type: statsType,
                width: chart_width,
                height: '240px',
                colors: ['#3aaef7', '#ec8526', '#68ae00', '#fa504c'],
                lineDots: 'double',
                interaction: true,
                multiHover: 5,
                tooltip: true,
                tooltiphtml: function (data) {
                    var html = '';
                    for (var i = 0; i < data.point.length; i++) {
                        html += '<p class="chart_tooltip"><strong>' + data.point[i].value + '</strong> ' + data.point[i].yLabels[0] + '</p>';
                    }
                    return html;
                }
            });
        } else {
            $(this).hide().visualize({
                type: statsType,
                width: chart_width,
                height: '240px',
                colors: ['#6fb9e8', '#ec8526', '#9dc453', '#ddd74c']
            });
        }
    });
    $('table.sortable').tablesorter({
        headers: {
            0: {
                sorter: false
            },
            5: {
                sorter: false
            }
        },
        widgets: ['zebra']
    });
    $('table.sortable tr th.header').css('cursor', 'pointer');
    $('table .delete a').click(function () {
        if (confirm("Are you sure you want to delete this record?")) {
            $(this).parents('tr').fadeOut('slow', function () {
                $(this).remove();
                hudMsg('success', 'Record deleted successfully', 3000);
            });
        }
        return false;
    });
    $('#content .message').hide().append('<span class="close" title="Dismiss"></span>').fadeIn('slow');
    $('#content .message .close').hover(function () {
        $(this).addClass('hover');
    }, function () {
        $(this).removeClass('hover');
    });
    $('#content .message .close').click(function () {
        $(this).parent().fadeOut('slow', function () {
            $(this).remove();
        });
    });

    function hudMsg(type, message, timeOut) {
        $('.hudmsg').remove();
        if (!timeOut) {
            timeOut = 3000;
        }
        var timeId = new Date().getTime();
        if (type != '' && message != '') {
            $('<div class="hudmsg ' + type + '" id="msg_' + timeId + '"><img src="assets/images/msg_' + type + '.png" alt="" />' + message + '</div>').hide().appendTo('body').fadeIn();
            var timer = setTimeout(function () {
                $('.hudmsg#msg_' + timeId + '').fadeOut('slow', function () {
                    $(this).remove();
                });
            }, timeOut);
        }
    }
    $('.demo_success').click(function () {
        hudMsg('success', 'Success message triggered');
        return false;
    });
    $('.demo_error').click(function () {
        hudMsg('error', 'Something went wrong');
        return false;
    });
    $('.demo_info').click(function () {
        hudMsg('info', 'Just so you know,<br />you rock!');
        return false;
    });
    $('.demo_custom').click(function () {
        hudMsg('beer', 'Cheers!');
        return false;
    });
    $('.searchform input.text').each(function () {
        var default_value = $(this).val();
        $('.searchform').append('<div class="loading"></div>');
        $('.searchform').append('<div class="quickresults"></div>');
        $(this).focus(function () {
            $(this).animate({
                width: '180px'
            }, 200);
            if ($(this).val() == default_value) {
                $(this).val('');
            }
        });
        $(this).keypress(function () {
            if ($(this).val().length > 2) {
                $('.searchform .loading').fadeIn('fast', function () {
                    $.get('test.php', {
                        search_string: $('.searchform input.text').val()
                    }, function (data) {
                        $('.searchform .quickresults').html(data).fadeIn('fast', function () {
                            $('.searchform .loading').fadeOut('fast');
                        });
                    }, 'html');
                });
            } else {
                $('.searchform .loading').fadeOut('fast');
                $('.searchform .quickresults').fadeOut('fast');
            }
        });
        $(this).blur(function () {
            $(this).animate({
                width: '100px'
            }, 200);
            $('.searchform .loading').fadeOut('fast');
            $('#header form .quickresults').hide();
            if ($(this).val() == '') {
                $(this).val(default_value);
            }
        });
    });
    $('input.file.styled').each(function () {
        var custom_file_label = $(this).attr('title');
        $(this).wrap('<span class="custom_file" />');
        $(this).parents('.custom_file').append('<input type="button" class="button" value="' + custom_file_label + '" />');
    });
    $('.custom_file input:button').live('click', function () {
        $(this).parents('span').find('input:file').click();
    });
    $('.custom_file input.file').change(function () {
        $(this).parents('span').find('em').remove();
        var filename = $(this).val().replace(/^.*\\/, '');
        $(this).parents('span').append('<em>' + filename + '</em>');
    });
    $('.onoffbtn').each(function () {
        $(this).wrap('<span class="onoff_box" />');
        if ($(this).is(':checked')) {
            $(this).parents('span').addClass('checked');
        }
    });
    $('.onoff_box').live('click', function () {
        var onoffSwitch = $(this);
        var chckBox = $(this).find('input.onoffbtn');
        if (chckBox.is(':checked')) {
            onoffSwitch.animate({
                'background-position-x': '0'
            }, 100, function () {
                chckBox.removeAttr('checked');
                $(this).removeClass('checked');
            });
        } else {
            onoffSwitch.animate({
                'background-position-x': '-40px'
            }, 100, function () {
                chckBox.attr('checked', 'checked');
                $(this).addClass('checked');
            });
        }
    });
    $('.progress_complete').click(function () {
        var totalWidth = $(this).parents('.progress_bar').width();
        $(this).animate({
            width: totalWidth
        }, 600, function () {
            $(this).find('span').html('100%');
        });
    });
    $('ul.imglist').sortable({
        placeholder: 'ui-state-highlight'
    });
    $('.tt').tipsy({
        gravity: 's'
    });
    $('ul.imglist li').hover(function () {
        $(this).find('ul').css('display', 'none').stop(true, true).fadeIn('fast').css('display', 'block');
    }, function () {
        $(this).find('ul').stop(true, true).fadeOut(100);
    });
    $('ul.imglist .delete a').click(function () {
        if (confirm('Are you sure you want to delete this image?')) {
            $(this).parents('li').fadeOut('slow', function () {
                $(this).remove();
                hudMsg('success', 'Image deleted successfully', 3000);
            });
        }
        return false;
    });
    if (!$('#content').hasClass('loginbox')) {
        hudMsg('success', 'Page loaded successfully');
    }
});