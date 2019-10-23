<?php
/*
{"name":"Selma Kohnic", "personal_id":"960309", "address":"Hantverkaregatan 14", "zip_code":"38244", "city":"Nybro", "email":"seko1800@student.miun.se", "phone":"0725554611"}
{"duration":"", "company":"", "role":"", "description":""}
{"duration":"", "name":"", "type":"", "description":""}
{"title":"", "url":"", "description":"", "image":""}
*/

//Skickar return header-information
header("Content-Type: application/json; text/html; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

//Inkluderar databaskoppling och klasser
include("includes/config.php");

//Laddar automatiskt in samtliga klasser som används
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.class.php';
    });

//HTTP-metod, path och input av förfrågning
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
$input = json_decode(file_get_contents('php://input'), true);

if ($request[0] == "about") {
	$user = new UsersRegister();	//Instans av klass

	//Värden i inmatningsfält 
	if (isset($input["name"]) && isset($input["address"]) && isset($input["zip_code"]) && isset($input["city"]) && isset($input["email"]) && isset($input["phone"])) {
		$name = $input["name"];
		$address = $input["address"]; 
		$zip_code = $input["zip_code"];
		$city = $input["city"];  
		$email = $input["email"]; 
		$phone = $input["phone"];
	}

	switch ($method){
		case "GET":
			//Skriver ut alla personuppgifter
			echo json_encode($user->getUserInfo(), JSON_PRETTY_PRINT);
			break;
		case "PUT":
			//Kontrollerar om användaren är inloggad
			if($user->loginUser($username, $password)) {
				//Uppdaterar personuppgifterna
				if (isset($input["name"]) && isset($input["address"]) && isset($input["zip_code"]) && isset($input["city"]) && isset($input["email"]) && isset($input["phone"])) {
					$user->updateUserInfo($name, $address, $zip_code, $city, $email, $phone);
				}
			}
			break;
	}

	$userArr = [];	//Array

	//Om metoden inte är GET, skrivs personuppgifterna ut ändå
	if($method != "GET") {
		$userInfo = $user->getUserInfo(); 
		
		//Placeras i en array för att därefter skrivas ut i JSON
		foreach($userInfo as $row) {
			$row_arr['name'] = $row['name'];
			$row_arr['personal_id'] = $row['personal_id'];
			$row_arr['address'] = $row['address'];
			$row_arr['zip_code'] = $row['zip_code'];
			$row_arr['city'] = $row['city'];
			$row_arr['email'] = $row['email'];
			$row_arr['phone'] = $row['phone'];
			array_push($userArr,$row_arr);
		}
		echo json_encode($userArr);
	}
}
else if ($request[0] == "jobs") {
	$job = new JobsRegister();	//Instans av klass

	//Om ett id angetts tilldelas det till en variabel
	if(isset($request[1])) {
		$id = $request[1];
	}

	//Värden i inmatningsfält
	if (isset($input["duration"]) && isset($input["company"]) && isset($input["role"]) && isset($input["description"])) {
		$duration = $input["duration"];
		$company = $input["company"];
		$role = $input["role"];
		$description = $input["description"];
	}

	switch ($method){
		case "GET":
			if(isset($id)) {
				//Skriver ut ett specifikt jobb
				echo json_encode($job->getSpecificJob($id), JSON_PRETTY_PRINT);
			}
			else {
				//Skriver ut alla jobb
				echo json_encode($job->getJobs(), JSON_PRETTY_PRINT);
			}
			break;
		case "PUT":
			//Kontrollerar om användaren är inloggad
			if($user->loginUser($username, $password)) {
				//Uppdaterar ett jobb
				if (isset($input["duration"]) && isset($input["company"]) && isset($input["role"]) && isset($input["description"])) {
					$job->updateJob($id, $duration, $company, $role, $description);
				}
			}
			break;
		case "POST":
			//Kontrollerar om användaren är inloggad
			if($user->loginUser($username, $password)) {
				//Lägger till ett jobb
				if (isset($input["duration"]) && isset($input["company"]) && isset($input["role"]) && isset($input["description"])) {
					$job->addJob($duration, $company, $role, $description);
				}
			}
			break;
		case "DELETE":
			//Kontrollerar om användaren är inloggad
			if($user->loginUser($username, $password)) {
				//Raderar ett jobb
				if(isset($id)) {
					$job->deleteJob($id);
				}
			}
			break;
	}

	$jobsArr = [];	//Array
	
	//Om metoden inte är GET, skrivs jobben ut ändå
	if($method != "GET") {
		$jobsInfo = $job->getJobs(); 
		
		//Placeras i en array för att därefter skrivas ut i JSON
		foreach($jobsInfo as $row) {
			$row_arr['duration'] = $row['duration'];
			$row_arr['company'] = $row['company'];
			$row_arr['role'] = $row['role'];
			$row_arr['description'] = $row['description'];
			array_push($jobsArr,$row_arr);
		}
		echo json_encode($jobsArr);
	}
}
else if ($request[0] == "educations") {
	$education = new EducationsRegister();	//Instans av klass

	//Om ett id angetts tilldelas det till en variabel
	if(isset($request[1])) {
		$id = $request[1];
	}

	//Värden i inmatningsfält
	if (isset($input["duration"]) && isset($input["name"]) && isset($input["type"]) && isset($input["description"])) {
		$duration = $input["duration"];
		$name = $input["name"];
		$type = $input["type"];
		$description = $input["description"];
	}

	switch ($method){
		case "GET":
			if(isset($id)) {
				//Skriver ut en specifik utbildning
				echo json_encode($education->getSpecificEducation($id), JSON_PRETTY_PRINT);
			}
			else {
				//Skriver ut alla utbildningar
				echo json_encode($education->getEducations(), JSON_PRETTY_PRINT);
			}
			break;
		case "PUT":
			//Kontrollerar om användaren är inloggad
			if($user->loginUser($username, $password)) {
				//Uppdaterar en utbildning
				if (isset($input["duration"]) && isset($input["name"]) && isset($input["type"]) && isset($input["description"])) {
					$education->updateEducation($id, $duration, $name, $type, $description);
				}
			}
			break;
		case "POST":
			//Kontrollerar om användaren är inloggad
			if($user->loginUser($username, $password)) {
				//Lägger till en utbildning
				if (isset($input["duration"]) && isset($input["name"]) && isset($input["type"]) && isset($input["description"])) {
					$education->addEducation($duration, $name, $type, $description);
				}
			}
			break;
		case "DELETE":
			//Kontrollerar om användaren är inloggad
			if($user->loginUser($username, $password)) {
				//Raderar en utbildning
				if(isset($id)) {
					$education->deleteEducation($id);
				}
			}
			break;
	}

	$educationsArr = [];	//Array
	
	//Om metoden inte är GET, skrivs utbildningarna ut ändå
	if($method != "GET") {
		$educationsInfo = $education->getEducations(); 
		
		//Placeras i en array för att därefter skrivas ut i JSON
		foreach($educationsInfo as $row) {
			$row_arr['duration'] = $row['duration'];
			$row_arr['name'] = $row['name'];
			$row_arr['type'] = $row['type'];
			$row_arr['description'] = $row['description'];
			array_push($educationsArr,$row_arr);
		}
		echo json_encode($educationsArr);
	}
}
else if ($request[0] == "websites") {
	$website = new WebsitesRegister();	//Instans av klass

	//Om ett id angetts tilldelas det till en variabel
	if(isset($request[1])) {
		$id = $request[1];
	}

	//Värden i inmatningsfält
	if (isset($input["title"]) && isset($input["url"]) && isset($input["description"]) && isset($input["image"])) {
		$title = $input["title"];
		$url = $input["url"];
		$description = $input["description"];
		$image = $input["image"];
	}

	switch ($method){
		case "GET":
			if(isset($id)) {
				//Skriver ut en specifik webbplats
				echo json_encode($website->getSpecificWebsite($id), JSON_PRETTY_PRINT);
			}
			else {
				//Skriver ut alla webbplatser
				echo json_encode($website->getWebsites(), JSON_PRETTY_PRINT);
			}
			break;
		case "PUT":
			//Kontrollerar om användaren är inloggad
			if($user->loginUser($username, $password)) {
			//Uppdaterar en webbplats
				if (isset($input["title"]) && isset($input["url"]) && isset($input["description"]) && isset($input["image"])) {
					$website->updateWebsite($id, $title, $url, $description, $image);
				}
			}
			break;
		case "POST":
			//Kontrollerar om användaren är inloggad
			if($user->loginUser($username, $password)) {
				//Lägger till en webbplats
				if (isset($input["title"]) && isset($input["url"]) && isset($input["description"]) && isset($input["image"])) {
					$website->addWebsite($title, $url, $description, $image);
				}
			}
			break;
		case "DELETE":
			//Kontrollerar om användaren är inloggad
			if($user->loginUser($username, $password)) {
				//Raderar en utbildning
				if(isset($id)) {
					$website->deleteWebsite($id);
				}
			}
			break;
	}

	$websitesArr = [];	//Array
	
	//Om metoden inte är GET, skrivs webbplatserna ut ändå
	if($method != "GET") {
		$websitesInfo = $website->getWebsites(); 
		
		//Placeras i en array för att därefter skrivas ut i JSON
		foreach($websitesInfo as $row) {
			$row_arr['title'] = $row['title'];
			$row_arr['url'] = $row['url'];
			$row_arr['description'] = $row['description'];
			$row_arr['image'] = $row['image'];
			array_push($websitesArr,$row_arr);
		}
		echo json_encode($websitesArr);
	}
}
else {
	http_response_code(404);
	exit();
}

?>