
const form = document.querySelector("#requestForm");

    form.onsubmit = function(event) {
        event.preventDefault();

      
        const name = form.querySelector("input[name='contact_name']").value.trim();
        const number = form.querySelector("input[name='contact_number']").value.trim();
        const address = form.querySelector("textarea[name='address']").value.trim();
        const family = form.querySelector("input[name='family_members']").value.trim();
        const district = form.querySelector("select[name='district']").value;
        const secretariat = form.querySelector("input[name='d_secretariat']").value.trim();
        const gn_division = form.querySelector("input[name='gn_division']").value.trim();
        const relief = form.querySelector("select[name='relief_type']").value;
        const severity = form.querySelector("select[name='flood_severity']").value;
        const desc = form.querySelector("textarea[name='description']").value.trim();

      
       if (!name || !number || !address || !family || !district || !secretariat || !gn_division || !relief || !severity) {
        alert("Please fill in all required fields.");
        return;
    }

   
    if (number.length < 10) {
        alert("Please enter a valid contact number.");
        return;
    }



        

        const my_data = {
        contact_name: name,
        contact_number: number,
        address: address,
        family_members: family,
        district: district,
        d_secretariat: secretariat,
        gn_division: gn_division,
        relief_type: relief,
        flood_severity: severity,
        description: desc
    };

    fetch("create_request.php", {
        method: "POST",
        headers: {"Content-Type": "application/json" },
        body: JSON.stringify(my_data)
    })
    .then(function(result) {
        return result.text();
    })
    .then(function(data) {
        alert(data); 

       
        if (data === "Submitted Successfully") {
            form.reset();
        }
    });
    };


