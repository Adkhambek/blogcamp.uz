<?php
session_start();

function ErrorMessage()
{
    if (isset($_SESSION["ErrorMessage"])) {
        $Output = '<script>
        swal({
     title: "Xatolik bor!",
     text: "' . htmlentities($_SESSION["ErrorMessage"]) . '",
     icon: "error",
     button: "Yopish",
   });
       </script>';
        $_SESSION["ErrorMessage"] = null;
        return $Output;
    }
}
function SuccessMessage()
{
    if (isset($_SESSION["SuccessMessage"])) {
        $Output = '<script>
        swal({
     title: "Qabul qilindi!",
     text: "' . htmlentities($_SESSION["SuccessMessage"]) . '",
     icon: "success",
     button: "Yopish",
   });
       </script>';
        $_SESSION["SuccessMessage"] = null;
        return $Output;
    }
}
