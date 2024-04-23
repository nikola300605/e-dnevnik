<?php 
    require_once $_SERVER['DOCUMENT_ROOT']."/e-dnevnik/config/config.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/e-dnevnik/classes/Razred.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/e-dnevnik/classes/Odeljenje.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/e-dnevnik/classes/Student.php";

    $razred = new Razred();
    $results = $razred->getRazred();

    $odeljenje = new Odeljenje();
    $odeljenja = $odeljenje->getOdeljenje();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../admin_css/admin_add.css">
    <script src="https://use.fontawesome.com/fe459689b4.js"></script>
</head>
<body>
    <header>
        <nav>
            <div class="navbar-container">
                <div class="logo">
                    <img src="/e-dnevnik/assets/site_images/esdnevnik-logo.png" alt="">
                </div>
                <div class="menu">
                    <a href="../add_pages/add_student.php?razredID=<?=$razredID?>&odeljenjeID=<?=$odeljenjeID?>" target="_self" rel="noopener noreferrer" class="nav-link">
                        <div class="menu-div">
                            Add student
                        </div>
                    </a>
                    <a href="/e-dnevnik/sign_out.php" target="_self" rel="noopener noreferrer" class="nav-link">
                        <div class="menu-div">
                            Log Out
                        </div>
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <form action="upload_photo.php" method="post" class="student-form" enctype="multipart/form-data">
            <div class="row row-1">

                <div class="profile-picture">
                    <h1 class="upload-icon">
                        <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
                    </h1>
                    <input type="file" name="student_image" id="" accept="image/*" onchange="upload()" class="file-uploader">
                </div>     


                <div class="col col-1">
                    <label for="name">Ime</label>
                    <input type="text" name="name" id="name">
                    <label for="surname">Prezime</label>
                    <input type="text" name="surname" id="surname">
                </div>
            </div>
            <div class="col col-2">
                    <label for="date_of_birth">Datum rodjenja</label>
                    <input type="date" name=date_of_birth"" id="dob">
                    <label for="adress">Adresa</label>
                    <input type="text" name="adress" id="adress">
                    <select name="gender" id="gender">
                        <option value="" disabled selected>Pol</option>
                        <option value="musko">Musko</option>
                        <option value="zensko">Zensko</option>
                    </select>
                    <label for="email">Email adresa</label>
                    <input type="text" name="email" id="email">
                    <label for="parent-name">Ime roditelja</label>
                    <input type="text" name="parent-name" id="parent-name">

                    <select name="razredID" id="razred" onchange="javascript: dynamicDropdown(this.options[this.selectedIndex].value);">
                        <option value="" disabled selected>Razred</option>
                        <?php 
                            foreach ($results as $result) {
                                echo "<option value = '". $result['razredID'] ."'> ". $result['ime'] . " " . $result["code"] ." </option>";
                            }
                        ?>
                    </select>
                    <script type="text/javascript" language="JavaScript">
                        document.write('<select name="odeljenjeID" id="odeljenje"><option value="" disabled selected>Odeljenje</option></select>');
                    </script>

                    <noscript>
                        <select name="subcategory" id="subcategory">
                            <option value="" disabled selected>Odeljenje</option>
                        </select>
                    </noscript>
            </div>

            <div class="col col-3">
                 <input type="submit" value="Dodaj Studenta" class="submit">
            </div>
        </form>
    </div>

    <script>
        function upload(){
            const fileUpload = document.querySelector('.file-uploader');

            const image = fileUpload.files[0];

            if (!image.type.includes('image')) {
            return alert('Fajl mora biti slika!');
            }

            if (image.size > 100_000_000) {
            return alert('Slika mora biti manja od 100mb!');
            }

            const fileReader = new FileReader();
            fileReader.readAsDataURL(image);

            fileReader.onload = (fileReaderEvent) => {
                const profilePicture = document.querySelector('.profile-picture');
                profilePicture.style.backgroundImage = `url(${fileReaderEvent.target.result})`;
            }
        }

        let odeljenja = <?=json_encode($odeljenja);?>; 
        console.log(odeljenja);
        function dynamicDropdown(listindex){
            document.querySelector("#odeljenje").length = 0;
            document.querySelector("#odeljenje").options[0] = new Option("Odeljenje:", "", true, );

            if(listindex){
                let lookup = {};
                let j = 1;

                for (let i = 0; i < odeljenja.length; i++) {
                    if(odeljenja[i].razredID == listindex){
                        document.querySelector("#odeljenje").options[j] = new Option(odeljenja[i].name, odeljenja[i].odeljenjeID);
                        j += 1;
                    }
                    
                }
            }

            return true;
        }
        
        const form =document.querySelector('student-form');
        const name =document.querySelector('student-form');
    </script>
</body>
</html>