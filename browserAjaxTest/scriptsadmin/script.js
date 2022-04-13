function listCus(){
    const q = new XMLHttpRequest();
    q.onreadystatechange = function() {
    if(q.readyState === 4) {
        const response = q.responseText;
        const list = document.getElementById('cusList');
        list.innerHTML = response;
    }
};
q.open("GET", "./phps/listCusA.php");
q.send();
}
//setTimeout(listCus, 1000);

function addCus(){
    const name = document.getElementById('nom');
    const sname = document.getElementById('prenom');
    const mail = document.getElementById('email');
    const natt = document.getElementById('nat'); 
    const age = document.getElementById('age');
    const role = document.getElementById('role');

    const nav = name.value;
    const sv= sname.value;
    const mv = mail.value;
    const nv = natt.value;
    const av = age.value;
    const rv= role.value;

    const q1 = new XMLHttpRequest();
    q1.onreadystatechange = function(){
        if(q1.readyState === 4){
            const response1 = q1.responseText; 
        }
    }
    q1.open("POST", "./phps/addCus.php");
    q1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    q1.send(`name=${nav}&sname=${sv}&mail=${mv}&nat=${nv}&age=${av}&role=${rv}`);
}

function deleteCus(){
    const cusId = document.getElementById('did');
    const idn = cusId.value;

    console.log(idn);

    const q2 = new XMLHttpRequest();
    q2.onreadystatechange = function() {
      if(q2.readyState === 4) {
        const response2 = q2.responseText;
      }
    };
    q2.open("POST", "./phps/deleteCusA.php"); 
    q2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    q2.send(`id=${idn}`);
}

function listProd(){
    const q3 = new XMLHttpRequest();
    q3.onreadystatechange = function(){
        if(q3.readyState === 4){
            const response3 = q3.responseText;
            const list = document.getElementById('productsList');
            list.innerHTML = response3;
        }
    }
    q3.open("GET", "./phps/listProd.php");
    q3.send();
}
//setTimeout(listProd(), 1000);

function addProd(){

    const pname = document.getElementById('pnom');
    const cat = document.getElementById('categorie');
    const brand = document.getElementById('marque');
    const price = document.getElementById('prix');

    const nmv = pname.value;
    const catv = cat.value;
    const brv = brand.value;
    const prv = price.value;

    const q4 = new XMLHttpRequest();
    q4.onreadystatechange = function(){
        if(q4.readyState === 4){
            const response4 = q4.responseText;
        }
    }
    q4.open("POST", "./phps/addProdA.php");
    q4.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    q4.send(`pname=${nmv}&cat=${catv}&brand=${brv}&price=${prv}`);

}

function supprProd(){
    const pId = document.getElementById('pid');
    const pIdn = pId.value;

    const q15 = new XMLHttpRequest();
    q15.onreadystatechange = function() {
        if(q15.readyState === 4) {
            const response15 = q15.responseText;
        }
    }
    q15.open("POST", "./phps/supprProdA.php");
    q15.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    q15.send(`id=${pIdn}`);

}

function modifCus(){

    const idcus = document.getElementById('idmodc');
    const newval = document.getElementById('newvalue');

    const checkedname = document.getElementById('checkname');
    const checkedsname = document.getElementById('checksname');
    const checkedmail = document.getElementById('checkmail');
    const checkednat = document.getElementById('checknat');
    const checkedage = document.getElementById('checkage');
    const checkedrole = document.getElementById('checkrole');

    const idv = idcus.value;
    const newv = newval.value;

    if(checkedname.checked == true){

        const q5 = new XMLHttpRequest();
        q5.onreadystatechange = function(){
            if(q5.readyState === 4){
                const response5 = q5.responseText;
            }
        }
        q5.open("POST", "./phps/modifCusA.php");
        q5.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        q5.send(`id=${idv}&name=${newv}`);
    }
    if(checkedsname.checked == true){
        const q6 = new XMLHttpRequest();
        q6.onreadystatechange = function(){
            if(q6.readyState === 4){
                const response6 = q6.responseText;
            }
        }
        q6.open("POST", "./phps/modifCusA.php");
        q6.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        q6.send(`id=${idv}&sname=${newv}`);
    }
    if(checkedmail.checked == true){
        const q7 = new XMLHttpRequest();
        q7.onreadystatechange = function(){
            if(q7.readyState === 4){
                const response7 = q7.responseText;
            }    
        }
        q7.open("POST", "./phps/modifCusA.php");
        q7.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        q7.send(`id=${idv}&mail=${newv}`);
    }
    if(checkednat.checked == true){
        const q8 = new XMLHttpRequest();
        q8.onreadystatechange = function(){
            if(q8.readyState === 4){
                const response8 = q8.responseText;
            }
        }
        q8.open("POST", "./phps/modifCusA.php");
        q8.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        q8.send(`id=${idv}&nat=${newv}`);
    }
    if(checkedage.checked == true){
        const q9 = new XMLHttpRequest();
        q9.onreadystatechange = function(){
            if(q9.readyState === 4){
                const response9 = q9.responseText;
            }
        }
        q9.open("POST", "./phps/modifCusA.php");
        q9.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        q9.send(`id=${idv}&age=${newv}`);
    }
    if(checkedrole.checked == true){
        const q10 = new XMLHttpRequest();
        q10.onreadystatechange = function(){
            if(q10.readyState === 4){
                const response10 = q10.responseText;
            }
        }
        q10.open("POST", "./phps/modifCusA.php");
        q10.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        q10.send(`id=${idv}&role=${newv}`);
    }   
}

function modifProd(){
    
    const idprod = document.getElementById('idprodc');
    const newvalp = document.getElementById('newvaluep');

    const checkednamep = document.getElementById('checknamep');
    const checkedcatp = document.getElementById('checkcatp');
    const checkbrandp = document.getElementById('checkbrandp');
    const checkedpricep = document.getElementById('checkpricep');

    const idpv = idprod.value;
    const newpv = newvalp.value;

    if(checkednamep.checked == true){
        const q11 = new XMLHttpRequest();
        q11.onreadystatechange = function(){
            if(q11.readyState === 4){
                const response11 = q11.responseText;
            }
        }
        q11.open("POST", "./phps/modifProdA.php");
        q11.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        q11.send(`id=${idpv}&name=${newpv}`);
    }
    if(checkedcatp.checked == true){
        const q12 = new XMLHttpRequest();
        q12.onreadystatechange = function(){
            if(q12.readyState === 4){
                const response12 = q12.responseText;
            }
        }
        q12.open("POST", "./phps/modifProdA.php");
        q12.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        q12.send(`id=${idpv}&cat=${newpv}`);
    }
    if(checkbrandp.checked == true){
        const q13 = new XMLHttpRequest();
        q13.onreadystatechange = function(){
            if(q13.readyState === 4){
                const response13 = q13.responseText;
            }
        }
        q13.open("POST", "./phps/modifProdA.php");
        q13.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        q13.send(`id=${idpv}&brand=${newpv}`);
    }
    if(checkedpricep.checked == true){
        const q14 = new XMLHttpRequest();
        q14.onreadystatechange = function(){
            if(q14.readyState === 4){
                const response14 = q14.responseText;
            }
        }
        q14.open("POST", "./phps/modifProdA.php");
        q14.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        q14.send(`id=${idpv}&price=${newpv}`);
    }
}