/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	 config.language = 'fr';
	 config.uiColor = '#adc914';
	 config.height = 400;
	 config.toolbarCanCollapse = true; //Réduire le menu ck editor
	 
	config.toolbarGroups = [
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'align', 'list', 'indent', 'blocks', 'bidi', 'paragraph' ] },
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		'/',
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] },
		{ name: 'forms', groups: [ 'forms' ] }
	];

	config.removeButtons = 'Save,NewPage,Preview,Print,Paste,Cut,Copy,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,ImageButton,HiddenField,Button,BidiLtr,BidiRtl,Language,Outdent,Indent,BulletedList,NumberedList,About,Anchor,Flash,PageBreak,Iframe';

   config.filebrowserBrowseUrl = 'ckeditor/ckfinder/ckfinder.html';
   config.filebrowserImageBrowseUrl = 'ckeditor/ckfinder/ckfinder.html';
   config.filebrowserFlashBrowseUrl = 'ckeditor/ckfinder/ckfinder.html';
   config.filebrowserUploadUrl = 'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
   config.filebrowserImageUploadUrl = 'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
   config.filebrowserFlashUploadUrl = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

};



