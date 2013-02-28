/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	config.language = 'ru';
	config.height = '400px';
        config.filebrowserImageBrowseUrl = '/js/filemanager/browser/default/browser.html?Type=Image&Connector=/js/filemanager/connectors/php/connector.php';
             config.filebrowserFileBrowseUrl  = '/js/filemanager/browser/default/browser.html?Type=File&Connector=/js/filemanager/connectors/php/connector.php';
             config.filebrowserFlashBrowseUrl = '/js/filemanager/browser/default/browser.html?Type=Flash&Connector=/js/filemanager/connectors/php/connector.php';
             config.filebrowserBrowseUrl      = '/js/filemanager/browser/default/browser.html?Type=File&Connector=/js/filemanager/connectors/php/connector.php';
	// config.uiColor = '#AADC6E';


config.toolbar = 'Full';
 
config.toolbar_Full =
[
	{ name: 'document', items : [ 'Source','-','Save','DocProps','Preview','Print' ] },
	{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
	{ name: 'editing', items : [ 'Find','Replace' ] },
	{ name: 'tools', items : [ 'Maximize', 'ShowBlocks' ] },
	{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote',
	'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
	'/',
	{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
	{ name: 'colors', items : [ 'TextColor','BGColor' ] },
	{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript' ] },
	{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
	{ name: 'insert', items : [ 'Image','Table','HorizontalRule' ] },
];
 
config.toolbar_Basic =
[
	['Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink']
];
};
