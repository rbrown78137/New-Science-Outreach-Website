<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$dateName = $_POST["dateName"];
$studentList = preg_split("/#/",$_POST["studentList"]);
$experimentListJSON = $_POST["experimentList"];
$numberOfAttendingStudents = $_POST["numberOfStudents"];
$experimentList = json_decode($experimentListJSON);
echo $dateName;
//echo $experimentListJSON ."------------";
//echo '      between json and first element     ';
//echo $experimentList[0];
//echo '  tried to print name';



$AllnameOfStudents = array();
$AllstudentExpInfoJSON = array();
$AllstudentYearsExperience = array();
$AlleventsAttended = array();
$nameOfStudents = array();
$studentExpInfoJSON = array();
$studentYearsExperience = array();
$eventsAttended = array();
$studentIndex = 0;
class MyDB extends SQLite3 {
      function __construct() {
         $this->open('Student.db');
      }
   }
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
   }

   $sql =<<<EOF
      SELECT * from StudentInfo;
EOF;
$ret = $db->query($sql);
while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
	$dateObjectJSON = $row['dateData'];
	$dateObject = json_decode($dateObjectJSON);
	if(in_array($row['name'],$studentList)){
	$AllnameOfStudents[$studentIndex] = $row['name'];
	$AllstudentExpInfoJSON[$studentIndex] = $row['experimentData'];
	//echo '-----'.$studentIndex.'___'.$studentExpInfoJSON[$studentIndex].'---------------';
	//$studentExpInfo[$studentIndex] = json_decode($studentExpInfoJSON[$studentIndex]);
	$AllstudentYearsExperience[$studentIndex] = $row['years'];
	$AlleventsAttended[$studentIndex] = $row['eventsAttended'];
	$studentIndex++;
}
}
$indexOfAttendingStudents = array();
$index = 0;
$studentCount = intval($numberOfAttendingStudents);
echo '------------------'.$studentCount;
$countOfAllnameOfStudents = count($AllnameOfStudents);
echo '------------------'.$countOfAllnameOfStudents;
if($studentCount >0 && $studentCount <10){
for($i = 0; $i<$studentCount;$i++){
	$experimentDateIndex = 0;
	while($experimentDateIndex<100){
		for($z = 0;$z <$countOfAllnameOfStudents; $z++){
			if($AllstudentYearsExperience[$z] == $experimentDateIndex && !in_array($z,$indexOfAttendingStudents)){
				$indexOfAttendingStudents[$index] = $z;
				$index++;
				break;
			}
		}
		$experimentDateIndex++;
	}
}
/*DO NOT USE CODE BETWEEN MARK --------
$indexOfAttendingStudents = array();
for($i = 0; $i<9;i++
for($i = 0; $i <9;$i++){
	if( $i<=(count($AllnameOfStudents)-1)){
	 while(true){
		$num = rand(0,count($AllnameOfStudents)-1);
		if(in_array($num,$indexOfAttendingStudents)){
			//echo $num;
		}
		else{
			$indexOfAttendingStudents[$i] = $num;
			break;
		}
	}
	
	}
}
DO NOT USE CODE BETWEEN MARK --------*/
//var_dump($indexOfAttendingStudents);
for($i=0;$i<count($indexOfAttendingStudents);$i++){
$studentExpInfoJSON[$i] = $AllstudentExpInfoJSON[$indexOfAttendingStudents[$i]];
$nameOfStudents[$i] = $AllnameOfStudents[$indexOfAttendingStudents[$i]];
$studentYearsExperience[$i] = $AllstudentYearsExperience[$indexOfAttendingStudents[$i]];
$eventsAttended[$i] = $AlleventsAttended[$indexOfAttendingStudents[$i]];
}
//var_dump($nameOfStudents);
//var_dump($studentExpInfoJSON);
//var_dump($studentYearsExperience);
$studentExperimentCount = array();
$numExperiments = 0;
//echo $experimentList;
//var_dump($experimentList);
$countOfexperimentList = sizeOf($experimentList);
for($i = 0; $i<$countOfexperimentList; $i++){
$numExperiments += explode("!",$experimentList[$i])[1];
}
//echo $numExperiments.'___';
$maxNumExp = ceil($numExperiments / count($indexOfAttendingStudents));
//echo $maxNumExp;

$listOfExperiments = array();
for($i = 0; $i<count($experimentList); $i++){
$experimentName = explode("!",$experimentList[$i])[0];
$experimentNum = explode("!",$experimentList[$i])[1];
//echo $experimentNum;
//echo $experimentName;
$studentsToDoExperiment = array();
$numberSelected = 0;
	for($pref = 1; $pref<=3; $pref++){
		//$dateObject->{$dateName} == true
		for($student = 0; $student < count($studentExpInfoJSON);$student++){
			$studentInfoJSON = $studentExpInfoJSON[$student];
			$studentEXPInfo = json_decode($studentInfoJSON);
		if($studentEXPInfo->{$experimentName} == $pref && $studentYearsExperience[$student] == '2+' && $numberSelected <$experimentNum && $studentExperimentCount[$student]!=$maxNumExp){
			$studentsToDoExperiment[$numberSelected] = $nameOfStudents[$student];
			$numberSelected++;
			$studentExperimentCount[$student]++;
		}
		}
		for($student = 0; $student < count($studentExpInfoJSON);$student++){
			$studentInfoJSON = $studentExpInfoJSON[$student];
			$studentEXPInfo = json_decode($studentInfoJSON);
		if($studentEXPInfo->{$experimentName} == $pref && $studentYearsExperience[$student] == '1' && $numberSelected <$experimentNum && $studentExperimentCount[$student]!=$maxNumExp){
			$studentsToDoExperiment[$numberSelected] = $nameOfStudents[$student];
			$numberSelected++;
			$studentExperimentCount[$student]++;
		}
		}
		for($student = 0; $student < count($studentExpInfoJSON);$student++){
			$studentInfoJSON = $studentExpInfoJSON[$student];
			$studentEXPInfo = json_decode($studentInfoJSON);
		if($studentEXPInfo->{$experimentName} == $pref && $studentYearsExperience[$student] == '0' && $numberSelected <$experimentNum && $studentExperimentCount[$student]!=$maxNumExp){
			$studentsToDoExperiment[$numberSelected] = $nameOfStudents[$student];
			$numberSelected++;
			$studentExperimentCount[$student]++;
		}
		}
	}
	for($pref = 4; $pref<=5; $pref++){
		for($student = 0; $student < count($studentExpInfoJSON);$student++){
			$studentInfoJSON = $studentExpInfoJSON[$student];
			$studentEXPInfo = json_decode($studentInfoJSON);
		if($studentEXPInfo->{$experimentName} == $pref && $studentYearsExperience[$student] == '0' && $numberSelected <$experimentNum && $studentExperimentCount[$student]!=$maxNumExp){
			$studentsToDoExperiment[$numberSelected] = $nameOfStudents[$student];
			$numberSelected++;
			$studentExperimentCount[$student]++;
		}
		}
		for($student = 0; $student < count($studentExpInfoJSON);$student++){
			$studentInfoJSON = $studentExpInfoJSON[$student];
			$studentEXPInfo = json_decode($studentInfoJSON);
		if($studentEXPInfo->{$experimentName} == $pref && $studentYearsExperience[$student] == '1' && $numberSelected <$experimentNum && $studentExperimentCount[$student]!=$maxNumExp){
			$studentsToDoExperiment[$numberSelected] = $nameOfStudents[$student];
			$numberSelected++;
			$studentExperimentCount[$student]++;
		}
		}
		for($student = 0; $student < count($studentExpInfoJSON);$student++){
			$studentInfoJSON = $studentExpInfoJSON[$student];
			$studentEXPInfo = json_decode($studentInfoJSON);
		if($studentEXPInfo->{$experimentName} == $pref && $studentYearsExperience[$student] == '2+' && $numberSelected <$experimentNum && $studentExperimentCount[$student]!=$maxNumExp){
			$studentsToDoExperiment[$numberSelected] = $nameOfStudents[$student];
			$numberSelected++;
			$studentExperimentCount[$student]++;
		}
		}
	}
$listOfExperiments[$i] = $studentsToDoExperiment;
//echo $experimentName.'<br>';
//var_dump($studentsToDoExperiment).'<br>';
//echo '<br>----------------<br>';
}
//echo '<br>----------------<br>';
//echo '<br>----------------<br>';
//echo '<br>----------------<br>';
//var_dump($listOfExperiments);
//echo '<br>----------------<br>';
//echo '<br>----------------<br>';
//echo '<br>----------------<br>';
//var_dump($nameOfStudents);

$sql ="CREATE TABLE IF NOT EXISTS EVENTRECORDS (
					DATE					TEXT	NOT NULL,
					STUDENTLIST				TEXT	NOT NULL,
					EXPERIMENTLIST			TEXT	NOT NULL,
					STUDENTEXPERIMENTLIST	TEXT	NOT NULL,
					PRIMARY KEY (DATE))";
$db->exec($sql) or die($db->lastErrorMsg());

$dateNameForDB = SQLite3::escapeString($dateName);
$studentListForDB = json_encode($nameOfStudents);
$experimentListForDB = $experimentListJSON;
$studentExperimentListForDB = json_encode($listOfExperiments);

echo '<br>----------------<br>';
echo '<br>----------------<br>';
echo '<br>----------------<br>';
echo $dateNameForDB;
echo '<br>----------------<br>';
echo $studentListForDB;
echo '<br>----------------<br>';
echo $experimentListForDB;
echo '<br>----------------<br>';
echo $studentExperimentListForDB;
echo '<br>----------------<br>';

$delete = "DELETE FROM EVENTRECORDS WHERE DATE = '$dateNameForDB'";
$insert = "INSERT INTO EVENTRECORDS VALUES ('$dateNameForDB','$studentListForDB','$experimentListForDB','$studentExperimentListForDB')";
			if($db->exec($delete)) 
			{
				
				echo "<h1>DeletedInfo</h1>";
			}
			else
			{
				echo "<h1>Cannot Delete Info</h1>";
			}
			if($db->exec($insert)) 
			{
				
				echo "<h1>Submition Succesful</h1>";
			}
			else
			{
				echo "<h1>Unable to add information</h1>";
			}
			for($i = 0;$i<count($nameOfStudents);$i++){
				echo $eventsAttended[$i];
			}
			for($i = 0;$i<count($nameOfStudents);$i++){
			$eventsAttended[$i] = (int)$eventsAttended[$i]+1;
			echo $eventsAttended[$i];
			}
for($i = 0;$i<count($nameOfStudents);$i++){
  $sql =<<<EOF
UPDATE StudentInfo set eventsAttended ='$eventsAttended[$i]'  where name='$nameOfStudents[$i]';
EOF;
   $ret = $db->exec($sql);
}

$db->close();


}
}
?>