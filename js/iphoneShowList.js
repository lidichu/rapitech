var o;
var b = true;
var bottomNum = 10;
function toggleSwitch(servicePx) {
    servicePx = servicePx || '100px';
    if (navigator.platform.indexOf("iPhone") != -1) {
        if (b) {
            o = $('#carousel-id').css('visibility');
            bottomNum = $('#headerServices').css('margin-bottom');
            $('#carousel-id').css('visibility', 'hidden');
            $('#headerH1').css('visibility', 'hidden');
            $('#headerH6').css('visibility', 'hidden');
            $('#headerServices').css('margin-bottom', '100px');
            b = false;
        }
        else {
            $('#carousel-id').css('visibility', o);
            $('#headerH1').css('visibility', o);
            $('#headerH6').css('visibility', o);
            $('#headerServices').css('margin-bottom', bottomNum);
            b = true;
        }
    }
}

function toggleSwitchIndex() {
    if (b) {
        o = $('#carousel-id').css('visibility');
        $('#carousel-id').css('visibility', 'hidden');
        b = false;
    }
    else {
        $('#carousel-id').css('visibility', o);
        b = true;
    }
}
