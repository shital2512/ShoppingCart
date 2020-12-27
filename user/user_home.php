<html>

<head>
    <title>Untitled Document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


    <script language="javascript">
        <?php
        include('../includes/connection.php');
        $result = mysqli_query($con, "select *from tblcategory");
        ?>

        var httpObject = null;

        // Get the HTTP Object
        function getHTTPObject() {
            if (window.ActiveXObject) return new ActiveXObject("Microsoft.XMLHTTP");
            else if (window.XMLHttpRequest) return new XMLHttpRequest();
            else {
                alert("Your browser does not support AJAX.");
                return null;
            }
        }

        // Change the value of the outputText field
        function setOutput() {
            if (httpObject.readyState == 4) {
                document.getElementById('div_result').innerHTML = httpObject.responseText;
            }
        }

        // Implement business logic
        function loadSite(page) {
            httpObject = getHTTPObject();

            if (httpObject != null) {
                if (page == "category")
                    httpObject.open("GET", "./category_list.php", true);
                else if (page == "product")
                    httpObject.open("GET", "./product_list.php", true);
                httpObject.send(null);
                httpObject.onreadystatechange = setOutput;
            }
        }
    </script>
</head>

<body>
</br></br></br></br></br></br></br></br>
    <table border=1 width="80%" height="50%" align="center">

        <tr height="15%">
            <td colspan="2"><h2>Category Name</h2>
        <tr> </tr>
        </td>
        <td>
            <?php
            if (mysqli_num_rows($result) == 0) { ?>
                <tr>
                    <td colspan="4"> Rows not available.</td>
                </tr>
                <?php
            } else {
                $cid = 1;
                while ($row = mysqli_fetch_array($result, 1)) {
                    $id = $row['catID'];
                ?>


                    <a href="#" onclick='fetchProductData(<?php echo $id; ?>)'> <?php echo $row['catName']; ?></a></br>


            <?php
                }
            }
            ?>
        </td>
        <td>
            <div id="div_result"></div>
        </td>
        <tr></tr>
        <td colspan="2"><a href="logout.php">Logout</a></td>
        </tr>
        <script>
            function fetchProductData(cid) {
                event.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'fetch_product.php',
                    data: {
                        catID: cid
                    },
                    success: function(data) {
                        $('#div_result').html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                });
            }
        </script>
    </table>
</body>

</html>