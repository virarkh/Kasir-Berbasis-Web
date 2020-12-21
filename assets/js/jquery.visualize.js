(function($){$.fn.visualize=function(options,container){return $(this).each(function(){var o=$.extend({type:'bar',width:$(this).width(),height:$(this).height(),appendTitle:true,title:null,appendKey:true,colors:['#be1e2d','#666699','#92d5ea','#ee8310','#8d10ee','#5a3b16','#26a4ed','#f45a90','#e9e744'],textColors:[],parseDirection:'x',pieMargin:10,pieLabelsAsPercent:true,pieLabelPos:'inside',lineWeight:4,lineDots:false,dotInnerColor:"#ffffff",lineMargin:(options.lineDots?15:0),barGroupMargin:10,chartId:'',xLabelParser:null,valueParser:null,chartId:'',chartClass:'',barMargin:1,yLabelInterval:30,interaction:false},options);o.width=parseFloat(o.width);o.height=parseFloat(o.height);if(o.type!='line'&&o.type!='area'){o.lineMargin=0;}
var self=$(this);var tableData={};var colors=o.colors;var textColors=o.textColors;var parseLabels=function(direction){var labels=[];if(direction=='x'){self.find('thead tr').each(function(i){$(this).find('th').each(function(j){if(!labels[j]){labels[j]=[];}
labels[j][i]=$(this).text()})});}
else{self.find('tbody tr').each(function(i){$(this).find('th').each(function(j){if(!labels[i]){labels[i]=[];}
labels[i][j]=$(this).text()});});}
return labels;};var fnParse=o.valueParser||parseFloat;var dataGroups=tableData.dataGroups=[];if(o.parseDirection=='x'){self.find('tbody tr').each(function(i,tr){dataGroups[i]={};dataGroups[i].points=[];dataGroups[i].color=colors[i];if(textColors[i]){dataGroups[i].textColor=textColors[i];}
$(tr).find('td').each(function(j,td){dataGroups[i].points.push({value:fnParse($(td).text()),elem:td,tableCords:[i,j]});});});}else{var cols=self.find('tbody tr:eq(0) td').size();for(var i=0;i<cols;i++){dataGroups[i]={};dataGroups[i].points=[];dataGroups[i].color=colors[i];if(textColors[i]){dataGroups[i].textColor=textColors[i];}
self.find('tbody tr').each(function(j){dataGroups[i].points.push({value:$(this).find('td').eq(i).text()*1,elem:this,tableCords:[i,j]});});};}
var allItems=tableData.allItems=[];$(dataGroups).each(function(i,row){var count=0;$.each(row.points,function(j,point){allItems.push(point);count+=point.value;});row.groupTotal=count;});tableData.dataSum=0;tableData.topValue=0;tableData.bottomValue=Infinity;$.each(allItems,function(i,item){tableData.dataSum+=fnParse(item.value);if(fnParse(item.value,10)>tableData.topValue){tableData.topValue=fnParse(item.value,10);}
if(item.value<tableData.bottomValue){tableData.bottomValue=fnParse(item.value);}});var dataSum=tableData.dataSum;var topValue=tableData.topValue;var bottomValue=tableData.bottomValue;var xAllLabels=tableData.xAllLabels=parseLabels(o.parseDirection);var yAllLabels=tableData.yAllLabels=parseLabels(o.parseDirection==='x'?'y':'x');var xLabels=tableData.xLabels=[];$.each(tableData.xAllLabels,function(i,labels){tableData.xLabels.push(labels[0]);});var totalYRange=tableData.totalYRange=tableData.topValue-tableData.bottomValue;var zeroLocX=tableData.zeroLocX=0;if($.isFunction(o.xLabelParser)){var xTopValue=null;var xBottomValue=null;$.each(xLabels,function(i,label){label=xLabels[i]=o.xLabelParser(label);if(i===0){xTopValue=label;xBottomValue=label;}
if(label>xTopValue){xTopValue=label;}
if(label<xBottomValue){xBottomValue=label;}});var totalXRange=tableData.totalXRange=xTopValue-xBottomValue;var xScale=tableData.xScale=(o.width-2*o.lineMargin)/totalXRange;var marginDiffX=0;if(o.lineMargin){var marginDiffX=-2*xScale-o.lineMargin;}
zeroLocX=tableData.zeroLocX=xBottomValue+o.lineMargin;tableData.xBottomValue=xBottomValue;tableData.xTopValue=xTopValue;tableData.totalXRange=totalXRange;}
var yScale=tableData.yScale=(o.height-2*o.lineMargin)/totalYRange;var zeroLocY=tableData.zeroLocY=(o.height-2*o.lineMargin)*(tableData.topValue/tableData.totalYRange)+o.lineMargin;var yLabels=tableData.yLabels=[];var numLabels=Math.floor((o.height-2*o.lineMargin)/30);var loopInterval=tableData.totalYRange/numLabels;loopInterval=Math.round(parseFloat(loopInterval)/5)*5;loopInterval=Math.max(loopInterval,1);for(var j=Math.round(parseInt(tableData.bottomValue)/5)*5;j<=tableData.topValue+loopInterval;j+=loopInterval){yLabels.push(j);}
if(yLabels[yLabels.length-1]>tableData.topValue+loopInterval){yLabels.pop();}else if(yLabels[yLabels.length-1]<=tableData.topValue-10){yLabels.push(tableData.topValue);}
$.each(dataGroups,function(i,row){row.yLabels=tableData.yAllLabels[i];$.each(row.points,function(j,point){point.zeroLocY=tableData.zeroLocY;point.zeroLocX=tableData.zeroLocX;point.xLabels=tableData.xAllLabels[j];point.yLabels=tableData.yAllLabels[i];point.color=row.color;});});try{console.log(tableData);}catch(e){}
var charts={};charts.pie={interactionPoints:dataGroups,setup:function(){charts.pie.draw(true);},draw:function(drawHtml){var centerx=Math.round(canvas.width()/2);var centery=Math.round(canvas.height()/2);var radius=centery-o.pieMargin;var counter=0.0;if(drawHtml){canvasContain.addClass('visualize-pie');if(o.pieLabelPos=='outside'){canvasContain.addClass('visualize-pie-outside');}
var toRad=function(integer){return(Math.PI/180)*integer;};var labels=$('<ul class="visualize-labels"></ul>')
.insertAfter(canvas);}
$.each(dataGroups,function(i,row){var fraction=row.groupTotal/dataSum;if(fraction<=0||isNaN(fraction))
return;ctx.beginPath();ctx.moveTo(centerx,centery);ctx.arc(centerx,centery,radius,counter*Math.PI*2-Math.PI*0.5,(counter+fraction)*Math.PI*2-Math.PI*0.5,false);ctx.lineTo(centerx,centery);ctx.closePath();ctx.fillStyle=dataGroups[i].color;ctx.fill();if(drawHtml){var sliceMiddle=(counter+fraction/2);var distance=o.pieLabelPos=='inside'?radius/1.5:radius+radius/5;var labelx=Math.round(centerx+Math.sin(sliceMiddle*Math.PI*2)*(distance));var labely=Math.round(centery-Math.cos(sliceMiddle*Math.PI*2)*(distance));var leftRight=(labelx>centerx)?'right':'left';var topBottom=(labely>centery)?'bottom':'top';var percentage=parseFloat((fraction*100).toFixed(2));row.canvasCords=[labelx,labely];row.zeroLocY=tableData.zeroLocY=0;row.zeroLocX=tableData.zeroLocX=0;row.value=row.groupTotal;if(percentage){var labelval=(o.pieLabelsAsPercent)?percentage+'%':row.groupTotal;var labeltext=$('<span class="visualize-label">'+labelval+'</span>')
.css(leftRight,0)
.css(topBottom,0);if(labeltext)
var label=$('<li class="visualize-label-pos"></li>')
.appendTo(labels)
.css({left:labelx,top:labely})
.append(labeltext);labeltext
.css('font-size',radius/8)
.css('margin-'+leftRight,-labeltext.width()/2)
.css('margin-'+topBottom,-labeltext.outerHeight()/2);if(dataGroups[i].textColor){labeltext.css('color',dataGroups[i].textColor);}}}
counter+=fraction;});}};(function(){var xInterval;var drawPoint=function(ctx,x,y,color,size){ctx.moveTo(x,y);ctx.beginPath();ctx.arc(x,y,size/2,0,2*Math.PI,false);ctx.closePath();ctx.fillStyle=color;ctx.fill();};charts.line={interactionPoints:allItems,setup:function(area){if(area){canvasContain.addClass('visualize-area');}
else{canvasContain.addClass('visualize-line');}
var xlabelsUL=$('<ul class="visualize-labels-x"></ul>')
.width(canvas.width())
.height(canvas.height())
.insertBefore(canvas);if(!o.customXLabels){xInterval=(canvas.width()-2*o.lineMargin)/(xLabels.length-1);$.each(xLabels,function(i){var thisLi=$('<li><span>'+this+'</span></li>')
.prepend('<span class="line" />')
.css('left',o.lineMargin+xInterval*i)
.appendTo(xlabelsUL);var label=thisLi.find('span:not(.line)');var leftOffset=label.width()/-2;if(i==0){leftOffset=0;}
else if(i==xLabels.length-1){leftOffset=-label.width();}
label
.css('margin-left',leftOffset)
.addClass('label');});}else{o.customXLabels(tableData,xlabelsUL);}
var liBottom=(canvas.height()-2*o.lineMargin)/(yLabels.length-1);var ylabelsUL=$('<ul class="visualize-labels-y"></ul>')
.width(canvas.width())
.height(canvas.height())
.insertBefore(scroller);$.each(yLabels,function(i){var value=Math.floor(this);var posB=(value-bottomValue)*yScale+o.lineMargin;if(posB>=o.height-1||posB<0){return;}
var thisLi=$('<li><span>'+value+'</span></li>')
.css('bottom',posB);if(Math.abs(posB)<o.height-1){thisLi.prepend('<span class="line"  />');}
thisLi.prependTo(ylabelsUL);var label=thisLi.find('span:not(.line)');var topOffset=label.height()/-2;if(!o.lineMargin){if(i==0){topOffset=-label.height();}
else if(i==yLabels.length-1){topOffset=0;}}
label
.css('margin-top',topOffset)
.addClass('label');});ctx.translate(zeroLocX,zeroLocY);charts.line.draw(area);},draw:function(area){ctx.clearRect(-zeroLocX,-zeroLocY,o.width,o.height);var integer;$.each(dataGroups,function(i,row){integer=o.lineMargin;$.each(row.points,function(j,point){if(o.xLabelParser){point.canvasCords=[(xLabels[j]-zeroLocX)*xScale-xBottomValue,-(point.value*yScale)];}else{point.canvasCords=[integer,-(point.value*yScale)];}
if(o.lineDots){point.dotSize=o.dotSize||o.lineWeight*Math.PI;point.dotInnerSize=o.dotInnerSize||o.lineWeight*Math.PI/2;if(o.lineDots=='double'){point.innerColor=o.dotInnerColor;}}
integer+=xInterval;});});self.trigger('vizualizeBeforeDraw',{options:o,table:self,canvasContain:canvasContain,tableData:tableData});$.each(dataGroups,function(h){ctx.beginPath();ctx.lineWidth=o.lineWeight;ctx.lineJoin='round';$.each(this.points,function(g){var loc=this.canvasCords;if(g==0){ctx.moveTo(loc[0],loc[1]);}
ctx.lineTo(loc[0],loc[1]);});ctx.strokeStyle=this.color;ctx.stroke();if(area){var integer=this.points[this.points.length-1].canvasCords[0];if(isFinite(integer))
ctx.lineTo(integer,0);ctx.lineTo(o.lineMargin,0);ctx.closePath();ctx.fillStyle=this.color;ctx.globalAlpha=.3;ctx.fill();ctx.globalAlpha=1.0;}
else{ctx.closePath();}});if(o.lineDots){$.each(dataGroups,function(h){$.each(this.points,function(g){drawPoint(ctx,this.canvasCords[0],this.canvasCords[1],this.color,this.dotSize);if(o.lineDots==='double'){drawPoint(ctx,this.canvasCords[0],this.canvasCords[1],this.innerColor,this.dotInnerSize);}});});}}};})();charts.area={setup:function(){charts.line.setup(true);},draw:charts.line.draw};(function(){var horizontal,bottomLabels;charts.bar={setup:function(){horizontal=(o.barDirection=='horizontal');canvasContain.addClass('visualize-bar');bottomLabels=horizontal?yLabels:xLabels;var xInterval=canvas.width()/(bottomLabels.length-(horizontal?1:0));var xlabelsUL=$('<ul class="visualize-labels-x"></ul>')
.width(canvas.width())
.height(canvas.height())
.insertBefore(canvas);$.each(bottomLabels,function(i){var thisLi=$('<li><span class="label">'+this+'</span></li>')
.prepend('<span class="line" />')
.css('left',xInterval*i)
.width(xInterval)
.appendTo(xlabelsUL);if(horizontal){var label=thisLi.find('span.label');label.css("margin-left",-label.width()/2);}});var leftLabels=horizontal?xLabels:yLabels;var liBottom=canvas.height()/(leftLabels.length-(horizontal?0:1));var ylabelsUL=$('<ul class="visualize-labels-y"></ul>')
.width(canvas.width())
.height(canvas.height())
.insertBefore(canvas);$.each(leftLabels,function(i){var thisLi=$('<li><span>'+this+'</span></li>').prependTo(ylabelsUL);var label=thisLi.find('span:not(.line)').addClass('label');if(horizontal){label.css({'min-height':liBottom,'max-height':liBottom+1,'vertical-align':'middle'});thisLi.css({'top':liBottom*i,'min-height':liBottom});var r=label[0].getClientRects()[0];if(r.bottom-r.top==liBottom){label.css('line-height',parseInt(liBottom)+'px');}
else{label.css("overflow","hidden");}}
else{thisLi.css('bottom',liBottom*i).prepend('<span class="line" />');label.css('margin-top',-label.height()/2)}});charts.bar.draw();},draw:function(){if(horizontal){ctx.rotate(Math.PI/2);}
else{ctx.translate(0,zeroLocY);}
if(totalYRange<=0)
return;var yScale=(horizontal?canvas.width():canvas.height())/totalYRange;var barWidth=horizontal?(canvas.height()/xLabels.length):(canvas.width()/(bottomLabels.length));var linewidth=(barWidth-o.barGroupMargin*2)/dataGroups.length;for(var h=0;h<dataGroups.length;h++){ctx.beginPath();var strokeWidth=linewidth-(o.barMargin*2);ctx.lineWidth=strokeWidth;var points=dataGroups[h].points;var integer=0;for(var i=0;i<points.length;i++){if(points[i].value!=0){var xVal=(integer-o.barGroupMargin)+(h*linewidth)+linewidth/2;xVal+=o.barGroupMargin*2;ctx.moveTo(xVal,0);ctx.lineTo(xVal,Math.round(-points[i].value*yScale));}
integer+=barWidth;}
ctx.strokeStyle=dataGroups[h].color;ctx.stroke();ctx.closePath();}}};})();var canvasNode=document.createElement("canvas");var canvas=$(canvasNode)
.attr({'height':o.height,'width':o.width});var title=o.title||self.find('caption').text();var canvasContain=(container||$('<div '+(o.chartId?'id="'+o.chartId+'" ':'')+'class="visualize '+o.chartClass+'" role="img" aria-label="Chart representing data from the table: '+title+'" />'))
.height(o.height)
.width(o.width);var scroller=$('<div class="visualize-scroller"></div>')
.appendTo(canvasContain)
.append(canvas);if(o.appendTitle||o.appendKey){var infoContain=$('<div class="visualize-info"></div>')
.appendTo(canvasContain);}
if(o.appendTitle){$('<div class="visualize-title">'+title+'</div>').appendTo(infoContain);}
if(o.appendKey){var newKey=$('<ul class="visualize-key"></ul>');$.each(yAllLabels,function(i,label){$('<li><span class="visualize-key-color" style="background: '+dataGroups[i].color+'"></span><span class="visualize-key-label">'+label+'</span></li>')
.appendTo(newKey);});newKey.appendTo(infoContain);};if(o.interaction){var tracker=$('<div class="visualize-interaction-tracker"/>')
.css({'height':o.height+'px','width':o.width+'px','position':'relative','z-index':200})
.insertAfter(canvas);var triggerInteraction=function(overOut,data){var data=$.extend({canvasContain:canvasContain,tableData:tableData},data);self.trigger('vizualize'+overOut,data);};var over=false,last=false,started=false;tracker.mousemove(function(e){var x,y,x1,y1,data,dist,i,current,selector,zLabel,elem,color,minDist,found,ev=e.originalEvent;x=ev.layerX||ev.offsetX||0;y=ev.layerY||ev.offsetY||0;found=false;minDist=started?30000:(o.type=='pie'?(Math.round(canvas.height()/2)-o.pieMargin)/3:o.lineWeight*4);$.each(charts[o.type].interactionPoints,function(i,current){x1=current.canvasCords[0]+zeroLocX;y1=current.canvasCords[1]+(o.type=="pie"?0:zeroLocY);dist=Math.sqrt((x1-x)*(x1-x)+(y1-y)*(y1-y));if(dist<minDist){found=current;minDist=dist;}});if(o.multiHover&&found){x=found.canvasCords[0]+zeroLocX;y=found.canvasCords[1]+(o.type=="pie"?0:zeroLocY);found=[found];$.each(charts[o.type].interactionPoints,function(i,current){if(current==found[0]){return;}
x1=current.canvasCords[0]+zeroLocX;y1=current.canvasCords[1]+zeroLocY;dist=Math.sqrt((x1-x)*(x1-x)+(y1-y)*(y1-y));if(dist<=o.multiHover){found.push(current);}});}
over=found;if(over!=last){if(over){if(last){triggerInteraction('Out',{point:last});}
triggerInteraction('Over',{point:over});last=over;}
if(last&&!over){triggerInteraction('Out',{point:last});last=false;}
started=true;}});tracker.mouseleave(function(){triggerInteraction('Out',{point:last,mouseOutGraph:true});over=(last=false);});}
if(!container){canvasContain.insertAfter(this);}
if(typeof(G_vmlCanvasManager)!='undefined'){G_vmlCanvasManager.init();G_vmlCanvasManager.initElement(canvas[0]);}
var ctx=canvas[0].getContext('2d');scroller.scrollLeft(o.width-scroller.width());$.each($.visualizePlugins,function(i,plugin){plugin.call(self,o,tableData);});charts[o.type].setup();if(!container){self.bind('visualizeRefresh',function(){self.visualize(o,$(this).empty());});self.bind('visualizeRedraw',function(){charts[o.type].draw();});}}).next();};$.visualizePlugins=[];})(jQuery);(function($){$.visualizePlugins.push(function visualizeTooltip(options,tableData){var o=$.extend({tooltip:false,tooltipalign:'auto',tooltipvalign:'top',tooltipclass:'visualize-tooltip',tooltiphtml:function(data){if(options.multiHover){var html='';for(var i=0;i<data.point.length;i++){html+='<p>'+data.point[i].value+' - '+data.point[i].yLabels[0]+'</p>';}
return html;}else{return'<p>'+data.point.value+' - '+data.point.yLabels[0]+'</p>';}},delay:false},options);if(!o.tooltip){return;}
var self=$(this),canvasContain=self.next(),scroller=canvasContain.find('.visualize-scroller'),scrollerW=scroller.width(),tracker=canvasContain.find('.visualize-interaction-tracker');tracker.css({backgroundColor:'white',opacity:0,zIndex:100});var tooltip=$('<div class="'+o.tooltipclass+'"/>').css({position:'absolute',display:'none',zIndex:90})
.insertAfter(scroller.find('canvas'));var usescroll=true;if(typeof(G_vmlCanvasManager)!='undefined'){scroller.css({'position':'absolute'});tracker.css({marginTop:'-'+(o.height)+'px'});}
self.bind('vizualizeOver',function visualizeTooltipOver(e,data){if(data.canvasContain.get(0)!=canvasContain.get(0)){return;}
if(o.multiHover){var p=data.point[0].canvasCords;}else{var p=data.point.canvasCords;}
var left,right,top,clasRem,clasAd,bottom,x=Math.round(p[0]+data.tableData.zeroLocX),y=Math.round(p[1]+data.tableData.zeroLocY);if(o.tooltipalign=='left'||(o.tooltipalign=='auto'&&x-scroller.scrollLeft()<=scrollerW/2)){if($.browser.msie&&($.browser.version==7||$.browser.version==6)){usescroll=false;}else{usescroll=true;}
left=x-(usescroll?scroller.scrollLeft():0);if(x-scroller.scrollLeft()<0){return;}
left=left+'px';right='';clasAdd="tooltipleft";clasRem="tooltipright";}else{if($.browser.msie&&$.browser.version==7){usescroll=false;}else{usescroll=true;}
right=Math.abs(x-o.width)-(o.width-(usescroll?scroller.scrollLeft():0)-scrollerW);if(Math.abs(x-o.width)-(o.width-scroller.scrollLeft()-scrollerW)<0){return;}
left='';right=right+'px';clasAdd="tooltipright";clasRem="tooltipleft";}
tooltip
.addClass(clasAdd)
.removeClass(clasRem)
.html(o.tooltiphtml(data))
.css({display:'block',top:y+'px',left:left,right:right});});self.bind('vizualizeOut',function visualizeTooltipOut(e,data){tooltip.css({display:'none'});});});})(jQuery);