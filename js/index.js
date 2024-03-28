
document.getElementById('form-add').addEventListener('submit',  (e) => {

    e.preventDefault();
    let ev = e.target;
    fetch('./col_add_infoshrimp.php', {
        method: "POST",
        body: new FormData(ev),
    }).then(r => r.json()).then(res => {
        if (res) {
            alert("เปิดบ่อใหม่สำเร็จ");
            location.reload();
        } else {
            alert("เปิดบ่อใหม่ไม่สำเร็จ");
        }
    });

});

