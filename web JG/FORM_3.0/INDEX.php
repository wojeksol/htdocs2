



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Podaj swoje dane</h1>
    <main>
        <table>
        <tr>
        <center>
        <form action="dodaj.php" method="post">
            <td><nav class="left">
                
                <h2>Dane Osobowe</h2><br>
                <input type="text" placeholder="First name" size="80%" name="firstn" style="margin-left: 25px;"><br><br>
                <input type="text" placeholder="Last name" size="80%" name="lastn" style="margin-left: 25px;"><br>
                Wiek:<br>
                <select name="wiek">
                    <option value="<17">&lt; 17</option>
                    <option value=18-24>18-24</option>
                    <option value=25-30>25-30</option>
                    <option value=31-40>31-40</option>
                    <option value=41-50>41-50</option>
                    <option value=51-60>51-60</option>
                    <option value=61-70>61-70</option>
                    <option value=">70">&gt; 70</option>
                </select><br><br> </center>
            

            <b>Płeć:<br> <br>
            <input  type="radio" name="plec" value="kobieta" checked>Kobieta<br>
            <input type="radio" name="plec" value="mężczyzna">Mężczyzna<br>
            <input type="radio" name="plec" value="inna">Inna<br><br>
        </nav></td></b>

        <td>
            <nav class="button">
                <center>
                    <hr>
                    <input type="submit" value="Prześlij" name="submit">
                </center>
            </nav></td>
            <td><nav class="right">
                <div style="wight:100%">
                <input type="text" value="+48" id="nr" size="5" style="float: left;">
                <input type="text" placeholder="Phone number" size="65" name="tele" style="margin-right: 25px; float:left;"></b><br><br></div>
                <b>Adres zamieszkania:<br><br></b>
                <textarea name="adres" id="" cols="30" rows="10"></textarea><br><br>
                <input type="text" name="email" placeholder="Email" size="80%" style="margin-right: 25px;"><br><br>
                <input type="password" name="pass" id="" placeholder="Password" size="80%" style="margin-right: 25px;"><br><br>
            </nav></td>
            
            
            

            
        </tr>
    </table>
    
        </form>

        <footer><p>Wykonał: Wojciech Sołdecki</p></footer>
    </main>





</body>
</html>