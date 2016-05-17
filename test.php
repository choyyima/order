<html>
    <head>
        <script src="js/jquery-1.11.1.min.js"></script>
        <script language="JavaScript" type="text/JavaScript">
            counter = 0;
            function action()
            {
             var wrapper = $('.field_wrapper');
            counterNext = counter + 1;
            document.getElementById("input"+counter).innerHTML = "<p>Masukkan Data <input type='text' name='data[]'></p><div id=\"input"+counterNext+"\"><a href=\"javascript:void(0);\" class=\"col-xs-1 remove_button btn btn-danger\" title=\"Remove field\"><span class=\"fa fa-minus\"> Delete</span></a></div>";
            counter++;
            $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            $(this).parent('div').remove();
            counter--;
            });
        }
        </script>
    </head>

    <body>
        <h1>Form Dinamis</h1>

        <form method="post" action="submit.php">
            <p>Masukkan Data <input type='text' class="remove_button" name='data[]'></p>

            <div id="input0">
            </div>

            <p><a href="javascript:action();">Tambah</a></p>
            <p><input type="submit" name="submit" value="Submit"><input type="reset" name="reset" value="Reset"></p>

        </form>

    </body>
</html>