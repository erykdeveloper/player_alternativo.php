// var radioInfo = {
//     ip: '000.000.000.00',
//     port: '0000',
//     idName: 'pprdk'
// }
// var audio = document.createElement('audio');
var player = {
    prevmusic: null,
    statusInfo: '',
    setVolume: function(volume) {
        var volumeFilter = 0+(volume/100);
        audio.volume = volumeFilter;
        $("#masterpage > .header > .menuBox > .org > .ppOne > .volume > .range").css({
            width: volume+'%'
        });
    },
    statusPp: function(action) {
        var ppStatus = $("body").attr('pp');
        if (action == 'play') {ppStatus = 'y'}
        if (action == 'pause') {ppStatus = 'n'}
        if (ppStatus == 'y') {
            $("body").attr('pp', 'n');
            $("#masterpage > .header > .menuBox > .org > .ppOne > .ppButton").attr('active','y');
            player.setVolume(0);
        }else{
            $("body").attr('pp', 'y');
            $("#masterpage > .header > .menuBox > .org > .ppOne > .ppButton").attr('active','n');
		}
    },
    statusLoad: function() {
        $.ajax({
            type: "GET",
            url: "status.php",
            dataType: "json",
            success: function (data) {
                player.statusInfo = data;
                player.setStatus();
            }
        });
    },
    setStatus: function() {
        var data = this.statusInfo;


        $(".program .programation").html(data.programa);
        $(".announcer .nickname").html(data.locutor);
        $(".lister .listeners").html(data.ouvintes+" ouvintes");
    },
    youtube: function($music) {
        $.ajax({
            cache: false,
            data: $.extend({
                key: 'AIzaSyDHGNq9_Ajx65N0Rbh1P42_EgMSOyYymnw',
                q: $music,
                part: 'snippet'
            }, {maxResults:1}),
            dataType: 'json',
            type: 'GET',
            timeout: 5000,
            url: 'https://www.googleapis.com/youtube/v3/search'
        }).done(function(data) {
            var items = data.items[0];
            if (items != undefined) {
                $("#masterpage > .infowebplayers > .orggbx > .cubeone > .musicinfo > .imgmusic").css('background-image', 'url('+items.snippet.thumbnails.high.url+')');
            }
        });
    },
    vagalume: function($music) {
        $.ajax({
            data: {
                q: $music,
                extra: 'artpic',
                apikey: '096c6b24c3031663ad08f9bbdcf11f44',
                limit: 1
            },
            dataType: 'json',
            type: 'GET',
            timeout: 5000,
            url: 'https://api.vagalume.com.br/search.excerpt'
        }).done(function(data) {
            if (data.response.docs[0] == undefined) {
                var band = '';
            } else {
                var band = data.response.docs[0].band;
            }
            $.ajax({
                data: {
                    apikey: '096c6b24c3031663ad08f9bbdcf11f44',
                    extra: 'artpic',
                    art: band
                },
                dataType: 'json',
                type: 'GET',
                timeout: 5000,
                url: 'https://api.vagalume.com.br/search.php'
            }).done(function(data) {
                if(data.art != undefined) {
                    $("#masterpage > .infowebplayers > .orggbx > .cubeone > .musicinfo > .imgmusic").css('background-image', 'url('+data.art.pic_medium+')');
                }
            });
        });
    }
};

// audio.src = 'http://192.95.30.147:8102/;';
// audio.volume = 0.5;
// var attemptPlay = 0;
// $(window).mousemove(function (e) { 
//     if (audio.played.length != 1) {
//         var promise = audio.play();
//         if (promise !== undefined) {
//             promise.then(_ => {
//             }).catch(error => {
//             });
//         }
//     }
// });
// setInterval(function() {
//     if (audio.played.length != 1) {
//         var promise = audio.play();
//         if (promise !== undefined) {
//             promise.then(_ => {
//             }).catch(error => {
//             });
//         }
//     }
// }, 2000);
// setInterval(function() {
//     if(attemptPlay > 2 && audio.played.length != 1 && audio.ended == true) {
//         var src = audio.src;
//         audio.src = '';
//         audio.src = src;
//         audio.load();
//     }
//     attemptPlay++;
// }, 5000);



// player.statusLoad();
// setInterval(function() {
//     player.statusLoad();
// }, 30000);