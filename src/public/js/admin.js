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
    onSort: function () {
        const sortIds = [];
        const items = dragArea.querySelectorAll(".table-lists");
        for (let i = 0; i < items.length; i++) {
            // items[i].querySelector(".sort-number").value = i + 1;
            // console.log(items[i].querySelector(".sort-number").value);
            sortIds.push(items[i].querySelector(".sort-number").value);
        }
        console.log(sortIds);

        const sortInput = document.getElementById("sort-ids");
        sortInput.value = sortIds;
    },
});
