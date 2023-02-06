function containsNumber(string){
    return string.includes("1") || string.includes("2") || string.includes("3") || string.includes("4") || string.includes("5") || string.includes("6") || string.includes("7") || string.includes("8") || string.includes("9") || string.includes("0");
}

function formHashLogin(form, password) {
    if (password.value.length > 0){
        password.removeAttribute("required");
        // Crea un elemento di input che verrà usato come campo di output per la password criptata.
        var p = document.createElement("input");
        // Aggiungi un nuovo elemento al tuo form.
        form.appendChild(p);
        p.name = "p";
        p.type = "hidden";
        p.required = "true";
        p.value = hex_sha512(password.value);
        // Assicurati che la password non venga inviata in chiaro.
        password.value = "";
        // Come ultimo passaggio, esegui il 'submit' del form.
        form.submit;
    } else{
        password.required = true;
    }
 }

 function formHashSignup(form, password) {
    if (password.value.length > 5 && password.value.toLowerCase() != password.value && password.value.toUpperCase() != password.value && containsNumber(password.value) && password.value == password.value.replace(/\s/g, '')){
        password.removeAttribute("required");
        // Crea un elemento di input che verrà usato come campo di output per la password criptata.
        var p = document.createElement("input");
        // Aggiungi un nuovo elemento al tuo form.
        form.appendChild(p);
        p.name = "p";
        p.type = "hidden";
        p.required = "true";
        p.value = hex_sha512(password.value);
        // Assicurati che la password non venga inviata in chiaro.
        password.value = "";
        // Come ultimo passaggio, esegui il 'submit' del form.
        form.submit;
    } else{
        alert("Password not valid\nA password must be 6-20 characters long and contain (at least)\n-1 Capital letter\n-1 Lowercase letter\n-1 Number\n-No spaces");
        password.required = true;
        password.value = "";
    }
 }