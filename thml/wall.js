class wall{
    constructor(index, x1, y1, x2, y2){
        this.p1 = createVector(x1, y1);
        this.p2 = createVector(x2, y2);
        this.health = 100;
        this.index = index;
        this.isConnected = false;
    }

    show(){
        if(!this.isConnected){
            this.p2 = createVector(mouseX, mouseY);
        }
        line(this.p1.x, this.p1.y, this.p2.x, this.p2.y);
    }
}