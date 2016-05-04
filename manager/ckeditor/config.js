/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	config.skin = 'kama'; //office2003 , kama, v2

	config.toolbar = 'MyToolbar1';
	config.width = 640;
	config.toolbar_MyToolbar1 =
	[
		{ name: 'document', items : [ 'Source','NewPage','Preview','Maximize' ] },
		{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		{ name: 'editing', items : [ 'Find','Replace','-','SelectAll' ] },
		{ name: 'insert', items : [ 'Image','Table','HorizontalRule','Templates'] },
        '/',
		{ name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
		{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'] },
		{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'colors', items : [ 'Format','FontSize','TextColor','BGColor' ] }

	];
	config.toolbar = 'MyToolbar2';
 
	config.toolbar_MyToolbar2 =
	[
		{ name: 'document', items : [ 'Source','NewPage','Preview','Maximize' ] },
		{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
		{ name: 'insert', items : [ 'Table','HorizontalRule','SpecialChar','PageBreak'] },
        '/',
		{ name: 'styles', items : [ 'Styles','Format' ] },
		{ name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
		{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote' ] },
		{ name: 'links', items : [ 'Link','Unlink','Anchor' ] }
	];	

	
config.filebrowserBrowseUrl = '../../ckfinder/ckfinder.html';  

config.filebrowserImageBrowseUrl = '../../ckfinder/ckfinder.html?Type=Images';  

config.filebrowserFlashBrowseUrl = '../../ckfinder/ckfinder.html?Type=Flash';  

config.filebrowserUploadUrl = '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';

config.filebrowserImageUploadUrl = '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';  

config.filebrowserFlashUploadUrl = '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'; 

config.enterMode = CKEDITOR.ENTER_BR	

};
