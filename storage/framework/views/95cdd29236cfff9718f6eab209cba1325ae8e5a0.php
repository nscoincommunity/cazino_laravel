<html>
   <head>
      <title><?php echo e($game->title); ?></title>
      <meta charset="utf-8">
      <meta name="apple-mobile-web-app-capable" content="yes" />
      <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
      <link href='/games/Dolphins/css/fonts.css' rel='stylesheet' type='text/css'>
      <script src="/games/Dolphins/js/lib/createjs-2015.11.26.min.js" type="text/javascript"></script>
      <script src="/games/Dolphins/js/classes/GameButton.js" type="text/javascript"></script>
      <script src="/games/Dolphins/js/classes/GameBack.js" type="text/javascript"></script>
      <script src="/games/Dolphins/js/classes/GameUI.js" type="text/javascript"></script>
      <script src="/games/Dolphins/js/classes/GameView.js" type="text/javascript"></script>
      <script src="/games/Dolphins/js/classes/GameReels.js" type="text/javascript"></script>
      <script src="/games/Dolphins/js/classes/GameLines.js" type="text/javascript"></script>
      <script src="/games/Dolphins/js/classes/GameCounters.js" type="text/javascript"></script>
      <script src="/games/Dolphins/js/classes/GameRules.js" type="text/javascript"></script>
	
	<?php if($slot->slotGamble): ?>
      <script src="/games/Dolphins/js/classes/GameGamble.js" type="text/javascript"></script>
	<?php endif; ?>
	
	<?php if($slot->slotBonus): ?>
      <script src="/games/Dolphins/js/classes/GameBonus.js" type="text/javascript"></script>
	<?php endif; ?>
      <script src="/games/Dolphins/js/classes/GameMessages.js" type="text/javascript"></script>
      <script src="/games/Dolphins/js/utils.js" type="text/javascript"></script>
      <script src="/games/Dolphins/js/loader.js" type="text/javascript"></script>
      <script src="/games/Dolphins/js/core.js" type="text/javascript"></script>
      <script src="/games/Dolphins/js/classes/Sounds.js" type="text/javascript"></script>
         <style>
         body,
         html {
         position: fixed;
         } 
      </style>
   </head>
   <body onload="InitializeGame()" style="margin:0px;background-color:black">
      <canvas id="game" width="750" height="630" cstyle="position: absolute;"></canvas>
   </body>
</html>