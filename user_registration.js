const form = document.querySelector("form");

form.onsubmit = function(event){
    event.preventDefault(); 


    const name = form.querySelector("input[placeholder='Full Name']").value.trim();
    const nic = form.querySelector("input[placeholder='NIC']").value.trim();
    const username = form.querySelector("input[placeholder='Username']").value.trim();
    const password = form.querySelector("input[placeholder='Password']").value.trim();


    if (!name || !nic || !username || !password) {
        alert("Please fill in all fields.");
        return;
    }

    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return;
    }




    const my_data = {
        name: name,
        nic: nic,
        username: username,
        password: password
    };


    fetch("user_reg.php", {
        method: "POST",
        headers: {"Content-Type": "application/json" },
        body: JSON.stringify(my_data)
    })
    .then(function(result) {
        return result.text(); 
    })
    .then(function(data) {
       
        alert(data); 

      
        if (data === "Registration Successful") {
            window.location.href = "user_login.html";
        }
    });
};


    