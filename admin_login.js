 const form = document.querySelector("form");

     form.onsubmit = function(event) {
        
        event.preventDefault(); 
        const username = form.querySelector("input[placeholder='Username']").value.trim();
        const password = form.querySelector("input[placeholder='Password']").value.trim();

        
        if (!username || !password) {
            alert("Please fill in both fields.");
            
            return;
        }

        
    const my_data = {
        username: username,
        password: password
    };

   
    fetch("admin_log.php", 
        {
            method: "POST",
            headers: {"Content-Type": "application/json" },
            body: JSON.stringify(my_data) 

        })
        .then(function(result) {
            return result.text(); 
        })

        .then(function(data) {
            alert(data); 

            if (data == "Login Successful") {
                window.location.href = "admin_dashboard.html";
            }

        });
        
};
     
