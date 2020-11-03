function imageZoom(myImg, resultClass) {
    var lens, result, cx, cy;
    let img = myImg;
    result = document.querySelector(resultClass);
    /*create lens:*/
    lens = document.createElement("DIV");
    lens.setAttribute("class", "img-zoom-lens");
    /*insert lens:*/
    img.parentElement.insertBefore(lens, img);
    /*calculate the ratio between result DIV and lens:*/
    cx = result.offsetWidth / lens.offsetWidth;
    cy = result.offsetHeight / lens.offsetHeight;
    /*set background properties for the result DIV:*/
    result.style.backgroundImage = "url('" + img.src + "')";
    result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
    console.log(lens.offsetWidth)
        /*execute a function when someone moves the cursor over the image, or the lens:*/
    lens.addEventListener("mousemove", moveLens);
    img.addEventListener("mousemove", moveLens);

    /*and also for touch screens:*/
    lens.addEventListener("touchmove", moveLens);
    img.addEventListener("touchmove", moveLens);

    function moveLens(e) {
        result.style.display = 'block';
        lens.style.display = 'block';
        var pos, x, y;
        /*prevent any other actions that may occur when moving over the image:*/
        e.preventDefault();
        /*get the cursor's x and y positions:*/
        pos = getCursorPos(e);
        /*calculate the position of the lens:*/
        x = pos.x - (lens.offsetWidth / 2);
        y = pos.y - (lens.offsetHeight / 2);
        /*prevent the lens from being positioned outside the image:*/
        if (x > img.width - lens.offsetWidth) { x = img.width - lens.offsetWidth; }
        if (x < 0) { x = 0; }
        if (y > img.height - lens.offsetHeight) { y = img.height - lens.offsetHeight; }
        if (y < 0) { y = 0; }
        /*set the position of the lens:*/
        lens.style.left = x + "px";
        lens.style.top = y + "px";
        /*display what the lens "sees":*/
        result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
    }
    // hide the output if mouse is not longer on the lens
    lens.addEventListener('mouseout', function() {
        result.style.display = 'none';
        lens.style.display = 'none';
        img.parentElement.removeChild(lens)
    })

    function getCursorPos(e) {
        var a, x = 0,
            y = 0;
        e = e || window.event;
        /*get the x and y positions of the image:*/
        a = img.getBoundingClientRect();
        /*calculate the cursor's x and y coordinates, relative to the image:*/
        x = e.pageX - a.left;
        y = e.pageY - a.top;
        /*consider any page scrolling:*/
        x = x - window.pageXOffset;
        y = y - window.pageYOffset;
        return { x: x, y: y };
    }
}
let head = document.querySelector('head');
let styles = document.createElement('style');
styles.innerHTML = ` * {box-sizing: border-box;}
  .myresult{
      width: 250px;
      height: 250px;
  }
  .img-zoom-container {
    position: relative;
  }
  .img-zoom-lens {
    position: absolute;
    border: 1px solid #d4d4d4;
    /*set the size of the lens:*/
    width: 100px;
    height: 100px;
  }
  
  .img-zoom-result {
    
    /*set the size of the result div:*/
    width: 500px;
    height: 300px;
  }`
head.append(styles)
document.querySelectorAll('.myimage').forEach(item => {
    item.addEventListener('mouseenter', event => {
        result = document.querySelector('.myresult');
        result.style.display = 'block';
        myImg = event.target;
        imageZoom(event.target, ".myresult");
    });
    item.addEventListener('mouseleave', event => {
        event.preventDefault();
    })
})