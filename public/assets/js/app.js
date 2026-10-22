document.getElementById("sightingForm")?.addEventListener("submit", function(e) {
    const date = document.getElementById("sightingDate").value;
    const time = document.getElementById("sightingTime").value;
    const email = document.getElementById("email").value.trim();
    const phone = document.getElementById("phone").value.trim();

    const error = [];

    if (new Date(`${date}T${time}`) > new Date()) {
        error.push('The sighting cannot be in the future');
    }

    if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)){
        error.push('Please enter valid email address');
    }

    if(phone && phone.replace(/\D/g, '').length !== 10){
        error.push('Please enter a valid phone number');
    }

    if(error.length > 0){
        e.preventDefault();
        alert(error.join(',\n '));
    }
})