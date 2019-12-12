
function showTables(elem){
		elem.parentNode.removeChild(elem);
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
		var ServerData = this.responseText;
		var Students = ServerData.split("#");
		for(student of Students)
		{
			StudentInfo = student.split("!");
			console.log(StudentInfo[0]);
			var StudentInfoTable = document.createElement("ul");
			document.getElementById("table1").appendChild(StudentInfoTable);
			var infoNum = 0;
			for(info of StudentInfo){
				var node = document.createElement("li");
				var textnode = document.createTextNode(info);
				node.appendChild(textnode);
				StudentInfoTable.appendChild(node);
				
			}
		}
		 /*var node = document.createElement("P");
	   	 var textnode = document.createTextNode(ServerData);
   		 node.appendChild(textnode);
		 document.getElementById("table1").appendChild(node);
		 */
	
            }
        }
        xmlhttp.open("POST", "tableInfo.php", true);
        xmlhttp.send();
}		
	
		
		
		
		
		function editYear(elem){
			elem.parentNode.removeChild(elem);
			var removeButton= document.createElement('input');
			removeButton.setAttribute('type','button');
			removeButton.setAttribute('value','Remove Year Dates');
			document.getElementById("dateTable").appendChild(removeButton);
			removeButton.onclick = function(){removeYear()};
			
			var linebreak = document.createElement('br');
			document.getElementById("dateTable").appendChild(linebreak);	
		}
		
		
		
		
		
		function removeYear(){
			 var xmlhttp;
       if(window.XMLHttpRequest)
       {
           xmlhttp = new XMLHttpRequest;
       }
       else
       {
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
       }
       xmlhttp.onreadystatechange = function()
       {
          if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
          {
			window.location.reload();
          }
       }
       xmlhttp.open("POST", "deleteEventData.php");
	   xmlhttp.send();
		}
		
		
		
		
		
		function addDate(dateNum){
			var dates = dateNum.value;
			console.log("function used");
			console.log(dates);
			if(dates >=1 && dates < 20){
			var form = document.createElement('form');
			form.id = "dateForm";
			document.getElementById("dateTable").appendChild(form);
			for(var i=0;i<dates; i++){
			var linebreak = document.createElement('br');
			document.getElementById("dateForm").appendChild(linebreak);
			var date = document.createElement('input');
			date.type = 'text';
			date.name = "date" + i;
			date.setAttribute('class','dateInput');
			console.log(date.name);
			document.getElementById("dateForm").appendChild(date);
			var linebreak = document.createElement('br');
			document.getElementById("dateForm").appendChild(linebreak);
			}
			var date = document.createElement('input');
			date.type = 'button';
			date.value = "submit";
			date.onclick = function(){submitDates(dates)};
			document.getElementById("dateForm").appendChild(date);
			}
		}
		
		
		function submitDates(numberOfDates){
		var inputs = document.getElementsByClassName("dateInput");
       var formdata = new FormData();
	   formdata.append("numDates", numberOfDates);
       for(var i=0; i<inputs.length; i++)
       {
           formdata.append(inputs[i].name, inputs[i].value);
		   console.log(inputs[i].name + " " + inputs[i].value);
       }
       var xmlhttp;
       if(window.XMLHttpRequest)
       {
           xmlhttp = new XMLHttpRequest;
       }
       else
       {
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
       }
       xmlhttp.onreadystatechange = function()
       {
          if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
          {
			    window.location.reload();
          }
       }
       xmlhttp.open("POST", "addDate.php");
       xmlhttp.send(formdata);
		}
		
		
		
		
		function editExperiment(elem){
			elem.parentNode.removeChild(elem);
			var removeButton= document.createElement('input');
			removeButton.setAttribute('type','button');
			removeButton.setAttribute('value','Remove Experiments');
			document.getElementById("experimentTable").appendChild(removeButton);
			removeButton.onclick = function(){removeExperiment()};
			
			var linebreak = document.createElement('br');
			document.getElementById("experimentTable").appendChild(linebreak);
			
			var addExperimentButton = document.createElement('input');
			addExperimentButton.type = 'button';
			addExperimentButton.value = 'Add experiments';
			document.getElementById("experimentTable").appendChild(addExperimentButton);
			
			var experimentText = document.createElement('input');
			experimentText.type = 'text';
			document.getElementById("experimentTable").appendChild(experimentText);
			
			addExperimentButton.onclick = function(){ addExperiment(experimentText)};
		}
		
		
		
		
		function addExperiment(textNode){	
		console.log("added experiemnt" + textNode.value);
		var expNumCount = textNode.value;
			console.log("function used");
			console.log(expNumCount);
			if(expNumCount >=1 && expNumCount < 20){
			var form = document.createElement('form');
			form.id = "expForm";
			document.getElementById("experimentTable").appendChild(form);
			
			for(var i=0;i<expNumCount; i++){
			var linebreak = document.createElement('br');
			document.getElementById("expForm").appendChild(linebreak);
			
			var expName = document.createElement("label");
				expName.innerHTML = "Experiment Name  ";
				document.getElementById("expForm").appendChild(expName);
			
			var exp = document.createElement('input');
			exp.type = 'text';
			exp.name = "exp" + i;
			exp.setAttribute('class','expInput');
			console.log(exp.name);
			document.getElementById("expForm").appendChild(exp);
			
			var expNumName = document.createElement("label");
				expNumName.innerHTML = "Number of Students for experiment  ";
				document.getElementById("expForm").appendChild(expNumName);
			
			var expNum = document.createElement('input');
			expNum.type = 'text';
			expNum.name = "expNum" + i;
			expNum.setAttribute('class','expNumInput');
			console.log(expNum.name);
			document.getElementById("expForm").appendChild(expNum);
			
			var linebreak = document.createElement('br');
			document.getElementById("expForm").appendChild(linebreak);
			}
			var exp= document.createElement('input');
			exp.type = 'button';
			exp.value = "submit";
			exp.onclick = function(){submitExperiments(expNumCount)};
			document.getElementById("expForm").appendChild(exp);
		}
		}		

		function submitExperiments(expNum){
			var inputs = document.getElementsByClassName("expInput");
			var numInputs = document.getElementsByClassName("expNumInput");
       var formdata = new FormData();
	   formdata.append("numExp", expNum);
       for(var i=0; i<inputs.length; i++)
       {
           formdata.append(inputs[i].name, inputs[i].value);
		   formdata.append(numInputs[i].name, numInputs[i].value);
		   console.log(inputs[i].name + " " + inputs[i].value);
		    console.log(numInputs[i].name + " " + numInputs[i].value);
       }
	   console.log("testing form data");
		for(var pair of formdata.entries()) {
   console.log(pair[0]+ ', '+ pair[1]); 
}
       var xmlhttp;
       if(window.XMLHttpRequest)
       {
           xmlhttp = new XMLHttpRequest;
       }
       else
       {
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
       }
       xmlhttp.onreadystatechange = function()
       {
          if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
          {
			  	window.location.reload();
          }
       }
       xmlhttp.open("POST", "addExperiment.php");
       xmlhttp.send(formdata);
		}
		
		
		
		
		function removeExperiment(){
			 var xmlhttp;
       if(window.XMLHttpRequest)
       {
           xmlhttp = new XMLHttpRequest;
       }
       else
       {
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
       }
       xmlhttp.onreadystatechange = function()
       {
          if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
          {
			window.location.reload();
          }
       }
       xmlhttp.open("POST", "removeExperiments.php");
	   xmlhttp.send();
		
		}
		//starting function for planning events creates box to fill it date
function addDatesToSelect(elem){
				
					var linebreak = document.createElement('br');
					document.getElementById("dateSelection").appendChild(linebreak);
					
					var dateName = document.createTextNode("Event Date");
					document.getElementById("dateSelection").appendChild(dateName);
					
					var date = document.createElement('input');
					date.type = 'text';
					date.name = '';
					date.setAttribute('class','dateSelectionInput');
					document.getElementById("dateSelection").appendChild(date);
				
					
					var linebreak = document.createElement('br');
					document.getElementById("dateSelection").appendChild(linebreak);
					
				
				var selection= document.createElement('input');
			selection.type = 'button';
			selection.value = "Confirm Date";
			selection.onclick = function(){getExperiments(date.value)};
			document.getElementById("dateSelection").appendChild(selection);
			
		
	
}
function getExperiments(dateToPlan){
	var elementList = document.getElementById("dateSelection").childNodes;
	while(elementList[0]!=null){
	document.getElementById("dateSelection").removeChild(elementList[0]);
	}
	var selectionTextNode = document.createTextNode("Select the experiments you would like to do");
	document.getElementById("dateSelection").appendChild(selectionTextNode);
	
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				//showExperiments.php is file asking from
                //console.log(this.responseText);
				var experiments = this.responseText.split("#");
				console.log(experiments[0]);
				for(var i =0; i<experiments.length;i++){
				
					var linebreak = document.createElement('br');
					document.getElementById("dateSelection").appendChild(linebreak);
					
					var experiment = document.createElement('input');
					experiment.type = 'checkbox';
					experiment.name = experiments[i];
					experiment.setAttribute('class','experimentSelectionInput');
					document.getElementById("dateSelection").appendChild(experiment);
				
					var experimentName = document.createTextNode(experiments[i].split("!")[0] + "   ");
					document.getElementById("dateSelection").appendChild(experimentName);
					
					
					var linebreak = document.createElement('br');
					document.getElementById("dateSelection").appendChild(linebreak);
					
				}
				
				var linebreak = document.createElement('br');
				document.getElementById("dateSelection").appendChild(linebreak);
				
				var selectionOfExperiments= document.createElement('input');
				selectionOfExperiments.type = 'button';
				selectionOfExperiments.value = "Confirm Experiments";
				selectionOfExperiments.onclick = function(){generateDate(dateToPlan)};
				document.getElementById("dateSelection").appendChild(selectionOfExperiments);
			}
		
	
       };
        xmlhttp.open("Post", "showExperiments.php", true);
        xmlhttp.send();
	
}
function generateDate(dateName){
	var experimentsToPlan = [];
	var expIndex = 0;
	var experimentList = document.getElementsByClassName("experimentSelectionInput");
	for(experiment of experimentList){
		if(experiment.checked){
			console.log(experiment.name);
			experimentsToPlan[expIndex] = experiment.name;
			expIndex++;
		}
	}
	console.log(experimentsToPlan);
	//line of code to clear element checkboxes
	var elementList = document.getElementById("dateSelection").childNodes;
	while(elementList[0]!=null){
	document.getElementById("dateSelection").removeChild(elementList[0]);
	}
	//console.log("trying to open php file");
	//console.log(dateName);
	
	var formdata = new FormData();
	
	formdata.append("dateName", dateName);
	var experimentString = JSON.stringify(experimentsToPlan);
	//console.log(experimentString);
	formdata.append("experimentList", experimentString);
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			displayEventLink(dateName,"dateSelection");
		}
};
xmlhttp.open("POST", "createDateTemplate.php");
xmlhttp.send(formdata);
}
function displayEventLink(dateName, container){
				var url = window.location.href.substr(0,window.location.href.length -10) + "/date.php?id=" + dateName.replace(/ /g, "%20");
				var urlText = document.createElement('input');
				urlText.type = "text";
				urlText.value = url;
				document.getElementById(container).appendChild(urlText);
				
				var linebreak = document.createElement('br');
				document.getElementById(container).appendChild(linebreak);
				
				var copyURLButton= document.createElement('input');
				copyURLButton.type = 'button';
				copyURLButton.value = "Copy Text";
				copyURLButton.onclick = function(){
					urlText.focus();
					urlText.select();
					document.execCommand('copy');
				};
				document.getElementById(container).appendChild(copyURLButton);

}
function generatePreviousEventList(elem){
		elem.parentNode.removeChild(elem);
			 var xmlhttp;
       if(window.XMLHttpRequest)
       {
           xmlhttp = new XMLHttpRequest;
       }
       else
       {
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
       }
       xmlhttp.onreadystatechange = function()
       {
          if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
          {
			  var dataJSON = this.responseText;
			  //console.log(dataJSON);
			  var events = this.responseText.split("&");
			  for(var i=0;i<events.length;i++){
				var eventData = JSON.parse(events[i]);
				if(!(eventData[3] == "null")){
					console.log(eventData[2]);
			  var experimentList = JSON.parse(eventData[2]);
			   var studentListForExperiments = JSON.parse(eventData[3]);
				//console.log(eventData);
				var dateHeader = document.createElement('h3');
				dateHeader.innerHTML = eventData[0];
				document.getElementById("eventTable").appendChild(dateHeader);
				//displayEventLink(eventData[0],"eventTable");
				//area where event display was
				var downLoadButton = document.createElement('input');
				downLoadButton.type = "button";
				downLoadButton.name = i;
				downLoadButton.value  = "Download Event Data";
				downLoadButton.onclick = function(){
					HTMLToWordDoc(getHTMLForDoc(JSON.parse(events[this.name])));
				}
				document.getElementById("eventTable").appendChild(downLoadButton);
				
				var sendMessageButton = document.createElement('input');
				sendMessageButton.type = "button";
				sendMessageButton.name = i;
				sendMessageButton.value  = "Send a Reminder";
				document.getElementById("eventTable").appendChild(sendMessageButton);
				sendMessageButton.onclick = function(){
					sendEventReminder(JSON.parse(events[this.name]))
				}
				 
				 var displayDate = document.createElement('input');
				 displayDate.type = "button";
				 displayDate.name = i;
				 displayDate.value = "Display Date Info";
				 document.getElementById("eventTable").appendChild(displayDate);
				
				displayDate.onclick =  function(){
					 displayEventUnderDate(JSON.parse(events[this.name]));
				 }
				var dateBlock = document.createElement('div');
				dateBlock.id = eventData[0];
				document.getElementById("eventTable").appendChild(dateBlock);
				
				var linebreak = document.createElement('br');
				document.getElementById("eventTable").appendChild(linebreak);
			  }else{
				  //For setting up event
				  var dateHeader = document.createElement('h3');
				dateHeader.innerHTML = eventData[0];
				document.getElementById("eventTable").appendChild(dateHeader);
				displayEventLink(eventData[0],"eventTable");
				
				  var studentButton = document.createElement('input');
				studentButton.type = "button";
				studentButton.name = i;
				studentButton.value  = "View Students";
				studentButton.onclick = function(){
				 displayStudents(JSON.parse(events[this.name]));
				}
				document.getElementById("eventTable").appendChild(studentButton);
				
				var numberOfStudentBox = document.createElement('input');
				numberOfStudentBox.type = "text";
				
				  var planButton = document.createElement('input');
				planButton.type = "button";
				planButton.name = i;
				planButton.value  = "Plan Event";
				planButton.onclick = function(){
					generateEventData(JSON.parse(events[this.name]),numberOfStudentBox.value);
				}
				document.getElementById("eventTable").appendChild(planButton);
				document.getElementById("eventTable").appendChild(numberOfStudentBox);
				
				var dateBlock = document.createElement('div');
				dateBlock.id = eventData[0];
				document.getElementById("eventTable").appendChild(dateBlock);
				
				var linebreak = document.createElement('br');
				document.getElementById("eventTable").appendChild(linebreak);
			  }
			  }
          }
       }
       xmlhttp.open("POST", "getEventData.php");
	   xmlhttp.send();
		
}
function generateEventData(eventInfo,numStudents){
	console.log(eventInfo);
	console.log("AT GENERATEEVENTDATA" + numStudents)
	var formdata = new FormData();

	formdata.append("dateName", eventInfo[0]);
	formdata.append("experimentList", eventInfo[2]);
	formdata.append("studentList",eventInfo[1]);
	formdata.append("numberOfStudents",numStudents);
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			window.location.reload();
		}
};
xmlhttp.open("POST", "createEvent.php");
xmlhttp.send(formdata)

}
function displayStudents(studentJSON){
	var names = studentJSON[1].split("#");
	if(document.getElementById(studentJSON[0]).childNodes.length == 0){
		for(var i =0; i<names.length;i++){
			var studentHeader = document.createElement('h4');
			studentHeader.innerHTML = names[i];
			studentHeader.className = "studentListStyle";
			document.getElementById(studentJSON[0]).appendChild(studentHeader);
		}
	}
}
function displayCurrentEvent(dateName){
	 var xmlhttp;
       if(window.XMLHttpRequest)
       {
           xmlhttp = new XMLHttpRequest;
       }
       else
       {
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
       }
       xmlhttp.onreadystatechange = function()
       {
         if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
          {
			  var dataJSON = this.responseText;
			  console.log(dataJSON);
			  var events = this.responseText.split("&");
			  for(var i=0;i<events.length;i++){
				var eventData = JSON.parse(events[i]);
					console.log(eventData[0]);
								if(eventData[0] === dateName){
									var experimentList = JSON.parse(eventData[2]);
									var studentListForExperiments = JSON.parse(eventData[3]);
									console.log(eventData);
									var dateHeader = document.createElement('h3');
									dateHeader.innerHTML = eventData[0];
									document.getElementById("dateSelection").appendChild(dateHeader);
									  for(var z = 0; z<experimentList.length;z++){
										var expHeader = document.createElement('h4');
										expHeader.innerHTML = experimentList[z].split("!")[0];
										expHeader.className = "experimentListStyle";
										document.getElementById("dateSelection").appendChild(expHeader);
										var studentArray = studentListForExperiments[z];
												for(var q = 0; q<studentArray.length;q++){
													var studentHeader = document.createElement('h5');
													studentHeader.innerHTML = studentArray[q];
													studentHeader.className = "studentListStyle";
													document.getElementById("dateSelection").appendChild(studentHeader);
												}
									  }
							  var linebreak = document.createElement('br');
								document.getElementById("dateSelection").appendChild(linebreak);
							}
			    }
			  
          }
       }
	   xmlhttp.open("POST", "getEventData.php");
	   xmlhttp.send();
}
function editValueButton(elem){
			elem.parentNode.removeChild(elem);
			var updateButton= document.createElement('input');
			updateButton.setAttribute('type','button');
			updateButton.setAttribute('value','Edit Info of a Student');
			document.getElementById("studentDBEdit").appendChild(updateButton);
			updateButton.onclick = function(){
				createEditForm(updateButton);
			};
			
			var linebreak = document.createElement('br');
			document.getElementById("studentDBEdit").appendChild(linebreak);
			
			var deleteAllButton= document.createElement('input');
			deleteAllButton.setAttribute('type','button');
			deleteAllButton.setAttribute('value','Delete All Students');
			document.getElementById("studentDBEdit").appendChild(deleteAllButton);
			deleteAllButton.onclick = function(){
				deleteAllStudents();
			};
			
			var linebreak = document.createElement('br');
			document.getElementById("studentDBEdit").appendChild(linebreak);
			
			var deleteButton= document.createElement('input');
			deleteButton.setAttribute('type','button');
			deleteButton.setAttribute('value','Delete Student');
			document.getElementById("studentDBEdit").appendChild(deleteButton);
			deleteButton.onclick = function(){
				createDeleteForm(deleteButton);
			};
			
			var linebreak = document.createElement('br');
			document.getElementById("studentDBEdit").appendChild(linebreak);
			
			
			

}
function createEditForm(elem){
			elem.parentNode.removeChild(elem);
			
			var nameLabel = document.createElement("label");
				nameLabel.innerHTML  = "Name of Student";
				document.getElementById("studentDBEdit").appendChild(nameLabel);
					
			var nameText = document.createElement('input');
			nameText.type = 'text';
			nameText.id = "nameTextBox";
			document.getElementById("studentDBEdit").appendChild(nameText);
			
			var linebreak = document.createElement('br');
			document.getElementById("studentDBEdit").appendChild(linebreak);
			
			var indexLabel = document.createElement("label");
				indexLabel.innerHTML  = "Index of Value";
				document.getElementById("studentDBEdit").appendChild(indexLabel);
					
			var valueIndexText = document.createElement('input');
			valueIndexText.type = 'text';
			valueIndexText.id = "valueIndexTextBox";
			document.getElementById("studentDBEdit").appendChild(valueIndexText);
			
			var linebreak = document.createElement('br');
			document.getElementById("studentDBEdit").appendChild(linebreak);
			
			var valueLabel = document.createElement("label");
				valueLabel.innerHTML  = "New Value";
				document.getElementById("studentDBEdit").appendChild(valueLabel);
			
			var valueText = document.createElement('input');
			valueIndexText.type = 'text';
			valueIndexText.id = "valueTextBox";
			document.getElementById("studentDBEdit").appendChild(valueText);
			
			var linebreak = document.createElement('br');
			document.getElementById("studentDBEdit").appendChild(linebreak);
			
			var updateButton= document.createElement('input');
			updateButton.setAttribute('type','button');
			updateButton.setAttribute('value','Submit Updated Value');
			document.getElementById("studentDBEdit").appendChild(updateButton);
			updateButton.onclick = function(){
				var index = valueIndexText.value;
				var value = valueText.value;
				var name = nameText.value;
				editValueInDatabase(name,index,value);
			};
}
function editValueInDatabase(nameOfStudent,valueIndex, value){
	 var formdata = new FormData();
		formdata.append("studentName", nameOfStudent);
	   formdata.append("valueIndex", valueIndex);
	   formdata.append("updatedValue", value);
		 var xmlhttp;
       if(window.XMLHttpRequest)
       {
           xmlhttp = new XMLHttpRequest;
       }
       else
       {
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
       }
       xmlhttp.onreadystatechange = function()
       {
         if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
			  
			}
	   }
	   xmlhttp.open("POST", "updateStudentInfo.php");
	   xmlhttp.send(formdata);
}
function createDeleteForm(elem){
		elem.parentNode.removeChild(elem);
		var nameLabel = document.createElement("label");
				nameLabel.innerHTML  = "Name of Student";
				document.getElementById("studentDBEdit").appendChild(nameLabel);
					
			var nameText = document.createElement('input');
			nameText.type = 'text';
			nameText.id = "deleteNameTextBox";
			document.getElementById("studentDBEdit").appendChild(nameText);
			
			var linebreak = document.createElement('br');
			document.getElementById("studentDBEdit").appendChild(linebreak);
			
			var updateButton= document.createElement('input');
			updateButton.setAttribute('type','button');
			updateButton.setAttribute('value','Delete Student');
			document.getElementById("studentDBEdit").appendChild(updateButton);
			updateButton.onclick = function(){
				var name = nameText.value;
				deleteStudentFromDatabase(name);
			};
}
function deleteStudentFromDatabase(name){
 var formdata = new FormData();
		formdata.append("studentName", name);
		 var xmlhttp;
       if(window.XMLHttpRequest)
       {
           xmlhttp = new XMLHttpRequest;
       }
       else
       {
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
       }
       xmlhttp.onreadystatechange = function()
       {
         if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
			  
			}
	   }
	   xmlhttp.open("POST", "deleteStudent.php");
	   xmlhttp.send(formdata);
}
function HTMLToWordDoc(html){
 var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
            "xmlns:w='urn:schemas-microsoft-com:office:word' "+
            "xmlns='http://www.w3.org/TR/REC-html40'>"+
            "<head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";
       var footer = "</body></html>";
       var sourceHTML = header+html+footer;
       var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
       var fileDownload = document.createElement("a");
       document.body.appendChild(fileDownload);
       fileDownload.href = source;
       fileDownload.download = 'document.doc';
       fileDownload.click();
       document.body.removeChild(fileDownload);
}
function getHTMLForDoc(eventData){
	var htmlToSend = "";
	console.log(eventData[0]);
	var experimentList = JSON.parse(eventData[2]);
	var studentListForExperiments = JSON.parse(eventData[3]);
	htmlToSend += "<h3>"+ eventData[0]+"</h3>";
		  for(var z = 0; z<experimentList.length;z++){
			  htmlToSend+= "<h4 style='color:purple;'>" + experimentList[z].split("!")[0] +"</h4>";
			  var studentArray = studentListForExperiments[z];
				for(var q = 0; q<studentArray.length;q++){
					htmlToSend += "<h5 style='color:green;'>" + studentArray[q] + "</h5>";
				}
		  }
	return htmlToSend;
}
function displayEventUnderDate(eventData){
	  var experimentList = JSON.parse(eventData[2]);
	  var studentListForExperiments = JSON.parse(eventData[3]);
	for(var z = 0; z<experimentList.length;z++){
						var expHeader = document.createElement('h4');
						expHeader.innerHTML = experimentList[z].split("!")[0];
						expHeader.className = "experimentListStyle";
						document.getElementById(eventData[0]).appendChild(expHeader);
						var studentArray = studentListForExperiments[z];
								for(var q = 0; q<studentArray.length;q++){
									var studentHeader = document.createElement('h5');
								studentHeader.innerHTML = studentArray[q];
								studentHeader.className = "studentListStyle";
								document.getElementById(eventData[0]).appendChild(studentHeader);
								}
					  }
}
/*
  for(var z = 0; z<experimentList.length;z++){
						var expHeader = document.createElement('h4');
						expHeader.innerHTML = experimentList[z].split("!")[0];
						expHeader.className = "experimentListStyle";
						document.getElementById("eventTable").appendChild(expHeader);
						var studentArray = studentListForExperiments[z];
								for(var q = 0; q<studentArray.length;q++){
									var studentHeader = document.createElement('h5');
								studentHeader.innerHTML = studentArray[q];
								studentHeader.className = "studentListStyle";
								document.getElementById("eventTable").appendChild(studentHeader);
								}
					  }
*/
function sendEventReminder(eventData){
	console.log(eventData[0]);
	console.log(eventData[1]);
	console.log(eventData[2]);
	console.log(eventData[3]);
	var listOfStudents = eventData[1];
	 var formdata = new FormData();
		formdata.append("date",eventData[0]);
		formdata.append("studentListJSON", eventData[1]);
		formdata.append("experimentListJSON", eventData[2]);
		formdata.append("studentEXPListJSON", eventData[3]);
		 var xmlhttp;
       if(window.XMLHttpRequest)
       {
           xmlhttp = new XMLHttpRequest;
       }
       else
       {
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
       }
       xmlhttp.onreadystatechange = function()
       {
         if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
			  
			}
	   }
	   xmlhttp.open("POST", "sendRemind.php");
	   xmlhttp.send(formdata);
	
}
function deleteAllStudents(){
	var xmlhttp;
       if(window.XMLHttpRequest)
       {
           xmlhttp = new XMLHttpRequest;
       }
       else
       {
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
       }
       xmlhttp.onreadystatechange = function()
       {
         if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
			  window.location.reload();
			}
	   }
	   xmlhttp.open("POST", "deleteAllStudents.php");
	   xmlhttp.send();
}