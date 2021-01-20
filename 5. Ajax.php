<!-- ................. 1 ............. -->
<!-- Executarea procesului AJAX Request/Response cuprinde 5 faze, deci și 5 readyState Properties.
    0-Cererea nu a fost încă inițializată
    1-Cererea este formată
    2-Cererea este trimisă
    3-Cererea este trimisă și procesată de server
    4-Cererea este executată, iar răspunsul este primit 

    Acest exemplu va afisa in browser toate cele 5 faze ale procesului.
-->
<!-- <script type="text/javascript">
    function ajax(){
        var xmlHttp;
        try{ //mai intai verificam Opera, FireFox si Safari
            xmlHttp = new XMLHttpRequest();
        }
        catch (e){ // Apoi, daca initializarea obiectului esueaza, vom incerca cu IE (6+ apoi 5+)
            try { 
                xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); 
                }
            catch (e){ 
                try { 
                    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP"); 
                    }
                catch (e){ //Daca initializarea esueaza, raportam o eroare si inchidem functia
                    alert("Initializarea nu e completa");
                    return false; 
                }
            }
        }

        xmlHttp.onreadystatechange = function(){
            alert(xmlHttp.readyState);
        }
        xmlHttp.open("GET", "ajax.php", true);
        xmlHttp.send(null);
    }
    ajax();
</script> -->

<!-- ................. 2 ............. -->
<!-- Un exemplu concret de afisare a capitalei tarii -->
<?php
    if(isset($_GET['stat'])){
        $sir = array("Romania"=>"Bucuresti",
                    "Franta"=>"Paris",
                    "Anglia"=>"Londra",
                    "Spania"=>"Madrid"
                );
        echo $sir[$_GET['stat']];
        return;
    }
?>
<script type="text/javascript">
    function ajax($stat){
        var xmlHttp;

        try{ //mai intai verificam Opera, FireFox si Safari
            xmlHttp = new XMLHttpRequest();
        }
        catch (e){ // Apoi, daca initializarea obiectului esueaza, vom incerca cu IE (6+ apoi 5+)
            try { 
                xmlHttp = new ActiveXObject("Msxml2.XMLHTTP"); 
                }
            catch (e){ 
                try { 
                    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP"); 
                    }
                catch (e){ //Daca initializarea esueaza, raportam o eroare si inchidem functia
                    alert("Initializarea nu e completa");
                    return false; 
                }
            }
        }

        xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState == 4)
            document.getElementById("orasulCapitala").innerText = xmlHttp.responseText;
        }
        xmlHttp.open("GET", "ajax.php?stat=" + $stat, true);
        xmlHttp.send(null);
    }
</script>

<select onchange = "ajax(this.options[this.selectedIndex].value)">
    <option>Selecteaza statul:</option>
    <option name="stat" value="Romania">Romania</option>
    <option name="stat" value="Franta">Franta</option>
    <option name="stat" value="Anglia">Anglia</option>
    <option name="stat" value="Spania">Spania</option>
</select>
<br>
Orasul capitala: <div id = "orasulCapitala"></div>

<?php
    echo "Daca stergeti 'comentraiile' de cod, cadul va fi curat si va genera raspunsul pe care-l selectati din tag-ul 'select'.";
?>