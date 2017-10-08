/* ---- register function -------*/



/* --------multistep signup form --------- */

function showfield(name){

    if(name =="Yes")document.getElementById('hidden1').style.display = "block";
    else document.getElementById('hidden1').style.display = "none";
 }

 function showfield1(name) {
    if(name =="Yes")document.getElementById('hidden2').style.display = "block";
    else document.getElementById('hidden2').style.display = "none";
 }

function selectStep() {
        if(document.getElementById("genderSelection-female").checked) 
    {
        document.getElementById("second").style.display = "none";
        document.getElementById("third").style.display = "block";
        
    }else
    {
        
        document.getElementById("second").style.display = "none";
        document.getElementById("final").style.display = "block";  
    }

}


function nex_step1(){
    
   
    var x = document.forms["register"]["email"].value;
    
    if(x == "")
        {
            alert("Please fill in all fields");
            return false;
        }
    else {
        document.getElementById("first").style.display = "none";
        document.getElementById("second").style.display = "block";
    }

}

function prev_step2(){
      
    document.getElementById("second").style.display = "none";
    document.getElementById("first").style.display = "block";
    
}

function nex_step3(){
      
    if(document.getElementById("genderSelection-female").checked || document.getElementById("genderSelection-male").checked)   
        {   
            selectStep();

        }else {
            alert("Please fill in all fields");
            return false;
        }
}

function prev_step3() {
    document.getElementById("third").style.display = "none";
    document.getElementById("second").style.display = "block";
}



function nex_step4(){
    
    if(document.getElementById("genderSelection-female").checked) 
    {
        document.getElementById("third").style.display = "none";
        document.getElementById("four").style.display = "block";
        
    }else
    {
        
        document.getElementById("second").style.display = "none";
        document.getElementById("final").style.display = "block";  
    }
}

function prev_step4() {
    document.getElementById("four").style.display = "none";
    document.getElementById("third").style.display = "block";
}

function nex_stepf() {
    document.getElementById("four").style.display = "none";
    document.getElementById("final").style.display = "block";
}


function prev_stepf(){
    
    if(document.getElementById("genderSelection-female").checked) 
    {
        document.getElementById("final").style.display = "none";
        document.getElementById("four").style.display = "block";
        
    }else
    {
        
        document.getElementById("final").style.display = "none";
        document.getElementById("second").style.display = "block";  
    }
    
    
}
