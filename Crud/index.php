<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
    <h1>data buku</h1>
    <table style="width:100%;">
        <thead>
            <th>no</th>
            <th>nama</th>
            <th>pengarang</th>
            <th>tahun terbit</th>
            <tbody id="barisData">

            </tbody>
        </thead>
    </table>


    <script type="text/javascript">
        $.ajax ({
            type ="GET",
            data ="",
            url ="ambilData.php",
            success : function (result) {
                console.log (result);

                var obJresult=JSON.parse(result);
                $.each (obJresult), function(key, val) {
                    var barisBaru=$("<tr>");
                    barisBaru.html("<td>"+val.id+"</td><td>"+val.nama+"</td><td>"+val.pengarang+"</td><td>"+val.tahunterbit+"</td>")
                    var dataHandler=$("#barisData");
                    dataHandler.append(barisBaru);
                }
            }
        })
    </script>
</body>
</html>