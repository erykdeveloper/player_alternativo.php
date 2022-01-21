$(document).ready(function() {
    $('body').on('click', '.functions button.play', function() {
        player.statusPp();
    });
    $('body').on('change', '.myRangeTsts', function() {
        var value = $(this).val();
        console.log(value);
        player.setVolume(value);
    });
});