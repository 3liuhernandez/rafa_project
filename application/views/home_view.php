<?php

    echo $this->session->userdata('username');
    echo "<br>";
    echo $this->session->userdata('user_id');
    echo "<br>";
    echo $this->session->userdata('last_login');
    echo "<br>";
    echo $this->session->userdata('role');
    $this->session->userdata('username');
    echo "<br>";
?>