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
function validate_name(){
    let fname = new String(document.getElementById("first_name").value);
    let lname = new String(document.getElementById("last_name").value);
    let mname = new String(document.getElementById("middel_name").value);
    let names = [fname,lname,mname];
    let isValid = names.every(name => /^[A-Za-z]+$/.test(name));

    if (isValid) {
      return true;
    } else {
      alert("enter name in correct format");
      return false;
    }
}