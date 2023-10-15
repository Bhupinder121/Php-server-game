let stars = []
let boxs = []

function setup(){
    createCanvas(windowWidth, windowHeight);
    for(let i = 0; i < 100; i++){
        stars.push(new star(i, random(width), random(height)));
    }
    for(let i = 0; i < 3; i++){
        boxs.push(new box(random(width-500), random(height-500), random(PI)));
    }
    collision();
}

function collision(){
    

}

function draw(){
    background(51);
    for(let i = 0; i < stars.length; i++){
        stars[i].show();
    }
    for(let i = 0; i < boxs.length; i++){
        boxs[i].show();
    }
}