function viewAllDetails() {

    const id = document.querySelector("input[name='user_id']").value;
    const my_data = JSON.stringify({ user_id: id });


    fetch("admin_user_info_user.php", {
        method: "POST",
        headers: {"Content-Type": "application/json" },
        body: my_data
    })
    .then(function(result) { 
        return result.text();
     })
    .then(function(u_data) {
        document.getElementById("user_table").tBodies[0].innerHTML = u_data; 
    });

    
    fetch("admin_user_info_req.php", {
        method: "POST",
        headers: {"Content-Type": "application/json" },
        body: my_data
    })
    .then(function(result) {
         return result.text(); })
    .then(function(data) {
        document.getElementById("req_table").tBodies[0].innerHTML = data; 
    });
}