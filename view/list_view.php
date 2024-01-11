<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto">
                <h1>Student List</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <form method='GET'>
                    <label>Search</label>
                    <input name='search_text' type='text'>
                    <input name="search_submit" class='btn-primary' type='submit' value='Submit'>
                </form>
            </div>
            <div class='col-3'>
                <form method='GET'>
                    <label for="school" class="text-left form-label h4">School</label>
                    <select name="school_filter" id="school">
                        <option value="bole school">Bole School</option>
                        <option value="lideta">Lideta School</option>
                        <option value="menilik">Menilik School</option>
                        <option value="akaki">Akaki School</option>
                        <option value="arada">Arada School</option>
                    </select>
                    <input name="school_submit" class='btn-primary' type='submit' value='Submit'>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-strip table-hover table-bordered table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Grade</th>
                    <th>School</th>
                    <th>Registration Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php require_once '../model/listpage.php'; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
