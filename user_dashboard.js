window.onload = function() {
    
    fetch("user_dash.php")
    .then(function(result) { 
        return result.text(); 
    })
    .then(function(data) {
        const table_body = document.getElementById("req_table").tBodies[0];
        table_body.innerHTML = data; 
    });
    
};