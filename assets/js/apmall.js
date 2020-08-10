var APMALL = (function () {

        var filter = 'win16|win32|win64|mac|macintel';
        var webChk = '';

        if(navigator.platform){
            if(filter.indexOf(navigator.platform.toLowerCase()) === -1) {
                webChk = 'M'; // 모바일
            } else {
                webChk = 'W'; // PC
            }
        }

    function _go(sapCode) {
      

        var url = "https://www.amorepacificmall.com/kr/ko/product/get_prdurl?sapcd=" + sapCode +"&btype=" + webChk;
        var targetUrl = "https://www.amorepacificmall.com/kr/ko/display/brand/brand2?displayMenuId=brand2&brandSn=15";

        $.ajax({
            url: url,
            type: "GET",
            async: true,
            success: function (resultJson) {
                if (resultJson.status == "succ") {
                    //var results = new RegExp('[\?&amp;]' + 'onlineProdSn' + '=([^&amp;#]*)').exec(resultJson.object.URL);
                    //var onlineProdSn = results[1] || 0;

                    targetUrl = resultJson.object.url;

                    if (!targetUrl.match(/^https?:\/\//i) && !targetUrl.match(/^http?:\/\//i)) {
                        targetUrl = 'https://' + targetUrl;
                    }
                }
                // 구매하기 이동
                window.open(targetUrl, "_blank");
            },
            error: function (request, status, error) {
                console.error("code:" + request.status + "\n" + "error:" + error);
                //브랜드관으로 이동
                window.open(targetUrl, "_blank");
            }
        });

    }
var urlPreFix = "https://www.amorepacificmall.com/kr/ko/product/get_prdurl";
   // 기존 sapcode로 apmall의 prdtSn을 가져온다.
    function _getPrdtSn(sapCode, fn) {
        var url = urlPreFix + "?sapcd=" + sapCode +"&btype=" + webChk;
        var onlineProdSn = "";

            $.ajax({
            url: url,
            type: "GET",
            async: true,
            success: function (resultJson) {
                if (resultJson.status == "succ") {
                    var results = new RegExp('[\?&amp;]' + 'onlineProdSn' + '=([^&amp;#]*)').exec(resultJson.object.url);
                    onlineProdSn = results[1] || 0;
                }

                if (typeof fn == 'function') {
                    //console.log("onlineProdSn="+onlineProdSn);
                    fn(onlineProdSn);
                }

            },
            error: function (request, status, error) {
                console.error("code:" + request.status + "\n" + "error:" + error);

                if (typeof fn == 'function') {
                    //console.log("onlineProdSn="+onlineProdSn);
                    fn(onlineProdSn);
                }
            }
        });
    }

    return {
        go: function (sapCode) {
            _go(sapCode);
        },
        getPrdtSn: function (sapCode, fn) {
            _getPrdtSn(sapCode, fn);
        }
    }
})();