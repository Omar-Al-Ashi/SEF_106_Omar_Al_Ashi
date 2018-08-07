var towerAX = 5;
var towerAY = 160;

var towerBX = 540;
var towerBY = 560;

var towerBX = 1050;
var towerBY = 260;


function stepsToSolveHanoi(num_of_disks, source_rod, destination_rod, auxiliary_rod) {
    if (num_of_disks >= 1) {

        // Move a tower of num_of_disks-1 to the buffer peg, using the destination peg.
        stepsToSolveHanoi(num_of_disks - 1, source_rod, auxiliary_rod, destination_rod);

        // Move the remaining disk to the destination peg.
        console.log('Move disk from Tower ', source_rod, ' to Tower ', destination_rod);

        var text = 'Move disk from Tower ' + source_rod + ' to Tower ' + destination_rod
        addText(text);
        // document.getElementById("process").innerHTML = ('Move disk from Tower ', source_rod, ' to Tower ' , destination_rod);

        // Move the tower of `num_of_disks-1` from the `buffer peg` to the `destination peg` using the `source peg`.
        stepsToSolveHanoi(num_of_disks - 1, auxiliary_rod, destination_rod, source_rod);
    }
    document.getElementById("text").innerHTML = "started playing";
    document.getElementById("text").style.color = "green";
    document.getElementById("text").style.textAlign = "center";
    move("disk1", 540, 560);
    // move("disk2", 5, 160);
    // move("disk3", 1050, 260)

}

function addText(text) {

    var div = document.getElementById("steps");
    var paragraph = document.createElement("p");
    var t = document.createTextNode(text);
    paragraph.appendChild(t);
    document.body.appendChild(paragraph);
    //
    // var disk = document.createElement("div");
    // document.getElementById("disk").style.color= "black";
}

function move(disk_number, x_position, y_position) {

    var disk = document.getElementById(disk_number);

    if (disk) {
        var x_pos = 0;
        var y_pos = 0;
        var id = setInterval(frame, 5);
        function frame() {
            if (x_pos== x_position & y_pos == y_position) {
                clearInterval(id);
            } else {
                pos++;
                disk.style.top = x_position + 'px';
                disk.style.left = y_position + 'px';
            }
        }

        // var pos = 0;
        //
        // disk.style.position = "absolute";
        // disk.style.left = x_position + 'px';
        // disk.style.top = y_position + 'px';
    }
}

// stepsToSolveHanoiT(3, "A", "C", "B");