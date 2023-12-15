
function validate_dob(){
    let dob = new Date(document.getElementById("date_birth").value);
    let fiveyears = new Date();
     fiveyears.setFullYear(fiveyears.getFullYear()-5);
    if (dob >= fiveyears){
        alert("you are not younge enough");
        return false;
    }
   return true;
  }

