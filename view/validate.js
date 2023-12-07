function validate_dob(){
    let dob = new Date(document.getElementById("dob").value);
    let now = new Date();
    if (dob >= now){
        alert("please select a date before the current date");
        return false;
    }
    return true;
}