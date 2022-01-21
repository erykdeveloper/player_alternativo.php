<?php
    date_default_timezone_set('America/Sao_Paulo');
    require "../../vendor/autoload.php";
    require "../../config.inc.php";
    $tapi = new \app\src\Tapi();
    $tapi = $tapi->load();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Raduckets - Player Alternativo</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css?i=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="assets/css/mediaStyle.css?i=<?php echo time(); ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    <script src="assets/js/default.js?i=<?php echo time(); ?>"></script>
    <script src="assets/js/raduckets-radio.js?i=<?php echo time(); ?>"></script>
</head>
<body>
	<div class="background">
		<div class="bgimg" style="background-image: url('assets/img/bg.png');"></div>
	</div>
	<div center>
		<div class="container">
			<div class="logo" style="background-image: url('assets/img/logo.png');"></div>
			<div class="player">
				<div class="picture">
					<div class="base" style="background-image: url('assets/img/platforma.png');"></div>
					<div class="photo" style="background-image: url('<?php echo $tapi['picture']; ?>');"></div>
				</div>
				<div class="status">
					<div class="announcer">
						<div class="icon1" style="background-image: url('assets/img/icon_announcer.png');"></div>
						<div class="nickname"><?php echo $tapi['locutor']; ?></div>
					</div>
					<div class="program">
						<div class="icon2" style="background-image: url('assets/img/icon_program.png');"></div>
						<div class="programation"><?php echo $tapi['programa']; ?></div>
					</div>
					<div class="lister">
						<div class="listeners"><?php echo $tapi['ouvintes']; ?></div>
						<div class="icon3" style="background-image: url('assets/img/icon_lister.png');"></div>
					</div>
				</div>
			</div>	
			<div class="interaction">
				<div class="avatar" style="background-image: url('assets/img/frank.png');"></div>
				<div class="visit">
					<div class="text">
						<span>Bem vindo ao alternativo!</span>
						<p>
							Curta nossa rádio de forma mais leve
							e sem falhas 
						</p>
					</div>
					<button type="submit"onclick="window.open('https://www.raduckets.com.br/')">Voltar ao site</button>
				</div>
				<div class="playit">
					<div class="iconhb" style="background-image: url('assets/img/icon_hb.png');"></div>
					<button type="submit" onclick="window.open('https://www.habbo.com.br/', '_blank')" value="Habbo" formtarget="_blank">Jogue Habbo. É grátis!</button>
				</div>
			</div>
			<div class="more">
				<div class="time" style="display: block;opacity: 0.0;">
					<span>22:00</span>
					<span>23:00</span>
				</div>
				<div class="bartime" style="display: block;opacity: 0.0;">
					<div class="progress"></div>
				</div>
				<div class="functions">
					<button class="play" type="submit">
						<span class="icon" style="background-image: url(assets/img/icon_play.png);"></span>
					</button>
					<div class="volume"><i class="fas fa-volume-down"></i>
						<input type="range" value="50" min="0" max="100" step="1" class="slider myRangeTsts" id="myRange">
					</div>
					<div class="buttons">
						<button style="background-image: url('assets/img/icon_reload.png');"></button>
						<button style="background-image: url('assets/img/icon_heart.png');"></button>
						<button style="background-image: url('assets/img/icon_message.png');"></button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<audio id="audio" src="https://teste2.svrdedicado.org:2525/teste"></audio>
    <script>
    $(document).ready(function() {
        setInterval(function() {
            truePlayer.checkAutoPlay();
        }, 15000);
    });
    </script>
    <script src="https://api2.teste.com.br/truePlayer.js/sonic.dedicado.stream/2020/audio?t=1585214756"></script>
</body>
</html>