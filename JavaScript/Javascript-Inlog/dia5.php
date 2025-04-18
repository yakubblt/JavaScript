<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inlogpagina</title>
    <link rel="stylesheet" href="dia5.css">
</head>

<body>
    <div class="login-box">
        <h2>Inlogpagina</h2>
        <label for="user">Gebruikersnaam</label>
        <br>
        <input type="text" id="user" placeholder="gebruikersnaam" oninput="checkUser()">
        <br>
        <label for="pass">Wachtwoord</label>
        <br>
        <input type="password" id="pass" placeholder="wachtwoord" oninput="checkPassword()">
        <span id="passwordMessage" style="color: red;"></span>
        <br>
        <button class="login-button" onclick="authenticate()">Inloggen</button>
        <span id="successMsg"></span>
        <span id="errorMsg"></span>
    </div>

    <div class="json-box">
        <h2>JSON Inloggen</h2>
        <label for="jsonUser">Gebruikersnaam</label>
        <br>
        <input type="text" id="jsonUser" placeholder="gebruikersnaam" oninput="checkUserJSON()">
        <br>
        <label for="jsonPass">Wachtwoord</label>
        <br>
        <input type="password" id="jsonPass" placeholder="wachtwoord" oninput="checkPasswordJSON()">
        <span id="jsonPasswordMessage" style="color: red;"></span>
        <br>
        <button class="json-login-button" onclick="jsonLogin()">Inloggen met JSON</button>
        <span id="jsonSuccessMsg"></span>
        <span id="jsonErrorMsg"></span>

        <h3>Gebruikers lijst</h3>
        <div id="list" class="user-table"></div>
    </div>

    <script>
        let accounts = [
            { "username": "Anna", "password": "Voorbeeld123!!" },
            { "username": "Mark", "password": "Test45678!!" },
            { "username": "Sara", "password": "WachtwoordX123!" },
            { "username": "Tom", "password": "WachtwoordY45678!" },
            { "username": "Jasper", "password": "WachtwoordZ12345!" }
        ];

        function checkUser() {
            let usernameInput = document.getElementById('user').value;
            if (usernameInput.length < 3) {
                document.getElementById('user').style.border = "2px solid red";
            } else {
                document.getElementById('user').style.border = "";
            }
        }

        function checkPassword() {
            let passwordInput = document.getElementById('pass').value;
            if (passwordInput.length < 10) {
                document.getElementById('passwordMessage').innerText = "Wachtwoord moet minimaal 10 tekens lang zijn.";
                document.getElementById('pass').style.border = "2px solid red";
            } else {
                document.getElementById('passwordMessage').innerText = "";
                document.getElementById('pass').style.border = "";
            }
        }

        function authenticate() {
            document.getElementById('successMsg').innerText = "";
            document.getElementById('errorMsg').innerText = "";

            console.clear();

            let usernameInput = document.getElementById('user').value;
            let passwordInput = document.getElementById('pass').value;
            console.log(usernameInput + " probeert in te loggen");

            if (usernameInput === "Anna" && passwordInput === "GeheimWachtwoord123!") {
                console.log("Inloggen succesvol");
                document.getElementById('successMsg').innerText = "Inloggen succesvol";
            } else {
                console.log("Alleen de naam Anna met het wachtwoord GeheimWachtwoord123! wordt goedgekeurd");
                document.getElementById('errorMsg').innerText = "Alleen de naam Anna met het wachtwoord GeheimWachtwoord123! wordt goedgekeurd";
            }
        }

        function jsonLogin() {
            document.getElementById('jsonSuccessMsg').innerText = "";
            document.getElementById('jsonErrorMsg').innerText = "";

            console.clear();

            let usernameInput = document.getElementById('jsonUser').value;
            let passwordInput = document.getElementById('jsonPass').value;
            console.log(usernameInput + " probeert in te loggen");

            let loginSuccessful = false;
            for (let i = 0; i < accounts.length; i++) {
                if (accounts[i].username === usernameInput && accounts[i].password === passwordInput) {
                    loginSuccessful = true;
                    break;
                }
            }

            if (loginSuccessful) {
                console.log("Inloggen succesvol");
                document.getElementById('jsonSuccessMsg').innerText = "Inloggen succesvol";
            } else {
                console.log("Inloggen mislukt");
                document.getElementById('jsonErrorMsg').innerText = "Inloggen mislukt, probeer het opnieuw met de juiste gegevens";
            }
        }

        function displayList() {
            let table = "<table border='1'>";
            table += "<tr><th>Gebruikersnaam</th><th>Wachtwoord</th></tr>";
            for (let i = 0; i < accounts.length; i++) {
                table += "<tr>";
                table += "<td>" + accounts[i].username + "</td>";
                table += "<td onmouseover='showPassword(" + i + ")' onmouseout='hidePassword(" + i + ")' id='pass" + i + "'>********</td>";
                table += "</tr>";
            }
            table += "</table>";
            document.getElementById('list').innerHTML = table;
        }

        function showPassword(index) {
            document.getElementById('pass' + index).innerText = accounts[index].password;
        }

        function hidePassword(index) {
            document.getElementById('pass' + index).innerText = "********";
        }

        window.onload = displayList;
    </script>
</body>

</html>
