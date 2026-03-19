window.onload = function() {
    totals(); 
};

function totals() {
    fetch("admin_sum_stat.php")

    .then(function(result) { 
        return result.text(); 
    })
    .then(function(data) {
        document.getElementById("status").innerHTML = data; 
    });
}


function get_summary() {
    const req_summary = document.getElementsByTagName("select");
    
    const my_data = {
        district: req_summary[0].value,
        relief_type: req_summary[1].value,
        severity: req_summary[2].value
    };

    fetch("admin_sum_table.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(my_data)
    })
    .then(function(result) { 
        return result.text(); 
    })
    .then(function(data) {
        document.getElementById("req_table").tBodies[0].innerHTML = data; 
    });
}