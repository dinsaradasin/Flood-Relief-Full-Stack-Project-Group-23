window.onload = function() {
    
    fetch("admin_dash.php")
    .then(function(result) { 
        
        return result.text(); 
    })
    .then(function(data) {
        
        const table_body = document.getElementById("table_body");

        table_body.innerHTML = data; 
    })
    
};