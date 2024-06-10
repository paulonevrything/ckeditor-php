<?php
include "config.php";

// Insert record
if (isset($_POST['submit'])) {

    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if ($subject != '' && $message != '') {

        mysqli_query($con, "INSERT INTO messages(subject,message) VALUES('" . $subject . "','" . $message . "') ");
        header('location: index.php');
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add and Save CKEditor 5 data to MySQL database with PHP</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <style type="text/css">
        .ck-editor__editable {
            min-height: 250px;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.12.0/dist/katex.min.css">

</head>

<body>

    <?php
    $sql = "select * from messages where id=4";
    $record = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($record);
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-5" style="margin: 0 auto;">

                <form method="post" action="">

                    <div class="form-group mb-4">

                        <label class="control-label col-sm-2" for="subject">Subject:</label>
                        <!-- <div class="col-sm-10">
                            <input type="text" class="form-control" id="subject" placeholder="Enter Subject"
                                name="subject" value="<?= $row['subject'] ?>">
                        </div> -->
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="subject" placeholder="Enter Subject"
                                name="subject" value="">
                        </div>

                    </div>

                    <div class="form-group mb-4">

                        <label class="control-label col-sm-2" for="message">Message:</label>
                        <!-- <div class="col-sm-10">
                            <textarea class="form-control editor" name="message" <?= $row['message'] ?>></textarea>
                        </div> -->
                        <div class="col-sm-10">
                            <textarea class="form-control editor" name="message"></textarea>
                        </div>

                    </div>

                    <div class="form-group ">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-info" name="submit" value="Submit">
                        </div>
                    </div>

                </form>

            </div>

        </div>

    </div>
    <!-- Script -->
    <!-- ckeditor5 JS -->
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/katex@0.12.0/dist/katex.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/katex@0.12.0/dist/contrib/auto-render.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/katex@0.12.0/dist/contrib/mhchem.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/gh/isaul32/ckeditor5@c3463fe834049bf5d805d1d22402108a9c0576bd/packages/ckeditor5-build-classic/build/ckeditor.js"></script>
    
    <script type="text/javascript">
        ClassicEditor
            .create(document.querySelector('.editor'), {
                ckfinder: {
                    uploadUrl: "ckfileupload.php",
                },
                math: {
                    outputType: 'span'
                }
            })
            .then(editor => {

                console.log(editor);

            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>