class box{
    constructor(x, y, rotation){
        this.pos = createVector(x, y);
        this.size = createVector(200, 100);

        this.leftPoint = createVector(this.pos.x, this.pos.y);
        this.rightPoint = createVector(this.pos.x + this.size.x, this.pos.y);
        this.rightBottomPoint = createVector(this.pos.x + this.size.x, this.pos.y + this.size.y);
        this.leftBottomPoint = createVector(this.pos.x, this.pos.y + this.size.y);

        this.rotation = rotation
    }

    show(){
        fill(255);
        push();
        beginShape();
        vertex(this.leftPoint.x, this.rightPoint.y);
        vertex(this.rightPoint.x, this.rightPoint.y);
        vertex(this.rightBottomPoint.x, this.rightBottomPoint.y);
        vertex(this.leftBottomPoint.x, this.leftBottomPoint.y);
        endShape(CLOSE);
        pop();
    }
}