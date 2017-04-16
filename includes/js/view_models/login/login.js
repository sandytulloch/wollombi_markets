var ViewModel = function(data) {
	var self = this;

	self.email = ko.observable();
	self.p1 = ko.observable();
	self.p2 = ko.observable();
	self.first_name = ko.observable();
	self.last_name = ko.observable();
	self.phone = ko.observable();
	self.is_not_unique = ko.observable();

	self.valid = ko.computed(function(){
		var ret = true;

		ret = (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(self.email())) ;

		if(typeof self.p1() == 'undefined' || self.p1() == '' || self.p1() != self.p2()){
			ret = false;
		}

		if(!self.first_name()){
			ret = false;
		}
		if(!self.last_name()){
			ret = false;
		}
		if(!self.phone()){
			ret = false;
		}

		if(self.is_not_unique() == true){
			ret = false;
		}

		return ret;
	});

	self.check_unique = function() {
		$.post(
				'./check_unique',
				{'email':self.email()},
				function(data){
					// console.log(data);
					if(data == true){ 
						self.is_not_unique(true);
					} else {
						self.is_not_unique(false);
					}
				}
			)
	}

	self.email.subscribe(function(){
		self.check_unique();
	});

	self.submit_form = function(){
		$("#new_user").submit();
	}

}

