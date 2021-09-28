<html>
   <head>
      <title><?php echo e($game->title); ?></title>
      <meta charset="utf-8">
      <meta name="apple-mobile-web-app-capable" content="yes" />
      <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
      <link href='/games/MoneyGame/css/fonts.css' rel='stylesheet' type='text/css'>
      <script src="/games/MoneyGame/js/lib/createjs-2015.11.26.min.js" type="text/javascript"></script>
      <script src="/games/MoneyGame/js/classes/GameButton.js" type="text/javascript"></script>
      <script src="/games/MoneyGame/js/classes/GameBack.js" type="text/javascript"></script>
      <script src="/games/MoneyGame/js/classes/GameUI.js" type="text/javascript"></script>
      <script src="/games/MoneyGame/js/classes/GameView.js" type="text/javascript"></script>
      <script src="/games/MoneyGame/js/classes/GameReels.js" type="text/javascript"></script>
      <script src="/games/MoneyGame/js/classes/GameLines.js" type="text/javascript"></script>
      <script src="/games/MoneyGame/js/classes/GameCounters.js" type="text/javascript"></script>
      <script src="/games/MoneyGame/js/classes/GameRules.js" type="text/javascript"></script>
	
	<?php if($slot->slotGamble): ?>
      <script src="/games/MoneyGame/js/classes/GameGamble.js" type="text/javascript"></script>
	<?php endif; ?>
	
	<?php if($slot->slotBonus): ?>
      <script src="/games/MoneyGame/js/classes/GameBonus.js" type="text/javascript"></script>
	<?php endif; ?>
      <script src="/games/MoneyGame/js/classes/GameMessages.js" type="text/javascript"></script>
      <script src="/games/MoneyGame/js/utils.js" type="text/javascript"></script>
      <script src="/games/MoneyGame/js/loader.js" type="text/javascript"></script>
      <script src="/games/MoneyGame/js/core.js" type="text/javascript"></script>
      <script src="/games/MoneyGame/js/classes/Sounds.js" type="text/javascript"></script>
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