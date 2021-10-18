var inputLeft = document.getElementById("input-left");
var inputRight = document.getElementById("input-right");

var thumbLeft = document.querySelector(".slider > .thumb.left");
var thumbRight = document.querySelector(".slider > .thumb.right");
var range = document.querySelector(".slider > .range");

var leftvalue = document.querySelector(".value left");

var rightvalue = document.querySelector(".value right");

var output = document.getElementById("demo");

output.innerHTML = inputLeft.value;

inputLeft.oninput = function() {
  output.innerHTML = this.value;
}

var outputt = document.getElementById("demoo");

outputt.innerHTML = inputRight.value;

inputRight.oninput = function() {
  outputt.innerHTML = this.value;
}

function setLeftValue() {
	var _this = inputLeft,
		min = parseInt(_this.min),
		max = parseInt(_this.max);

	_this.value = Math.min(parseInt(_this.value), parseInt(inputRight.value) - 1);

	var percent = ((_this.value - min) / (max - min)) * 100;

	thumbLeft.style.left = percent + "%";
	range.style.left = percent + "%";
}
setLeftValue();

function setRightValue() {
	var _this = inputRight,
		min = parseInt(_this.min),
		max = parseInt(_this.max);

	_this.value = Math.max(parseInt(_this.value), parseInt(inputLeft.value) + 1);

	var percent = ((_this.value - min) / (max - min)) * 100;

	thumbRight.style.right = (100 - percent) + "%";
	range.style.right = (100 - percent) + "%";
}
setRightValue();

inputLeft.addEventListener("input", setLeftValue);
inputRight.addEventListener("input", setRightValue);

inputLeft.addEventListener("mouseover", function() {
	thumbLeft.classList.add("hover");
});
inputLeft.addEventListener("mouseout", function() {
	thumbLeft.classList.remove("hover");
});
inputLeft.addEventListener("mousedown", function() {
	thumbLeft.classList.add("active");
});
inputLeft.addEventListener("mouseup", function() {
	thumbLeft.classList.remove("active");
});

inputRight.addEventListener("mouseover", function() {
	thumbRight.classList.add("hover");
});
inputRight.addEventListener("mouseout", function() {
	thumbRight.classList.remove("hover");
});
inputRight.addEventListener("mousedown", function() {
	thumbRight.classList.add("active");
});
inputRight.addEventListener("mouseup", function() {
	thumbRight.classList.remove("active");
});









var inputLeft1 = document.getElementById("input-left1");
var inputRight1 = document.getElementById("input-right1");

var thumbLeft1 = document.getElementById("thumbleft1");
var thumbRight1 = document.getElementById("thumbright1");
var range1 = document.getElementById("range1");

var leftvalue1 = document.getElementById("valueleft1");

var rightvalue1 = document.getElementById("valueright1");

var output1 = document.getElementById("demo1");

output1.innerHTML = inputLeft1.value;

inputLeft1.oninput = function() {
  output1.innerHTML = this.value;
}

var outputt1 = document.getElementById("demoo1");

outputt1.innerHTML = inputRight1.value;

inputRight1.oninput = function() {
  outputt1.innerHTML = this.value;
}

function setLeftValue1() {
	var _this = inputLeft1,
		min = parseInt(_this.min),
		max = parseInt(_this.max);

	_this.value = Math.min(parseInt(_this.value), parseInt(inputRight1.value) - 1);

	var percent = ((_this.value - min) / (max - min)) * 100;

	thumbLeft1.style.left = percent + "%";
	range1.style.left = percent + "%";
}
setLeftValue1();

function setRightValue1() {
	var _this = inputRight1,
		min = parseInt(_this.min),
		max = parseInt(_this.max);

	_this.value = Math.max(parseInt(_this.value), parseInt(inputLeft1.value) + 1);

	var percent = ((_this.value - min) / (max - min)) * 100;

	thumbRight1.style.right = (100 - percent) + "%";
	range1.style.right = (100 - percent) + "%";
}
setRightValue1();

inputLeft1.addEventListener("input", setLeftValue1);
inputRight1.addEventListener("input", setRightValue1);

inputLeft1.addEventListener("mouseover", function() {
	thumbLeft1.classList.add("hover");
});
inputLeft1.addEventListener("mouseout", function() {
	thumbLeft1.classList.remove("hover");
});
inputLeft1.addEventListener("mousedown", function() {
	thumbLeft1.classList.add("active");
});
inputLeft1.addEventListener("mouseup", function() {
	thumbLeft1.classList.remove("active");
});

inputRight1.addEventListener("mouseover", function() {
	thumbRight1.classList.add("hover");
});
inputRight1.addEventListener("mouseout", function() {
	thumbRight1.classList.remove("hover");
});
inputRight1.addEventListener("mousedown", function() {
	thumbRight1.classList.add("active");
});
inputRight1.addEventListener("mouseup", function() {
	thumbRight1.classList.remove("active");
});








var inputLeft2 = document.getElementById("input-left2");
var inputRight2 = document.getElementById("input-right2");

var thumbLeft2 = document.getElementById("thumbleft2");
var thumbRight2 = document.getElementById("thumbright2");
var range2 = document.getElementById("range2");

var leftvalue2 = document.getElementById("valueleft2");

var rightvalue2 = document.getElementById("valueright2");

var output2 = document.getElementById("demo2");

output2.innerHTML = inputLeft2.value;

inputLeft2.oninput = function() {
  output2.innerHTML = this.value;
}

var outputt2 = document.getElementById("demoo2");

outputt2.innerHTML = inputRight2.value;

inputRight2.oninput = function() {
  outputt2.innerHTML = this.value;
}

function setLeftValue2() {
	var _this = inputLeft2,
		min = parseInt(_this.min),
		max = parseInt(_this.max);

	_this.value = Math.min(parseInt(_this.value), parseInt(inputRight2.value) - 1);

	var percent = ((_this.value - min) / (max - min)) * 100;

	thumbLeft2.style.left = percent + "%";
	range2.style.left = percent + "%";
}
setLeftValue2();

function setRightValue2() {
	var _this = inputRight2,
		min = parseInt(_this.min),
		max = parseInt(_this.max);

	_this.value = Math.max(parseInt(_this.value), parseInt(inputLeft2.value) + 1);

	var percent = ((_this.value - min) / (max - min)) * 100;

	thumbRight2.style.right = (100 - percent) + "%";
	range2.style.right = (100 - percent) + "%";
}
setRightValue2();

inputLeft2.addEventListener("input", setLeftValue2);
inputRight2.addEventListener("input", setRightValue2);

inputLeft2.addEventListener("mouseover", function() {
	thumbLeft2.classList.add("hover");
});
inputLeft2.addEventListener("mouseout", function() {
	thumbLeft2.classList.remove("hover");
});
inputLeft2.addEventListener("mousedown", function() {
	thumbLeft2.classList.add("active");
});
inputLeft2.addEventListener("mouseup", function() {
	thumbLeft2.classList.remove("active");
});

inputRight2.addEventListener("mouseover", function() {
	thumbRight2.classList.add("hover");
});
inputRight2.addEventListener("mouseout", function() {
	thumbRight2.classList.remove("hover");
});
inputRight2.addEventListener("mousedown", function() {
	thumbRight2.classList.add("active");
});
inputRight2.addEventListener("mouseup", function() {
	thumbRight2.classList.remove("active");
});







var inputLeft3 = document.getElementById("input-left3");
var inputRight3 = document.getElementById("input-right3");

var thumbLeft3 = document.getElementById("thumbleft3");
var thumbRight3 = document.getElementById("thumbright3");
var range3 = document.getElementById("range3");

var leftvalue3 = document.getElementById("valueleft3");

var rightvalue3 = document.getElementById("valueright3");

var output3 = document.getElementById("demo3");

output3.innerHTML = inputLeft3.value;

inputLeft3.oninput = function() {
  output3.innerHTML = this.value;
}

var outputt3 = document.getElementById("demoo3");

outputt3.innerHTML = inputRight3.value;

inputRight3.oninput = function() {
  outputt3.innerHTML = this.value;
}

function setLeftValue3() {
	var _this = inputLeft3,
		min = parseInt(_this.min),
		max = parseInt(_this.max);

	_this.value = Math.min(parseInt(_this.value), parseInt(inputRight3.value) - 1);

	var percent = ((_this.value - min) / (max - min)) * 100;

	thumbLeft3.style.left = percent + "%";
	range3.style.left = percent + "%";
}
setLeftValue3();

function setRightValue3() {
	var _this = inputRight3,
		min = parseInt(_this.min),
		max = parseInt(_this.max);

	_this.value = Math.max(parseInt(_this.value), parseInt(inputLeft3.value) + 1);

	var percent = ((_this.value - min) / (max - min)) * 100;

	thumbRight3.style.right = (100 - percent) + "%";
	range3.style.right = (100 - percent) + "%";
}
setRightValue3();

inputLeft3.addEventListener("input", setLeftValue3);
inputRight3.addEventListener("input", setRightValue3);

inputLeft3.addEventListener("mouseover", function() {
	thumbLeft3.classList.add("hover");
});
inputLeft3.addEventListener("mouseout", function() {
	thumbLeft3.classList.remove("hover");
});
inputLeft3.addEventListener("mousedown", function() {
	thumbLeft3.classList.add("active");
});
inputLeft3.addEventListener("mouseup", function() {
	thumbLeft3.classList.remove("active");
});

inputRight3.addEventListener("mouseover", function() {
	thumbRight3.classList.add("hover");
});
inputRight3.addEventListener("mouseout", function() {
	thumbRight3.classList.remove("hover");
});
inputRight3.addEventListener("mousedown", function() {
	thumbRight3.classList.add("active");
});
inputRight3.addEventListener("mouseup", function() {
	thumbRight3.classList.remove("active");
});