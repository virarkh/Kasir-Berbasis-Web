function formtowizard(options) {
    this.setting = jQuery.extend({
        persistsection: false,
        revealfx: ['slide', 500],
        oninit: function () {},
        onpagechangestart: function () {}
    }, options)
    this.currentsection = -1
    this.init(this.setting)
}
formtowizard.prototype = {
    createfieldsets: function ($theform, arr) {
        $theform.find('fieldset.sectionwrap').removeClass('sectionwrap')
        var $startelement = $theform.find(':first-child')
        for (var i = 0; i < arr.length; i++) {
            var $fieldsetelements = $startelement.nextUntil('#' + arr[i].breakafter + ', *[name=' + arr[i].breakafter + ']').andSelf()
            $fieldsetelements.add($fieldsetelements.next()).wrapAll('<fieldset class="sectionwrap" />')
            $startelement = $theform.find('fieldset.sectionwrap').eq(i).prepend('<legend>' + arr[i].legend + '</legend>').next()
        }
    },
    loadsection: function (rawi, bypasshooks) {
        var thiswizard = this
        var doload = bypasshooks || this.setting.onpagechangestart(jQuery, this.currentsection, this.sections.$sections.eq(this.currentsection))
        doload = (doload === false) ? false : true
        if (!bypasshooks && this.setting.validate) {
            var outcome = this.validate(this.currentsection)
            if (outcome === false) doload = false
        }
        var i = (rawi == "prev") ? this.currentsection - 1 : (rawi == "next") ? this.currentsection + 1 : parseInt(rawi)
        i = (i < 0) ? this.sections.count - 1 : (i > this.sections.count - 1) ? 0 : i
        if (this.currentsection != i && i < this.sections.count && doload) {
            this.$thesteps.eq(this.currentsection).addClass('disabledstep').end().eq(i).removeClass('disabledstep')
            if (this.setting.revealfx[0] == "slide") {
                this.sections.$sections.css("visibility", "visible")
                this.sections.$outerwrapper.stop().animate({
                    height: this.sections.$sections.eq(i).outerHeight()
                }, this.setting.revealfx[1])
                this.sections.$innerwrapper.stop().animate({
                    left: -i * this.maxfieldsetwidth
                }, this.setting.revealfx[1], function () {
                    thiswizard.sections.$sections.each(function (thissec) {
                        if (thissec != i) thiswizard.sections.$sections.eq(thissec).css("visibility", "hidden")
                    })
                })
            } else if (this.setting.revealfx[0] == "fade") {
                this.sections.$sections.eq(this.currentsection).hide().end().eq(i).fadeIn(this.setting.revealfx[1], function () {
                    if (document.all && this.style && this.style.removeAttribute) this.style.removeAttribute('filter')
                })
            } else {
                this.sections.$sections.eq(this.currentsection).hide().end().eq(i).show()
            }
            this.paginatediv.$status.text("Page " + (i + 1) + " of " + this.sections.count)
            this.paginatediv.$navlinks.css('visibility', 'visible')
            if (i == 0) this.paginatediv.$navlinks.eq(0).css('visibility', 'hidden')
            else if (i == this.sections.count - 1) this.paginatediv.$navlinks.eq(1).css('visibility', 'hidden')
            if (this.setting.persistsection) formtowizard.routines.setCookie(this.setting.formid + "_persist", i)
            this.currentsection = i
        }
    },
    addvalidatefields: function () {
        var $ = jQuery,
            setting = this.setting,
            theform = this.$theform.get(0),
            validatefields = []
        var validatefields = setting.validate
        for (var i = 0; i < validatefields.length; i++) {
            var el = theform.elements[validatefields[i]]
            if (el) {
                var $section = $(el).parents('fieldset.sectionwrap:eq(0)')
                if ($section.length == 1) {
                    $section.data('elements').push(el)
                }
            }
        }
    },
    validate: function (section) {
        var elements = this.sections.$sections.eq(section).data('elements')
        var validated = true,
            invalidtext = ["Please fill out the following fields:\n"]

        function invalidate(el) {
            validated = false
            invalidtext.push("- " + (el.id || el.name))
        }
        for (var i = 0; i < elements.length; i++) {
            if (/(text)/.test(elements[i].type) && elements[i].value == "") {
                invalidate(elements[i])
            } else if (/(select)/.test(elements[i].type) && (elements[i].selectedIndex == -1 || elements[i].options[elements[i].selectedIndex].text == "")) {
                invalidate(elements[i])
            } else if (elements[i].type == undefined && elements[i].length > 0) {
                var onechecked = false
                for (var r = 0; r < elements[i].length; r++) {
                    if (elements[i][r].checked == true) {
                        onechecked = true
                        break
                    }
                }
                if (!onechecked) {
                    invalidate(elements[i][0])
                }
            }
        }
        if (!validated) alert(invalidtext.join('\n'))
        return validated
    },
    init: function (setting) {
        var thiswizard = this
        jQuery(function ($) {
            var $theform = $('#' + setting.formid)
            if ($theform.length == 0) $theform = $('form[name=' + setting.formid + ']')
            if (setting.manualfieldsets && setting.manualfieldsets.length > 0) thiswizard.createfieldsets($theform, setting.manualfieldsets)
            var $stepsguide = $('<div class="stepsguide" />')
            var $sections = $theform.find('fieldset.sectionwrap').hide()
            if (setting.revealfx[0] == "slide") {
                $sectionswrapper = $('<div style="position:relative;overflow:hidden;"></div>').insertBefore($sections.eq(0))
                $sectionswrapper_inner = $('<div style="position:absolute;left:0;top:0;"></div>')
            }
            var maxfieldsetwidth = $sections.eq(0).outerWidth()
            $sections.slice(1).each(function (i) {
                maxfieldsetwidth = Math.max($(this).outerWidth(), maxfieldsetwidth)
            })
            maxfieldsetwidth += 2
            thiswizard.maxfieldsetwidth = maxfieldsetwidth
            $sections.each(function (i) {
                var $section = $(this)
                if (setting.revealfx[0] == "slide") {
                    $section.data('page', i).css({
                        position: 'absolute',
                        top: 0,
                        left: maxfieldsetwidth * i
                    }).appendTo($sectionswrapper_inner)
                }
                $section.data('elements', [])
                var $thestep = $('<div class="step disabledstep" />').data('section', i).html('Step ' + (i + 1) + '<div class="smalltext">' + $section.find('legend:eq(0)').text() + '</div>').appendTo($stepsguide)
                $thestep.click(function () {
                    thiswizard.loadsection($(this).data('section'))
                })
            })
            if (setting.revealfx[0] == "slide") {
                $sectionswrapper.width(maxfieldsetwidth)
                $sectionswrapper.append($sectionswrapper_inner)
            }
            $theform.prepend($stepsguide)
            var $thesteps = $stepsguide.find('div.step')
            var $paginatediv = $('<div class="formpaginate" style="overflow:hidden;"><span class="prev" style="float:left">Back</span> <span class="status">Step 1 of </span> <span class="next" style="float:right">Next</span></div>')
            $theform.append($paginatediv)
            thiswizard.$theform = $theform
            if (setting.revealfx[0] == "slide") {
                thiswizard.sections = {
                    $outerwrapper: $sectionswrapper,
                    $innerwrapper: $sectionswrapper_inner,
                    $sections: $sections,
                    count: $sections.length
                }
                thiswizard.sections.$sections.show()
            } else {
                thiswizard.sections = {
                    $sections: $sections,
                    count: $sections.length
                }
            }
            thiswizard.$thesteps = $thesteps
            thiswizard.paginatediv = {
                $main: $paginatediv,
                $navlinks: $paginatediv.find('span.prev, span.next'),
                $status: $paginatediv.find('span.status')
            }
            thiswizard.paginatediv.$main.click(function (e) {
                if (/(prev)|(next)/.test(e.target.className)) thiswizard.loadsection(e.target.className)
            })
            var i = (setting.persistsection) ? formtowizard.routines.getCookie(setting.formid + "_persist") : 0
            thiswizard.loadsection(i || 0, true)
            thiswizard.setting.oninit($, i, $sections.eq(i))
            if (setting.validate) {
                thiswizard.addvalidatefields()
                thiswizard.$theform.submit(function () {
                    var returnval = true
                    for (var i = 0; i < thiswizard.sections.count; i++) {
                        if (!thiswizard.validate(i)) {
                            thiswizard.loadsection(i, true)
                            returnval = false
                            break
                        }
                    }
                    return returnval
                })
            }
        })
    }
}
formtowizard.routines = {
    getCookie: function (Name) {
        var re = new RegExp(Name + "=[^;]+", "i");
        if (document.cookie.match(re)) return document.cookie.match(re)[0].split("=")[1]
        return null
    },
    setCookie: function (name, value) {
        document.cookie = name + "=" + value + ";path=/"
    }
}