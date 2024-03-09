debugger
fetch("http://phpeducation/Form/Addons/5CorsXss/Cors.php",{
    method: "POST",
    headers: {'content-type': 'application/json'},
    body: ''
}).then(res => res.json()).then(res => console.log(res));
