

/////////////UI class////////////////////

function GameView(viewContainer,setObj){

this._view=new PIXI.Container();

var self=this;

var objArr=new Array();

var tx=PIXI.Texture.fromFrame('game');
objArr['game']=new PIXI.Sprite(tx);



var tx=PIXI.Texture.fromFrame('logo');
objArr['logo']=new PIXI.Sprite(tx);


objArr['game'].x=setObj['game'].x;
objArr['game'].y=setObj['game'].y;

objArr['logo'].x=setObj['logo'].x;
objArr['logo'].y=setObj['logo'].y;



this._view.addChild(objArr['game']);

this._view.addChild(objArr['logo']);


viewContainer.addChild(this._view);

this.gamePosition={x:this._view.x,y:this._view.y,width:tx._frame.width,height:tx._frame.height};



this.GetGamePosition=function(){

return this.gamePosition;
};

this.ShowBonus=function(){


};




this.EndBonus=function(){


};






addEventListener(SLOT_EVENT_STARTBONUS,function(){self.ShowBonus();});

addEventListener(SLOT_EVENT_ENDBONUS,function(){self.EndBonus();});



return this;

}
