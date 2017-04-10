

var RecordViewModel = function(data){
	var self = this;
	self.initialData = data;
	console.log(data);
	for(var field in data){
		var val = data[field];
		switch(field){
			case "External":
			case "FS":
			case "ITR":
			case "ITR_COR":
			case "WP":
			case "LT":
			case "COR":
			case "Other":
			case "Confidential":
				if(data[field]){
					val = (data[field] == "TRUE" || data[field] == 1);
				}
				break;
			case "ID":
			case "Year":
				if(data[field]){
					val = parseInt(data[field]);
				}
				break;
				
		}
		self[field] = ko.observable(val);
		
	}

	self.Contents = ko.computed(function(){
		var contentsList = "";
		// var fields = ['FS', 'ITR', 'ITR_COR', 'WP', 'LT', 'COR'];

		// for(var fieldIndex in fields){
		// 	if(self[fields[fieldIndex]] && self[fields[fieldIndex]]()){
		// 		if(contentsList){
		// 			contentsList += ", ";
		// 		}
		// 		contentsList += fields[fieldIndex];
		// 	}
		// }

		// if(self.Other() && self['Other_Description']()){
		// 	if(contentsList){
		// 		contentsList += ", ";
		// 	}
		// 	contentsList += self['Other_Description']();
		// 	// console.log(self['Other_Description']());
		// }

		if(self.InternalType() && self.InternalType() != 'undefined'){
			if(contentsList){
				contentsList += ", ";
			}
			contentsList += self.InternalType();
			// console.log(self['Other_Description']());
		}
		if(self.DescriptionText() && self.DescriptionText()){
			if(contentsList){
				contentsList += ", ";
			}
			contentsList += self.DescriptionText();
			// console.log(self['Other_Description']());
		}

		return contentsList;
	});

	self.differentSubmit = function(){
		alert('yay!~');
	}

	self.init = function() {
		$( "#newExternalForm" ).validate({
  			rules: {
			    Year: {
			      required: true,
			      min: 1980,
			      max: self.getCurrentFinancialYear()
			    }, 
			    Box: {
			      required: true
			    }, 
			    Contents: {
			      required: true
			    }, 
		  	}
		});
		
	};

	self.getCurrentFinancialYear = function(){
		var date = new Date();
		var year = date.getFullYear();
		if(date.getMonth() > 6){
			year++;
		}
		return year;
	}

}

