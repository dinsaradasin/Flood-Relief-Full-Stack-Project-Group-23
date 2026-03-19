//search
function search_record() {
    const search_id = document.getElementById("req_id").value;

    if (search_id == "") {
        alert("Enter Request ID");
        return;
    }

    fetch("user_update_search.php", {
        method: "POST",
        headers: {"Content-Type": "application/json" },
        body: JSON.stringify({ req_id: search_id })
    })
    .then(function(result) { 
        return result.json(); 
    })
    .then(function(data) {
        if (data.error) {
            alert(data.error);
        } 
        else {
         
            document.getElementById("f_req_id").value = data.request_id;
            document.getElementById("contact_name").value = data.contact_name;
            document.getElementById("contact_number").value = data.contact_number;
            document.getElementById("address").value = data.address;
            document.getElementById("family").value = data.family_members;
            document.getElementById("district").value = data.district;
            document.getElementById("d_secretariat").value = data.d_secretariat;
            document.getElementById("gn_division").value = data.gn_division;
            document.getElementById("relief_type").value = data.relief_type;
            document.getElementById("flood_severity").value = data.flood_severity;
        }
    });
}

//update


function update_record() {
    
    const r_id = document.getElementById("f_req_id").value;
    const name = document.getElementById("contact_name").value;
    const num  = document.getElementById("contact_number").value;
    const addr = document.getElementById("address").value;
    const fam  = document.getElementById("family").value;
    const dist = document.getElementById("district").value;
    const ds   = document.getElementById("d_secretariat").value;
    const gn   = document.getElementById("gn_division").value;
    const rel  = document.getElementById("relief_type").value;
    const sev  = document.getElementById("flood_severity").value;

   
    const updatedData = {
        req_id: r_id,
        contact_name: name,
        contact_number: num,
        address: addr,
        family_members: fam,
        district: dist,
        d_secretariat: ds,
        gn_division: gn,
        relief_type: rel,
        flood_severity: sev
    };

    
    fetch("user_update_change.php", {
        method: "POST", 
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(updatedData)
    })
    .then(function(result) {
        return result.text(); 
    })
    .then(function(data) {
        alert(data); 
    });
}


//delete

function delete_record() {
    const search_id = document.getElementById("req_id").value;

    if (search_id == "") {
        alert("Enter Request ID");
        return;
    }

    fetch("user_update_delete.php", {
        method: "POST",
        headers: {"Content-Type": "application/json" },
        body: JSON.stringify({ req_id: search_id })
    })
    .then(function(result) { 
        return result.text(); 
    })
    .then(function(data) { 
        alert(data); 
    });
}