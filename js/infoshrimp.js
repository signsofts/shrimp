const mainTable = new DataTable('#mainTable', {
    // responsive: true,
    "pageLength": -1,
    "lengthMenu": [
        [-1,],
        ["All",]
    ],
    ordering: false,
    searching: false,
    // pageing: false
    "sScrollX": '100%'
});
// const mainMLists = new DataTable('#mainMList', {
//     // responsive: true,
//     "pageLength": -1,
//     "lengthMenu": [
//         [-1,],
//         ["All",]
//     ],
//     ordering: false,
//     searching: true,
//     "sScrollX": '100%'
// });
    
document.getElementById('form-add').addEventListener('submit', (e) => {

    e.preventDefault();
    let ev = e.target;
    fetch('./col_add_quality_1.php', {
        method: "POST",
        body: new FormData(ev),
    }).then(r => r.json()).then(res => {
        if (res) {
            alert("บันทึกข้อมูลสำเร็จ");
            location.reload();
        } else {
            alert("บันทึกข้อมูลไม่สำเร็จ");
        }
    });

});

document.getElementById('form-MList').addEventListener('submit', (e) => {

    e.preventDefault();
    let ev = e.target;
    fetch('./col_add_moneylist.php', {
        method: "POST",
        body: new FormData(ev),
    }).then(r => r.json()).then(res => {
        if (res) {
            alert("บันทึกข้อมูลสำเร็จ");
            location.reload();
        } else {
            alert("บันทึกข้อมูลไม่สำเร็จ");
        }
    });

});
document.getElementById('form-Clone').addEventListener('submit', (e) => {

    e.preventDefault();
    let ev = e.target;
    fetch('./col_clone_quality_1.php', {
        method: "POST",
        body: new FormData(ev),
    }).then(r => r.json()).then(res => {
        if (res) {
            alert("บันทึกข้อมูลสำเร็จ");
            location.reload();
        } else {
            alert("บันทึกข้อมูลไม่สำเร็จ");
        }
    });

});


function updateFilde(ISP_ID, fName, ev) {
    fetch('./col_update_quality.php', {
        method: "POST",
        body: new FormData(ev),
    }).then(r => r.json()).then(res => {
        if (res) {
            alert("บันทึกข้อมูลสำเร็จ");
            location.reload();
        } else {
            alert("บันทึกข้อมูลไม่สำเร็จ");
        }
    });
}

const funSubmint = (idf) => {
    $('#' + idf).trigger('submit');
}

$(document).ready(function () {

});