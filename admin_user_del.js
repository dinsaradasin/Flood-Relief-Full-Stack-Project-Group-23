function deleteRecord() {
    const form = document.querySelector("#requestForm");
   
  
    const reqId = form.querySelector("input[name='req_id']").value.trim();
    const userId = form.querySelector("input[name='user_id']").value.trim(); 

    if (reqId === "" || userId === "") {
        alert("Enter Request ID and User ID");
        return;
    }


    const data = {
        req_id: reqId,
        user_id: userId 
    };

    fetch("admin_user_delete.php",
        {
            method: "DELETE",
             headers: {"Content-Type": "application/json" },
            body: JSON.stringify(data)
        })
    .then(function(result) { 
        return result.text(); 
    })
    .then(function(data) {

        alert(data);

        if (data === "Delete Successfully!") {
            form.reset(); 
        }
    });
}