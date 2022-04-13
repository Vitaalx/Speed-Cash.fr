function listProd(){
    const q1 = new XMLHttpRequest();
    q1.onreadystatechange = function(){
        if(q1.readyState === 4){
            const response1 = q1.responseText;
            const list = document.getElementById('productsList');
            list.innerHTML = response1;
        }
    }
    q1.open("GET", "./phps/listProd.php");
    q1.send();
}

function search(){

    const checkedname = document.getElementById('checkname');
    const checkedcat = document.getElementById('checkcat');
    const checkedbrand = document.getElementById('checkbrand');

    if(checkedname.checked == true){
        const name = document.getElementById('input');
        const nameval = name.value;
    
        const req = new XMLHttpRequest();
        req.onreadystatechange = function(){
            if (req.readyState === 4) {
                const div = document.getElementById("resultsBox");
                div.innerHTML += req.responseText;
            }
        };
            
        req.open("POST", "./phps/fromTitle.php");
        req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        req.send(`name=${nameval}`);
    }
    if(checkedcat.checked == true){
        const cat = document.getElementById('input');
        const catval = cat.value;

        const req1 = new XMLHttpRequest();
        req1.onreadystatechange = function(){
            if (req1.readyState === 4) {
                const div = document.getElementById("resultsBox");
                div.innerHTML += req1.responseText;
            }
        };
            
        req1.open("POST", "./phps/fromCat.php");
        req1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        req1.send(`cat=${catval}`);
    }
    if(checkedbrand.checked == true){
        const brand = document.getElementById('input');
        const brandval = brand.value;

        const req2 = new XMLHttpRequest();
        req2.onreadystatechange = function(){
            if (req2.readyState === 4) {
                const div = document.getElementById("resultsBox");
                div.innerHTML += req2.responseText;
            }
        };
            
        req2.open("POST", "./phps/fromBrand.php");
        req2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        req2.send(`brand=${brandval}`);
    }
}


