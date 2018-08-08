var towerAX = 5,
    towerAY = 160,
    towerBX = 540,
    towerBY = 560,
    towerCX = 1050,
    towerCY = 260;

var stackSource = new Stack();
var stackAuxiliary = new Stack();
var stackDestination = new Stack();

var disks = ['disk1', 'disk2', 'disk2'];


function stepsToSolveHanoi(num_of_disks, source_rod, destination_rod, auxiliary_rod) {
    if (num_of_disks >= 1) {

        // Move a tower of num_of_disks-1 to the buffer peg, using the destination peg.
        stepsToSolveHanoi(num_of_disks - 1, source_rod, auxiliary_rod, destination_rod);

        // move(stackSource.pop(), stackDestination.push(stackSource.pop()));
        // console.log("source " + stackSource.printStack());
        // console.log("destination " + stackDestination.printStack());

        addText('Move disk from ' + source_rod + ' to ' + destination_rod);

        // Move the tower of `num_of_disks-1` from the `buffer peg` to the `destination peg` using the `source peg`.
        stepsToSolveHanoi(num_of_disks - 1, auxiliary_rod, destination_rod, source_rod);
    }

    startedPlayingText();

    // move("disk1", 450, 360);
    move("disk1", 1500, 240);
    move("disk2", 1500, 220);
    move("disk3", 1500, 200)
}

function startedPlayingText(){
    document.getElementById("text").innerHTML = "started playing";
    document.getElementById("text").style.color = "green";
    document.getElementById("text").style.textAlign = "center";
}

function addText(text) {

    var div = document.getElementById("steps");
    var paragraph = document.createElement("p");
    var t = document.createTextNode(text);
    paragraph.appendChild(t);
    document.body.appendChild(paragraph);
}

function insertAfter(newNode, referenceNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

function move(disk_number, x_position, y_position) {

    var disk = document.getElementById(disk_number);

    if (disk) {

        var x_pos = 0;
        var y_pos = 0;
        var id = setInterval(frame, 5);

        function frame() {
            if (x_pos == x_position && y_pos == y_position) {
                clearInterval(id);
            } else {
                x_pos++;
                y_pos++;
                disk.style.left = x_position + 'px';
                disk.style.top = y_position + 'px';
            }
        }
    }
}

// Stack class
class Stack {

    // Array is used to implement stack
    constructor()
    {
        this.items = [];
    }

    // push function
    push(element)
    {
        // push element into the items
        this.items.push(element);
    }

    // pop function
    pop()
    {
        // return top most element in the stack
        // and removes it from the stack
        // Underflow if stack is empty
        if (this.items.length == 0)
            return "Underflow";
        return this.items.pop();
    }

    // peek function
    peek()
    {
        // return the top most element from the stack
        // but does'nt delete it.
        return this.items[this.items.length - 1];
    }

    // isEmpty function
    isEmpty()
    {
        // return true if stack is empty
        return this.items.length == 0;
    }

    // printStack function
    printStack()
    {
        var str = "";
        for (var i = 0; i < this.items.length; i++)
            str += this.items[i] + " ";
        return str;
    }
}

function initializer(){

    stackSource.push("disk3");
    stackSource.push("disk2");
    stackSource.push("disk1");

    console.log(stackSource.printStack());
}

initializer();

function draw_disks() {
    for (var i = 0; i < 10; i++) {
        disks.fillStyle = "green";
        disks.fillRect(x, y, width, 50);
        x += 2.5;
        y -= 6;
        width -= 5;
    }
}


