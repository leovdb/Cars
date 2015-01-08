(function($){
    $.fx.step.clip = function(fx){
        var elem = fx.elem,
            $elem = $(elem);
        if(fx.start === 'rect(0px, 0px, 0px, 0px)' || fx.start === 0) {
            fx.start = "rect(" + parseFloat(elem.scrollTop) + ", " + parseFloat(elem.scrollWidth) + ", "+ parseFloat(elem.scrollHeight) + ", " + parseFloat(elem.scrollLeft) + ')';
        } else {
            fx.start = $elem.css('clip'); // .replace(/,/g, " ");
        }

        var calcRect = function(pos){
            var arr = [],
                rect = fx[pos].slice(5).split(' ');
            
            for (var i = 0; i < rect.length; i++) {
                arr.push(parseFloat(rect[i]));
            }
            return arr;
        };
        var sa = calcRect('start'),
            ea = calcRect('end');
    
        var perc = parseFloat(fx.pos).toFixed(4);
        elem.style.clip = 'rect(' +
            parseFloat( ( perc * (ea[0] - sa[0]) ) + sa[0] ) + fx.unit + ', ' +
            parseFloat( ( perc * (ea[1] - sa[1]) ) + sa[1] ) + fx.unit + ', ' +
            parseFloat( ( perc * (ea[2] - sa[2]) ) + sa[2] ) + fx.unit + ', ' +
            parseFloat( ( perc * (ea[3] - sa[3]) ) + sa[3] ) + fx.unit + ')';
    };
}(jQuery));