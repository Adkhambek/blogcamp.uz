<?php
if (isset($_POST['Submit'])) {
    if (!empty($_POST['soc'])) {

        foreach ($_POST['soc'] as $value) {

            switch ($value) {
                case 'telegram':
                    echo "telegram";
                    break;
                case 'gmail':
                    echo "gmail";
                    break;
                case 'facebook':
                    echo "facebook";
                    break;
                case 'instagram':
                    echo "instagram";
                    break;

            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <div class="fieldset">
            <div class="checkbox checkbox-success">
                <input name="soc[]" id="checkbox1" type="checkbox" value="gmail">
                <label for="checkbox1">Gmail</label>

            </div>
            <div class="checkbox checkbox-success">
                <input name="soc[]" id="checkbox2" type="checkbox" value="telegram">
                <label for="checkbox2">Telegram</label>

            </div>
            <div class="checkbox checkbox-success">
                <input name="soc[]" id="checkbox3" type="checkbox" value="facebook">
                <label for="checkbox3">Facebook</label>

            </div>
            <div class="checkbox checkbox-success">
                <input name="soc[]" id="checkbox4" type="checkbox" value="instagram">
                <label for="checkbox4">Instagram</label>

            </div>

            <button type="submit" name="Submit">Send</button>
    </form>
</body>

</html>
