var sliderColorScheme=document.querySelectorAll("[data-rangeslider]");sliderColorScheme.forEach(function(e){noUiSlider.create(e,{start:127,connect:"lower",range:{min:0,max:255}})});var multielementslider=document.querySelectorAll("[data-multielement]");multielementslider.forEach(function(e){noUiSlider.create(e,{start:[20,80],connect:!0,range:{min:0,max:100}})});var resultElement=document.getElementById("result"),sliders=document.getElementsByClassName("sliders"),colors=[0,0,0];[].slice.call(sliders).forEach(function(t,i){noUiSlider.create(t,{start:127,connect:[!0,!1],orientation:"vertical",range:{min:0,max:255},format:wNumb({decimals:0})}),t.noUiSlider.on("update",function(){colors[i]=t.noUiSlider.get();var e="rgb("+colors.join(",")+")";resultElement.style.background=e,resultElement.style.color=e})});for(var select=document.getElementById("input-select"),i=-20;i<=40;i++){var option=document.createElement("option");option.text=i,option.value=i,select.appendChild(option)}var html5Slider=document.getElementById("html5");noUiSlider.create(html5Slider,{start:[10,30],connect:!0,range:{min:-20,max:40}});var inputNumber=document.getElementById("input-number");html5Slider.noUiSlider.on("update",function(e,t){e=e[t];t?inputNumber.value=e:select.value=Math.round(e)}),select.addEventListener("change",function(){html5Slider.noUiSlider.set([this.value,null])}),inputNumber.addEventListener("change",function(){html5Slider.noUiSlider.set([null,this.value])});var nonLinearSlider=document.getElementById("nonlinear");noUiSlider.create(nonLinearSlider,{connect:!0,behaviour:"tap",start:[500,4e3],range:{min:[0],"10%":[500,500],"50%":[4e3,1e3],max:[1e4]}});var nodes=[document.getElementById("lower-value"),document.getElementById("upper-value")];nonLinearSlider.noUiSlider.on("update",function(e,t,i,n,l){nodes[t].innerHTML=e[t]+", "+l[t].toFixed(2)+"%"});var lockedState=!1,lockedSlider=!1,lockedValues=[60,80],slider1=document.getElementById("slider1"),slider2=document.getElementById("slider2"),lockButton=document.getElementById("lockbutton"),slider1Value=document.getElementById("slider1-span"),slider2Value=document.getElementById("slider2-span");function crossUpdate(e,t){var i;lockedState&&(e-=lockedValues[(i=slider1===t?0:1)?0:1]-lockedValues[i],t.noUiSlider.set(e))}function setLockedValues(){lockedValues=[Number(slider1.noUiSlider.get()),Number(slider2.noUiSlider.get())]}lockButton.addEventListener("click",function(){lockedState=!lockedState,this.textContent=lockedState?"unlock":"lock"}),noUiSlider.create(slider1,{start:60,animate:!1,range:{min:50,max:100}}),noUiSlider.create(slider2,{start:80,animate:!1,range:{min:50,max:100}}),slider1.noUiSlider.on("update",function(e,t){slider1Value.innerHTML=e[t]}),slider2.noUiSlider.on("update",function(e,t){slider2Value.innerHTML=e[t]}),slider1.noUiSlider.on("change",setLockedValues),slider2.noUiSlider.on("change",setLockedValues),slider1.noUiSlider.on("slide",function(e,t){crossUpdate(e[t],slider2)}),slider2.noUiSlider.on("slide",function(e,t){crossUpdate(e[t],slider1)});var mergingTooltipSlider=document.getElementById("slider-merging-tooltips");function mergeTooltips(e,c,u){var m="rtl"===getComputedStyle(e).direction,S="rtl"===e.noUiSlider.options.direction,g="vertical"===e.noUiSlider.options.orientation,p=e.noUiSlider.getTooltips(),i=e.noUiSlider.getOrigins();p.forEach(function(e,t){e&&i[t].appendChild(e)}),e.noUiSlider.on("update",function(e,t,i,n,l){var r=[[]],a=[[]],s=[[]],o=0;p[0]&&(r[0][0]=0,a[0][0]=l[0],s[0][0]=e[0]);for(var d=1;d<l.length;d++)(!p[d]||l[d]-l[d-1]>c)&&(r[++o]=[],s[o]=[],a[o]=[]),p[d]&&(r[o].push(d),s[o].push(e[d]),a[o].push(l[d]));r.forEach(function(e,t){for(var i=e.length,n=0;n<i;n++){var l,r,o,d=e[n];n===i-1?(o=0,a[t].forEach(function(e){o+=1e3-e}),l=g?"bottom":"right",r=1e3-a[t][S?0:i-1],o=(m&&!g?100:0)+o/i-r,p[d].innerHTML=s[t].join(u),p[d].style.display="block",p[d].style[l]=o+"%"):p[d].style.display="none"}})})}noUiSlider.create(mergingTooltipSlider,{start:[20,75],connect:!0,tooltips:[!0,!0],range:{min:0,max:100}}),mergeTooltips(mergingTooltipSlider,5," - ");var hidingTooltipSlider=document.getElementById("slider-hide");noUiSlider.create(hidingTooltipSlider,{range:{min:0,max:100},start:[20,80],tooltips:!0});var pipsSlider=document.getElementById("slider-pips");noUiSlider.create(pipsSlider,{range:{min:0,max:100},start:[50],pips:{mode:"count",values:5}});var pips=pipsSlider.querySelectorAll(".noUi-value");function clickOnPip(){var e=Number(this.getAttribute("data-value"));pipsSlider.noUiSlider.set(e)}for(i=0;i<pips.length;i++)pips[i].style.cursor="pointer",pips[i].addEventListener("click",clickOnPip);var slider=document.getElementById("slider-color");noUiSlider.create(slider,{start:[4e3,8e3,12e3,16e3],connect:[!1,!0,!0,!0,!0],range:{min:[2e3],max:[2e4]}});for(var connect=slider.querySelectorAll(".noUi-connect"),classes=["c-1-color","c-2-color","c-3-color","c-4-color","c-5-color"],i=0;i<connect.length;i++)connect[i].classList.add(classes[i]);var toggleSlider=document.getElementById("slider-toggle");noUiSlider.create(toggleSlider,{orientation:"vertical",start:0,range:{min:[0,1],max:1},format:wNumb({decimals:0})}),toggleSlider.noUiSlider.on("update",function(e,t){"1"===e[t]?toggleSlider.classList.add("off"):toggleSlider.classList.remove("off")});var softSlider=document.getElementById("soft");noUiSlider.create(softSlider,{start:50,range:{min:0,max:100},pips:{mode:"values",values:[20,80],density:4}}),softSlider.noUiSlider.on("change",function(e,t){e[t]<20?softSlider.noUiSlider.set(20):80<e[t]&&softSlider.noUiSlider.set(80)});