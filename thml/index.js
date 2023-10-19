let stars = [];
let boxs = [];
let walls = [];
let mouseStar;
let lineConnected;

function setup(){
    createCanvas(windowWidth, windowHeight);
    lineConnected = true;
    mouseStar = new star(mouseX, mouseY);
    mouseStar.radius = 10;
    for(let i = 0; i < 200; i++){
        stars.push(new star(random(width), random(height)));
        let ran = floor(random(0, 10));
        if(ran == 1){
            stars[stars.length - 1].isInfected = true;
        }
        
    }
    for(let i = 0; i < 3; i++){
        boxs.push(new box(random(width-500), random(height-500), random(PI)));
    }
}

function mousePressed(){
    let hit = mouseStar.collide_box();
    if(hit){
        if(lineConnected){
            walls.push(new wall(walls.length, mouseX, mouseY, mouseX, mouseY));
            lineConnected = false;
        }
        else{
            walls[walls.length - 1].p2 = createVector(mouseX, mouseY);
            walls[walls.length - 1].isConnected = true;
            lineConnected = true;
        }
        
    }
}
function draw(){
    background(51);
    fill(255, 0, 0);
    mouseStar.pos = createVector(mouseX, mouseY);
    ellipse(mouseStar.pos.x, mouseStar.pos.y, mouseStar.radius);
    let die = -1;
    for(let i = 0; i < walls.length; i++){
        if(walls[i].health <= 0){
            die = i;
            continue;
        }
        else{
            walls[i].show();
        }
    }
    if(die > -1){
        walls.splice(die, 1);
    }
    for(let i = 0; i < stars.length; i++){
        stars[i].show();
    }
    for(let i = 0; i < boxs.length; i++){
        boxs[i].show();
    }
}