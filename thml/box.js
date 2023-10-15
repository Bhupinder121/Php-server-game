class box{
    constructor(x, y, rotation){
        this.pos = createVector(x, y);
        this.size = createVector(200, 100);
        this.rotation = rotation
    }

    show(){
        fill(255);
        push();
        beginShape();
        // translate(this.pos.x, this.pos.y);
        // rotate(this.rotation);
        vertex(this.pos.x, this.pos.y);
        vertex(this.pos.x + this.size.x, this.pos.y);
        vertex(this.pos.x + this.size.x, this.pos.y + this.size.y);
        vertex(this.pos.x, this.pos.y + this.size.y);
        
        // translate(this.pos.x, this.pos.y);
        // // rotate(this.rotation);
        // rect(0, 0, this.size.x, this.size.y);
        endShape(CLOSE);
        pop();
    }
}