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
function validate_name() {
  let fname = document.getElementById("first_name").value;
  let lname = document.getElementById("last_name").value;
  let mname = document.getElementById("middle_name").value;
  
  // Validation pattern: Allow letters, spaces, and hyphens in names
  let isValid = /^[A-Za-z\s\-]+$/.test(fname) && /^[A-Za-z\s\-]+$/.test(lname) && /^[A-Za-z\s\-]+$/.test(mname);

  if (!isValid) {
    alert("Enter name in correct format (letters, spaces, and hyphens only)");
    return false;
  }
  return true;
}
