function validate_dob(){
    let dob = new Date(document.getElementById("date_birth").value);
    let now = new Date();
    if (dob >= now){
        alert("please select a date before the current date");
        return false;
    }
    else{
    return true;}
}