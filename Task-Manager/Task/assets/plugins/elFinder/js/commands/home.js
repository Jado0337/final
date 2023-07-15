(elFinder.prototype.commands.home = function() {
	"use strict";
	this.title = 'Home';
	this.alwaysEnabled  = true;
	this.updateOnSelect = false;
	this.shortcuts = [{
		pattern     : 'ctrl+home ctrl+shift+up',
		description : 'Home'
	}];
	
	this.getstate = function() {
		var  = this.fm.(),
			cwd  = this.fm.cwd().hash;
			
		return  && cwd &&  != cwd ? 0: -1;
	};
	
	this.exec = function() {
		return this.fm.exec('open', this.fm.());
	};
	

}).prototype = { forceLoad : true }; // this is required command
