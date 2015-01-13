var Chart = new(function() {

    var _self = this;

    var LINE_LIGHT = '#666';
    var LINE_DARK = '#181818';
    var GRADIENTFILL = [90, '#a33b01', '#e2a000'];
    var GRADIENTFILL2 = [90, '#bf4400', '#ffb500'];
    var DATA;
    var AXIS;
    var r;
    var id;

    this.WIDTH = 0;
    this.BOTTOM = 0;

    this.create = function create($id, $width, $height, $xAxis) {
        this.BOTTOM = $height - 30;
        this.WIDTH = $width;
        id = $id;

        var yOffset = 5, xOffset = $xAxis || 20;
        var i, segments = 5, seg_height = ((this.BOTTOM - yOffset) / 4);

        r = new Raphael($id, $width, $height + 30);

        // axis
        r.path('M' + xOffset + '.5,' + yOffset + 'L' + xOffset + ',' + this.BOTTOM + 'L' + this.WIDTH + ',' + this.BOTTOM + '.5')
         .attr({stroke: '#ccc', 'stroke-opacity': 0.2, 'stroke-width': 1});
    };

    this.clear = function clear() {
        //$('#' + id).html('');
        r.clear();
    };

    this.setAxis = function setAxis(xOffset, axis) {
        var xOffset = xOffset || 20;
        var i, yOffset = 5, segments = axis.length, seg_height = ((this.BOTTOM - yOffset) / (axis.length - 1));

        AXIS = axis;

        for (i = 0; i < segments; i++) {
            r.path('M' + (xOffset - 8) + ',' + Math.floor(yOffset + i * seg_height) + '.5L' + this.WIDTH + ',' + Math.floor(yOffset + i * seg_height) + '.5')
             .attr({stroke: LINE_LIGHT, 'stroke-opacity': 0.2, 'stroke-width': 1});
        }

        for (var i = 0; i < axis.length; i++) {
            r.text(xOffset - 15, yOffset + (seg_height * i), axis[i]).attr({
                fill: '#fff',
                'fill-opacity': 0.5,
                'text-anchor': 'end',
                'font-family': 'DINMediumAlternate',
                'font-size': 13
            });
        };
    }

    function addCountry(x, width, amplitude) {
        var path = [
            'M' + (x - width / 2) + ',' + _self.BOTTOM,
            'L' + x + ',' + (_self.BOTTOM ),
            'L' + (x + width / 2) + ',' + _self.BOTTOM
        ];
        var path2 = [
            'M' + (x - width / 2) + ',' + _self.BOTTOM,
            'L' + x + ',' + (_self.BOTTOM - amplitude),
            'L' + (x + width / 2) + ',' + _self.BOTTOM
        ];

        return r.path(path).animate({path: path2}, 1000);
    }

    this.addCountryCircle = function addCountryCircle(x, y, country) {
        var radius = 6;
        var obj = r.circle(x, _self.BOTTOM - y, radius);
        var titleHeight = parseFloat(y);

        obj.data('x', x);
        obj.data('title', y);
        obj.data('country', country);
        obj.attr({fill: LINE_DARK, stroke: LINE_LIGHT});
        obj.hover(function(e) {
            // add caption, move tooltip, fade in
            $('#Chart1 .tooltip').stop()
                .fadeIn()
                .children('span')
                    .html(Math.floor((titleHeight + 7 / 2) / _self.BOTTOM * parseFloat(AXIS[0])) + '% - ' + obj.data('country'))
                .parent()
                .css({
                    left: parseFloat(this.data('x')),
                    top: _self.BOTTOM - parseFloat(obj.data('title')) + $('#Chart1').position().top,
                    marginLeft: - $('#Chart1 .tooltip').width() / 2 - 9,
                    marginTop: - 42
                });

            this.attr({fill: '#666', stroke: '#999'});
        }, function() {
            this.attr({fill: LINE_DARK, stroke: LINE_LIGHT});
            $('#Chart1 .tooltip').stop().hide().css('opacity', 1);
        });

        return obj;
    }

    this.addCountryOutline = function addCountryOutline(x, width, amplitude) {
        var obj = addCountry(x, width, amplitude);
            obj.attr({stroke: '#fff', 'stroke-width': 2, 'stroke-opacity': 0.3});

        return obj;
    }

    this.addCountryFill = function addCountryFill(x, width, amplitude) {
        var percent = parseFloat(amplitude);
        var obj = addCountry(x, width, amplitude);
            obj.attr({'stroke-width': 0, 'stroke-opacity': 0, fill: GRADIENTFILL.join('-'), 'fill-opacity': 0.7});
            obj.data('amplitude', amplitude);
            obj.data('x', x);
            obj.hover(function(e) {
                this.attr({fill: GRADIENTFILL2.join('-'), 'fill-opacity': 1.0});
                $('#Chart1 .tooltip')
                    .stop()
                    .fadeIn()
                    .children('span')
                        .html(Math.floor(percent / _self.BOTTOM * parseFloat(AXIS[0])) + '%')
                    .parent()
                    .css({
                        left: parseFloat(this.data('x')),
                        top: _self.BOTTOM - parseFloat(this.data('amplitude')) + $('#Chart1').position().top,
                        marginTop: - 35,
                        marginLeft:  $('#Chart1 .tooltip').outerWidth() / -2
                    });
                }, function(e) {
                this.attr({fill: GRADIENTFILL.join('-'), 'fill-opacity': 0.7});
                    $('#Chart1 .tooltip').stop().hide().css('opacity', 1);
                }
            );

        return obj;
    }

    this.addSection = function addSection(x, xOffset, caption, country, cAmp, oAmp, fAmp, leadername) {
        var width = 100;
        if (fAmp)
            _self.addCountryFill(x + xOffset, width, fAmp);
        if (oAmp)
            _self.addCountryOutline(x + xOffset, width, oAmp);
        if (cAmp)
            _self.addCountryCircle(x + xOffset, cAmp, leadername);

        r.text(x + xOffset, _self.BOTTOM + 13, caption)
         .attr({
             fill: '#FFF',
             'fill-opacity': 0.5,
             'font-size': 14,
             'font-family': 'DINRegular'
            });
    }

    this.addSectionLabel = function addSectionLabel(x, caption) {
        r.text(x, _self.BOTTOM + 50, caption.toUpperCase())
         .attr({
             fill: '#FFF',
             'fill-opacity': 1.0,
             'font-size': 21,
             'font-family': 'DINMediumAlternate'
         });
    }

    this.setData = function setData(data) {
        var obj, w, w2, i = ii = 0;
        var sectionWidth = 80;

        DATA = data;

        for (var i = 0; i < data.length; i++){
            obj = data[i][1];
            w = Chart.WIDTH / data.length - (50 / data.length);
            w2 = sectionWidth * (obj.length - 1);

            Chart.addSectionLabel(
                50 + (w * i) +
                (w/2),
                data[i][0]
            );

            for (var ii = 0; ii < obj.length; ii++){
                Chart.addSection(
                    ii * sectionWidth + ((w - w2) / 2),
                    50 + (w * i),
                    obj[ii].caption,
                    data[i][0],
                    obj[ii].leader,
                    obj[ii].average,
                    obj[ii].country,
					obj[ii].leadername
                );
            }
        }
    }

    return this;
})();
