"use strict";

function checkOnly(obj) {
    const clickedBox = obj;
    if (document.getElementById(clickedBox.id).checked == true) {
        const boxes = document.querySelectorAll(".choice-checkbox");

        for (let i = 0; i < boxes.length; i++) {
            boxes[i].checked = false;
        }
        document.getElementById(clickedBox.id).checked = true;
    }
}

const dragArea = document.getElementById("drag-table");
new Sortable(dragArea, {
    animation: 350,
});
