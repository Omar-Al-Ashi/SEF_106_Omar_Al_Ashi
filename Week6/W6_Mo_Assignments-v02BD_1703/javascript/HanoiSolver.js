function stepsToSolveHanoiT(num_of_disks, source_rod, destination_rod, auxiliary_rod) {
    if (num_of_disks >= 1) {

        // Move a tower of num_of_disks-1 to the buffer peg, using the destination peg.
        stepsToSolveHanoiT(num_of_disks - 1, source_rod, auxiliary_rod, destination_rod);

        // Move the remaining disk to the destination peg.
        console.log('Move disk from Tower ', source_rod, ' to Tower ', destination_rod);

        //TODO add the whole text as a string and assign it to text
        addText('Move disk from Tower ', source_rod, ' to Tower ', destination_rod);
        // document.getElementById("process").innerHTML = ('Move disk from Tower ', source_rod, ' to Tower ' , destination_rod);

        // Move the tower of `num_of_disks-1` from the `buffer peg` to the `destination peg` using the `source peg`.
        stepsToSolveHanoiT(num_of_disks - 1, auxiliary_rod, destination_rod, source_rod);
    }
    document.getElementById("text").innerHTML = "started playing";
    document.getElementById("text").style.color = "green";
    document.getElementById("text").style.textAlign = "center";

}

function addText(text) {
    var paragraph = document.createElement("p");
    var t = document.createTextNode(text);
    paragraph.appendChild(t);
    document.body.appendChild(paragraph);
}

// stepsToSolveHanoiT(3, "A", "C", "B");