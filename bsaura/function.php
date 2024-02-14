<?php

function check_login($connection)
{
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM user_tbl WHERE user_id = '$id' LIMIT 1";

        $result = mysqli_query($connection, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            // Check user_type
            if ($user_data['user_type'] === 'user') {
                // If user_type is 'user', display alert with OK and Cancel options
                echo "<script>
                        var result = confirm('You can\'t be in this page. This page is for admin only. Do you want to proceed to login?');
                        if (result) {
                            window.location.href='/index.php';
                        } else {
                            // User clicked Cancel, redirect back to the previous page
                            window.history.back();
                        }
                      </script>";
                die;
            }

            return $user_data;
        }
    }

    // Redirect to login
    header("Location: login.php");
    die;
}


function check_personnel($connection)
{
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM user_tbl WHERE user_id = '$id' LIMIT 1";

        $result = mysqli_query($connection, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $personnel_data = mysqli_fetch_assoc($result);

            // Check user_type
            if ($personnel_data['user_type'] === 'personnel') {
                // If user_type is 'personnel', display alert with OK and Cancel options
                echo "<script>
                        var result = confirm('You are not authorized in this page. This page is for admin only. Do you want to proceed to login?');
                        if (result) {
                            window.location.href='/index.php';
                        } else {
                            // User clicked Cancel, redirect to dashboard.php
                            window.location.href='dashboard.php';
                        }
                      </script>";
                die;
            }

            return $personnel_data;
        }
    }

    // Redirect to login
    header("Location: login.php");
    die;
}

function check_vet($connection)
{
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM user_tbl WHERE user_id = '$id' LIMIT 1";

        $result = mysqli_query($connection, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $vet_data = mysqli_fetch_assoc($result);

            // Check user_type
            if ($vet_data['user_type'] === 'vetmed') {
                // If user_type is 'personnel', display alert with OK and Cancel options
                echo "<script>
                        var result = confirm('You are not authorized in this page. This page is for admin only. Do you want to proceed to login?');
                        if (result) {
                            window.location.href='/index.php';
                        } else {
                            // User clicked Cancel, redirect to dashboard.php
                            window.location.href='dashboard.php';
                        }
                      </script>";
                die;
            }

            return $vet_data;
        }
    }

    // Redirect to login
    header("Location: login.php");
    die;
}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}

function generateRandomGmail() {
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $randomString = '';

    // Generate a random string of 10 characters
    for ($i = 0; $i < 10; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    // Generate a random Gmail address
    $gmailAddress = $randomString . '@gmail.com';

    return $gmailAddress;
}


function getAnimalCounts($connection, $category) {
    $counts = array('alive' => 0, 'dead' => 0, 'male' => 0, 'female' => 0);

    // Fetch counts from the database
    $query = "SELECT COUNT(*) AS count, status, sex FROM animal_tbl WHERE category = '$category' GROUP BY status, sex";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $status = $row['status'];
        $sex = $row['sex'];

        // Update counts based on status and sex
        if ($status == 'alive') {
            $counts['alive'] += $row['count'];
        } elseif ($status == 'dead') { 
            $counts['dead'] += $row['count'];
        }

        if ($sex == 'male') {
            $counts['male'] += $row['count'];
        } elseif ($sex == 'female') {
            $counts['female'] += $row['count'];
        }
    }

    return $counts;
}




function isDuplicateAnimalIds($connection, $animalId, $currentId) {
    $sql = "SELECT * FROM medical_tbl WHERE animal_id = ? AND id != ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss", $animalId, $currentId);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->num_rows > 0;
}


function isDuplicateAnimalId($connection, $animalId, $currentId) {
    $sql = "SELECT * FROM animal_tbl WHERE animal_id = ? AND id != ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss", $animalId, $currentId);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->num_rows > 0;
}
