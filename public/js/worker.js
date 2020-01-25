document.addEventListener('DOMContentLoaded', function () {
    var getTableAsArray = function () {
        var csvdata = [];
        $('#csv-table tr').each(function (indx, val) {
            var rowdata = [];
            csvdata.push(rowdata);
            $(this).children('td').each(function (i, v) {
                rowdata.push($(v).html());
            })
        })
        return csvdata;
    }
    var download = function (data) {
        var csvContent = "data:text/csv;charset=utf-8,";
        data.forEach(function (infoArray, index) {

            dataString = infoArray.join(",");
            csvContent += index < data.length ? dataString + "\n" : dataString;

        });
        var encodedUri = encodeURI(csvContent);
        var link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "data.csv");

        link.click();
    }
    $('#csv-file').on('change', function () {
        console.log(this.files.length);
        if (this.files.length) {
            Papa.parse(this.files[0], {
                complete: function (results) {

                    $.each(results.data,
                        function (index, value) {
                            var row = $('<tr>');
                            console.log("adding row");
                            $('#csv-table').append(row);
                            $.each(value, function (i, v) {
                                console.log("adding col");
                                var col = $('<td>');
                                col.html(v);
                                row.append(col);
                            });
                        });
                    $('#csv-table').editableTableWidget();
                }

            });
            ;
        }
    })
    $('#export').click(function () {
        download(getTableAsArray());
    })
    $('#upload').click(function () {
        var csvdata = getTableAsArray();
        console.log(csvdata);
        $.ajax({
            type: 'POST',
            url: 'http://yoururl.com/foobar',
            data: JSON.stringify(csvdata), // or JSON.stringify ({name: 'jonas'}),
            success: function (data) {
                alert('data: ' + data);
            },
            contentType: "application/json",
            dataType: 'json'
        });
        $('#notification').html(csvdata.toString());
    });
});
/** The following junk of code should be in an external javascript file. i took this code from https://github.com/mindmup/editable-table/  **/
$.fn.editableTableWidget = function (e) {
    "use strict";
    return $(this).each(function () {
        var t, i = function () {
                var e = $.extend({}, $.fn.editableTableWidget.defaultOptions);
                return e.editor = e.editor.clone(), e
            }, n = $.extend(i(), e), o = 37, r = 38, s = 39, d = 40, a = 13, h = 27, l = 9, f = $(this),
            c = n.editor.css("position", "absolute").hide().appendTo(f.parent()), p = function (e) {
                t = f.find("td:focus"), t.length && (c.val(t.text()).removeClass("error").show().offset(t.offset()).css(t.css(n.cloneProperties)).width(t.width()).height(t.height()).focus(), e && c.select())
            }, u = function () {
                var e, i = c.val(), n = $.Event("change");
                return t.text() === i || c.hasClass("error") ? !0 : (e = t.html(), t.text(i).trigger(n, i), void (n.result === !1 && t.html(e)))
            }, g = function (e, t) {
                return t === s ? e.next("td") : t === o ? e.prev("td") : t === r ? e.parent().prev().children().eq(e.index()) : t === d ? e.parent().next().children().eq(e.index()) : []
            };
        c.blur(function () {
            u(), c.hide()
        }).keydown(function (e) {
            if (e.which === a) u(), c.hide(), t.focus(), e.preventDefault(), e.stopPropagation(); else if (e.which === h) c.val(t.text()), e.preventDefault(), e.stopPropagation(), c.hide(), t.focus(); else if (e.which === l) t.focus(); else if (this.selectionEnd - this.selectionStart === this.value.length) {
                var i = g(t, e.which);
                i.length > 0 && (i.focus(), e.preventDefault(), e.stopPropagation())
            }
        }).on("input paste", function () {
            var e = $.Event("validate");
            t.trigger(e, c.val()), e.result === !1 ? c.addClass("error") : c.removeClass("error")
        }), f.on("click keypress dblclick", p).css("cursor", "pointer").keydown(function (e) {
            var t = !0, i = g($(e.target), e.which);
            i.length > 0 ? i.focus() : e.which === a ? p(!1) : 17 === e.which || 91 === e.which || 93 === e.which ? (p(!0), t = !1) : t = !1, t && (e.stopPropagation(), e.preventDefault())
        }), f.find("td").prop("tabindex", 1), $(window).on("resize", function () {
            c.is(":visible") && c.offset(t.offset()).width(t.width()).height(t.height())
        })
    })
}, $.fn.editableTableWidget.defaultOptions = {
    cloneProperties: ["padding", "padding-top", "padding-bottom", "padding-left", "padding-right", "text-align", "font", "font-size", "font-family", "font-weight", "border", "border-top", "border-bottom", "border-left", "border-right"],
    editor: $("<input>")
};
