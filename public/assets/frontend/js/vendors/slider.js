$(document).ready(function(){$(".noUi-handle").on("click",function(){$(this).width(50)});var e=document.getElementById("slider-range");if($("#slider-range").length>0){var n=wNumb({decimals:0,thousand:",",prefix:"$"});noUiSlider.create(e,{start:[16,173],step:1,range:{min:[0],max:[300]},format:n,connect:!0}),e.noUiSlider.on("update",function(e,a){$(".min-value-money").html(e[0]),$(".max-value-money").html(e[1]),$(".min-value").val(n.from(e[0])),$(".max-value").val(n.from(e[1]))})}});