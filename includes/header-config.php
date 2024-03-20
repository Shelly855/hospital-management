<?php
    $navigationLinks = array(
        'doctor' => array(
            'Homepage' => '../login/index.php',
            'Patient Records' => '../patient/patient-records.php',
            'Diagnosis Records' => '../diagnosis/diagnosis-records.php',
            'Prescriptions' => '../prescription/prescriptions.php',
            'Medicine Records' => '../medicine/medicine-records.php',
            'Lab Tests' => '../labTest/lab-tests.php',
            'Log Out' => '../login/logout.php'
        ),
        'pharmacist' => array(
            'Homepage' => '../login/index.php',
            'Prescriptions' => '../prescription/prescriptions.php',
            'Medicine Records' => '../medicine/medicine-records.php',
            'Patient Records' => '../patient/patient-records.php',
            'Log Out' => '../login/logout.php'
        ),
        'lab technician' => array(
            'Homepage' => '../login/index.php',
            'Patient Records' => '../patient/patient-records.php',
            'Lab Tests' => '../labTest/lab-tests.php',
            'Log Out' => '../login/logout.php'
        ),
        'admin' => array(
            'Homepage' => '../login/index.php',
            'Staff Records' => '../staffUser/staff-records.php',
            'Patient Records' => '../patient/patient-records.php',
            'Log Out' => '../login/logout.php'
        )
    );
?>