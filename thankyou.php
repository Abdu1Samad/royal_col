<?php

    session_start();

    echo "Thank you for your order" . $_SESSION['F_name'] . ", " . $_SESSION['L_name'] . "!"
    "Your order has been successfully placed. We will process your order and send you an emaix   l with the details and shipping information soon.";

?>