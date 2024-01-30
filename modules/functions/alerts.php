<?php
function displayAlert($type)
{
    if (isset($_SESSION[$type])) {
        $alertClass = '';

        switch ($type) {
            case 'error':
                $alertClass = 'alert-danger';
                break;
            case 'alert':
                $alertClass = 'alert-primary';
                break;
            case 'success':
                $alertClass = 'alert-success';
                break;
            case 'info':
                $alertClass = 'alert-secondary" ';
                break;
        }

        echo '<div class="text-center alert ' . $alertClass . '" role="alert">' . htmlspecialchars($_SESSION[$type]) . '</div>';
        unset($_SESSION[$type]);
    }

}

