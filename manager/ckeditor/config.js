/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For the complete reference:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config
	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbar = 'MyToolbar1';
	config.width = 640;
	config.toolbar_MyToolbar1 = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: ['Maximize', 'ShowBlocks' , 'Source', '-', 'NewPage' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
		{ name: 'links', items: [ 'sourcearea','Link', 'Unlink', 'Anchor' ] },
		{ name: 'insert', items: [ 'Image','Table', 'HorizontalRule', 'SpecialChar','Iframe' ] },
		'/',
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },		
		{ name: 'styles', items: ['Font', 'FontSize'] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },		
		{ name: 'colors', items: [ 'TextColor', 'BGColor' ] }		
	];	
	config.toolbar = 'MyToolbar2';
	config.toolbar_MyToolbar2 =
	[
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'NewPage' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
		{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
		'/',
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
		'/',
		{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
		{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
		{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
		{ name: 'others', items: [ '-' ] }
	];	

	// Remove some buttons, provided by the standard plugins, which we don't
	// need to have in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Se the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';
	config.extraPlugins = 'stylesheetparser';
	config.forcePasteAsPlainText =false;
	// Make dialogs simpler.
	config.removeDialogTabs = 'image:advanced;image:Upload;image:Link;link:upload;link:advanced';
	config.filebrowserBrowseUrl = '../../ckfinder/ckfinder.html';  
	config.filebrowserImageBrowseUrl = '../../ckfinder/ckfinder.html?Type=Images';  
	config.filebrowserFlashBrowseUrl = '../../ckfinder/ckfinder.html?Type=Flash';  
	config.filebrowserUploadUrl = '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';  
	config.filebrowserFlashUploadUrl = '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'; 
	config.enterMode = CKEDITOR.ENTER_BR
};
