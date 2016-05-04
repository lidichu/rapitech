/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

//CKEDITOR.addTemplates('default',{imagesPath:CKEDITOR.getUrl(CKEDITOR.plugins.getPath('templates')+'templates/images/'),templates:[{title:'Image and Title',image:'template1.gif',description:'One main image with a title and text that surround the image.',html:'<h3><img style="margin-right: 10px" height="100" width="100" align="left"/>Type the title here</h3><p>Type the text here</p>'},{title:'Strange Template',image:'template2.gif',description:'A template that defines two colums, each one with a title, and some text.',html:'<table cellspacing="0" cellpadding="0" style="width:100%" border="0"><tr><td style="width:50%"><h3>Title 1</h3></td><td></td><td style="width:50%"><h3>Title 2</h3></td></tr><tr><td>Text 1</td><td></td><td>Text 2</td></tr></table><p>More text goes here.</p>'},{title:'Text and Table',image:'template3.gif',description:'A title with some text and a table.',html:'<div style="width: 80%"><h3>Title goes here</h3><table style="width:150px;float: right" cellspacing="0" cellpadding="0" border="1"><caption style="border:solid 1px black"><strong>Table title</strong></caption></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table><p>Type the text here</p></div>'}]});
CKEDITOR.addTemplates( 'default',
{
	// The name of the subfolder that contains the preview images of the templates.
	imagesPath : CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'templates' ) + 'templates/images/' ),
 
	// Template definitions.
	templates :
		[
			{
				title: '衣服產品格式',
				image: '',
				description: '衣服的產品規格表',
				html:
					'<table width="99%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #979797">' + 
					'	<tr>' + 
					'		<td width="17%" align="center" bgcolor="#f2f2f2" style="padding:3px 0px;border-bottom:solid 1px #979797; border-right:solid 1px #979797">Size(cm)</td>' + 
					'		<td width="16%" align="center" bgcolor="#f2f2f2" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">S</td>' + 
					'		<td width="17%" align="center" bgcolor="#f2f2f2" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">M</td>' + 
					'		<td width="17%" align="center" bgcolor="#f2f2f2" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">L</td>' + 
					'		<td width="17%" align="center" bgcolor="#f2f2f2" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">XL</td>' + 
					'		<td width="16%" align="center" bgcolor="#f2f2f2" style="border-bottom:solid 1px #979797;">XXL</td>' + 
					'	</tr>' + 
					'	<tr>' + 
					'		<td align="center" style="padding:3px 0px;border-bottom:solid 1px #979797; border-right:solid 1px #979797">Shoulder<br /></td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'	</tr>' + 
					'	<tr>' + 
					'		<td align="center" style="padding:3px 0px;border-bottom:solid 1px #979797; border-right:solid 1px #979797">Chest width</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'	</tr>' + 
					'	<tr>' + 
					'		<td align="center" style="padding:3px 0px;border-bottom:solid 1px #979797; border-right:solid 1px #979797">Sleeve</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'	</tr>' + 
					'	<tr>' + 
					'		<td align="center" style="padding:3px 0px;border-bottom:solid 1px #979797; border-right:solid 1px #979797">Cuff width</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'	</tr>' + 
					'	<tr>' + 
					'		<td align="center" style="padding:3px 0px;border-bottom:solid 1px #979797; border-right:solid 1px #979797">Length</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-bottom:solid 1px #979797; border-right:solid 1px #979797">-</td>' + 
					'	</tr>' + 
					'	<tr>' + 
					'		<td align="center" style="padding:3px 0px; border-right:solid 1px #979797">Hem</td>' + 
					'		<td align="center" style="border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-right:solid 1px #979797">-</td>' + 
					'		<td align="center" style="border-right:solid 1px #979797">-</td>' + 
					'	</tr>' + 
					'</table>'
			}
		]
});
