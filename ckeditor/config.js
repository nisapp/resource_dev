/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
        config.extraPlugins='iframe';
        config.filebrowserBrowseUrl = '/ckfinder/ckfinder.html',
 	config.filebrowserImageBrowseUrl = '/ckfinder/ckfinder.html?type=Images',
 	config.filebrowserFlashBrowseUrl = '/ckfinder/ckfinder.html?type=Files',
 	config.filebrowserUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
 	config.filebrowserImageUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
 	config.filebrowserFlashUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
        //config.extraPlugins = 'mediaembed';
     config.toolbar=	[['Source','-','Save','NewPage','Preview','-','Templates'],
    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
    ['TextColor','BGColor'],['Link','Unlink','Anchor'],
    '/',
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    ['Image','Iframe','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],//'jwplayer',
    '/',
    ['Styles','Format','Font','FontSize'],
    ['BidiLtr', 'BidiRtl'], ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
    ['Maximize', 'ShowBlocks','-','About']]; 
     /*
   config.toolbar = 'MediaToolbar';
   config.toolbar_MediaToolbar = 
      [
         ['MediaEmbed', 'Preview'],
         ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Scayt'],
         ['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat']
      ];        */
};